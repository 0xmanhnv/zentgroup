<?php 
	require 'app.php';
	// use Facebook\Authentication\AccessToken;

	$token = $fb->destroySession();
	$url = 'https://www.facebook.com/logout.php?next=' . 'http://localhost/zentgroup/' .
	  '&access_token='.$token;
	session_destroy();
	header('Location: '.$url);
?>