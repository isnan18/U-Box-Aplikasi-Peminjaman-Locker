<?php
require_once '../helper/connection.php';
require_once '../layoutuser/_top.php';

$result = mysqli_query($connection, "SELECT * FROM penitip WHERE nim_nidn = '$nim_nidn' ");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_peminjam = $row["id_peminjam"];
    $nama = $row["nama"];
    $jurusan = $row["jurusan"];
    $nohp = $row["nohp"];
}

?>
<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ajukan Peminjaman</h1>
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
                <td>Jam Pinjam</td>
                <td><input class="form-control" type="text" name="jam_pinjam" id="jam_pinjam" size="20" required readonly value=""></td>
              </tr>
              </table> <!-- Tampilkan pesan -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="cari">Cari nomor</button> <a class="btn btn-danger" href="index.php">Kembali</a>
                </div>
            </div>
            <script>
                    // Mendapatkan waktu sistem
                    var now = new Date();

                    // Mendapatkan jam dan menit
                    var hours = now.getHours();
                    var minutes = now.getMinutes();

                    // Format jam dan menit ke dalam format "hh:mm"
                    var formattedTime = (hours < 10 ? '0' : '') + hours + ':' + (minutes < 10 ? '0' : '') + minutes;

                    // Mengatur nilai default pada input jam
                    document.getElementById('jam_pinjam').value = formattedTime;
        </script>
              
            </table>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layoutuser/_bottom.php';
?>