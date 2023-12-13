<?php
session_start();
if (!isset($_SESSION['email'])){
    $msg = "anda tidak berhak akses";
}else if ($_SESSION['id_admin']!=111){
    $msg = "anda tidak berhak akses";
    echo $msg;
}

$email = $_SESSION['email'];
$conn = mysqli_connect("localhost","root","","webti");
$query = "SELECT * FROM admin WHERE email= '$email' ";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
} else {
    // Pengguna tidak ditemukan, lakukan penanganan sesuai kebutuhan
}
?>
<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, <?= $email ?></div>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="../logout.php" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </li>
  </ul>
</nav>