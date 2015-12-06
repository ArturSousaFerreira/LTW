<?php
session_start();
include_once("templates/header.php");
include_once("connection.php");
include_once("users.php");
$users = getUsers();
$user = getUser($_GET['username']);
$logged = isset($_SESSION['username']);
?>
<header>
	<div id = "footer_listevents">

		<h1>Profile of <?php echo $user['username']; ?></h1>
		<h2>Informations</h2>
		<br>
		<?php if($user['email'] != ""){ ?>
			<h3>Email:</h3>
			<br>
			<?php echo $user['email'];}?>

	</div>
</header>
