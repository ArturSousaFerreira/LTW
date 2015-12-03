<header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Going</h1>
                <hr>
                <p>When and where to go!</p>
                <a href="#about" class="button-default button-1">Find Out More</a>
            </div>
        </div>
    </header>

	 <?php if (isset($_SESSION['username'])) { ?>
                
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
				
            <?php } ?>


</body>

</html>


