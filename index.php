<?php
	$url = 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	header('Location: '.$url.'/going/databases/index.php');
	exit;
?>
Something is wrong with the Going Application :-(
