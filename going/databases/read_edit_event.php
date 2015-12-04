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
        Edit by:
    <form action="action_edit_event.php" method="post">
			  
		<input type="hidden" name="id" value="<?=$id?>">
		
        <select name="type" id="type"></select>
        <br>
        <input type="datetime" name="date" id="date" placeholder="<?=$event['date']?>">
        <br>
        <input type="textarea" name="description" placeholder="<?=$event['description']?>">
		<br>
	</form>
   
	<form action="upload.php" method="post">
		<input type="file" name="fileToUpload" id="fileToUpload" >
		<input type="submit" value="Upload Image" name="submit">
	</form>
   
	<form action="action_edit_event.php" method="post">
        <input type="submit" value="Save">
        <input type="submit" name="cancel_btn" value="Cancel" >
    </form>
	
</div>
</header>
</body>
</html>


