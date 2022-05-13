<?php
require 'connect.php';
if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $website=$_POST['website'];
    $comment=$_POST['comment'];
}

$sql = "UPDATE users SET name='$name', email='$email', gender='$gender', website='$website', comment='$comment' WHERE name='$name'";

if (mysqli_query($conn, $sql)){
   
  
     header("Location: index.php");
 
}else{echo "Error: " . $sql . "<br>" . mysqli_error($conn);}

