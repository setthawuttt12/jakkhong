<?php 


    include "connect_db.php";
    
    $id_topic = $_GET['id_topic'];

    $sql = "DELETE FROM tb_topic where id_topic='$id_topic'";
    $result = $conn->query($sql);
    if($result){
        echo"<meta http-equiv='refresh' content='0.5;url=topic.php'>";
        
    }else{
        echo"<meta http-equiv='refresh' content='0.5;url=topic.php'>";
    }

?>