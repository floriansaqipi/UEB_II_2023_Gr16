<?php  
global $connection;

 if(isset($_GET["comment_id"]))  
 {  
    $commentID = $_GET["comment_id"];
      $query = "SELECT * FROM comments WHERE comment_id = $commentID";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>