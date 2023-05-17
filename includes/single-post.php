<?php
if (isset($_GET["p_id"])) {
    $post_id = $_GET["p_id"];
    $query = "SELECT * FROM posts WHERE post_id = $post_id ";

    $select_element_query = mysqli_query($connection, $query);

    confirmQuery($select_element_query);

    while ($row = mysqli_fetch_assoc($select_element_query)) {
        $post_id = $row["post_id"];
        $post_category_id = $row["category_id"];
        $user_id = $row["user_id"];
        $post_title = $row["title"];
        $post_date = $row["date"];
        $post_image = $row["image"];
        $post_content = $row["content"];
        $post_comment_count = $row["comment_count"];
        $post_tags = $row["tags"];
        $tags_array = explode(",", $post_tags);

?>
        <div class="all-blog-posts">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="images/<?php echo $post_image; ?>" alt="image">
                        </div>
                        <div class="down-content">
                            <span><?php getCategoryNamesById($post_category_id); ?></span>
                            <a href="post-details.php?p_id=<?php echo $post_id; ?>">
                                <h4><?php echo $post_title; ?></h4>
                            </a>
                            <ul class="post-info">
                                <li><a href="#"><?php echo getFirstnameLastnameById($user_id); ?></a></li>
                                <li><a href="#"><?php echo $post_date; ?></a></li>
                                <li><a href="#"><?php echo $post_comment_count; ?></a></li>
                            </ul>
                            <p><?php echo $post_content; ?></p>
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
                <div class="col-lg-12">
                    <div class="sidebar-item comments">
                        <div class="sidebar-heading">
                            <?php 
                                countSinglePostComments();
                            ?>
                            <!-- <h2>4 comments</h2> -->
                        </div>
                        <div class="content">
                            <ul>
                                <?php include "includes/post-comments.php" ;?>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 down-content">
                    <?php insertComment(); ?>
                    <form class="row g-3 needs-validation" action="" method="post" novalidate>
                        <div class="col-md-12">
                            <h4>Leave a Comment: </h4>
                        </div>
                        <div class="col-md-12">
                            <label for="validationTextarea" class="form-label">Content</label>
                            <textarea name="comment_content" class="form-control <?php echo !empty($contentErr) ? "is-invalid" : "" ?>" id="validationTextarea" placeholder="Enter content" required><?php echo $comment_content; ?></textarea>
                            <div class="invalid-feedback">
                                <?php echo $contentErr; ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" name="post_comment">Post Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
    }
}
?>