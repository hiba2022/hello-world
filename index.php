<?php
require 'connect.php';
$name = $email = $gender = $website = $comment = '';
$nameErr = $emailErr = $websiteErr = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name'])) {
        $nameErr = "Name is required";
    } else if (preg_match("^[a-zA-Z\s]+$^", $_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $nameErr = "Invalid Name";
    }
    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
    } else if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];
    } else {
        $emailErr = "Invalid Email";
    }
    if (empty($_POST['website'])) {
        $websiteErr = "website is required";
    } else if (filter_var($_POST['website'], FILTER_VALIDATE_URL)) {
        $website = $_POST['website'];
    } else {
        $websiteErr = "Invalid URL";
    }
}

?>

<html>

<head>
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <form action="process.php" method="post">
        <label>Name:</label> <input required type="text" name="name"><br>
        <span class="error"><?= $nameErr ?></span>
        E-mail: <input type="text" name="email"><br>
        <span class="error"><?= $emailErr ?></span>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male<br>
        
        Website: <input type="text" name="website"><br>
        <span class="error"><?= $websiteErr ?></span>
        Comment: <textarea name="comment" rows="5" cols="40"></textarea><br>
        <input type="submit">
    </form>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Website</th>
        </tr>

        <?php
        $sql = "SELECT name, email, website FROM users";
        $result = mysqli_query($conn, $sql);
        $rows_count = mysqli_num_rows($result);
        if ($rows_count > 0) {
            while ( $row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><a href="<?= $row['website'] ?>"> <?= $row['website'] ?></a></td>
                </tr>
        <?php }
        }
        ?>
    </table>
    <h1><?= $name ?></h1>
    <h3><?= $email ?></h3>
    <h3><?= $website ?></h3>
    <a href="update.php">update page</a>
    <a href="delete.php">delete page</a>
</body>

</html>