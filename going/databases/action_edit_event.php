<?php
include_once('events.php');
include_once('read_edit_event.php');

editEvent($_POST['id'], $_POST['date'], $_POST['description'], $_POST['type'], $_FILES['image'], $_POST['old_image']);

header('Location: ' . './show_event.php?id='.$_POST['id']);

?>
