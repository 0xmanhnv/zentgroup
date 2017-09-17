<?php
	function get_list_group() {
		require_once 'app.php';
		$response = $fb->get('/me/groups', $_SESSION['login_fb']['token']);
		$groups = $response->getDecodedBody();
		return $groups;
	}
 ?>