<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GOING - When and where to go!</title>

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/going.css" type="text/css">
    <link rel="stylesheet" href="../css/extra.css" type="text/css">

</head>

<body id="page-top">

<nav class="mainNav">
    <?php if (isset($_SESSION['username'])) { ?>
        <a class="navbarGoing" href="#page-top">GOING</a>
        <ul class="navbarGoing-right">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="contact.php">Contact</a>
            </li>
            <li>
                <a href="list_events.php">Events</a>
            </li>
            <li>
                <a href="my_events.php">MyEvents</a>
            </li>
            <li id ="acount">
                <a href="change_pass.php"><?=$_SESSION['username']?></a>
            </li>
            <li>
                <a href="action_logout.php">Logout</a>
            </li>


        </ul>
    <?php } else { ?>
        <a class="navbarGoing" href="#page-top">GOING</a>
        <ul class="navbarGoing-right">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="contact.php">Contact</a>
            </li>
            <li>
                <a href="list_events.php">Events</a>
            </li>
            <li>
                <a href="login.php">Login</a>
            </li>
            <li>
                <a href="register.php">Register</a>
            </li>
        </ul>

    <?php } ?>


</nav>
	
	        
       