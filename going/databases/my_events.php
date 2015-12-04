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

	<h1>My Events</h1>
    <?php if (count($events) <= 0)
        echo 'There are no events :('
    ?>
<ul id="li_events">
    <?php foreach ($events as $event) {

if($event['creator']==$_SESSION['username']){?>
				
        <li><a href="show_event.php?id=<?=$event['id']?>"><?=$event['date']?> | <?=$event['type']?> | <?=$event['description']?></a> Created by <?=$event['creator']?></li>
   

<?php }} ?>
</ul>
			
			
			<?php if (isset($_SESSION['username'])) { ?>
                <div class = "nav_buttons">
					<button type="button" onclick="location.href='creat_event.php'">Create</button>
					<button type="button" onclick="location.href='index.php'">Back</button>
            <?php } else { ?>
              
				
            <?php } ?>

		</div>
	</header>
</body>
</html>
    
	
		
		
		


 
