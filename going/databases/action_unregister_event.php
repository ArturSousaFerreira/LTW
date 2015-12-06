<?php
session_start();
include_once("events.php");
$id = $_GET['id'];

if (isset($_SESSION['username']))
    unregisterEvent($id, $_SESSION['username']);

header('Location: ' . './show_event.php?id=' . $id);
?>