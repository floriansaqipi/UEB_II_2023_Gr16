<?php
$query = "SELECT * FROM comments WHERE post_id = $post_id ";

$select_all_comments_of_post_query = mysqli_query($connection, $query);

confirmQuery($select_all_comments_of_post_query);

while ($row = mysqli_fetch_assoc($select_all_comments_of_post_query)) {
    $comment_author_display = $row["author"];
    $comment_date_display = $row["date"];
    $comment_content_display = $row["content"];
?>
    <div class="col-12 comment-space">

        <li>
            <div class="author-thumb">
                <img src="assets/images/comment-author-01.jpg" alt="">
            </div>
            <div class="right-content">
                <h4><?php echo $comment_author_display; ?><span><?php echo $comment_date_display; ?></span></h4>
                <p><?php echo $comment_content_display; ?></p>
            </div>
        </li>
    </div>
<?php
}

?>