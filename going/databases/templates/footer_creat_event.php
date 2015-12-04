<header>


    <h2 class="about-heading">Creat Events!</h2>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../javascript/createEventForm.js"></script>

	<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="Upload Image" name="submit">
	</form>
	
    <form action="action_create_event.php" method="post">
        <input type="hidden" name="creator" value="<?=$_SESSION['username']?>">
        <select name="type" id="type"></select><br>
        <input type="datetime" name="date" id="date" placeholder="aaaa-mm-dd">
        <br>
        <input type="textarea" name="description" placeholder="description">
        <br>
		<input type="submit" value="Create" onclick="return createEventForm(this.form);">
        <input type="submit" name="cancel_btn" value="Cancel">
	</form>
	
	<br>
	<br>
    	
</header>

</body>

</html>