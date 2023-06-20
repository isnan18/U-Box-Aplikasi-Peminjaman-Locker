<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Penitip</h1>
    <a href="./index2.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./storepenitip.php" method="POST">
            <table cellpadding="8" class="w-100">

              <tr>
                <td>Nama</td>
                <td><input class="form-control" type="text" name="nama" size="20" required></td>
              </tr>
              <tr>
                <td>Barang</td>
                <td><input class="form-control" type="text" name="barang" size="20" required></td>
              </tr>
              <tr>
                <td>Jumlah</td>
                <td><input class="form-control" type="text" name="jumlah" size="20" required></td>
              </tr>
              <tr>
                <td>Loker</td>
                <td><input class="form-control" type="text" name="loker" size="20" required></td>
              </tr>
              <tr>
                <td>Status</td>
                <td><input class="form-control" type="text" name="status" size="20" required></td>
              </tr>
              
              <tr>
                <td>
                  <input class="btn btn-primary" type="submit" name="proses" value="Tambah">
                  <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan"></td>
              </tr>

            </table>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>