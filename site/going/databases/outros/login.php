<?php

include 'user_connection.php';
session_start();
$error = '';

if (isset($_POST['login'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = 'Username or Password is invalid!';
	} else {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$user = getUserByUserID($username);

		if (!empty($user) && $user['password'] == $password) {
			$_SESSION['login_user'] = $username;
			header('Location: profile.php');
		} else {
			$error = 'Username or Password is invalid!';
		}
	}
}

?>