<?php

include_once('users.php');

session_start();

$referer;
if (isset($_COOKIE['redirect'])) $referer = $_COOKIE['redirect'];
else $referer = 'index.php';

if (isset($_POST['login_btn'])) {
    if (checkCredentials($_POST['username'], $_POST['password'])) {
        $_SESSION['username'] = $_POST['username'];
       $_SESSION['message'] = 'Login successful';
    }
    else if (isRegistered($_POST['username'])) {
		 $_SESSION['message'] = 'Wrong password!';
    }
    else
		 $_SESSION['message'] = 'User is not registered!';
		
    header('Location: ' . $referer);
}
else if (isset($_POST['cancel_btn'])){
    header('Location: ' . $referer);
}
else {
    echo "<h1>You shouldn't be here</h1>";
}

?>
