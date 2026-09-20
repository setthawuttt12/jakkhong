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
  <title>แก้ไขข้อมูลส่วนตัว</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
<script src="hjs/bootstrap.bundle.min.js"></script></script>

  
</head>
<body>
<?php include "navbar.php";?>

  
    <div class="container-fluid">
        <div class="row mt-3" style="justify-content: center;">
            <div class="col-12" style="display: flex; justify-content: center;">
                <div class="col-5">
                    <div class="card shadow-lg" style="border: none;">
                        <div class="card-header bg-secondary"><h1 class="text-center text-white">แก้ไขข้อมูลส่วนตัว</h1></div>
                        <div class="card-body">
                            <form action="update.php" class="was-validated" method="post">
                                <div class="row" style="justify-content: center;">
                                    <div class="col-6 mb-3">
                                        <input type="text" placeholder="ชื่อ" name="fname" id="fname" class="form-control" value="<?php echo $fname; ?>" required>
                                        <div class="invalid-feedback">กรุณากรอกชื่อ</div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <input type="text" placeholder="นามสกุล" name="lname" id="lname" class="form-control" value="<?php echo $lname ?>" required>
                                        <div class="invalid-feedback">กรุณากรอกนามสกุล</div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" placeholder="ชื่อผู้ใช้" name="username" id="username" class="form-control" value="<?php echo $username ?>" required>
                                        <div class="invalid-feedback">กรุณากรอกชื่อผู้ใช้</div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" placeholder="อีเมล" name="email" id="email" class="form-control" value="<?php echo $email; ?>" required>
                                        <div class="invalid-feedback">กรุณากรอกอีเมล</div>
                                    </div>
                                    <div class="col-12 mb-3" >
                                        <div class="input-group">
                                            <input type="password" placeholder="รหัสผ่าน" name="password" id="password" class="form-control" value="<?php echo $password; ?>" required>
                                            <button type="button" class="btn btn-outline-secondary" id="toggle" aria-label="แสดงรหัสผ่าน">แสดง</button>
                                        </div>
                                        <div class="invalid-feedback">กรุณากรอกรหัสผ่าน</div>
                                    </div>
                                    <input type="hidden" name="id_member" value="<?php echo $id_member; ?>">
                                    <div class="col-12 mb-3">
                                        <center>
                                            <button type="submit" class="btn btn-primary text-center text-white" onClick="confirm('ต้องการแก้ไขข้อมูลส่วนตัวใช่หรือไม่')"> อัปเดต</button>
                                            <button type="reset" class="btn btn-danger text-center text-white"> ยกเลิก</button>
                                        </center>
                                        
                                    </div>

                                </div>
                            </form>
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