<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "workshop_db";

    $conn = new mysqli($host,$user,$password,$db);
    if($conn->connect_error){
        die("connection failed");
    }



?>