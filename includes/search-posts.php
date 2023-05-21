<?php
include "db.php";
include "../functions.php";
if (isset($_POST["search"])) {


    $search = $_POST["search"];


    $query = "SELECT * FROM posts WHERE is_published = 1 AND (title LIKE ? OR tags LIKE ?) ";
    $statement = $connection->prepare($query);
    $search_val = "%" . $search . "%";



    $statement->bind_param("ss", $search_val, $search_val);
    $statement->execute();
    $result = $statement->get_result();

    while ($row = $result->fetch_assoc()) {
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
                        <li><a href="view-user-profile.php?user_id=<?php echo $user_id; ?>"><?php echo getFirstnameLastnameById($user_id); ?></a></li>
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