
<script>
    $(document).ready(() => {
        $("#comments-container").load("includes/post-comments.php", {post_id : <?php echo $post_id ;?>});
        $("#post-comment-form").submit((e)=> {
            e.preventDefault();
            let comment = $("#comment_content").val();
            let post = $("#comment_content").val();
            $("#invalid-feedback").load("includes/insert-comment.php", {comment_content : comment, post_comment : post, post_id : <?php echo $post_id ;?> });

        })

    });
</script>