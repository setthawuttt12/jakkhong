<?php 

    include "connect_db.php";
    
    $id_member = $_POST['id_member'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE tb_member SET fname='$fname' , lname ='$lname' , email='$email' , username='$username' , password = '$password'  WHERE id_member = '$id_member'";
    $result = $conn->query($sql);
    if($result){
        echo"<meta http-equiv='refresh' content='0.2;url=profile.php'>";
        
    }else{
        echo"<meta http-equiv='refresh' content='0.2;url=profile.php'>";
    }

?>