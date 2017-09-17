<?php 
	// ham thiet lap la da dang nhap
	function set_logged($username, $level){
		session_set('user_token', array(
			'username' => $username,
			'level' => $level
		));
	}

	// ham dang xuat
	function set_logout() {
		session_delete('user_token');
	}

	// ham kiem tra trang thai nguoi dung dang nhap chua
	function is_logged(){
		
	}
?>