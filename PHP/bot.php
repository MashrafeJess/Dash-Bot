<?php
include "config.php";
session_start();
if (!isset($_SESSION["name"])) {
    header("Location:http://localhost/Dash@Bot/PHP/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/bot.css">
    <link rel="shortcut icon" href="../CSS/One-Piece-anime.png" type="png">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <div id="grid">
        <div class="item1">
            <div class="item2">
                <img class="item3" src="../CSS/—Pngtree—artificial intelligence robot illustration_9047239.png" alt="" height="60px" width="60px">
                <p class="item4">Dash@Bot 3.0</p>
            </div>
        </div>
        <div class="item22"> <a class="bkl" href="../PHP/myaccount.php">My Account</a></div>
        <div class="item33"><a class="bkl" href="../PHP/logout.php">logout</a></div>
    </div>
    <div class="home">
        <div class="wrapper">
            <div class="title">Dash@Bot</div>
            <div class="form">
                <div class="bot-inbox inbox">
                    <div class="icon">
                        <img src="../CSS/robot.png" alt="no" height="67px" width="67px">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="msg-header">
                        <p>Hi , I'm Dash@Bot,how can I help you?</p>
                    </div>
                </div>
            </div>
            <div class="typing-field">
                <div class="input-data">
                    <input id="data" type="text" name="text" placeholder="Type something here.." required>
                    <button id="send-btn">Send</button>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $("#send-btn").on("click", function() {
                    $value = $("#data").val();
                    $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
                    $(".form").append($msg);
                    $("#data").val('');

                    $.ajax({
                        url: 'extra.php',
                        type: 'POST',
                        data: 'text=' + $value,
                        success: function(result) {
                            $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                            $(".form").append($replay);
                            $(".form").scrollTop($(".form")[0].scrollHeight);
                        }
                    });
                });
            });
        </script>


</body>

</html>