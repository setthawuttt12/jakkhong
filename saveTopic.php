<?php

    include "connect_db.php";

    $name_topic = $_POST['name_topic'];

    $sql = "INSERT INTO tb_topic(name_topic) VALUE('$name_topic')";
    $result = $conn->query($sql);

    if($result){
        echo"<meta http-equiv='refresh' content='0.5;url=topic.php'>";
        
    }else{
        echo"<meta http-equiv='refresh' content='0.5;url=topic.php'>";
    }


?>