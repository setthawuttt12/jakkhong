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
  <title>จัดการหัวข้อการประเมิน</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
<script src="hjs/bootstrap.bundle.min.js"></script></script>

  
</head>
<body>
<?php include "navbar.php";?>

  
    <div class="container-fluid">
        <div class="row mt-3" style="justify-content: center;">
            <div class="col-12" style="display: flex; justify-content: center;">
                <div class="col-8">
                    <div class="card shadow-lg" style="border: none;">
                        <div class="card-header bg-secondary"><h1 class="text-center text-white">จัดการตัวชี้วัด</h1></div>
                        <div class="card-body">
                            <form action="saveIndicate.php" class="was-validated" method="post">
                                <div class="row" style="justify-content: center;">
                                    <div class="col-6 mb-3">
                                        <select class="form-select" name="id_topic" id="">
                                            <?php 
                                            
                                                include "connect_db.php";
                                                $sql = "select * from tb_topic order by id_topic desc";
                                                $result = $conn->query($sql);
                                                
                                                foreach($result as $row){
                                                
                                            
                                            ?>
                                            
                                                <option value="<?php echo $row['id_topic']; ?>"><?php echo $row['name_topic']; ?></option>
                                            
                                            
                                            <?php } ?>
                                        </select>
                                        <div class="invalid-feedback">กรุณาเลือกหัวข้อการประเมิน</div>
                                    </div>
                                    <div class="col-6">
                                        <input type="text" placeholder="ชื่อตัวชี้วัด" name="name_indicate" id="name_indicate" class="form-control" required>
                                        <div class="invalid-feedback">กรุณากรอกชื่อตัวชี้วัด</div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <center>
                                            <button type="submit" class="btn btn-primary text-center text-white" onClick="confirm('ต้องการดำเนินการใช่หรือไม่')"> บันทึก</button>
                                            <button type="reset" class="btn btn-danger text-center text-white"> ยกเลิก</button>
                                        </center>
                                        
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow-lg mt-3" style="border: none;">
                        <div class="row" class="">
                            <center>
                                <div class="col-11">
                                    <table class="table mt-3 table-hover">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th class="text-center">ลำดับ</th>
                                                <th class="text-center">ชื่อหัวข้อการประเมิน</th>
                                                <th class="text-center">ชื่อตัวชี้วัด</th>
                                                <th class="text-center">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <?php 
                                        
                                            include "connect_db.php";
                                            $sql = "select * from tb_topic,tb_indicate where tb_topic.id_topic = tb_indicate.id_topic order by id_indicate desc";
                                            $result = $conn->query($sql);
                                            $n = 0;
                                            $total_indicate = $result->num_rows;
                                        ?>
                                        <tbody>
                                            <?php if($total_indicate > 0){ ?>
                                                <?php foreach($result as $row){
                                                    $n++;
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $n; ?></td>
                                                    <td class="text-center"><?php echo $row['name_topic']; ?></td>
                                                    <td class="text-center"><?php echo $row['name_indicate']; ?></td>
                                                    <td class="text-center">
                                                        <a href="deleteIndicate.php?id_indicate=<?php echo $row['id_indicate']; ?>" class="text-center btn btn-danger text-white ms-2 mb-2" onclick="alert('ต้องการลบข้อมูลชุดนี้ใช่หรือไม่')">ลบ</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            <?php }else{ ?>
                                                <tr>
                                                    <td class="text-center text-danger" colspan="4">ไม่มีข้อมูล</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
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