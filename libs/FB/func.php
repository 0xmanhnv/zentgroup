<?php 
	// require_once __DIR__ . '/vendor/autoload.php';
	require_once 'app.php';
	use Facebook\FacebookRequest;
	use Facebook\FacebookSession;
	use Facebook\GraphUser;
	use Facebook\FacebookRequestException;
	// lay danh sach groups lam admin
	function get_list_group() {
		global $fb;
		$response = $fb->get('/me/groups', $_SESSION['login_fb']['token']);
		$groups = $response->getDecodedBody();
		return $groups;
	}

	function get_posts_group($idGroup) {

		global $fb;
		$requestGroupPosts = $fb->get('/'.$idGroup.'/feed' , $_SESSION['login_fb']['token']);

		$posts = $requestGroupPosts->getDecodedBody();
		return $posts;
	}

	// lay thong tin user post
	function get_info_user_post($idPost){
		global $fb;
		$request = $fb->get('/'.$idPost , $_SESSION['login_fb']['token']);
		return $request;
	}

	// dang bai vao group
	function post_to_group($idGroup, $link, $message) {
		global $fb;
		if(isset($_POST['submit'])) {
			$link = $_POST['link'];
			$message = $_POST['message'];
			$linkData = [
			  'link' => $link,
			  'message' => $message,
			  ];

			try {
			  // Returns a `Facebook\FacebookResponse` object
			  $response = $fb->post('/"'.$idGroup.'"/feed', $linkData, $_SESSION['login_fb']['token']);
			  // echo $response;

			  
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