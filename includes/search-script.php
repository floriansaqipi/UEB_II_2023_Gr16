<script>
    $(document).ready(()=> {
        // let i = 0;
        $("#post_search").keyup(() => {
            var value = $("#post_search").val();
            // if(i++ == 0){
            //     $("#posts_search_container").empty();
            //     console.log("asdfasdfs");
            // }
            console.log(value)
            $.post("includes/search-posts.php", { search: value}, (data,status)=>{
                $("#posts_search_container").html(data);
            })
        })
    })
</script>