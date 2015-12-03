<header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>My Events</h1>
                <hr>
				<br>
                <a href="#event" class="button-default button-1">Creat Event</a>
            </div>
        </div>
    </header>

    <section class="about" id="event">
        <div class="container">
            <div class="row">
                <div class="about-format-center">
                    <h2 class="about-heading">Creat Events!</h2>
					<form action="action_create_event.php" method="post" >
					<input type="hidden" name="creator" value="<?=$_SESSION['username']?>">
					<select name="type" id="type" placeholder="type"></select>
					<br>
					<input type="datetime" name="date" id="date" placeholder="date" >
					<br>
					<input type="textarea" name="description" placeholder="description">
					<br>
					<input type="submit" value="Create" onclick="return createEventForm(this.form);">
					<input type="submit" name="cancel_btn" value="Cancel">
					</form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>

