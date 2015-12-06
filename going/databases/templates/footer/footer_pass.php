
<header>
    <div id="footer_pass">
        <script type="text/javascript" src="../javascript/regform.js"></script>
        <h1>Change Password</h1>
        <form action="action_change_pass.php" method="post">
            <input type="hidden" name="username" value="<?= $_SESSION['username'] ?>">
            <br>
            <input type="password" name="old_password" placeholder="old password">
            <br>
            <input type="password" name="new_password" placeholder="new password">
            <br>
            <input id="last_input" type="password" name="confirm" placeholder="confirm password">
            <br>
            <input type="button" name="confirm_pass_btn" value="Confirm"
                   onclick="return passform(this.form,
                            this.form.old_password,
                            this.form.new_password,
                            this.form.confirm);">
            <input type="submit" name="cancel_pass_btn" value="Cancel">
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div id="footer_email">
        <script type="text/javascript" src="../javascript/regform.js"></script>
        <h1>Change Email</h1>
        <form action="action_change_email.php" method="post">
            <input type="hidden" name="username" value="<?= $_SESSION['username'] ?>">
            <br>
            <input name="email" size="30" type="text" placeholder="new email">
            <br>
            <input type="button" name="confirm_email_btn" value="Confirm"
                   onclick="return emailform(this.form, this.form.email);">
            <input type="submit" name="cancel_email_btn" value="Cancel">
        </form>
    </div>
</header>
