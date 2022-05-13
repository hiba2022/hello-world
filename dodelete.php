<?php
require 'connect.php';
if(isset($_POST['delete']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $website=$_POST['website'];
    $comment=$_POST['comment'];
}

$sql = "delete from users where name='$name'";

if (mysqli_query($conn, $sql)) {
    echo "data deleted successfully";
   header("Location: index.php");
  }else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
