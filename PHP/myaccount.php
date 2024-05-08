<?php
include "config.php";
session_start();
if (!isset($_SESSION["name"])) {
    header("Location:http://localhost/Dash@Bot/PHP/login.php");
}
$name = $_SESSION["name"];
$id = $_SESSION["ID"];
$sql = "SELECT fname, lname FROM customers WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $Fname, $Lname);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
    <link rel="stylesheet" href="../CSS/myaccount.css">
</head>

<body>
    <div class="container">
        <div class="h">
            <strong>Account Details</strong>
        </div>
        <div id="group">
            <div id="t">
                Username : </br>
                <?php echo "{$Fname} {$Lname}"; ?>
            </div>
            <div>
                <div id="group">
                    <div>
                        Email : </br>
                        <?php echo $name; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="foot">
        <a href="../PHP/bot.php">Back to main page</a>
    </div>

</body>

</html>