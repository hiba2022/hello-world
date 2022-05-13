<?php
require 'connect.php';

$sql = "INSERT INTO users (name, email, gender, website, comment)
VALUES ('$_POST[name]', '$_POST[email]', 
'$_POST[gender]', 
'$_POST[website]', '$_POST[comment]')";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
