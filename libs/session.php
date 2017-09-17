<?php 
	session_start();
	// gan session (SET)
	function session_set($key, $val){
		$_SESSION[$key] = $val;
	}

	// lay session (GET)
	function session_get($key){
		return (isset($_SESSION[$key])) ? $_SESSION[$key] : false;
	}

	// xoas session (DELETE)
	function session_delete($key){
		if(isset($_SESSION[$key])){
			unset($_SESSION[$key]);
		}
	}
?>