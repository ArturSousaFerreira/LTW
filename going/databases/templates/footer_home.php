<header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Going</h1>
                <hr>
                <p>When and where to go!</p>
                 <?php if (isset($_SESSION['username'])) { ?>
				<a href="list_events.php" class="button-default button-1">Find Out More</a>
				 <?php }else{ ?>
					 <a href="#about" class="button-default button-1">Find Out More</a>
				 <?php } ?>
            
			
			</div>
        </div>
    </header>
			
			
            <?php if (isset($_SESSION['username'])) { 
			if($_SESSION['counter_login'] == 0){
			
			echo "<script> alert('Login successful!'); </script>";
			$_SESSION['counter_login']++;
			}
	 
			?>
            <?php } else { ?>
                   <section class="about" id="about">
        <div class="container">
            <div class="row">
                <div class="about-format-center">
                    <h2 class="about-heading">We've got what you need!</h2>
                    <hr class="about">
                    <p class="about-format-center">We have the best events to share with you. Now, you can reach the best events!</p>
                    <a href="register.php" class="button-default button-2">Get Started!</a>
                </div>
            </div>
        </div>
    </section>
				
            <?php 
			if(isset($_SESSION['counter_login'])){
	 if($_SESSION['counter_login'] == -1){
	 echo "<script> alert('Wrong password!'); </script>";
	 $_SESSION['counter_login'] = $_SESSION['contador_login'] + 2;
	 } else if($_SESSION['counter_login'] == -2){
	 echo "<script> alert('Invalid user!'); </script>";
	 $_SESSION['counter_login'] = $_SESSION['counter_login'] + 3;
	 } 
			}
			
			
			
			
			}  ?>
			
			<?php
//			if($_SESSION['emailSend'] == 'send'){
//			echo "<script>alert('Your mail has been sent successfuly ! Thank you for your feedback')</script>";
//			$_SESSION['emailSend'] == '';
//			}
			
			?>
