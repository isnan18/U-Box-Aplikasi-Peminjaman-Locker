<?php
require_once '../layoutuser/_top.php';
require_once '../helper/connection.php';

$query_admin = "SELECT id_admin FROM admin WHERE email='admin@gmail.com'";
$result_admin = $connection->query($query_admin);

if ($result_admin->num_rows > 0) {
  $row_admin = $result_admin->fetch_assoc();
  $idadmin = $row_admin["id_admin"];
}
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ajukan Peminjaman Baru</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="store.php" method="POST">
            <table cellpadding="8" class="w-100">
            <tr>
                <td hidden>ID</td>
                <td><input class="form-control" type="hidden" name="id_peminjam" size="20" required value="<?= rand(); ?>"></td>
              </tr>
              <tr>
                <td>NIM</td>
                <td><input class="form-control" type="text" name="nim_nidn" size="20" required readonly value="<?= $nim_nidn ?>"></td>
              </tr>
              <tr>
                <td>Nama</td>
                <td><input class="form-control" type="text" name="nama" size="20" required readonly value="<?= $nama ?>"></td>
              </tr>
              <tr>
                <td>Jurusan</td>
                <td><input class="form-control" type="text" name="jurusan" size="20" required readonly value="<?= $jurusan ?>"></td>
              </tr>
              <tr>
                <td>No HP</td>
                <td><input class="form-control" type="text" name="nohp" size="20" required readonly value="<?= $nohp ?>"></td>
              </tr>
              <tr>
                <td hidden>ID Admin</td>
                <td><input class="form-control" type="text" name="id_admin" size="20" required hidden value="<?= $idadmin ?>"></td>
              </tr>
              <tr>
                <td>
                  <input class="btn btn-primary" type="submit" name="proses" value="Pinjam">
              </tr>
              
            </table>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layoutuser/_bottom.php';
?>