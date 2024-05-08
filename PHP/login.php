<?php

include "config.php";

if (isset($_POST['save'])) {
    $username = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['pass']);
    $sql = "SELECT id,email FROM customers WHERE email = '{$username}' AND pass = '{$pass}'";
    $result = mysqli_query($conn, $sql) or die("query failed");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION["name"] = $row['email'];
            $_SESSION["ID"] = $row['id'];

            header("Location: http://localhost/Dash@Bot/PHP/bot.php");
        }
    } else {
        echo "<p> Username not found </p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/login.css">
</head>

<body>
    <div class="hero">
        <div class="h">
            Login Form
        </div>
        <form class="group" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="on">
            <label>Name</label> </br>
            <input type="email" name="email" placeholder="Enter your email"></br>
            <label>Password</label> </br>
            <input type="password" name="pass" placeholder="Enter your password">
            <input class="m" type="submit" name="save" value="login">
        </form>
    </div>
</body>

</html>