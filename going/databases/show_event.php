<?php
session_start();

include_once("events.php");
include_once("users.php");
include_once("templates/nav.php");

$logged = isset($_SESSION['username']);

$id = isset($_GET['id'])?$_GET['id']:"";
$event = getEvent($id);
$registered = getRegistered($id);
$from_email = getUserEmail($_SESSION['username'])[0];
$comments = getComments($id);
$url = 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
include_once("templates/show_event.php");
?>

<!-- Comment form and Share form-->
<?php if ($logged && (isRegisteredInEvent($id, $_SESSION['username']) || ($_SESSION['username'] == $event['creator']))) { ?>
    <form action="action_comment.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="event" value="<?= $id ?>">
        <input type="hidden" name="author" value="<?= $_SESSION['username'] ?>">
        <input type="textarea" name="text">
        <br>
        <input type="submit" name="comment_btn" value="Comment">
    </form>
    <form action="action_share.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="author" value="<?= $_SESSION['username'] ?>">
        <input type="hidden" name="from_email" value="<?= $from_email ?>">
        <input type="hidden" name="url" value ="<?= $url ?>">
        <input type="hidden" name="description" value ="<?= $event['description'] ?>">
        <input name="email" size="30" type="text" placeholder="email">
        <br>
        <input type="submit" name="share_btn" value="Share">
    </form>
<?php } else { ?>
    <p>Register in the event to comment or share</p>
<?php } ?>

<br>

<div class="nav_buttons">
    <?php if ($logged) { ?>
        <?php if (!isRegisteredInEvent($id, $_SESSION['username'])) {?>

            <button type="button" onclick="location.href='action_register_event.php?id=<?=$id?>'">Register</button>

        <?php } else {?>
            <button type="button" onclick="location.href='action_unregister_event.php?id=<?=$id?>'">Unregister</button>

        <?php } ?>

        <?php if ($_SESSION['username'] == $event['creator']
            || $_SESSION['username'] == 'admin') { ?>
            <button type="button" onclick="location.href='action_delete_event.php?id=<?=$id?>'">Delete</button>

        <?php } ?>

        <?php if ($_SESSION['username'] == $event['creator']
            || $_SESSION['username'] == 'admin') { ?>
            <button type="button" onclick="location.href='read_edit_event.php?id=<?=$id?>'">Edit</button>

        <?php } ?>
    <?php } ?>
    <button type="button" onclick="location.href='list_events.php'">Back</button>
</div>