<?php

include_once('users.php');

session_start();

if (isset($_POST['confirm_pass_btn'])) {
    if (checkCredentials($_POST['username'], $_POST['old_password'])) {
        changeUserPass($_POST['username'], $_POST['new_password']);
    }
    header('Location: ' . 'index.php');
}
else if (isset($_POST['cancel_pass_btn'])){
    header('Location: ' . 'index.php');
}
else {
    echo "<h1>You shouldn't be here</h1>";
}

?>
