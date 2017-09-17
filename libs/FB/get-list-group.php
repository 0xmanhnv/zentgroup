<?php
	function get_list_group() {
		require_once 'app.php';
		$response = $fb->get('/me/groups', $_SESSION['login_fb']['token']);
		$groups = $response->getDecodedBody();
		return $groups;
	}
	$a = get_list_group();
	echo "<pre>";
    print_r($a['data']);
    echo "</pre>";
 ?>