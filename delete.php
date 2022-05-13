<?php
require 'connect.php';
$name = $email = $gender = $website = $comment = '';
$nameErr = $emailErr = $websiteErr = '';

?>
<html>

<head>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Website</th>
            <th>Comment</th>
        </tr>

        <?php
        $sql = "SELECT name, email,gender, website,comment FROM users";
        $result = mysqli_query($conn, $sql);
        $rows_count = mysqli_num_rows($result);
        if ($rows_count > 0) {
            while ( $row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['gender'] ?></td>
                    <td><a href="<?= $row['website'] ?>"> <?= $row['website'] ?></a></td>
                    <td><?= $row['comment'] ?></td>
                </tr>
                
        <?php }
        }
        ?>
    </table>

    <h1><?= $name ?></h1>
    <h3><?= $email ?></h3>
    <h3><?= $gender ?></h3>
    <h3><?= $website ?></h3>
    <h3><?= $comment ?></h3>
    <form action="dodelete.php" method="post">
        <label>Name:</label> <input required type="text" name="name"><br>
        <span class="error"><?= $nameErr ?></span>
       
        <input type="submit" name="delete" value="delete record">
    </form>
    <a href="index.php">Home</a>
</body>



</html>
