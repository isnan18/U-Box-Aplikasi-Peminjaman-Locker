<?php
require_once '../layoutuser/_top.php';
require_once '../helper/connection.php';

?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Edit Profile</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./updateprofile.php" method="post">
              <input type="hidden" name="nim_nidn" value="<?= $row['nim_nidn'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>NIM/NIDN</td>
                  <td><input class="form-control" type="number" name="nim_nidn" size="20" required value="<?= $nim_nidn ?>" readonly></td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td><input class="form-control" type="text" name="nama" size="20" required value="<?= $nama ?>"></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td><input class="form-control" type="text" name="email" size="20" required value="<?= $email ?>"></td>
                </tr>
                <tr>
                  <td>Jurusan</td>
                  <td><input class="form-control" type="text" name="jurusan" size="20" required value="<?= $jurusan ?>"></td>
                </tr>
                <tr>
                  <td>Kelas</td>
                  <td><input class="form-control" type="text" name="kelas" size="20" required value="<?= $kelas ?>"></td>
                </tr>
                <tr>
                  <td>No HP</td>
                  <td><input class="form-control" type="text" name="nohp" size="20" required value="<?= $nohp ?>"></td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td><input class="form-control" type="password" name="password" size="20" required value="<?= $password ?>"></td>
                </tr>
                <tr>
                  <td>
                    <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
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