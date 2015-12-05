<?php
if (isset($_POST["share_btn"])) {
// Checking For Blank Fields..
    if ($_POST["email"] == "") {
        echo "Please enter an email address.";
    } else {
// Check if the email input field is filled out
        $email = $_POST['email'];
// Sanitize E-mail Address
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) {
            echo "Invalid email address.";
        } else {
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $author = $_POST['author'];
            $url = $_POST['url'];
            $description = $_POST['description'];
            $message = 'GOING user ' . $author . ' wants to share the event '
                . '<a href="' . $url . '">' . $description . '</a>' . ' with you.';
            $message = wordwrap($message, 50);
            mail($email, 'GOING event', $message, $headers);
        }
    }
    header('Location: ' . './show_event.php?id='.$_POST['id']);
}
?>