<?php
include "db.php";
include "../functions.php";
$post_id = $_POST["post_id"];

$query = "SELECT * FROM comments WHERE post_id = $post_id AND is_approved = 1 ORDER BY post_id DESC";

$select_all_comments_of_post_query = mysqli_query($connection, $query);

confirmQuery($select_all_comments_of_post_query);

while ($row = mysqli_fetch_assoc($select_all_comments_of_post_query)) {
    $comment_user_id = $row["user_id"];
    $comment_date_display = $row["date"];
    $comment_content_display = $row["content"];
?>
    <div class="col-12 comment-space">

        <li>
            <div class="author-thumb">
                <img src="images/<?php echo getUserImageById($comment_user_id);?>" alt="">
            </div>
            <div class="right-content">
                <h4><a href="view-user-profile.php?user_id=<?php echo $comment_user_id ;?>"><?php echo getFirstnameLastnameById($comment_user_id); ?></a><span><?php echo $comment_date_display; ?></span></h4>
                <p><?php echo $comment_content_display; ?></p>
            </div>
        </li>
    </div>
<?php
}

?>