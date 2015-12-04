<?php
session_start();

include_once("events.php");

include_once("templates/header.php");


$logged = isset($_SESSION['username']);

$id = $_GET['id'];
$event = getEvent($id);
$registered = getRegistered($id);
$comments = getComments($id);

?>

<header>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../javascript/createEventForm.js"></script>
	
<div id="footer_detail_event">

<h1>Event info</h2>
    <ul>
        <li>pilas by:
              <form action="action_edit_event.php" method="post">
			  
		<input type="hidden" name="id" value="<?=$id?>">
		
        <select name="type" id="type"></select>
        <br>
        <input type="datetime" name="date" id="date" placeholder="<?=$event['date']?>">
        <br>
        <input type="textarea" name="description" placeholder="<?=$event['description']?>">
        <br>
        <input type="submit" value="Save">
        <input type="submit" name="cancel_btn" value="Cancel">
    </form>

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


