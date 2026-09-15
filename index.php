<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body style="background-color: rgb(53, 53, 167);">

    <div class="container-fluid">
        <div class="row mt-3" style="justify-content: center;">
            <div class="col-12" style="display: flex; justify-content: center;">
                <div class="col-5">
                    <div class="card shadow-lg" style="border: none;">
                        <div class="card-header bg-primary"><h1 class="text-center text-white">ระบบประเมิน <br> (Evaluation System)</h1></div>
                        <div class="card-body">
                            <form action="login.php" class="was-validated" method="post">
                                <div class="row" style="justify-content: center;">
                                    <div class="col-12 mb-3">
                                        <input type="text" placeholder="ชื่อผู้ใช้" name="username" id="username" class="form-control" required>
                                        <div class="invalid-feedback">กรุณากรอกชื่อผู้ใช้</div>
                                    </div>
                                    <div class="col-12 mb-3" >
                                        <div class="input-group">
                                            <input type="password" placeholder="รหัสผ่าน" name="password" id="password" class="form-control" required>
                                            <button type="button" class="btn btn-outline-secondary" id="toggle" aria-label="แสดงรหัสผ่าน">แสดง</button>
                                        </div>
                                        <div class="invalid-feedback">กรุณากรอกรหัสผ่าน</div>
                                    </div>
                                    <div class="col-12 mb-3" >
                                        <select name="role" id="role" class="form-select" required>
                                            <option value="">เลือกประเภทสมาชิก</option>
                                            <option value="ผู้ประเมิน">ผู้ประเมิน</option>
                                            <option value="ฝ่ายบุคลากร">ฝ่ายบุคลากร</option>
                                        </select>
                                        <div class="invalid-feedback">กรุณาเลือกประเภทสมาชิก</div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <center>
                                            <button type="submit" class="btn btn-primary text-center text-white"> เข้าสู่ระบบ</button>
                                            <button type="reset" class="btn btn-danger text-center text-white"> ยกเลิก</button>
                                        </center>
                                        
                                    </div>
                                </div>
                            </form>
                            <p align="center"><a href="regis.php" class="text-blue " style="text-decoration: none;">หากไม่มีบัญชี? สมัครสมาชิก</a></p>
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