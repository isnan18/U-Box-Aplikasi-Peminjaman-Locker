<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM loker WHERE no='$id'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Keterangan Loker</h1>
    <a href="./indexloker.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./updateloker.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <input type="hidden" name="no" value="<?= $row['no'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>Loker</td>
                  <td><input class="form-control" type="number" name="no" size="20" required value="<?= $row['no'] ?>" readonly></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td><input class="form-control" type="text" name="status" size="20" value="<?= $row['status'] ?>"></td>
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