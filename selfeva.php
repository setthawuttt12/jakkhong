<?php
    session_start();
    if (
        !isset($_SESSION['username'], $_SESSION['role']) ||
        trim((string) $_SESSION['username']) === '' ||
        trim((string) $_SESSION['role']) === ''
    ) {
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
  <title>ประเมินตนเอง</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
<script src="hjs/bootstrap.bundle.min.js"></script></script>

  
</head>
<body>
<?php include "navbar.php";?>

  
    <div class="container-fluid">
        <div class="row mt-3" style="justify-content: center;">
            <div class="col-12" style="display: flex; justify-content: center;">
                <div class="col-11">
                    <div class="card shadow-lg mt-3" style="border: none;">
                        <div class="row" class="">
                            <center>
                                <form action="saveEva.php" method="post">
                                    <div class="card-header bg-secondary"><h1 class="text-center text-white">ประเมินตนเอง</h1></div>
                                    <div class="card-body">
                                        <?php 
                                            $topics = "SELECT * FROM tb_topic";
                                            $t = $conn->query($topics);
                                            $n = 0;
                                            foreach($t as $rows){
                                                $n++;
                                                $indicate = "SELECT * FROM tb_indicate WHERE id_topic = '".$rows['id_topic']."' ORDER BY id_indicate";
                                                $i = $conn->query($indicate);
                                                $m = 0;
                                        ?>
                                        <h1 class="text-start"><?php echo $n.'.'.$rows['name_topic']; ?></h1>
                                        <?php foreach($i as $rows2){
                                            $m++;
                                        ?>
                                        <h5 class="px-2 text-start"><?php echo $m.'.'.$rows2['name_indicate']; ?></h5>
                                        <div class="d-flex gap-4 px-4 mb-3">
                                            <select class="form-select" name="score_member[<?php echo $rows2['id_indicate']; ?>]" id="score_<?php echo $rows2['id_indicate']; ?>" required>

                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>

                                            </select>
                                        </div>
                                        <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <div class="card-footer bg-secondary">
                                        <center><button type="submit" class="btn btn-primary text-center">ยืนยันผล</button></center>
                                    </div>
                                </form>
                                
                                    
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