<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';


$user = mysqli_query($connection, "SELECT COUNT(*) FROM user");
$penitip = mysqli_query($connection, "SELECT COUNT(*) FROM penitip");
$loker = mysqli_query($connection, "SELECT COUNT(*) FROM locker");


$total_user = mysqli_fetch_array($user)[0];
$total_penitip = mysqli_fetch_array($penitip)[0];
$total_loker = mysqli_fetch_array($loker)[0];


?>

<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="column">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total User</h4>
            </div>
            <div class="card-body">
              <?= $total_user ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Peminjam</h4>
            </div>
            <div class="card-body">
              <?= $total_penitip ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
          <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Loker</h4>
            </div>
            <div class="card-body">
              <?= $total_loker ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    
    <div class="row">


    </div>
  </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>