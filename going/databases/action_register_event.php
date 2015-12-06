<?php
session_start();

include_once("events.php");

$id = $_GET['id'];

if (isset($_SESSION['username']))
    registerEvent($id, $_SESSION['username']);

header('Location: ' . './show_event.php?id=' . $id);
