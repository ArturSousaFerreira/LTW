<?php
include_once('events.php');

if(isset($_POST['cancel_btn'])){
header('Location: ' . './show_event.php?id=' . $_POST['id']);	
}
else editEvent($_POST['id'], $_POST['date'], $_POST['description'], $_POST['type'], $_POST['fileToUpload']);

header('Location: ' . './show_event.php?id=' . $_POST['id']);
//header('Location: ' . $_COOKIE['redirect']);
?>
