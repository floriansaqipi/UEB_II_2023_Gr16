<?php

if (isset($_GET["category"])) {
    $category_id = $_GET["category"];

    try{

        $query = "SELECT COUNT(*) post_count FROM posts WHERE category_id = ? AND is_published = 1 ";
        $statement = $connection->prepare($query);
        $statement->bind_param("i",$category_id);
        $statement->execute();
        $result = $statement->get_result();
        if($row = $result->fetch_assoc()){
            $post_count = $row["post_count"];
        }
        $statement->close();
    } catch (Exception $e) {
        echo "QUERY FAILED" . $e->getMessage();
        die();
    }

    $query = "SELECT * FROM posts WHERE category_id = $category_id AND is_published = 1 LIMIT 3";
    $select_all_posts_query = mysqli_query($connection, $query);

    confirmQuery($select_all_posts_query);

    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_id = $row["post_id"];
        $post_category_id = $row["category_id"];
        $post_title = $row["title"];
        $post_user_id = $row["user_id"];
        $post_date = $row["date"];
        $post_image = $row["image"];
        $post_content = substr($row["content"], 0, 200);
        $post_tags = $row["tags"];
        $tags_array = explode(",", $post_tags);
        // echo $post_title;



?>
        <div class="col-lg-12">
            <div class="blog-post">
                <div class="blog-thumb">
                    <a href="post-details.php?p_id=<?php echo $post_id; ?>">
                        <img src="images/<?php echo $post_image; ?>" alt="image">
                    </a>
                </div>
                <div class="down-content">
                    <span><?php getCategoryNamesById($post_category_id); ?></span>
                    <a href="post-details.php?p_id=<?php echo $post_id; ?>">
                        <h4><?php echo $post_title; ?></h4>
                    </a>
                    <ul class="post-info">
                        <li><a href="view-user-profile.php?user_id=<?php echo $post_user_id ;?>"><?php echo getFirstnameLastnameById($post_user_id); ?></a></li>
                        <li><a href="#"><?php echo $post_date; ?></a></li>
                        <li><a href="#"><?php echo countSinglePostFeedComments(); ?> Comments</a></li>
                    </ul>
                    <p><?php echo $post_content;  ?></p>
                    <div class="post-options">
                        <div class="row">
                            <div class="col-6">
                                <ul class="post-tags">
                                    <li><i class="fa fa-tags"></i></li>
                                    <?php
                                    foreach ($tags_array as $tag) {
                                        echo "<li><a href='#'>$tag &nbsp;</a></li>";
                                    }
                                    ?>

                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="post-share">
                                    <li><i class="fa fa-share-alt"></i></li>
                                    <li><a href="#">Facebook</a>,</li>
                                    <li><a href="#"> Twitter</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php
    }
}
?>