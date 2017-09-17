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

		// chua dang nhap thi vao login
		// dang nhap roi thi chuyen toi trang index
		if(isset($_SESSION['login_fb'])) {
			if(!isset($_GET['a']) || $_GET['a'] == '') {
				$path = "modules/".$module."/".'index'.'.php';
				include_once($path);
			}
			include_once($path);
		}else {
			include_once($path);
		}
	}else {
		// truong hop url khong ton tai thi thong bao loi
		include_once('modules/common/404.php');
	}

 ?>