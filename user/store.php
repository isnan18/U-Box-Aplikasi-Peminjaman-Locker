<?php
require_once '../helper/connection.php';
require_once '../layoutuser/_top.php';

$message = 'Berhasil menjadi peminjam'; // Inisialisasi pesan
$alert = 'Anda sudah pinjam kunci!!';

if (isset($_POST['proses'])) {
    $id = $_POST['id_peminjam'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $nohp = $_POST['nohp'];
    $nim_nidn = $_POST['nim_nidn'];
    $id_admin = $_POST['id_admin'];

    $sqlCariLoker = "SELECT no FROM locker WHERE status = 'kosong' LIMIT 1";
    $resultCariLoker = $connection->query($sqlCariLoker);

  $query = mysqli_query($connection, "INSERT INTO penitip(id_peminjam, nama, jurusan, nohp, nim_nidn, id_admin) VALUES ('$id','$nama', '$jurusan', '$nohp', '$nim_nidn', '$id_admin')");
    
    if ($query) {
        $message = "Berhasil menjaadi peminjam";
    } else {
        $message = "Terjadi kesalahan" . mysqli_error($connection);
    } 
}

$id = isset($_POST['id_peminjam']) ? $_POST['id_peminjam'] : ''; // Perbaikan: inisialisasi variabel $id
$query = "SELECT * FROM penitip WHERE id_peminjam = '$id' "; // Perbaikan: sesuaikan kolom yang sesuai
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $id = $row["id_peminjam"];
    $nim_nidn = $row['nim_nidn'];
    $nama = $row['nama'];
    $jurusan = $row['jurusan'];
    $nohp = $row['nohp'];
    $id_admin = $row['id_admin'];
} else {
    // Pengguna tidak ditemukan, lakukan penanganan sesuai kebutuhan
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="storebarang.php" method="post">
            <div class="card">
                <div class="card-header">
                    Konfirmasi Peminjaman Kunci
                </div>
                <div class="card-body">
                    <table cellpadding="8" class="w-100">
                    <tr>
              <tr>
                <td>Kode Peminjaman</td>
                <td><input class="form-control" type="number" name="kode_peminjaman" id="kode_peminjaman" size="20" required readonly value="<?= rand(); ?>"></td>
              </tr>
              <tr>
                <td>Jam Pinjam</td>
                <td><input class="form-control" type="text" name="jam_pinjam" id="jam_pinjam" size="20" required readonly value=""></td>
              </tr>
                    </table>
                    <p><?= $message ?></p> <!-- Tampilkan pesan -->
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
        </form>
    </div>
</body>
</html>
