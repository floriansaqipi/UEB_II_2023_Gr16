<?php
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];

    $user_id = mysqli_real_escape_string($connection, $user_id);

    $query = "SELECT * FROM posts WHERE user_id = $user_id ORDER BY post_id DESC LIMIT 3 ";

    $select_last_three_user_posts_query = mysqli_query($connection, $query);

    confirmQuery($select_last_three_user_posts_query);

    $i = 0;
    while ($row = mysqli_fetch_assoc($select_last_three_user_posts_query)) {
        $post_image = $row["image"];

?>


        <div class="carousel-item <?php echo $i++ == 0 ? "active" : "" ?>">
            <img src="images/<?php echo $post_image; ?>" class="d-block w-100" alt="image">
        </div>
<?php
    }
}
?>