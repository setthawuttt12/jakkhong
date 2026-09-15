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
        echo"<meta http-equiv='refresh' content='0.5;url=index.php'>";
        
    }else{
        echo"<meta http-equiv='refresh' content='0.5;url=index.php'>";
    }


?>