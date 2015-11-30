<?php
  session_start();                         // starts the session
  
  include_once('connection.php'); // connects to the database
  include_once('users.php');      // loads the functions responsible for the users table
 
  if (userExists($_POST['user'], $_POST['pass'])) // test if user exists
    $_SESSION['user'] = $_POST['user'];            // store the username
 
  header('Location: login.html'); //$_SERVER['HTTP_REFERER']);
?>
