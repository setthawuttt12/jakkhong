<?php
    session_start();
    if($_SESSION["username"] =="" && $_SESSION["role"==""]){
        header("Location:login.php");
        exit();
    }
    unset($_SESSION["username"]);
    unset($_SESSION["role"]);
    header("Location: index.php");
?>