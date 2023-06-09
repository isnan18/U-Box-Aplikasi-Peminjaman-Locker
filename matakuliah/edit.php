<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$kodemk = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM matakuliah WHERE kode_matkul='$kodemk'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Mata Kuliah</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <input type="hidden" name="kodemk" value="<?= $row['kode_matkul'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>Kode MK</td>
                  <td><input class="form-control" type="number" name="kodemk" size="20" required value="<?= $row['kode_matkul'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Nama MK</td>
                  <td><input class="form-control" type="text" name="namamk" size="20" required value="<?= $row['nama_matkul'] ?>"></td>
                </tr>
                <tr>
                  <td>SKS</td>
                  <td><input class="form-control" type="text" name="sks" size="20" required value="<?= $row['sks'] ?>"></td>
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