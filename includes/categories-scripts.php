<script>
    $(document).ready(() => {
        post_cnt = 2;
        $("#load-more-button").click((e) => {
            post_cnt += 2;
            e.preventDefault();
            $("#posts-container").load("includes/render-more-category-posts.php", {
                category_id: <?php echo $category_id; ?>,
                post_cnt: post_cnt,
                post_count: <?php echo $post_count; ?>
            });
        })
    })
</script>