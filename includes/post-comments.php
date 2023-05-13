<?php
$query = "SELECT * FROM comments WHERE post_id = $post_id ";

$select_all_comments_of_post_query = mysqli_query($connection, $query);

confirmQuery($select_all_comments_of_post_query);

while ($row = mysqli_fetch_assoc($select_all_comments_of_post_query)) {
    $comment_author = $row["author"];
    $comment_date = $row["date"];
    $comment_content = $row["content"];
?>
    <div class="col-12 comment-space">

        <li>
            <div class="author-thumb">
                <img src="assets/images/comment-author-01.jpg" alt="">
            </div>
            <div class="right-content">
                <h4><?php echo $comment_author; ?><span><?php echo $comment_date; ?></span></h4>
                <p><?php echo $comment_content; ?></p>
            </div>
        </li>
    </div>
<?php
}

?>