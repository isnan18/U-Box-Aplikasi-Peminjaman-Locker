<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM info_pinjam");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Info Peminjaman</h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>Kode Pinjam</th>
                  <th>ID Peminjam</th>
                  <th>No Loker</th>
                  <th>Jam Pinjam</th>
                  <th>Jam Kembali</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) :
                ?>

                  <tr>
                    <td><?= $data['kode_pinjam'] ?></td>
                    <td><?= $data['id_peminjam'] ?></td>
                    <td><?= $data['no_loker'] ?></td>
                    <td><?= $data['jam_pinjam'] ?></td>
                    <td><?= $data['jam_kembali'] ?></td>
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