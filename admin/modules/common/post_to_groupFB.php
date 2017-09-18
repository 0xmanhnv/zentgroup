<?php 
	include_once('../libs/FB/func.php');

	if(isset($_POST['submit'])){
		$idGroup = $_POST['idgroup'];
		// $link = $_POST['link'];
		$link = "";
		$message = $_POST['message'];

		post_to_group($idGroup, $link, $message);
		setcookie("msg", "Đã đăng thành công!", time() + 2, "/");
		header("location: ../admin/?m=common&a=groupFB");
	}
?>