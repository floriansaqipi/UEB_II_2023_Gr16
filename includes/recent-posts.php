<div class="col-lg-12">
    <div class="sidebar-item recent-posts">
        <div class="sidebar-heading">
            <h2>Recent Posts</h2>
        </div>
        <div class="content">
            <ul>
                <?php
                $query = "SELECT * FROM posts ORDER BY post_id DESC ";
                $select_all_posts_query = mysqli_query($connection, $query);

                confirmQuery($select_all_posts_query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row["post_id"];
                    $post_title = $row["title"];
                    $post_date = $row["date"];


                ?>
                    <li><a href="post-details.php?p_id=<?php echo $post_id; ?>">
                            <h5><?php echo $post_title; ?></h5>
                            <span><?php echo $post_date; ?></span>
                        </a>
                    </li>
                <?php
                }
                ?>

            </ul>
        </div>
    </div>
</div>