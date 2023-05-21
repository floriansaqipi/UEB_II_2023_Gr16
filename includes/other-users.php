<?php
if (isset($_SESSION["user_id"])) {
    $user_session_id = $_SESSION["user_id"];

    $user_session_id = mysqli_real_escape_string($connection, $user_session_id);

    $query = "SELECT * FROM users WHERE user_id != $user_session_id LIMIT 10 ";

    $select_ten_users_query = mysqli_query($connection, $query);

    confirmQuery($select_ten_users_query);

    while ($row = mysqli_fetch_assoc($select_ten_users_query)) {
        $user_id = $row["user_id"];
        $user_image = $row["image"];
        $user_firstname = $row["firstname"];
        $user_lastname = $row["lastname"];

        $query = "SELECT COUNT(*) post_count FROM posts WHERE user_id = $user_id ";

        $select_user_posts_query = mysqli_query($connection, $query);

        confirmQuery($select_user_posts_query);

        if ($innerrow = mysqli_fetch_assoc($select_user_posts_query)) {
            $post_count = $innerrow["post_count"];

?>
            <li>
                <a style="display: flex;" href="view-user-profile.php?user_id=<?php echo $user_id ;?>">
                    <div class="left">
                        <img src="images/<?php echo $user_image; ?>" alt="">
                    </div>
                    <div class="right">
                        <h3><?php echo $user_firstname . " " . $user_lastname; ?></h3>
                        <p><?php echo $post_count; ?> Posts</p>
                    </div>
                </a>
            </li>
<?php
        }
    }
}
?>