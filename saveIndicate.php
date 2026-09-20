<?php

    include "connect_db.php";

    $id_topic = $_POST['id_topic'];
    $name_indicate = $_POST['name_indicate'];

    $sql = "INSERT INTO tb_indicate(id_topic,name_indicate) VALUE('$id_topic','$name_indicate')";
    $result = $conn->query($sql);

    if($result){
        echo"<meta http-equiv='refresh' content='0.5;url=indicate.php'>";
        
    }else{
        echo"<meta http-equiv='refresh' content='0.5;url=indicate.php'>";
    }


?>