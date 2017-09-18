<?php 
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
		$requestGroupPosts = $fb->get('/'.$idGroup.'/feed?limit=25' , $_SESSION['login_fb']['token']);

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

		$messageData = [
		  'link' => $link,
		  'message' => $message,
		  ];
		try {
		  // Returns a `Facebook\FacebookResponse` object
		  $response = $fb->post('/'.$idGroup.'/feed', $messageData, $_SESSION['login_fb']['token']);

		  
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}
	}

	// lay so luong like
	function get_reactions($idObject){
		global $fb;

		$request = (array) $fb->get('/'.$idObject.'/reactions' , $_SESSION['login_fb']['token'])->getDecodedBody();
		
		$reactions = $request;
		return $reactions;
	}

	// lay comment
	function get_comments($idObject){
		global $fb;

		$request = $fb->get('/'.$idObject.'/comments' , $_SESSION['login_fb']['token']);
		$comments = $request->getDecodedBody();

		return $comments;
	}

	// lay thong tin nguoi post
	function getInfoUserPost($idPost){
		global $fb;
		$info = $fb->get('/'.$idPost.'/?fields=from,picture,permalink_url' , $_SESSION['login_fb']['token'])->getDecodedBody();

		return $info;
	}
?>