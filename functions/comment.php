<?php
include("../db/db.php");
$message='';$message1='';$message2='';$message3='';
//if (isset($_POST['submit'])) {
   $comment_replyid=htmlspecialchars (mysqli_real_escape_string($conn,$_POST['comment_replyid']), ENT_QUOTES, 'UTF-8');
  $comment_name=htmlspecialchars (mysqli_real_escape_string($conn,$_POST['comment_name']), ENT_QUOTES, 'UTF-8');
  $email=htmlspecialchars (mysqli_real_escape_string($conn,$_POST['email']), ENT_QUOTES, 'UTF-8');
  $comment_message=htmlspecialchars (mysqli_real_escape_string($conn,$_POST['comment_message']
  ), ENT_QUOTES, 'UTF-8');
  if (empty($comment_name)) {
    $message1='<div class="bg-success">Name is empty!</div>';
  }elseif (empty($email)) {
     $message='<div class="bg-success">email is empty!</div>';
  }elseif (!filter_var($email, FILTER_SANITIZE_EMAIL)) {
     $message2='<div class="bg-success">Email is not valid!</div>';
  }
  elseif (empty($comment_message)) {
     $message3='<div class="bg-success">Message is empty!</div>';
  }else{
  $stmt = $conn->prepare("INSERT INTO comment(comment_replyid,comment_name, email, comment_message)VALUES(?,?,?,?) ");
   $stmt->bind_param("ssss", $comment_replyid, $comment_name, $email, $comment_message);
    $stmt->execute();

 // echo '<div class="bg-success">Comment received successfully!</div>';
    echo "ok";
   
     $stmt->close();
    $conn->close();
  }
//}


?>