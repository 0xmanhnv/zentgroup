<?php
	require_once __DIR__ . '/vendor/autoload.php';
	require 'app.php';
	function post_to_group($idGroup, $link, $message) {
		if(isset($_POST['submit'])) {
			$link = $_POST['link'];
			$message = $_POST['message'];
			$linkData = [
			  'link' => $link,
			  'message' => $message,
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
		}else {
			header("location: ../../admin");
		}
	}
 ?>