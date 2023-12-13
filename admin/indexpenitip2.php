<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM penitip");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Jumlah Peminjam</h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th>No HP</th>
                  <th>No Loker</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) :
                ?>

                  <tr>
                    <td><?= $data['id_peminjam'] ?></td>
                    <td><?= $data['nim_nidn'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['jurusan'] ?></td>
                    <td><?= $data['nohp'] ?></td>
                    <td><?= $data['no'] ?></td>
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
require_once '../layout/_bottom.php';
?>
<!-- Page Specific JS File -->
<script src="../assets/js/page/modules-datatables.js"></script>