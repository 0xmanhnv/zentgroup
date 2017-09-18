<?php require_once 'app.php';

	function get_user_access_token() {
		global $fbData;
		global $fb;

		// quyen truy cap user cua fb
		$params = array('req_perms' => 'manage_pages,user_posts, publish_pages, public_profile, user_managed_groups, publish_actions, email,user_likes, user_actions.news, user_friends,user_posts'
		);

		$helper = $fb->getRedirectLoginHelper();
		$loginUrl = $helper->getLoginUrl('http://localhost/zentgroup/libs/FB/callback.php', $params);
		 
		 // echo $loginUrl;
		header('Location: '. $loginUrl);
		exit;
	}
?>