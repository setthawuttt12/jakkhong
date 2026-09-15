
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="staff1.php">หน้าแรก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">แก้ไขข้อมูลส่วนตัว</a>
        </li>
        <?php if($role=="ฝ่ายบุคลากร"){ ?>
        <li class="nav-item">
          <a class="nav-link" href="topic.php">หัวข้อการประเมิน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="indicate.php">ตัวชี้วัด</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="score_member.php">ผลสรุปการประเมินของผู้ประเมิน</a>
        </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" onclick="return confirm('ต้องการออกจากระบบหรือไม่')">ออกจากระบบ</a>
        </li>    
      </ul>
    </div>
     <h1 class="text-light nav-link m-2"><?php echo "$fname  $lname"; ?></h1>
      <br><br>
     <h1 class="text-light nav-link m-2">ตำแหน่ง:<?php echo "$role"; ?></h1>
  </div>
</nav>
