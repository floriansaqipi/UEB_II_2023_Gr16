<?php 
    ob_start();
    session_start();
    include "db.php";
    include "../functions.php";
    // global $contentErr;
    $comment_content= $contentErr = "";

    if (isset($_POST["post_comment"])) {
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
        } else {
            header("Location: ../login.php");
            die();
        }
        $comment_content = trim($_POST["comment_content"]);
        $post_id = trim($_POST["post_id"]);


        if (empty($comment_content)) {
            $contentErr = "Content can not be empty";
        } else {
            $pattern = "/.{1,}/";
            if (!preg_match($pattern, trim($comment_content))) {
                $contentErr = "Content must be longer than 1 characters";
            }
        }

        if (empty($contentErr)) {

            $post_id = mysqli_real_escape_string($connection, $post_id);
            $comment_content = mysqli_real_escape_string($connection, $comment_content);
            $user_id = mysqli_real_escape_string($connection, $user_id);

            $query = "INSERT INTO comments (post_id, user_id, content, date ) ";
            $query .= "VALUES ($post_id, $user_id, '$comment_content', now()) ";

            $insert_comment_query = mysqli_query($connection, $query);

            confirmQuery($insert_comment_query);



            // header("Location: ../post-details.php?p_id=$post_id");
        }
    }

?>


<script>
    var contentErr = "<?php echo $contentErr ;?>" 
    var content = "<?php echo $comment_content ;?>" 
    $("#comment_content").removeClass("is-invalid");
    console.log(contentErr);
    
    if (contentErr != ""){
        $("#comment_content").addClass("is-invalid");
        $("#invalid-feedback").html(`${contentErr}`);
        $("#comment_content").html(content);
    }else {
        $("#comments-container").load("includes/post-comments.php", {post_id : <?php echo $post_id ;?>});
        $("#comment_content").val("");
        let text = $(".comment_cnt_profile");

        const arr = text.html().split(" ");
  
        let number = +arr[0];
 

        let html = `${++number} Comments`;

        text.html(`${html}`);
        
    }
</script>