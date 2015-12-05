<?php
include_once('events.php');
include_once('read_edit_event.php');

if(isset($_POST['create_btn']))
	editEvent($_POST['id'], $_POST['date'], $_POST['description'], $_POST['type'], $_FILES['image']);

//header('Location: ' . $_COOKIE['redirect']);
if(isset($_POST['back_btn'])){
	header('Location: ' . './show_event.php?id=1');
}
?>
