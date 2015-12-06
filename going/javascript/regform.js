function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function regform(form, username, email, pass, conf) {
    if (username.value == ''|| email.value=='' || pass.value == '') {
        alert('You must provide a username, an email and a password');
        return false;
    }
    var re = /^\w+$/;
    if(!re.test(username.value)) {
        alert("Username must contain only letters, numbers and underscores");
        form.username.focus();
        return false;
    }
    if (!validateEmail(email.value)) {
        alert('Please enter a valid email address.');
        form.email.focus();
        return false;
    }
    if (pass.value.length < 3) {
        alert("Password must be at least 3 characters long");
        form.password.focus();
        return false;
    }
    if (pass.value != conf.value) {
        alert("Passwords don't match");
        form.confirm.focus();
        return false;
    }
    var confirm_btn = document.createElement("input");
    confirm_btn.name = "confirm_pass_btn";
    confirm_btn.type = "hidden";
    form.appendChild(confirm_btn);
    form.submit();
	alert("You have done a beautiful register, please login!");
    return true;
}

function passform(form, old_pass, new_pass, conf) {
    if (old_pass.value == ''|| new_pass.value=='' || conf.value == '') {
        alert('You must provide your old password and the new password');
        return false;
    }
    if (new_pass.value.length < 3) {
        alert("Password must be at least 3 characters long");
        form.new_password.focus();
        return false;
    }
    if (new_pass.value != conf.value) {
        alert("Passwords don't match");
        form.confirm.focus();
        return false;
    }
    var confirm_btn = document.createElement("input");
    confirm_btn.name = "confirm_btn";
    confirm_btn.type = "hidden";
    form.appendChild(confirm_btn);
    form.submit();
    alert("Your password has been changed.");
    return true;
}

function emailform(form, email) {
    if (!validateEmail(email.value)) {
        alert('Please enter a valid email address.');
        form.email.focus();
        return false;
    }
    var confirm_btn = document.createElement("input");
    confirm_btn.name = "confirm_email_btn";
    confirm_btn.type = "hidden";
    form.appendChild(confirm_btn);
    form.submit();
    alert("Your email has been changed.");
    return true;
}