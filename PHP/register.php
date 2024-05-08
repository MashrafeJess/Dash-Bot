<?php
include "config.php";
if (isset($_POST['save'])) {

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));

    $sql = "SELECT email FROM customers WHERE email = '{$email}'";
    $result = mysqli_query($conn, $sql) or die("Query Failed");
   
if (mysqli_num_rows($result) > 0) {
    echo "<div class=\"error\" >Email already in use.</div>";
} else {
    $sql1 = "INSERT INTO customers (fname,lname,email,pass) VALUES ('{$fname}','{$lname}','{$email}','{$pass}')";
    if (mysqli_query($conn, $sql1)) {
        header("Location: http://localhost/Dash@Bot/PHP/login.php");
    } else {
        echo "failed";
    }
} 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../CSS/register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>
            Registration Form
        </h1>
        <form class="group" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="on">
            <label>First Name</label></br>
            <input type="text" name="fname" placeholder="Enter your name"></br>
            <label>Last Name</label></br>
            <input type="text" name="lname" placeholder="Enter your name"></br>
            <label>Email Address</label></br>
            <input type="email" name="email" placeholder="Enter your email address"></br>
            <label>Password</label></br>
            <input type="password" name="pass" placeholder="Enter your password">
            <input class="m" type="submit" name="save" value="Register">
        </form>
    </div>
</body>

</html>