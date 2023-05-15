<?php

function logOutAdmin()
{
    session_destroy();
    header("Location: ../index.php");
}
function isLoggedInAdmin()
{
    if (!isset($_SESSION["user_id"]) || $_SESSION["is_admin"] != "1") {
        header("Location: ../login.php");
    }
}
function confirmQuery($result)
{
    global $connection;
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}
function getAllCategoriesAdminTable()
{
    global $connection;

    $query = "SELECT * FROM post_categories ";
    $select_categories = mysqli_query($connection, $query);

    if (!$select_categories) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row["category_id"];
        $cat_name = $row["name"];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_name}</td>";
        echo "<td>
            <a href='categories.php?edit={$cat_id}' role='button' class='btn btn-inverse-warning waves-effect waves-light'>
                Edit
            </a>
        </td>";
        echo "<td>
            <a role='button' href='categories.php?delete={$cat_id}' class='btn btn-inverse-danger waves-effect waves-light'>
                Delete
            </a>
        </td>";
        echo "</tr>";
    }
}

function insertCategory()
{
    global $connection;
    global $insertNameErr;
    global $cat_name;
    // global $insertName;
    $insertNameErr = "";
    // $insertName = "";
    if (isset($_POST["submit"])) {
        if (empty($_POST["category"])) {
            $insertNameErr = "Value can't be empty";
        } else {
            $cat_name = trim($_POST["category"]);
            $query = "INSERT INTO post_categories(name) VALUES ('{$cat_name}'); ";
            $insert_category_query = mysqli_query($connection, $query);

            if (!$insert_category_query) {

                die("QUERY FAILED" . mysqli_error($connection));
            }
        }
    }
}

function updateCategory()
{
    global $connection;
    global $updateNameErr;
    global $update_cat_name;
    global $update_cat_id;
    // echo $update_cat_id;
    $update_cat_name = "";
    $updateNameErr = "";
    if (isset($_POST['update'])) {
        if (empty($_POST['category'])) {
            $updateNameErr = "Value can't be empty";
        } else {
            $update_cat_name = trim($_POST['category']);
            $query = "UPDATE post_categories SET name = '{$update_cat_name}' WHERE category_id = {$update_cat_id}";
            echo $query;
            $update_category_query = mysqli_query($connection, $query);

            if (!$update_category_query) {

                die("QUERY FAILED" . mysqli_error($connection));
            }
            header("Location: categories.php");
        }
    }
}

function deleteCategory()
{
    global $connection;
    if (isset($_GET["delete"])) {
        $delete_cat_id = $_GET["delete"];

        $query = "DELETE FROM post_categories WHERE category_id =  {$delete_cat_id};";
        $delete_cat_query = mysqli_query($connection, $query);

        if (!$delete_cat_id) {

            die("QUERY FAILED" . mysqli_error($connection));
        }
        header("Location: categories.php");
    }
}

function getAllPostsTable()
{
    global $connection, $post_id;
    $query = "SELECT * FROM posts ";
    $select_posts = mysqli_query($connection, $query);

    if (!$select_posts) {

        die("QUERY FAILED" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row["post_id"];
        $post_author = $row["author"];
        $post_title = $row["title"];
        $post_category_id = $row["category_id"];
        $post_status = $row["status"];
        $post_image = $row["image"];
        $post_tags = $row["tags"];
        $post_comment_count = $row["comment_count"];
        $post_date = $row["date"];

        echo "<tr>";
        echo "<td> $post_id </td>";
        echo "<td>$post_author </td>";
        echo "<td>$post_title </td>";

        getCategoryNamesById($post_category_id);
        echo "<td>$post_status </td>";
        echo "<td><img width=100 class='img-responsive' src='../images/$post_image' alt = 'image'></td>";
        echo "<td>$post_tags </td>";
        countSinglePostComments();
        echo "<td>$post_date</td>";
        echo "<td>
            <a href='posts.php?source=edit_post&p_id={$post_id}' role='button' class='btn btn-inverse-warning waves-effect waves-light'>
                Edit
            </a>
        </td>";
        echo "<td>
            <a role='button' href='posts.php?delete={$post_id}' class='btn btn-inverse-danger waves-effect waves-light'>
                Delete
            </a>
        </td>";
        echo "</tr>";
    }
}

function countSinglePostComments()
{
    global $connection;
    global $post_id;
    $query = "SELECT COUNT(*) comment_count FROM comments WHERE post_id = $post_id ";

    $comment_post_count_query = mysqli_query($connection, $query);

    confirmQuery($comment_post_count_query);

    while ($row = mysqli_fetch_array($comment_post_count_query)) {
        $comment_count = $row["comment_count"];
        echo "<td>$comment_count</td>";
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

    echo "<td>$post_category_name</td>";
}

function insertPostAdmin()
{
    global $connection;
    global $titleErr, $imageErr, $contentErr;
    global $post_title, $post_image, $post_content;
    $titleErr = $imageErr = $contentErr = "";
    $post_title = $post_image = $post_content = "";
    $allowed_extensions = ["jpg", "png", "gif", "jpeg"];
    if (isset($_POST["add-post"])) {

        $post_title = $_POST["post_title"];
        $post_author = $_POST["post_author"];
        $post_category_id = $_POST["post_category"];
        $post_status = $_POST["post_status"];
        $post_image = $_FILES["post_image"]["name"];
        $post_image_temp = $_FILES["post_image"]["tmp_name"];
        $post_image_size = $_FILES["post_image"]["size"];
        $post_tags = $_POST["post_tags"];
        $post_content = $_POST["post_content"];
        // $post_date = date('d-m-y');
        // $post_comment_count = 4;

        if (empty($post_title)) {
            $titleErr = "Title can not be empty";
        } else {
            $pattern = "/.{3,}/";
            if (!preg_match($pattern, trim($post_title))) {
                $titleErr = "Title must be longer than 3 characters";
            }
        }

        if (empty($post_content)) {
            $contentErr = "Content can not be empty";
        } else {
            $pattern = "/.{3,}/";
            if (!preg_match($pattern, trim($post_content))) {
                $contentErr = "Content must be longer than 3 characters";
            }
        }

        if (file_exists($post_image_temp)) {
            $file_extension = pathinfo($post_image, PATHINFO_EXTENSION);

            if (!in_array($file_extension, $allowed_extensions)) {
                $imageErr = "Image can only be of type jpg/jpeg/png/gif";
            } else if ($post_image_size > 3000000) {
                $imageErr = "Image can't be over 3MB";
            } else {

                move_uploaded_file($post_image_temp, "../images/$post_image");
            }
        }

        if (empty($titleErr) && empty($imageErr) && empty($contentErr)) {
            $query = "INSERT INTO posts (category_id, title, author, date, image, content, tags, status) ";
            $query .= "VALUES ('$post_category_id', '$post_title', '$post_author', now(), '$post_image', '$post_content', '$post_tags', '$post_status') ";
            $insert_post_admin_query = mysqli_query($connection, $query);
            confirmQuery($insert_post_admin_query);
            header("Location: posts.php");
        }
    }
}

function deletePostAdmin()
{

    global $connection;
    if (isset($_GET["delete"])) {
        $post_id = $_GET["delete"];
        $query = "DELETE FROM posts WHERE post_id = $post_id ";

        $delete_post_admin_query = mysqli_query($connection, $query);

        confirmQuery($delete_post_admin_query);
        header("Location: posts.php");
    }
}

function editPostAdminInputs()
{
    global $connection;
    global $post_id, $post_title, $post_category_id, $post_author, $post_status, $post_image, $post_tags, $post_content;
    if (isset($_GET["p_id"])) {
        $post_id = $_GET["p_id"];
        $query = "SELECT * FROM posts WHERE post_id = $post_id ";
        $get_post_inputs_query = mysqli_query($connection, $query);
        confirmQuery($get_post_inputs_query);

        while ($row = mysqli_fetch_assoc($get_post_inputs_query)) {
            $post_id = $row["post_id"];
            $post_title = $row["title"];
            $post_category_id = $row["category_id"];
            $post_author = $row["author"];
            $post_status = $row["status"];
            $post_image = $row["image"];
            $post_tags = $row["tags"];
            $post_content = $row["content"];
        }
    }
}


function editPostAdmin()
{
    global $connection;
    global $titleErr, $imageErr, $contentErr;
    global $post_id, $post_title, $post_image, $post_content;
    $titleErr = $imageErr = $contentErr = "";
    // $post_title = $post_image = $post_content = "";
    $allowed_extensions = ["jpg", "png", "gif", "jpeg"];
    if (isset($_POST["edit-post"])) {

        $post_title = $_POST["post_title"];
        $post_author = $_POST["post_author"];
        $post_category_id = $_POST["post_category"];
        $post_status = $_POST["post_status"];
        $post_image = $_FILES["post_image"]["name"];
        $post_image_temp = $_FILES["post_image"]["tmp_name"];
        $post_image_size = $_FILES["post_image"]["size"];
        $post_tags = $_POST["post_tags"];
        $post_content = $_POST["post_content"];
        // $post_date = date('d-m-y');
        // $post_comment_count = 4;

        if (empty($post_title)) {
            $titleErr = "Title can not be empty";
        } else {
            $pattern = "/.{3,}/";
            if (!preg_match($pattern, trim($post_title))) {
                $titleErr = "Title must be longer than 3 characters";
            }
        }

        if (empty($post_content)) {
            $contentErr = "Content can not be empty";
        } else {
            $pattern = "/.{3,}/";
            if (!preg_match($pattern, trim($post_content))) {
                $contentErr = "Content must be longer than 3 characters";
            }
        }

        if (file_exists($post_image_temp)) {
            $file_extension = pathinfo($post_image, PATHINFO_EXTENSION);

            if (!in_array($file_extension, $allowed_extensions)) {
                $imageErr = "Image can only be of type jpg/jpeg/png/gif";
            } else if ($post_image_size > 3000000) {
                $imageErr = "Image can't be over 3MB";
            } else {

                move_uploaded_file($post_image_temp, "../images/$post_image");
            }
        } else {
            $query = "SELECT * FROM posts WHERE post_id = $post_id ";
            $select_image_query = mysqli_query($connection, $query);
            confirmQuery($select_image_query);
            while ($row = mysqli_fetch_assoc($select_image_query)) {
                $post_image = $row["image"];
            }
        }

        if ($titleErr == "" && $imageErr == "" && $contentErr == "") {

            $query = "UPDATE posts SET ";
            $query .= "category_id = $post_category_id, ";
            $query .= "title = '$post_title', ";
            $query .= "author = '$post_author', ";
            $query .= "date = now(), ";
            $query .= "image = '$post_image', ";
            $query .= "content = '$post_content', ";
            $query .= "tags = '$post_tags', ";
            $query .= "status = '$post_status' ";
            $query .= "WHERE post_id = $post_id ";

            $update_post_admin_query = mysqli_query($connection, $query);
            confirmQuery($update_post_admin_query);
            header("Location: posts.php");
        }
    }
}


function generateOptionsCategories()
{
    global $connection;
    $query = "SELECT * FROM post_categories ";
    $all_category_option_query = mysqli_query($connection, $query);

    confirmQuery($all_category_option_query);

    while ($row = mysqli_fetch_array($all_category_option_query)) {
        $category_id = $row["category_id"];
        $category_name = $row["name"];
        echo "<option value='$category_id'>$category_name</option>";
    }
}

function getCurrentCategoryEdit()
{
    global $connection, $post_category_id;

    $query = "SELECT * FROM post_categories WHERE category_id = $post_category_id ";


    $select_current_option_query = mysqli_query($connection, $query);

    confirmQuery($select_current_option_query);

    while ($row = mysqli_fetch_assoc($select_current_option_query)) {
        $category_id = $row["category_id"];
        $category_name = $row["name"];
        echo "<option value='$category_id'>$category_name</option>";
    }
}

function getNotCurrentCategoriesEdit()
{
    global $connection, $post_category_id;

    $query = "SELECT * FROM post_categories WHERE category_id != $post_category_id ";


    $select_current_option_query = mysqli_query($connection, $query);

    confirmQuery($select_current_option_query);

    while ($row = mysqli_fetch_assoc($select_current_option_query)) {
        $category_id = $row["category_id"];
        $category_name = $row["name"];
        echo "<option value='$category_id'>$category_name</option>";
    }
}

function getAllCommentsTable()
{

    global $connection;

    $query = "SELECT * FROM comments ";
    $select_comments = mysqli_query($connection, $query);

    confirmQuery($select_comments);

    while ($row = mysqli_fetch_assoc($select_comments)) {
        $comment_id = $row["comment_id"];
        $comment_author = $row["author"];
        $comment_post_id = $row["post_id"];
        $comment_content = substr($row["content"], 0, 100);
        $comment_is_approved = $row["is_approved"];
        $comment_date = $row["date"];

        echo "<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_author}</td>";
        getPostTitleByIdComment($comment_post_id);
        echo "<td>{$comment_content}</td>";
        echo "<td>";
        echo $comment_is_approved ? "Yes" : "No";
        echo "</td>";
        echo "<td>{$comment_date}</td>";
        echo "<td>
            <a href='comments.php?approve=$comment_id' role='button' class='btn btn-inverse-success waves-effect waves-light'>
                Approve
            </a>
        </td>";
        echo "<td>
            <a href='comments.php?disapprove=$comment_id' role='button' class='btn btn-inverse-danger waves-effect waves-light'>
                Disapprove
            </a>
        </td>";
        echo "<td>
            <a role='button' href='comments.php?delete=$comment_id' class='btn btn-inverse-danger waves-effect waves-light'>
                Delete
            </a>
        </td>";
        echo "</tr>";
    }
}

function getPostTitleByIdComment($comment_post_id)
{
    global $connection;
    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
    $posts_title_query = mysqli_query($connection, $query);

    confirmQuery($posts_title_query);

    while ($row = mysqli_fetch_assoc($posts_title_query)) {
        $post_id = $row["post_id"];
        $post_title = $row["title"];
        echo "<td><a href='../post-details?p_id=$post_id'>$post_title</a></td>";
    }
}

function deleteCommentFromTable()
{
    global $connection;
    if (isset($_GET["delete"])) {
        $comment_id = $_GET["delete"];

        $query = "DELETE FROM comments WHERE comment_id = $comment_id ";

        $delete_comment_query = mysqli_query($connection, $query);

        confirmQuery($delete_comment_query);

        header("Location: comments.php");
    }
}

function approveCommentAdmin()
{
    global $connection;
    if (isset($_GET["approve"])) {
        $comment_id = $_GET["approve"];

        $query = "UPDATE comments SET is_approved = 1 WHERE comment_id = $comment_id ";

        $approve_comment_query = mysqli_query($connection, $query);

        confirmQuery($approve_comment_query);

        header("Location: comments.php");
    }
}

function disapproveCommentAdmin()
{
    global $connection;
    if (isset($_GET["disapprove"])) {
        $comment_id = $_GET["disapprove"];

        $query = "UPDATE comments SET is_approved = 0 WHERE comment_id = $comment_id ";

        $disapprove_comment_query = mysqli_query($connection, $query);

        confirmQuery($disapprove_comment_query);

        header("Location: comments.php");
    }
}

function getAllUsersTable()
{
    global $connection;

    $query = "SELECT * FROM users ";
    $select_users = mysqli_query($connection, $query);

    confirmQuery($select_users);

    while ($row = mysqli_fetch_assoc($select_users)) {
        $user_id = $row["user_id"];
        $username = $row["username"];
        $user_firstname = $row["firstname"];
        $user_lastname = $row["lastname"];
        $user_email = $row["email"];
        $user_image = $row["image"];
        $user_is_admin = $row["is_admin"];

        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$username}</td>";
        echo "<td>{$user_firstname}</td>";
        echo "<td>{$user_lastname}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td><img width=100 class='img-responsive' src='../images/$user_image' alt = 'image'></td>";
        echo "<td>";
        echo $user_is_admin ? "Yes" : "No";
        echo "</td>";
        echo "<td>
            <a href='users.php?change_to_admin=$user_id' role='button' class='btn btn-inverse-warning waves-effect waves-light'>
                Make Admin
            </a>
        </td>";
        echo "<td>
            <a href='users.php?change_to_regular=$user_id' role='button' class='btn btn-inverse-info waves-effect waves-light'>
                Make Regular
            </a>
        </td>";
        echo "<td>
            <a href='users.php?source=edit_user&user_id=$user_id' role='button' class='btn btn-inverse-warning waves-effect waves-light'>
                Edit
            </a>
        </td>";
        echo "<td>
            <a role='button' href='users.php?delete=$user_id' class='btn btn-inverse-danger waves-effect waves-light'>
                Delete
            </a>
        </td>";
        echo "</tr>";
    }
}

function deleteUserAdmin()
{
    global $connection;
    if (isset($_GET["delete"])) {
        $user_id = $_GET["delete"];

        $user_id = mysqli_real_escape_string($connection, $user_id);

        $query = "DELETE FROM users WHERE user_id = $user_id ";

        $delete_user_query = mysqli_query($connection, $query);

        confirmQuery($delete_user_query);

        header("Location: users.php");
    }
}

function changeUserToAdmin()
{
    global $connection;
    if (isset($_GET["change_to_admin"])) {
        $user_id = $_GET["change_to_admin"];

        $user_id = mysqli_real_escape_string($connection, $user_id);

        $query = "UPDATE users SET is_admin = 1 WHERE user_id = $user_id ";

        $change_user_to_admin_query = mysqli_query($connection, $query);

        confirmQuery($change_user_to_admin_query);

        header("Location: users.php");
    }
}

function changeUserToRegular()
{
    global $connection;
    if (isset($_GET["change_to_regular"])) {
        $user_id = $_GET["change_to_regular"];

        $user_id = mysqli_real_escape_string($connection, $user_id);

        $query = "UPDATE users SET is_admin = 0 WHERE user_id = $user_id ";

        $change_user_to_regular_query = mysqli_query($connection, $query);

        confirmQuery($change_user_to_regular_query);

        header("Location: users.php");
    }
}


function editUserAdminInputs()
{
    global $connection;
    global $user_id, $username, $user_firstname, $user_lastname, $user_email, $user_image,
     $user_cover_image, $user_is_admin, $user_bio, $user_about;
    if (isset($_GET["user_id"])) {
        $user_id = $_GET["user_id"];

        $user_id = mysqli_real_escape_string($connection, $user_id);

        $query = "SELECT * FROM users WHERE user_id = $user_id ";
        $get_user_inputs_query = mysqli_query($connection, $query);
        confirmQuery($get_user_inputs_query);

        while ($row = mysqli_fetch_assoc($get_user_inputs_query)) {
            $user_id = $row["user_id"];
            $username = $row["username"];
            $user_firstname = $row["firstname"];
            $user_lastname = $row["lastname"];
            $user_email = $row["email"];
            $user_image = $row["image"];
            $user_cover_image = $row["cover_image"];
            $user_is_admin = $row["is_admin"];
            $user_bio = $row["bio"];
            $user_about = $row["about"];
        }
    }
}

function editUserAdmin()
{
    global $connection;
    global $usernameErr, $passwordErr, $confirmPasswordErr, $firstnameErr, $lastnameErr,
     $emailErr, $imageErr, $coverImageErr, $isAdminErr;

     global $user_id, $username, $user_password, $user_confirm_password, $user_firstname, $user_lastname, $user_email, $user_image,
     $user_cover_image, $user_is_admin, $user_bio, $user_about;

    $usernameErr = $passwordErr = $confrimPasswordErr = $firstnameErr = $lastnameErr 
    = $emailErr = $imageErr = $coverImageErr = $isAdminErr = "";
    // $post_title = $post_image = $post_content = "";
    $allowed_extensions = ["jpg", "png", "gif", "jpeg"];
    if (isset($_POST["edit-user"])) {

        $user_id = $_POST["user_id"];
            $username = $_POST["username"];
            $user_password = $_POST["user_password"];
            $user_confirm_password = $_POST["user_confirm_password"];
            $user_firstname = $_POST["user_firstname"];
            $user_lastname = $_POST["user_lastname"];
            $user_email = $_POST["user_email"];
            $user_image = $_FILES["user_image"]["name"];
            $user_image_temp = $_FILES["user_image"]["tmp_name"];
            $user_image_size = $_FILES["user_image"]["size"];
            $user_cover_image = $_FILES["user_cover_image"]["name"];
            $user_cover_image_temp = $_FILES["user_cover_image"]["tmp_name"];
            $user_cover_image_size = $_FILES["user_cover_image"]["size"];
            $user_is_admin = $_POST["user_is_admin"];
            $user_bio = $_POST["user_bio"];
            $user_about = $_POST["user_about"];

            $user_id = mysqli_real_escape_string($connection,$user_id);
            $username = mysqli_real_escape_string($connection,$username);
       

        $pattern = "/.{3,}/";
        if (empty($username)) {
            $usernameErr = "Username can not be empty";
        } else if (!preg_match($pattern, trim($username))) {
                $usernameErr = "Username must be longer than 3 characters";
        }else {
            $query = "SELECT * FROM users WHERE username = '$username' ";

            $get_user_by_username_query = mysqli_query($connection, $query);

            confirmQuery($get_user_by_username_query);

            if($row = mysqli_fetch_assoc($get_user_by_username_query)){
                $usernameErr = "Username is taken";
            }

        }

        $pattern = "/^(?=.*\d).{8,}$/";
        if(empty($user_password)){
            $passwordErr = "Username can not be empty";
        }else if(!preg_match($pattern, trim($user_password))){
            $passwordErr = "Password must have length of 8 or more and include one number";
        }

        if(trim($user_password) != trim($user_confirm_password)){
            $passwordErr = "Passwords must match";
            $confirmPasswordErr = "Passwords must match";
        }

        
        if(empty($user_firstname)){
            $firstnameErr = "Firstname can not be empty ";
        }

        if(empty($user_lastname)){
            $lastnameErr = "Lastname can not be empty ";
        }

        $pattern = "/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/";
        if (empty($user_email)) {
            $emailErr = "Email field can not be empty";
        } else if (!preg_match($pattern, trim($user_email))) {
            $emailErr = "Email is inavlid";
        }


        if (file_exists($user_image_temp)) {
            $file_extension = pathinfo($user_image, PATHINFO_EXTENSION);

            if (!in_array($file_extension, $allowed_extensions)) {
                $imageErr = "Image can only be of type jpg/jpeg/png/gif";
            } else if ($user_image_size > 3000000) {
                $imageErr = "Image can't be over 3MB";
            } else {

                move_uploaded_file($user_image_temp, "../images/$user_image");
            }
        } else {
            $query = "SELECT * FROM users WHERE user_id = $user_id ";
            $select_image_query = mysqli_query($connection, $query);
            confirmQuery($select_image_query);
            while ($row = mysqli_fetch_assoc($select_image_query)) {
                $post_image = $row["image"];
            }
        }

        if (file_exists($user_cover_image_temp)) {
            $file_extension = pathinfo($user_cover_image, PATHINFO_EXTENSION);

            if (!in_array($file_extension, $allowed_extensions)) {
                $imageErr = "Image can only be of type jpg/jpeg/png/gif";
            } else if ($user_image_size > 3000000) {
                $imageErr = "Image can't be over 3MB";
            } else {

                move_uploaded_file($user_image_temp, "../images/$user_image");
            }
        } else {
            $query = "SELECT * FROM users WHERE user_id = $user_id ";
            $select_image_query = mysqli_query($connection, $query);
            confirmQuery($select_image_query);
            while ($row = mysqli_fetch_assoc($select_image_query)) {
                $post_image = $row["image"];
            }
        }

        if ($titleErr == "" && $imageErr == "" && $contentErr == "") {

            $query = "UPDATE posts SET ";
            $query .= "category_id = $post_category_id, ";
            $query .= "title = '$post_title', ";
            $query .= "author = '$post_author', ";
            $query .= "date = now(), ";
            $query .= "image = '$post_image', ";
            $query .= "content = '$post_content', ";
            $query .= "tags = '$post_tags', ";
            $query .= "status = '$post_status' ";
            $query .= "WHERE post_id = $post_id ";

            $update_post_admin_query = mysqli_query($connection, $query);
            confirmQuery($update_post_admin_query);
            header("Location: posts.php");
        }
    }
}
