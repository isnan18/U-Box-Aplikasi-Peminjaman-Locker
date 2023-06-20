<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM penitip WHERE id='$id'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Approve Request Penitip</h1>
    <a href="./indexpenitip.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./updatepenitip.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>ID</td>
                  <td><input class="form-control" type="number" name="id" size="20" required value="<?= $row['id'] ?>" readonly></td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td><input class="form-control" type="text" name="nama" size="20" required value="<?= $row['nama'] ?>"></td>
                </tr>
                <tr>
                  <td>Barang</td>
                  <td><input class="form-control" type="text" name="barang" size="20" required value="<?= $row['barang'] ?>"></td>
                </tr>
                <tr>
                  <td>Jumlah</td>
                  <td><input class="form-control" type="text" name="jumlah" size="20" required value="<?= $row['jumlah'] ?>"></td>
                </tr>
                <tr>
                  <td>Loker</td>
                  <td><input class="form-control" type="text" name="loker" size="20" required value="<?= $row['loker'] ?>"></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td><input class="form-control" type="text" name="status" size="20" required value="<?= $row['status'] ?>"></td>
                </tr>
                <tr>
                  <td>
                    <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
                </tr>
              </table>

            <?php } ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>