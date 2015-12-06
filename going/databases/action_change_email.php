<?php

include_once('users.php');

session_start();

if (isset($_POST['confirm_email_btn'])) {
    changeUserEmail($_POST['username'], $_POST['email']);
    header('Location: ' . 'index.php');
}
else if (isset($_POST['cancel_email_btn'])){
    header('Location: ' . 'index.php');
}
else {
    echo "<h1>You shouldn't be here</h1>";
}

?>
