<?php
session_start();

include_once("events.php");

include_once("templates/header.php");


$logged = isset($_SESSION['username']);

$id = $_GET['id'];
$event = getEvent($id);
$registered = getRegistered($id);
$comments = getComments($id);

include_once("templates/show_event.php");
?>

<!-- Comment form -->
<?php if ($logged) { ?>
    <?php if (isRegisteredInEvent($id, $_SESSION['username']) || ($_SESSION['username'] == $event['creator'])) { ?>
        <form action="action_comment.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="author" value="<?= $_SESSION['username'] ?>">
            <input type="textarea" name="text">
            <br>
            <input type="submit" name="comment_btn" value="Comment">
        </form>
    <?php } else { ?>
        <p>Register in the event to comment</p>
    <?php } ?>
<?php } else { ?>
    <p>Register in the event to comment</p>
<?php } ?>

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
</div>
</header>
</body>
</html>

