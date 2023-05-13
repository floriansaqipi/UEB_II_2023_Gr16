<?php
function confirmQuery($result)
{
    global $connection;
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}
function getFeedCategories()
{
    global $connection;
    $query = "SELECT * FROM post_categories ";
    $select_all_categories_sidebar = mysqli_query($connection, $query);

    confirmQuery($select_all_categories_sidebar);

    while ($row = mysqli_fetch_assoc($select_all_categories_sidebar)) {
        $category_id = $row["category_id"];
        $name = $row["name"];
        echo "<li><a href='categories.php?category=$category_id'>{$name}</a></li>";
    }
}

function getCategoryNamesById($post_category_id)
{
    global $connection;
    $query = "SELECT * FROM post_categories WHERE category_id = $post_category_id ";
    $category_name_query = mysqli_query($connection, $query);

    confirmQuery($category_name_query);

    while ($row = mysqli_fetch_assoc($category_name_query)) {
        $post_category_name = $row["name"];
    }

    echo "$post_category_name";
}

function insertComment()
{
    global $connection;
    global $contentErr;
    global $post_id;
    global $comment_author, $comment_content;

    if (isset($_POST["post_comment"])) {
        $comment_author = $_POST["comment_author"];
        $comment_content = trim($_POST["comment_content"]);


        if (empty($comment_content)) {
            $contentErr = "Content can not be empty";
        } else {
            $pattern = "/.{3,}/";
            if (!preg_match($pattern, trim($comment_content))) {
                $contentErr = "Content must be longer than 3 characters";
            }
        }

        if (empty($contentErr)) {
            $query = "INSERT INTO comments (post_id, author, content, date) ";
            $query .= "VALUES ($post_id, '$comment_author', '$comment_content', now()) ";

            $insert_comment_query = mysqli_query($connection, $query);

            confirmQuery($insert_comment_query);

            header("Location: post-details.php?p_id=$post_id");
        }
    }
}

function countSinglePostComments()
{
    global $connection;
    global $post_id;
    $query = "SELECT COUNT(*) comment_count FROM comments WHERE post_id = $post_id AND is_approved = 1";

    $comment_post_count_query = mysqli_query($connection, $query);

    confirmQuery($comment_post_count_query);

    while ($row = mysqli_fetch_array($comment_post_count_query)) {
        $comment_count = $row["comment_count"];
        echo "<h2>$comment_count Comments</h2>";
    }
}
