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
                <div class="col-5">
                    <div class="card shadow-lg" style="border: none;">
                        <div class="card-header bg-primary"><h1 class="text-center text-white">จัดการหัวข้อการประเมิน</h1></div>
                        <div class="card-body">
                            <form action="update.php" class="was-validated" method="post">
                                <div class="row" style="justify-content: center;">
                                    <div class="col-16 mb-3">
                                        <input type="text" placeholder="ชื่อหัวข้อการประเมิน" name="name_topic" id="name_topic" class="form-control" required>
                                        <div class="invalid-feedback">กรุณากรอกชื่อหัวข้อการประเมิน</div>
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