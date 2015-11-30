<?php
	session_start(); //starts the session
	include_once("connection.php");
	$error=''; // Variable To Store Error Message
	
		if (empty($_POST['username']) || empty($_POST['password'])) {
			echo'<script language="javascript">';
			echo 'alert("Incorrect username and/or password.")';
			echo '</script>';
			$redirectUrl = '../login.html';
			echo '<script type="application/javascript"> window.location.href = "'.$redirectUrl.'";</script>';
		}
		else
		{
			// Define $username and $password
			
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			
			$stmt = $dbh->prepare('SELECT password,salt FROM User WHERE username = :user LIMIT 1');
			$stmt->bindParam(':user', $username);
			$stmt->execute();
			$chiclas = $stmt->fetch();
			$pwdhash= crypt($password,$chiclas['salt']);
			
			
			// Hashing the password with its hash as the salt returns the same hash
			if($pwdhash == $chiclas['password']){
	
				$_SESSION['username'] = $username;            	// store the username
				echo'<script language="javascript">';
				echo 'alert("Correct username and/or password.")';
				echo '</script>';
				//$redirectUrl = 'profile.php';
				//echo '<script type="application/javascript">window.location.href = "'.$redirectUrl.'";</script>';
				//header("location: index.php"); // Redirecting To Other Page
			} else {
				$error = "Username or Password is invalid";
				echo'<script language="javascript">';
				echo 'alert("Incorrect username and/or password.")';
				echo '</script>';
				//$redirectUrl = 'index.php';
				//echo '<script type="application/javascript">window.location.href = "'.$redirectUrl.'";</script>';
 			}
			
		}
	
	
?>