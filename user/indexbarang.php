<?php
require_once '../layoutuser/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM penitip WHERE  nama= '$nama' ");

?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List Barang</h1>
    <a href="./createbarang.php" class="btn btn-primary">Tambah Data</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Barang</th>
                  <th>Jumlah</th>
                  <th>Loker</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) :
                ?>

                  <tr>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['barang'] ?></td>
                    <td><?= $data['jumlah'] ?></td>
                    <td><?= $data['loker'] ?></td>
                    <td><?= $data['status'] ?></td>
                  </tr>

                <?php
                endwhile;
                ?>
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