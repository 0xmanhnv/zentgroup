<?php
	// dinh nghia hang so bao ve project
	define("IN_SITE", true);

	// lay module va action
	$module = isset($_GET['m']) ? $_GET['m'] : "";
	$action = isset($_GET['a']) ? $_GET['a'] : "";

	// truong hop nguoi dung khong truyen module va action
	// thi ta lay module mac dinh la common
	// va action mac dinh la login
	if(empty($module) || empty($action)) {
		$module = "common";
		$action = "login";
	}

	// tao duong dan luu vao bien $path
	$path = "modules/".$module."/".$action.'.php';

	// truong hop url chay dung
	if(file_exists($path)){
		include_once('../libs/session.php');
		include_once('../libs/database.php');
		include_once('../libs/role.php');
		include_once('../libs/helper.php');
		include_once('../libs/FB/login.php');
		include_once($path);
		if(isset($_SESSION['login_fb'])) {

			include_once('../libs/FB/func.php');

			$a = get_list_group();
			// $a['data']
			// foreach ($a['data'] as $key => $value) {
			// 	echo "<pre>";
			//     print_r($value['id']);
			//     echo "</pre>";
			//     $post = get_posts_group($value['id']);
			//     echo "<pre>";
			//     print_r($post);
			//     echo "</pre>";
			// }
			db_connect();

		    $post = get_posts_group(1807137576201935);
		    // echo "<pre>";
		    // print_r($post['data']);
		    // echo "</pre>";

		    // foreach ($post['data'] as $key => $value) {
		    // 	if(isset($value['message'])){
		    // 		$sql = "INSERT INTO group_post (id, id_group, content_post) VALUES ('".$value['id']."', '236617253512342', '".$value['message']."')";
			   //  	$conn->query($sql);
		    // 	}
		    // }

			// echo "<pre>";
		 //    print_r($a['data'][0]['id']);
		 //    echo "</pre>";

		}
		echo "<pre>";
		    print_r($_SESSION);
		    echo "</pre>";
	}else {
		// truong hop url khong ton tai thi thong bao loi
		include_once('modules/common/404.php');
	}

 ?>