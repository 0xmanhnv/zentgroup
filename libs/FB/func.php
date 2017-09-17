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
		// $requestGroupPosts = $fb->get('/'.$idGroup.'/feed' , $_SESSION['login_fb']['token']);

		// '/{group-id}/files'
		// $posts = $requestGroupPosts->getDecodedBody();
		// return $requestGroupPosts;
	}

	// lay thong tin user post
	function get_info_user_post($idPost){
		global $fb;
		$request = $fb->get('/'.$idPost , $_SESSION['login_fb']['token']);
		return $request;
	}
?>