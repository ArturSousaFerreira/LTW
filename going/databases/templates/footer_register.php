<?php
?>

<header >
<div id = "footer_register">
		<script type="text/javascript" src="../javascript/regform.js"></script>
		
        <h1>Registration form</h1>
        <ul>
            <li>Username may contain only digits, upper and lowercase letters and underscores</li>
            <li>Password must be at least 3 characters long</li>
            <li>Passwords must match</li>
        </ul>
        <form action="action_register.php" method="post">
            <input type="text" name="username" placeholder="username">
            <br>
            <input type="password" name="password" placeholder="password">
            <br>
            <input id="last_input" type="password" name="confirm" placeholder="confirm password">
            <br>
            <input type="button" value="Confirm"
                   onclick="return regform(this.form,
                            this.form.username,
                            this.form.password,
                            this.form.confirm);">
            <input type="submit" name="cancel_btn" value="Cancel">
		</form>
		</div>
		</header>
    </body>
</html>

