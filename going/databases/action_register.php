<?php

include_once('connection.php');
include_once('users.php');

$referer = './index.php';
if (isset($_COOKIE['redirect'])) $referer = $_COOKIE['redirect'];

if (isset($_POST['confirm_btn'])) {
    if (!registerUser($_POST['username'], $_POST['email'], $_POST['password'])) {
        echo "<script>alert('User is already registered!')</script>";
    }
    else echo "<script>alert('Successfully registered')</script>";

    header('Location: ' . $referer);
}
else if(isset($_POST['cancel_btn'])) {
    header('Location: ' . $referer);
}
else {
    echo "<h1>You shouldn't be here</h1>";
}

