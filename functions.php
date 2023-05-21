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

function getCategoryNamesByIdAtTables($post_category_id)
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

function getFirstnameLastnameById($user_id)
{
    global $connection;

    $user_id = mysqli_real_escape_string($connection, $user_id);
    $query = "SELECT * FROM users WHERE user_id = $user_id ";
    $user_firstname_lastname_query = mysqli_query($connection, $query);

    confirmQuery($user_firstname_lastname_query);

    while ($row = mysqli_fetch_assoc($user_firstname_lastname_query)) {
        $user_first_name = $row["firstname"];
        $user_last_name = $row["lastname"];
    }

    echo "$user_first_name" . " " . "$user_last_name";
}

function getUserImageById($user_id)
{
    global $connection;

    $user_id = mysqli_real_escape_string($connection, $user_id);
    $query = "SELECT * FROM users WHERE user_id = $user_id ";
    $user_image_query = mysqli_query($connection, $query);

    confirmQuery($user_image_query);

    while ($row = mysqli_fetch_assoc($user_image_query)) {
        $user_image = $row["image"];
    }

    echo $user_image;
}

function insertComment()
{
    global $connection;
    global $contentErr;
    global $post_id;
    global $comment_content;

    if (isset($_POST["post_comment"])) {
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
        } else {
            header("Location: login.php");
            die();
        }
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

            $post_id = mysqli_real_escape_string($connection, $post_id);
            $comment_content = mysqli_real_escape_string($connection, $comment_content);
            $user_id = mysqli_real_escape_string($connection, $user_id);

            $query = "INSERT INTO comments (post_id, user_id, content, date ) ";
            $query .= "VALUES ($post_id, $user_id, '$comment_content', now()) ";

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
        echo "<h2 class='comment_cnt_profile'>$comment_count Comments</h2>";
    }
}

function countSinglePostCommentsAtTables()
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

function deletePostUser()
{
    global $connection;
    if (isset($_GET["delete"]) && isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        $post_id = $_GET["delete"];
        try {
            $query = "SELECT * FROM posts WHERE post_id = ? ";
            $statement = $connection->prepare($query);
            $statement->bind_param("i", $post_id);
            $statement->execute();
            $result = $statement->get_result();
            if ($row = $result->fetch_assoc()) {
                $db_user_id = $row["user_id"];
                if ($user_id != $db_user_id) {
                    header("Location: 403.php");
                    die();
                }
            }
            $result->close();
        } catch (Exception $e) {
            echo "QUERY FAILED" . $e->getMessage();
            die();
        }

        $query = "DELETE FROM posts WHERE post_id = $post_id ";

        $delete_post_user_query = mysqli_query($connection, $query);

        confirmQuery($delete_post_user_query);
        header("Location: userprofile.php?source=all_posts");
    }
}

function countSinglePostFeedComments()
{
    global $connection;
    global $post_id;
    $query = "SELECT COUNT(*) comment_count FROM comments WHERE post_id = $post_id AND is_approved = 1";

    $comment_post_count_query = mysqli_query($connection, $query);

    confirmQuery($comment_post_count_query);

    while ($row = mysqli_fetch_array($comment_post_count_query)) {
        $comment_count = $row["comment_count"];
        echo $comment_count;
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
            $emailErr = "User with this email does not exist";
        } else if ($row["verify_status"] == 0) {
            $emailErr = "User exists but email is not yet verified";
        } else {
            $db_user_id = $row["user_id"];
            $db_username = $row["username"];
            $db_user_firstname = $row["firstname"];
            $db_user_lastname = $row["lastname"];
            $db_user_image = $row["image"];
            $db_is_admin = $row["is_admin"];
            $db_password = $row["password"];
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
            insertCountryLoginMetaData();
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

function insertCountryLoginMetaData(){
    global $connection;
    $ip =  $_SERVER["REMOTE_ADDR"];
    if($ip == "::1"){
       $ip =  "localhost";
    }
    $location = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
    $country_name = $location["geoplugin_countryName"];
    $country_code = $location["geoplugin_countryCode"];
    try{

        $query = "SELECT * FROM country_logins WHERE code = ? ";
    
        $statement = $connection->prepare($query);
        $statement->bind_param("s",$country_code);
        $statement->execute();
        $result = $statement->get_result();
        if($row = $result->fetch_assoc()){
            $country_id = $row["country_id"];
            incrementCurrentCountryLoginCount($country_id);
        }else {
            insertNewCountry($country_name,$country_code);
        }
        $statement->close();
    }catch (Exception $e) {
        echo "QUERY FAILED" . $e->getMessage();
        die();
    }
    
}

function incrementCurrentCountryLoginCount($country_id){
    global $connection;
    try{
        $query = "UPDATE country_logins SET login_counter = login_counter + 1 WHERE country_id = ? ";
        $statement = $connection->prepare($query);
        $statement->bind_param("i",$country_id);
        $statement->execute();
        $statement->close();
    }catch (Exception $e) {
        echo "QUERY FAILED" . $e->getMessage();
        die();
    }   
}

function insertNewCountry($country_name, $country_code){
    global $connection;
    try{
        $query = "INSERT INTO country_logins(name, code) VALUES (?, ?)";
        $statement = $connection->prepare($query);
        $statement->bind_param("ss",$country_name, $country_code);
        $statement->execute();
        $statement->close();
    }catch (Exception $e) {
        echo "QUERY FAILED" . $e->getMessage();
        die();
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


function getUserPostCount()
{
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

function getUserCommentCount()
{
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


function generateOptionsCategories()
{
    global $connection;
    try {
        $query = "SELECT * FROM post_categories ";
        $statement = $connection->prepare($query);
        $statement->execute();
        $result = $statement->get_result();

        while ($row = $result->fetch_assoc()) {
            $category_id = $row["category_id"];
            $category_name = $row["name"];
            echo "<option value='$category_id'>$category_name</option>";
        }
    } catch (Exception $e) {
        echo "QUERY FAILED" . $e->getMessage();
        die();
    }
}

function insertPostRegular()
{
    global $connection;
    global $titleErr, $imageErr, $contentErr, $isPublishedErr, $categoryErr;
    global $post_title, $post_image, $post_content, $post_tags;
    $titleErr = $imageErr = $contentErr = $isPublishedErr = "";
    $post_title = $post_image = $post_content = "";
    $allowed_extensions = ["jpg", "png", "gif", "jpeg"];
    if (isset($_POST["add-post"]) && isset($_SESSION["user_id"])) {

        $post_user_id = $_SESSION["user_id"];
        $post_title = $_POST["post_title"];
        $post_category_id = $_POST["post_category"];
        $post_is_published = $_POST["post_is_published"];
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

        $category_ids = getPostCategoryIdsArray();
        if (!in_array($post_category_id, $category_ids)) {
            $categoryErr = "Tampered with the select values";
        }

        if (empty($post_content)) {
            $contentErr = "Content can not be empty";
        } else {
            $pattern = "/.{3,}/";
            if (!preg_match($pattern, trim($post_content))) {
                $contentErr = "Content must be longer than 3 characters";
            }
        }

        if ($post_is_published != "0" && $post_is_published != "1") {
            $isPublishedErr = "Only accepted values are Regular and Draft";
        }

        if (file_exists($post_image_temp)) {
            $file_extension = pathinfo($post_image, PATHINFO_EXTENSION);

            if (!in_array(strtolower($file_extension), $allowed_extensions)) {
                $imageErr = "Image can only be of type jpg/jpeg/png/gif";
            } else if ($post_image_size > 4000000) {
                $imageErr = "Image can't be over 4MB";
            } else {

                move_uploaded_file($post_image_temp, "images/$post_image");
            }
        } else {
            $post_image = "default_post.jpg";
        }


        if (empty($titleErr) && empty($imageErr) && empty($contentErr) && empty($isPublishedErr) && empty($categoryErr)) {
            try {
                $query = "INSERT INTO posts (category_id, user_id, title, date, image, content, tags, is_published) ";
                $query .= "VALUES (?,  ?, ? , ?, ?, ?, ? , ?) ";

                $statement = $connection->prepare($query);
                $date = date("y-m-d");
                $statement->bind_param("iisssssi", $post_category_id,  $post_user_id, $post_title, $date, $post_image, $post_content, $post_tags, $post_is_published);
                $statement->execute();
                $statement->close();
                // $insert_post_admin_query = mysqli_query($connection, $query);
                // confirmQuery($insert_post_admin_query);
                header("Location: userprofile.php?source=all_posts");
            } catch (Exception $e) {
                echo "QUERY FAILED" . $e->getMessage();
                die();
            }
        }
    }
}

function getPostCategoryIdsArray()
{
    global $connection;
    $categories = [];
    $query = "SELECT * FROM post_categories ";

    $all_categories_query = mysqli_query($connection, $query);
    confirmQuery($all_categories_query);
    while ($row = mysqli_fetch_assoc($all_categories_query)) {
        $category_id = $row["category_id"];
        $categories[] = $category_id;
    }
    return $categories;
}

function checkPostPrivileges()
{
    global $connection;
    if (isset($_GET["p_id"]) && isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        $post_id = $_GET["p_id"];
        try {
            $query = "SELECT * FROM posts WHERE post_id = ? ";
            $statement = $connection->prepare($query);
            $statement->bind_param("i", $post_id);
            $statement->execute();
            $result = $statement->get_result();
            if ($row = $result->fetch_assoc()) {
                $db_user_id = $row["user_id"];
                if ($user_id != $db_user_id) {
                    header("Location: 403.php");
                }
            } else {
                header("Location: 404.php");
            }
            $result->close();
        } catch (Exception $e) {
            echo "QUERY FAILED" . $e->getMessage();
            die();
        }
    }
}



function editPostRegularInputs()
{
    global $connection;
    global $post_id, $post_title, $post_category_id, $post_user_id, $post_is_published, $post_image, $post_tags, $post_content;
    if (isset($_GET["p_id"])) {
        $post_id = $_GET["p_id"];
        $query = "SELECT * FROM posts WHERE post_id = $post_id ";
        $get_post_inputs_query = mysqli_query($connection, $query);
        confirmQuery($get_post_inputs_query);

        while ($row = mysqli_fetch_assoc($get_post_inputs_query)) {
            $post_id = $row["post_id"];
            $post_title = $row["title"];
            $post_category_id = $row["category_id"];
            $post_user_id = $row["user_id"];
            $post_is_published = $row["is_published"];
            $post_image = $row["image"];
            $post_tags = $row["tags"];
            $post_content = $row["content"];
        }
    }
}


function editPostRegular()
{
    global $connection;
    global $titleErr, $imageErr, $contentErr, $isPublishedErr, $categoryErr;
    global $post_title, $post_image, $post_content, $post_id;
    $titleErr = $imageErr = $contentErr = $isPublishedErr = "";
    $allowed_extensions = ["jpg", "png", "gif", "jpeg"];
    if (isset($_POST["edit-post"])) {

        $post_title = $_POST["post_title"];
        $post_category_id = $_POST["post_category"];
        $post_is_published = $_POST["post_is_published"];
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

        $category_ids = getPostCategoryIdsArray();
        if (!in_array($post_category_id, $category_ids)) {
            $categoryErr = "Tampered with the select values";
        }

        if (empty($post_content)) {
            $contentErr = "Content can not be empty";
        } else {
            $pattern = "/.{3,}/";
            if (!preg_match($pattern, trim($post_content))) {
                $contentErr = "Content must be longer than 3 characters";
            }
        }

        if ($post_is_published != "0" && $post_is_published != "1") {
            $isPublishedErr = "Only accepted values are Regular and Draft";
        }

        if (file_exists($post_image_temp)) {
            $file_extension = pathinfo($post_image, PATHINFO_EXTENSION);

            if (!in_array(strtolower($file_extension), $allowed_extensions)) {
                $imageErr = "Image can only be of type jpg/jpeg/png/gif";
            } else if ($post_image_size > 3000000) {
                $imageErr = "Image can't be over 3MB";
            } else {

                move_uploaded_file($post_image_temp, "images/$post_image");
            }
        } else {
            $query = "SELECT * FROM posts WHERE post_id = $post_id ";
            $select_image_query = mysqli_query($connection, $query);
            confirmQuery($select_image_query);
            if ($row = mysqli_fetch_assoc($select_image_query)) {
                $post_image = $row["image"];
            }
        }

        if (empty($titleErr) && empty($imageErr) && empty($contentErr) && empty($isPublishedErr) && empty($categoryErr)) {
            try {
                $query = "UPDATE posts SET category_id = ?, title = ?, date = ?, image = ?, content = ?, tags = ?, is_published = ? ";
                $query .= "WHERE post_id = ? ";

                $statement = $connection->prepare($query);
                $date = date("y-m-d");
                $statement->bind_param("isssssii", $post_category_id, $post_title, $date, $post_image, $post_content, $post_tags, $post_is_published, $post_id);
                $statement->execute();
                $statement->close();
                // $insert_post_admin_query = mysqli_query($connection, $query);
                // confirmQuery($insert_post_admin_query);
                header("Location: userprofile.php?source=all_posts");
            } catch (Exception $e) {
                echo "QUERY FAILED" . $e->getMessage();
                die();
            }
        }
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

function editUserRegularInputs()
{
    global $connection;
    global $user_id, $username, $user_firstname, $user_lastname, $user_email, $user_image,
        $user_cover_image, $user_is_admin, $user_bio, $user_about;
    global $firstname, $lastname, $image, $user;
    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        try {

            $query = "SELECT * FROM users WHERE user_id = ? ";
            $statement = $connection->prepare($query);
            $statement->bind_param("i", $user_id);
            $statement->execute();
            $result = $statement->get_result();

            if ($row = $result->fetch_assoc()) {
                $user_id = $row["user_id"];
                $user = $username = $row["username"];
                $firstname = $user_firstname = $row["firstname"];
                $lastname = $user_lastname = $row["lastname"];
                $user_email = $row["email"];
                $image = $user_image = $row["image"];
                $user_cover_image = $row["cover_image"];
                $user_is_admin = $row["is_admin"];
                $user_bio = $row["bio"];
                $user_about = $row["about"];
            }
        } catch (Exception $e) {
            echo "QUERY FAILED" . $e->getMessage();
            die();
        }
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
        echo "<td><a href='post-details.php?p_id=$post_id'>$post_title</a></td>";
    }
}

function approveCommentUser()
{
    global $connection;
    if (isset($_GET["approve"]) && isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        $comment_id = $_GET["approve"];
        try {
            $query = "SELECT * FROM comments WHERE comment_id = ? ";
            $statement = $connection->prepare($query);
            $statement->bind_param("i", $comment_id);
            $statement->execute();
            $result = $statement->get_result();
            if ($row = $result->fetch_assoc()) {
                $db_user_id = $row["user_id"];
                if ($user_id != $db_user_id) {
                    header("Location: 403.php");
                    die();
                }
            }
            $result->close();
        } catch (Exception $e) {
            echo "QUERY FAILED" . $e->getMessage();
            die();
        }

        $query = "UPDATE comments SET is_approved = 1 WHERE comment_id = $comment_id ";

        $approve_comment_query = mysqli_query($connection, $query);

        confirmQuery($approve_comment_query);

        header("Location: userprofile.php?source=all_comments");
    }
}

function disapproveCommentUser()
{
    global $connection;
    if (isset($_GET["disapprove"]) && isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        $comment_id = $_GET["disapprove"];
        try {
            $query = "SELECT * FROM comments WHERE comment_id = ? ";
            $statement = $connection->prepare($query);
            $statement->bind_param("i", $comment_id);
            $statement->execute();
            $result = $statement->get_result();
            if ($row = $result->fetch_assoc()) {
                $db_user_id = $row["user_id"];
                if ($user_id != $db_user_id) {
                    header("Location: 403.php");
                    die();
                }
            }
            $result->close();
        } catch (Exception $e) {
            echo "QUERY FAILED" . $e->getMessage();
            die();
        }

        $query = "UPDATE comments SET is_approved = 0 WHERE comment_id = $comment_id ";

        $disapprove_comment_query = mysqli_query($connection, $query);

        confirmQuery($disapprove_comment_query);

        header("Location: userprofile.php?source=all_comments");
    }
}

function deleteCommentUser()
{
    global $connection;
    if (isset($_GET["delete"]) && isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        $comment_id = $_GET["delete"];
        try {
            $query = "SELECT * FROM comments WHERE comment_id = ? ";
            $statement = $connection->prepare($query);
            $statement->bind_param("i", $comment_id);
            $statement->execute();
            $result = $statement->get_result();
            if ($row = $result->fetch_assoc()) {
                $db_user_id = $row["user_id"];
                if ($user_id != $db_user_id) {
                    header("Location: 403.php");
                    die();
                }
            }
            $result->close();
        } catch (Exception $e) {
            echo "QUERY FAILED" . $e->getMessage();
            die();
        }

        $query = "DELETE FROM comments WHERE comment_id = $comment_id ";

        $delete_comment_query = mysqli_query($connection, $query);

        confirmQuery($delete_comment_query);

        header("Location: userprofile.php?source=all_comments");
    }
}

function getPostsData()
{
    global $connection, $post_id, $user_id;
    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        try {

            $query = "SELECT * FROM posts WHERE user_id = ? ";
            $statement = $connection->prepare($query);
            $statement->bind_param("i", $user_id);
            $statement->execute();
            $result = $statement->get_result();

            while ($row = $result->fetch_assoc()) {
                $post_id = $row["post_id"];
                $post_title = $row["title"];
                $post_category_id = $row["category_id"];
                $post_is_published = $row["is_published"];
                $post_image = $row["image"];
                $post_tags = $row["tags"];
                $post_date = $row["date"];

                echo "<tr>";
                echo "<td> $post_id </td>";
                echo "<td><a class='posts_links' href='post-details.php?p_id=$post_id'>$post_title </a></td>";

                getCategoryNamesByIdAtTables($post_category_id);

                echo "<td>";
                echo $post_is_published ? "published" : "draft";
                echo  "</td>";

                echo "<td><img width=100 class='img-responsive' src='images/$post_image' alt = 'image'></td>";
                echo "<td>$post_tags </td>";

                countSinglePostCommentsAtTables();
                echo "<td>$post_date</td>";
                echo "<td><a href='edit-post.php?source=edit_post&p_id={$post_id}' class='btn btn-outline-warning' role='button'>Edit</a></td>";
                echo "<td><a href='userprofile.php?source=all_posts&delete={$post_id}' class='btn btn-outline-danger' role='button'>Delete</a></td>";
                echo "</tr>";
            }
        }
        catch (Exception $e) {
            echo "QUERY FAILED" . $e->getMessage();
            die();
        }
    }
}

function editUserRegular()
{
    global $connection;
    global $usernameErr, $firstnameErr, $lastnameErr,
        $emailErr, $imageErr, $coverImageErr, $isAdminErr;

    global $user_id, $username, $user_firstname, $user_lastname, $user_email, $user_image,
        $user_cover_image, $user_bio, $user_about;

    $usernameErr = $firstnameErr = $lastnameErr
        = $emailErr = $imageErr = $coverImageErr = $isAdminErr = "";
    // $post_title = $post_image = $post_content = "";
    $allowed_extensions = ["jpg", "png", "gif", "jpeg"];
    if (isset($_POST["edit-user"])) {

        $username = $_POST["username"];
        $user_firstname = $_POST["user_firstname"];
        $user_lastname = $_POST["user_lastname"];
        $user_email = $_POST["user_email"];
        $user_image = $_FILES["user_image"]["name"];
        $user_image_temp = $_FILES["user_image"]["tmp_name"];
        $user_image_size = $_FILES["user_image"]["size"];
        $user_cover_image = $_FILES["user_cover_image"]["name"];
        $user_cover_image_temp = $_FILES["user_cover_image"]["tmp_name"];
        $user_cover_image_size = $_FILES["user_cover_image"]["size"];
        $user_bio = $_POST["user_bio"];
        $user_about = $_POST["user_about"];

        $pattern = "/.{3,}/";
        if (empty($username)) {
            $usernameErr = "Username can not be empty";
        } else if (!preg_match($pattern, trim($username))) {
            $usernameErr = "Username must be longer than 3 characters";
        } else {

            try {
                $query = "SELECT * FROM users WHERE username = ? AND user_id != ? ";
                $statement = $connection->prepare($query);
                $statement->bind_param("si", $username, $user_id);
                $statement->execute();
                $result = $statement->get_result();
                if ($row = $result->fetch_assoc()) {
                    $usernameErr = "Username is taken";
                }
                $statement->close();
            } catch (Exception $e) {
                echo "QUERY FAILED" . $e->getMessage();
                die();
            }
        }


        if (empty($user_firstname)) {
            $firstnameErr = "Firstname can not be empty ";
        }

        if (empty($user_lastname)) {
            $lastnameErr = "Lastname can not be empty ";
        }

        $pattern = "/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/";
        if (empty($user_email)) {
            $emailErr = "Email field can not be empty";
        } else if (!preg_match($pattern, trim($user_email))) {
            $emailErr = "Email is inavlid";
        } else {
            try {

                $query = "SELECT * FROM users WHERE email = ? AND user_id != ? ";

                $statement = $connection->prepare($query);
                $statement->bind_param("si", $user_email, $user_id);
                $statement->execute();

                $result = $statement->get_result();

                if ($row = $result->fetch_assoc()) {
                    $emailErr = "Email is taken";
                }
                $statement->close();
            } catch (Exception $e) {
                echo "QUERY FAILED" . $e->getMessage();
                die();
            }
        }


        if (file_exists($user_image_temp)) {
            $file_extension = pathinfo($user_image, PATHINFO_EXTENSION);

            if (!in_array(strtolower($file_extension), $allowed_extensions)) {
                $imageErr = "Image can only be of type jpg/jpeg/png/gif";
            } else if ($user_image_size > 3000000) {
                $imageErr = "Image can't be over 3MB";
            } else {

                move_uploaded_file($user_image_temp, "images/$user_image");
            }
        } else {
            try {
                $query = "SELECT * FROM users WHERE user_id = ? ";
                $statement = $connection->prepare($query);
                $statement->bind_param("i", $user_id);
                $statement->execute();
                $result = $statement->get_result();
                if ($row = $result->fetch_assoc()) {
                    $user_image = $row["image"];
                    if (empty($user_image)) {
                        $user_image = "default.jpg";
                    }
                } else {
                    $user_image = "default.jpg";
                }
                $statement->close();
            } catch (Exception $e) {
                echo "QUERY FAILED" . $e->getMessage();
                die();
            }
        }

        if (file_exists($user_cover_image_temp)) {
            $file_extension = pathinfo($user_cover_image, PATHINFO_EXTENSION);

            if (!in_array(strtolower($file_extension), $allowed_extensions)) {
                $coverImageErr = "Image can only be of type jpg/jpeg/png/gif";
            } else if ($user_cover_image_size > 4000000) {
                $coverImageErr = "Image can't be over 4MB";
            } else {

                move_uploaded_file($user_cover_image_temp, "images/$user_cover_image");
            }
        } else {
            try {
                $query = "SELECT * FROM users WHERE user_id = ? ";
                $statement = $connection->prepare($query);
                $statement->bind_param("i", $user_id);
                $statement->execute();
                $result = $statement->get_result();
                if ($row = $result->fetch_assoc()) {
                    $user_cover_image = $row["cover_image"];
                    if (empty($user_cover_image)) {
                        $user_cover_image = "cover_default.jpg";
                    }
                } else {
                    $user_cover_image = "cover_default.jpg";
                }
                $statement->close();
            } catch (Exception $e) {
                echo "QUERY FAILED" . $e->getMessage();
                die();
            }
        }



        if (
            empty($usernameErr) && empty($firstnameErr) && empty($lastnameErr)
            && empty($emailErr) && empty($imageErr)
            && empty($coverImageErr) && empty($isAdminErr)
        ) {

            try {
                $query = "UPDATE users SET ";
                $query .= "username = ?, ";
                $query .= "firstname = ?, ";
                $query .= "lastname = ?, ";
                $query .= "email = ?, ";
                $query .= "image = ?, ";
                $query .= "cover_image = ?, ";
                $query .= "bio = ?, ";
                $query .= "about = ? ";
                $query .= "WHERE user_id = ? ";

                $statement = $connection->prepare($query);
                $statement->bind_param(
                    "ssssssssi",
                    $username,
                    $user_firstname,
                    $user_lastname,
                    $user_email,
                    $user_image,
                    $user_cover_image,
                    $user_bio,
                    $user_about,
                    $user_id
                );
                $statement->execute();
                $statement->close();

                header("Location: userprofile.php");
            } catch (Exception $e) {
                echo "QUERY FAILED" . $e->getMessage();
                die();
            }
        }
    }
}


function editUserPasswordRegular()
{
    global $connection;
    global $user_old_password, $user_password, $user_confirm_password;
    global $oldPasswordErr, $passwordErr, $confirmPasswordErr;
    $oldPasswordErr = $passwordErr = $confirmPasswordErr = "";
    if (isset($_POST["edit-user-password"]) && isset($_SESSION["user_id"])) {

        $user_id = $_SESSION["user_id"];
        $user_old_password = $_POST["user_old_password"];
        $user_password = $_POST["user_password"];
        $user_confirm_password = $_POST["user_confirm_password"];

        if (empty($user_old_password)) {
            $oldPasswordErr = "Password can not be empty";
        } else {
            try {

                $query = "SELECT * FROM users WHERE user_id = ? ";
                $statement = $connection->prepare($query);
                $statement->bind_param("i", $user_id);
                $statement->execute();
                $result = $statement->get_result();

                while ($row = $result->fetch_assoc()) {
                    $db_password = $row["password"];
                }
                if (!password_verify($user_old_password, $db_password)) {
                    $oldPasswordErr = "Your old password is different";
                }
            } catch (Exception $e) {
                echo "QUERY FAILED" . $e->getMessage();
                die();
            }
        }

        $pattern = "/^(?=.*\d).{8,}$/";
        if (empty($user_password)) {
            $passwordErr = "Password can not be empty";
        } else if (!preg_match($pattern, trim($user_password))) {
            $passwordErr = "Password must have length of 8 or more and include one number";
        }

        if (trim($user_password) != trim($user_confirm_password)) {
            $passwordErr = "Passwords must match";
            $confirmPasswordErr = "Passwords must match";
        }

        if (empty($oldPasswordErr) && empty($passwordErr) && empty($confirmPasswordErr)) {


            $user_password = password_hash($user_password, PASSWORD_DEFAULT);

            try {

                $query = "UPDATE users SET ";
                $query .= " password = ?";
                $query .= " WHERE user_id = ?";

                $statement = $connection->prepare($query);
                $statement->bind_param("si", $user_password, $user_id);
                $statement->execute();
                $statement->close();

                header("Location: logout.php");
            } catch (Exception $e) {
                echo "QUERY FAILED" . $e->getMessage();
                die();
            }
        }
    }
}


function deleteCurrentUserAccount()
{
    global $connection;
    if (isset($_POST["delete-account"]) && isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        try {

            $query = "DELETE FROM users WHERE user_id = ? ";
            $statement = $connection->prepare($query);
            $statement->bind_param("i", $user_id);
            $statement->execute();
            $statement->close();
            header("Location: logout.php");

        } catch (Exception $e) {
            echo "QUERY FAILED" . $e->getMessage();
            die();
        }
    }
}






function getCommentsData()
{
    global $connection, $comment_id, $user_id;
    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        try {

            $query = "SELECT * FROM comments WHERE user_id = ? ";
            $statement = $connection->prepare($query);
            $statement->bind_param("i", $user_id);
            $statement->execute();
            $result = $statement->get_result();

            while ($row = $result->fetch_assoc()) {
                $comment_id = $row["comment_id"];
                $comment_user_id = $row["user_id"];
                $comment_post_id = $row["post_id"];
                $comment_content = substr($row["content"], 0, 100);
                $comment_is_approved = $row["is_approved"];
                $comment_date = $row["date"];

                echo "<tr>";
                echo "<td>{$comment_id}</td>";
                getPostTitleByIdComment($comment_post_id);
                echo "<td>{$comment_content}</td>";
                echo "<td>";
                echo $comment_is_approved ? "Yes" : "No";
                echo "</td>";
                echo "<td>{$comment_date}</td>";
                echo "<td>
                         <a href='userprofile.php?source=all_comments&approve=$comment_id' class='btn btn-outline-success' role='button'>
                          Publish
                         </a>
                      </td>";
                echo "<td>
                          <a href='userprofile.php?source=all_comments&disapprove=$comment_id' class='btn btn-outline-warning' role='button'>
                          Draft
                          </a>
                      </td>";
                echo "<td><a href='userprofile.php?source=all_comments&delete=$comment_id'class='btn btn-outline-danger' role='button'>Delete</a></td>";
               // echo "<td><input name='editData' type='button' name='edit' value='Edit' data-bodytext='$comment_id' id='$comment_id' class='btn btn-info btn-xs edit_data' /></td>"; 

                echo "</tr>";
                
            }
        } catch (Exception $e) {
            echo "QUERY FAILED" . $e->getMessage();
            die();
        }
        
    }
    
}





function getUserViewProfileData()
{
    global $connection;
    global $username, $user_firstname, $user_lastname,  $user_email,
        $user_image, $user_cover_image, $user_bio, $user_about;
    // $user_is_admin ,
    if (isset($_GET["user_id"])) {

        $user_id = $_GET["user_id"];

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
        } else {
            header("Location: 404.php");
        }
    } else {
        header("Location: 404.php");
    }
}


function getUserViewPostCount()
{
    global $connection;
    global $post_count;
    // $user_is_admin ,
    if (isset($_GET["user_id"])) {

        $user_id = $_GET["user_id"];

        $user_id = mysqli_real_escape_string($connection, $user_id);

        $query = "SELECT COUNT(*) as post_count FROM posts WHERE user_id = $user_id ";

        $user_post_count_query = mysqli_query($connection, $query);

        confirmQuery($user_post_count_query);

        if ($row = mysqli_fetch_assoc($user_post_count_query)) {
            $post_count = $row["post_count"];
        }
    }
}

function getUserViewCommentCount()
{
    global $connection;
    global $comment_count;
    
    if (isset($_GET["user_id"])) {

        $user_id = $_GET["user_id"];

        $user_id = mysqli_real_escape_string($connection, $user_id);

        $query = "SELECT COUNT(*) as comment_count FROM comments where user_id = $user_id ";

        $user_comment_count_query = mysqli_query($connection, $query);

        confirmQuery($user_comment_count_query);

        if ($row = mysqli_fetch_assoc($user_comment_count_query)) {
            $comment_count = $row["comment_count"];
        }
    }
}

