<?php

function isLoggedInRegular()
{
    if (!isset($_SESSION["user_id"])) {
        header("Location: login.php");
    }
}


function logOutRegular()
{
    session_destroy();
    header("Location: index.php");
}
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

function logInUser()
{
    global $connection;
    global $emailErr, $passwordErr;
    global $user_email, $user_password;

    if (isset($_POST["login"])) {
        $user_email = $_POST["user_email"];
        $user_password = $_POST["user_password"];

        $user_email = mysqli_real_escape_string($connection, $user_email);
        $user_password = mysqli_real_escape_string($connection, $user_password);

        $pattern = "/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/";
        if (empty($user_email)) {
            $emailErr = "Email field can not be empty";
        } else if (!preg_match($pattern, trim($user_email))) {
            $emailErr = "Email is inavlid";
        }

        if (empty($user_password)) {
            $passwordErr = "Password cannot be empty";
        }

        $query = "SELECT * FROM users WHERE email = '$user_email' ";

        $select_user_query = mysqli_query($connection, $query);

        confirmQuery($select_user_query);

        $row = mysqli_fetch_assoc($select_user_query);


        if (empty($row)) {
            $emailErr = "User with this username does not exist";
        } else {
            $db_user_id = $row["user_id"];
            $db_username = $row["username"];
            $db_user_firstname = $row["firstname"];
            $db_user_lastname = $row["lastname"];
            $db_user_image = $row["image"];
            $db_is_admin = $row["is_admin"];
            $db_password = $row["password"];
            // $password_hash=password_hash($db_password,PASSWORD_DEFAULT);
            if (!password_verify($user_password, $db_password)) {
                $passwordErr = "Password is incorrect ";
            }
        }

        if (empty($emailErr) && empty($passwordErr)) {
            $_SESSION["user_id"] = $db_user_id;
            $_SESSION["username"] = $db_username;
            $_SESSION["user_firstname"] = $db_user_firstname;
            $_SESSION["user_lastname"] = $db_user_lastname;
            $_SESSION["user_image"] = $db_user_image;
            $_SESSION["is_admin"] = $db_is_admin;
            if ($db_is_admin === "1") {
                header("Location: admin/index.php");
            } else {
                header("Location: index.php");
            }
        }
        
        
            // check if email exists in database and is verified
            // $query = "SELECT * FROM users WHERE email='$user_email' AND verify_status=1";
            // $result = mysqli_query($connection, $query);
            
            // if(mysqli_num_rows($result) == 1) {
            //     $row = mysqli_fetch_assoc($result);
            //     if(password_verify($user_password, $row['password'])) {
            //         // login successful
            //         $_SESSION['user_id'] = $row['id'];
            //         $_SESSION['username'] = $row['username'];
            //         header('Location: index.php');
            //         exit();
            //     } else {
            //         $_SESSION['status'] = "Incorrect password";
            //         header("Location: login.php");
            //         exit();
            //     }
            // } else {
            //     $_SESSION['status'] = "Email not verified or does not exist";
            //     header("Location: login.php");
            //     exit();
            // }
        
        

    }
    
}

function getUserProfileData()
{
    global $connection;
    global $username, $user_firstname, $user_lastname,  $user_email,
        $user_image, $user_cover_image, $user_bio, $user_about;
        // $user_is_admin ,
    if (isset($_SESSION["user_id"])) {

        $user_id = $_SESSION["user_id"];

        $user_id = mysqli_real_escape_string($connection, $user_id);

        $query = "SELECT * FROM users where user_id = $user_id ";

        $session_user_query = mysqli_query($connection, $query);

        confirmQuery($session_user_query);

        if ($row = mysqli_fetch_assoc($session_user_query)) {
            $username = $row["username"];
            $user_firstname = $row["firstname"];
            $user_lastname = $row["lastname"];
            $user_email = $row["email"];
            $user_image = $row["image"];
            $user_cover_image = $row["cover_image"];
            // $user_is_admin = $row["user_is_admin"];
            $user_bio = $row["bio"];
            $user_about = $row["about"];
        }
    }
}


function getUserPostCount(){
    global $connection;
    global $post_count;
        // $user_is_admin ,
    if (isset($_SESSION["user_id"])) {

        $user_id = $_SESSION["user_id"];

        $user_id = mysqli_real_escape_string($connection, $user_id);

        $query = "SELECT COUNT(*) as post_count FROM posts WHERE user_id = $user_id ";

        $session_user_post_count_query = mysqli_query($connection, $query);

        confirmQuery($session_user_post_count_query);

        if ($row = mysqli_fetch_assoc($session_user_post_count_query)) {
            $post_count = $row["post_count"];
        }
    }
}

function getUserCommentCount(){
    global $connection;
    global $comment_count;
        // $user_is_admin ,
    if (isset($_SESSION["user_id"])) {

        $user_id = $_SESSION["user_id"];

        $user_id = mysqli_real_escape_string($connection, $user_id);

        $query = "SELECT COUNT(*) as comment_count FROM comments where user_id = $user_id ";

        $session_user_comment_count_query = mysqli_query($connection, $query);

        confirmQuery($session_user_comment_count_query);

        if ($row = mysqli_fetch_assoc($session_user_comment_count_query)) {
            $comment_count = $row["comment_count"];
        }
    }
}