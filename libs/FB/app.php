<?php 
	require_once 'vendor/autoload.php';
	require_once $_SERVER["DOCUMENT_ROOT"].'/zentgroup/libs/session.php';
	use Facebook\FacebookRequest; 
	use Facebook\GraphObject;
	use Facebook\GraphUser;


	// khai bao nhung thu can thiet cua fb
	$fbData = array(
	    'app_id' => '116644735712600',
	    'app_secret' => 'c568b9cbac486e0f8cad6d22719c3bcd',
	    // 'profile_id' => '{PAGE ID}',
	    'default_graph_version' => 'v2.5',
	);
	$fb = new Facebook\Facebook($fbData);
?>