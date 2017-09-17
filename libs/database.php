<?php
	if (!defined('IN_SITE')) die ('The request not found');
	// biến lưu trữ kết nối
	$conn = null;

	// kết nối database
	function db_connect(){
		global $conn;
		if(!$conn) {
			$server = "localhost";
			$user = "root";
			$pass = "";
			$db = "zent_group";

			$conn = new mysqli($server, $user, $pass, $db) or die("Khong the ket noi db");
			mysqli_set_charset($conn, "UTF-8");
		}
	}

	// ham ngat ket noi
	function db_close() {
		global $conn;
		if($conn){
			$conn->close();
		}
	}

	// ham lay danh sach , ket qua tra ce sanh sach cac record trong 1 mang
	function db_get_list($sql){
		db_connect();
		global $conn;
		$data = array();
		$result = $conn->query($sql);
		while($row = $result->fetcj_assoc()){
			$data[] = $row;
		}
		return $data;
	}

	// ham lay chi tiet, dung select theo ID nos tra ve 1 record
	function db_get_row($sql){
		db_connect();
		global $conn;
		$result = $conn->query($sql);
		$row = array();
		if(mysqli_num_rows($result) > 0){
			$row = $result->fetch_assoc();
		}

		return $row;
	}

	// ham thuc thi truy van
	function db_execute($sql){
		db_connect();
		global $conn;
		return $conn->query($sql);
	}
 ?>