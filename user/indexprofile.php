<?php
require_once '../layoutuser/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM user WHERE  email= '$email' ");

?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>My Profile</h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>NIM/NIDN</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Jurusan</th>
                  <th>Kelas</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                    <td><?= $nim_nidn ?></td>
                    <td><?= $nama ?></td>
                    <td><?= $email ?></td>
                    <td><?= $jurusan ?></td>
                    <td><?= $kelas ?></td>
                    <td hidden><?= $password ?></td>
                    <td>
                    <a class="btn btn-sm btn-info" href="editprofile.php?id=<?= $nim_nidn ?>">
                        <i class="fas fa-edit fa-fw"></i>
                      </a>
                    </td>
                  </tr>


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layoutuser/_bottom.php';
?>
<!-- Page Specific JS File -->
<?php
if (isset($_SESSION['info'])) :
  if ($_SESSION['info']['status'] == 'success') {
?>
    <script>
      iziToast.success({
        title: 'Sukses',
        message: `<?= $_SESSION['info']['message'] ?>`,
        position: 'topCenter',
        timeout: 5000
      });
    </script>
  <?php
  } else {
  ?>
    <script>
      iziToast.error({
        title: 'Gagal',
        message: `<?= $_SESSION['info']['message'] ?>`,
        timeout: 5000,
        position: 'topCenter'
      });
    </script>
<?php
  }

  unset($_SESSION['info']);
  $_SESSION['info'] = null;
endif;
?>
<script src="../assets/js/page/modules-datatables.js"></script>