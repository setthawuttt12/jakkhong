<?php

	include "connect_db.php";

	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];

	$sql = "SELECT * FROM tb_member WHERE username = '$username' AND role = '$role' AND password = '$password'";
	$result = $conn->query($sql);

	if($result->num_rows > 0){
		$member = $result->fetch_assoc();

		session_start();
		$_SESSION['username'] = $member['username'];
		$_SESSION['role'] = $member['role'];
        if($member['role'] == 'ฝ่ายบุคลากร'){
            echo"<meta http-equiv='refresh' content='0.5;url=staff1.php'>";
        }else{
            echo"<meta http-equiv='refresh' content='0.5;url=eva1.php'>";
        }
        
	}else{
		echo "ชื่อผู้ใช้ รหัสผ่าน หรือประเภทสมาชิกไม่ถูกต้อง";
	}

?>
