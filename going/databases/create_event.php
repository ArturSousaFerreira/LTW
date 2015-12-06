<?php
	session_start();
	include_once("connection.php");
	include_once("templates/nav.php");
    
	if (isset($_SESSION['username'])) { 
		include_once("templates/header_create_event.php");
	} 
	else { 
		header('Location: ' . './index.php');
    }
?>