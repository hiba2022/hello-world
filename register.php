<?php
$name = $email = $gender = $website = $comment = '';
$nameErr = $emailErr = $websiteErr = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['name'])) {
        $name = trim($_POST['name']);
        if (!preg_match("^[a-zA-Z]+$^", $name)) {
            $nameErr = "Invalid name";
        }
        //^[a-zA-Z\s]+$
    } else
        $nameErr = "Name is required";
    if (!empty($_POST['email'])) {
        $email = trim($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email";
        }
    } else
        $emailErr = 'Email is required';
    if (isset($_POST['gender']))
        $gender = $_POST['gender'];
    if (isset($_POST['website'])) {
        $website = $_POST['website'];
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $websiteErr = "Invalid url";
        }
    }

    if (isset($_POST['comment']))
        $comment = $_POST['comment'];
}

?>
<h1><?= $name ?></h1>