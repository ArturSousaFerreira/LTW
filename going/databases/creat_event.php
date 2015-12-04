<?php
	session_start();

	include_once("connection.php");

    if (isset($_SESSION['username'])) { 
	
		include_once("templates/header.php");
		include_once("templates/footer_creat_event.php");?>
    
	<?php } else { 
	
		header('Location: ' . './index.php');?>
		
    <?php }
?>
