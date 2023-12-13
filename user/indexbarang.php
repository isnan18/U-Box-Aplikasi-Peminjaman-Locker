<?php
require_once '../layoutuser/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM penitip WHERE no > '0' AND nim_nidn = '$nim_nidn' ");

?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Data Peminjaman Mandiri</h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <form action="kembalikan.php" method="post">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>#</th>
                  <th hidden>ID</th>
                  <th>Nama</th>
                  <th>No Loker</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) :
                ?>
                  <tr>
                    <td><input class="form-control" type="text" name="id_peminjam" size="20" required hidden value= "<?= $data['id_peminjam'] ?>"></td>   
                    <td><input class="form-control" type="text" name="nama" size="20" required readonly value= "<?= $data['nama'] ?>"></td>
                    <td><input class="form-control" type="number" name="no" size="20" required readonly value="<?= $data['no'] ?>"></td>
                    <td> <input class="btn btn-danger" type="submit" name="kembalikan" value="Kembalikan"></td>
                  </tr>

                <?php
                endwhile;
                ?>
              </tbody>
            </table>
            </form>
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