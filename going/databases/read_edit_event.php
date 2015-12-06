<?php
session_start();

include_once("events.php");
include_once("templates/nav.php");

$logged = isset($_SESSION['username']);


$id = isset($_GET['id'])?$_GET['id']:"";
$event = getEvent($id);
$registered = getRegistered($id);
$comments = getComments($id);

?>

<header>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../javascript/eventform.js"></script>

    <div id="footer_detail_event">

        <h2>Event info</h2>
        <ul>
            <form action="action_edit_event.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="hidden" name="old_image" value="<?=$event['image']?>">
                <select name="type" id="type"></select>
                <br>
                <input type="datetime" name="date" id="date" value="<?= $event['date'] ?>">
                <br>
                <input type="textarea" name="description" value="<?= $event['description'] ?>">
                <br>
                <input type="file" name="image" id="image">
                <br>
                <input type="submit" value="Save">
                <input type="submit" name="back_btn" value="Back">
            </form>

    </div>
</header>

