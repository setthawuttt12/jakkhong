<?php
    session_start();
    if (
    !isset($_SESSION['username'], $_SESSION['role']) ||
    trim((string) $_SESSION['username']) === '' ||
    trim((string) $_SESSION['role']) === ''
    ) {
        header('Location: index.php');
        exit();
    }
    include "connect_db.php";
    $sql="select * from tb_member where username='$_SESSION[username]'and role='$_SESSION[role]'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $fname=$read['fname'];
    $lname=$read['lname'];
    $role=$read['role'];
    $password=$read['password'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>

    <?php include 'navbar.php'; ?>
    <?php 
        $eva = "select COUNT(*)as total_eva from tb_member where role='ผู้ประเมิน'"; 
        $evaY = "select COUNT(*)as total_y from tb_eva where status_eva='y'"; 
        $evaN = "select COUNT(*)as total_n from tb_eva where status_eva='n'"; 
        $evaCount=mysqli_query($conn,$eva);
        $evaDone=mysqli_query($conn,$evaY);
        $evaNot=mysqli_query($conn,$evaN);
        $row = mysqli_fetch_assoc($evaCount);
        $row2 = mysqli_fetch_assoc($evaDone);
        $row3 = mysqli_fetch_assoc($evaNot);
        $total_eva = $row['total_eva'];  
        $total_y = $row2['total_y'];
        $total_n = $row3['total_n'];
    
    ?>
    <div class="container">
        <h1 class="text-center mt-3 mb-3">ฝ่ายบุคลากร-Dashboard</h1>
        <div class="row">
            <div class="col-12">
                <div class="card shadow p-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow py-4">
                                <h3 class="text-center">จำนวนผู้ประเมิน</h3>
                                <h2 class="text-center"><?= $total_eva; ?></h2>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-3">
                            <div class="card shadow py-4">
                                <h3 class="text-center">ผู้ประเมินที่ประเมินไม่สำเร็จ</h3>
                                <h2 class="text-center"><?= $total_n; ?></h2>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-3">
                            <div class="card shadow py-4">
                                <h3 class="text-center">ผู้ประเมินที่ประเมินสำเร็จ</h3>
                                <h2 class="text-center"><?= $total_y; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>