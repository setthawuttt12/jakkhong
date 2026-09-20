<?php

    include "connect_db.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "INSERT INTO tb_member(fname,lname,email,username,password,role) VALUE('$fname','$lname','$email','$username','$password','$role')";
    $result = $conn->query($sql);

    if($result){
        $id_member = $conn->insert_id;

        if($role == 'ผู้ประเมิน'){
            $sql2 = "INSERT INTO tb_eva(id_member,status_eva,total) VALUE($id_member,'n',0)";
            $conn->query($sql2);
        }

        echo"<meta http-equiv='refresh' content='0.5;url=index.php'>";
        
    }else{
        echo"<meta http-equiv='refresh' content='0.5;url=index.php'>";
    }


?>