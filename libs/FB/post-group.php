<?php
	require_once __DIR__ . '/vendor/autoload.php';    
	// require 'src/config.php';
	// require 'src/facebook.php';
	require 'app.php';
	// session_start();

	// $fb = new Facebook\Facebook([
	//   'app_id' => $config['App_ID'],
	//   'app_secret' => $config['App_Secret'],
	//   'default_graph_version' => 'v2.8',
	//   ]);

	$linkData = [
	  'link' => 'http://zent.edu.vn/',
	  'message' => 'Test chức năng post bài lên group bằng API \n done',
	  ];

	try {
	  // Returns a `Facebook\FacebookResponse` object
	  $response = $fb->post('/1807137576201935/feed', $linkData, $_SESSION['login_fb']['token']);

	  
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}
 ?>