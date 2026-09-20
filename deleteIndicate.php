<?php 


    include "connect_db.php";
    
    $id_indicate = $_GET['id_indicate'];

    $sql = "DELETE FROM tb_indicate where id_indicate='$id_indicate'";
    $result = $conn->query($sql);
    if($result){
        echo"<meta http-equiv='refresh' content='0.5;url=indicate.php'>";
        
    }else{
        echo"<meta http-equiv='refresh' content='0.5;url=indicate.php'>";
    }

?>