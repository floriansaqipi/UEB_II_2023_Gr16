<?php
if (isset($_GET["user_id"])) {
    $user_id = $_GET["user_id"];
    $query = "SELECT * FROM posts WHERE user_id = $user_id AND is_published = 1";
    $select_all_posts_query = mysqli_query($connection, $query);

    if (!$select_all_posts_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_id = $row["post_id"];
        $post_category_id = $row["category_id"];
        $user_id = $row["user_id"];
        $post_title = $row["title"];
        $post_date = $row["date"];
        $post_image = $row["image"];
        $post_content = substr($row["content"], 0, 200);
        $post_tags = $row["tags"];
        $tags_array = explode(",", $post_tags);
        // echo $post_title;
?>




        <div class="card social-timeline-card">

            <div class="card-body">

                <div class="text-muted h7 mb-2">
                    <h4><?php echo $post_title; ?></h4>
                    <i class="fa fa-clock"></i><?php echo "&nbsp" . $post_date; ?>
                </div>
                <a class="card-link" href="#">
                    <a href="post-details.php?p_id=<?php echo $post_id ?>"><img  src="images/<?php echo $post_image; ?>" alt="image" width="600"></a>
                </a>
                <p class="card-text">
                <p><?php echo $post_content ?></p>
                </p>
                <div>
                    <?php
                    foreach ($tags_array as $tag) {
                        echo  "<span class='badge badge-primary'>$tag</span>";
                    }
                    ?>
                </div>
            </div>
            <div class="card-footer">
                <a href="post-details.php?p_id=<?php echo $post_id ?>"><?php echo countSinglePostFeedComments(); ?> Comments</a>
            </div>
        </div>


<?php
    }
}
?>