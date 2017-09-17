<?php 
	include_once('../libs/FB/func.php');
	if(isset($_POST['submit'])){
		$idGroup = $_POST['idgroup'];
		$link = $_POST['link'];
		$message = $_POST['message'];

		post_to_group($idGroup, $link, $message);
		echo "ok";
	}
?>