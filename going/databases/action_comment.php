<?php

session_start();
include_once('events.php');

$event = $_POST['id'];
$author = $_POST['author'];
$text = $_POST['text'];

createComment($event, $author, $text);

header('Location: ' . './show_event.php?id=' . $event);
?>