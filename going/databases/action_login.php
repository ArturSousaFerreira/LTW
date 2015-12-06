<?php

include_once('users.php');

session_start();

$referer = 'index.php';
if (isset($_COOKIE['redirect'])) $referer = $_COOKIE['redirect'];

if (isset($_POST['login_btn'])) {
    if (checkCredentials($_POST['username'], $_POST['password'])) {
        $_SESSION['username'] = $_POST['username'];
		$_SESSION['counter_login'] = 0;
    }
    else if (isRegistered($_POST['username'])) {
		 $_SESSION['counter_login'] = -1;
    }
    else
		 $_SESSION['counter_login'] = -2;
		
    header('Location: ' . $referer);
}
else if (isset($_POST['cancel_btn'])){
    header('Location: ' . $referer);
}
else {
    echo "<h1>You shouldn't be here</h1>";
}

