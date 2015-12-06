<?php

session_start();
include_once("templates/header.php");
?>
<header>
	<div id = "footer_listevents">
		<?php

		include_once("connection.php");


		?>


		<?php

		include_once("events.php");
		$events = getEvents();

		?>

		<h1>Events</h1>

		<form name="form" method="post" >
			<input name="search" type="text" size="40" maxlength="50" placeholder="search">
		</form>


		<?php if (count($events) <= 0)
			echo 'There are no events :('
		?>
		<ul id="li_events">
			<?php
			foreach ($events as $event) {

				if(empty($_POST)){?>
					<li><a href="show_event.php?id=<?=$event['id']?>"><?=$event['date']?> | <?=$event['type']?> | <?=$event['description']?></a> Created by <?=$event['creator']?></li>
				<?php }else if($event['description'] === $_POST["search"]){?>
					<li><a href="show_event.php?id=<?=$event['id']?>"><?=$event['date']?> | <?=$event['type']?> | <?=$event['description']?></a> Created by <?=$event['creator']?></li>
				<?php }



			} unset($_POST);?>
		</ul>


		<?php if (isset($_SESSION['username'])) { ?>
		<div class = "nav_buttons">
			<button type="button" onclick="location.href='creat_event.php'">Create</button>
			<button type="button" onclick="location.href='index.php'">Back</button>
			<?php } else { ?>


			<?php } ?>

		</div>
</header>

	
		
		
		


 
