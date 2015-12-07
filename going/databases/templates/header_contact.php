<header>
    <div id="footer_contact">
        <h1>Contact</h1>

        <form name="contactform" method="post" action="action_contact.php">
            <input name="action" value="submit" type="hidden">
            <br>
            <input name="name" size="30" type="text" placeholder="name">
            <br>
            <input name="email" size="30" type="text" placeholder="email">
            <br>
            <br>
            <textarea name="message" rows="7" cols="30" placeholder="message"></textarea>
            <br>
            <input name="submit" value="Send email" type="submit">
			
        </form>
    </div>
	
	<?php
	if (isset($_SESSION['emailSend'])) {
		if($_SESSION['emailSend'] == 'invsend'){
			echo "<script>alert('Invalid sender's Email')</script>";
		}
		else if($_SESSION['emailSend'] == 'fill'){
			echo "<script>alert('Fill all Fields..')</script>";
		}
		$_SESSION['emailSend'] = '';
	}
	?>

