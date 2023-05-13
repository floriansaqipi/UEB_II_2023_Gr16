<?php
if (isset($_GET["p_id"])) {
    $post_id = $_GET["p_id"];
    $query = "SELECT * FROM posts WHERE post_id = $post_id ";

    $select_element_query = mysqli_query($connection, $query);

    confirmQuery($select_element_query);

    while ($row = mysqli_fetch_assoc($select_element_query)) {
        $post_id = $row["post_id"];
        $post_category_id = $row["category_id"];
        $post_title = $row["title"];
        $post_author = $row["author"];
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
                                <li><a href="#"><?php echo $post_author; ?></a></li>
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
                            <h2>4 comments</h2>
                        </div>
                        <div class="content">
                            <ul>
                                <li>
                                    <div class="author-thumb">
                                        <img src="assets/images/comment-author-01.jpg" alt="">
                                    </div>
                                    <div class="right-content">
                                        <h4>Charles Kate<span>May 16, 2020</span></h4>
                                        <p>Fusce ornare mollis eros. Duis et diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis eleifend posuere id tellus.</p>
                                    </div>
                                </li>
                                <li class="replied">
                                    <div class="author-thumb">
                                        <img src="assets/images/comment-author-02.jpg" alt="">
                                    </div>
                                    <div class="right-content">
                                        <h4>Thirteen Man<span>May 20, 2020</span></h4>
                                        <p>In porta urna sed venenatis sollicitudin. Praesent urna sem, pulvinar vel mattis eget.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="author-thumb">
                                        <img src="assets/images/comment-author-03.jpg" alt="">
                                    </div>
                                    <div class="right-content">
                                        <h4>Belisimo Mama<span>May 16, 2020</span></h4>
                                        <p>Nullam nec pharetra nibh. Cras tortor nulla, faucibus id tincidunt in, ultrices eget ligula. Sed vitae suscipit ligula. Vestibulum id turpis volutpat, lobortis turpis ac, molestie nibh.</p>
                                    </div>
                                </li>
                                <li class="replied">
                                    <div class="author-thumb">
                                        <img src="assets/images/comment-author-02.jpg" alt="">
                                    </div>
                                    <div class="right-content">
                                        <h4>Thirteen Man<span>May 22, 2020</span></h4>
                                        <p>Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 down-content">
                    
                    <form class="row g-3 needs-validation was-validated" action="" method="post" novalidate>
                        <div class="col-md-12">
                            <h4>Leave a Comment: </h4>
                        </div>
                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Author</label>
                            <input type="text" name="comment_author" class="form-control" value="" placeholder="Enter Author" id="validationCustom03" required>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationTextarea" class="form-label">Content</label>
                            <textarea name ="comment_content" class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea" required></textarea>
                            <div class="invalid-feedback">
                                
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit" name="post_comment" >Post Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php
    }
}
?>