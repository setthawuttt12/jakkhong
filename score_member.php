<?php
    session_start();
    if($_SESSION["username"] =="" && $_SESSION["role"==""]){
        header("Location:index.php");
        exit();
    }
    include "connect_db.php";
    $sql="select * from tb_member where username='$_SESSION[username]'and role='$_SESSION[role]'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $fname=$read['fname'];
    $lname=$read['lname'];
    $role=$read['role'];
    $username=$read['username'];
    $email=$read['email'];
    $password=$read['password'];
    $id_member=$read['id_member'];

?>

<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <title>ผลสรุปคะแนนของผู้ประเมิน</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
<script src="hjs/bootstrap.bundle.min.js"></script></script>

  
</head>
<body>
<?php include "navbar.php";?>

  
    <div class="container-fluid">
        <div class="row mt-3" style="justify-content: center;">
            <div class="col-12" style="display: flex; justify-content: center;">
                <div class="col-8">
                    <div class="card shadow-lg mt-3" style="border: none;">
                        <div class="row" class="">
                            <center>
                                <div class="card-header bg-secondary"><h1 class="text-center text-white">ผลสรุปคะแนนของผู้ประเมิน</h1></div>
                                <div class="col-11">
                                    <table class="table mt-3 table-hover">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th class="text-center">ลำดับ</th>
                                                <th class="text-center">ชื่อผู้ประเมิน</th>
                                                <th class="text-center">อีเมล</th>
                                                <th class="text-center">คะแนนที่ได้</th>
                                                <th class="text-center">สถานะ</th>
                                            </tr>
                                        </thead>
                                        <?php 
                                        
                                            include "connect_db.php";
                                            $sql = "SELECT * FROM tb_member m , tb_eva e WHERE m.id_member = e.id_member";
                                            $result = $conn->query($sql);
                                            $n = 0;
                                            
                                            if($result->num_rows > 0){ 
                                            foreach($result as $row){
                                                $n++;
                                                $total_score = $row['total'];
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td class="text-center"><?php echo $n; ?></td>
                                                <td class="text-center"><?php echo $row['fname'].' '.$row['lname']; ?></td>
                                                <td class="text-center"><?php echo $row['email']; ?></td>
                                                <td class="text-center"><?php echo $total_score; ?></td>
                                                <td class="text-center"><?php echo $row['status_eva'] === 'y' ? 'ประเมินแล้ว' : 'ยังไม่ประเมิน'; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <?php }else{ ?>
                                        <tr>
                                            <td class="text-center text-danger" colspan="5">ไม่มีข้อมูล</td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </center>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        const password = document.getElementById('password');
        const toggle = document.getElementById('toggle');

        toggle.addEventListener('click', () => {
            const hidden = password.type === 'password';
            password.type = hidden ? 'text' : 'password';
            toggle.textContent = hidden ? 'ซ่อน' : 'แสดง';
            toggle.setAttribute(
                'aria-label',
                hidden ? 'ซ่อนรหัสผ่าน' : 'แสดงรหัสผ่าน'
            );
        });


    </script>

    

</body>
</html>