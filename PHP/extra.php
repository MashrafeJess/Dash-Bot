<?php
include "config.php";
$Mesg = mysqli_real_escape_string($conn, $_POST["text"]);

$check_data = "SELECT Replies FROM bot WHERE Queries LIKE '%{$Mesg}%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

if (mysqli_num_rows($run_query) > 0) {
    $fetch_data = mysqli_fetch_assoc($run_query);
    $replay = $fetch_data['Replies'];
    echo $replay;
} else {
    echo "I don't understand";
}
