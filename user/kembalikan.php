<?php 
require_once '../helper/connection.php';
require_once '../layoutuser/_top.php';

$message = 'Konfirmasi pengembalian kunci loker';

$idpmj = isset($_POST['id_peminjam']) ? $_POST['id_peminjam'] : ''; // Perbaikan: inisialisasi variabel $id
$query = "SELECT * FROM penitip WHERE id_peminjam = '$idpmj' "; // Perbaikan: sesuaikan kolom yang sesuai
$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $idpmjn = $row["id_peminjam"];
    $no = $row["no"];
}

if (isset($_POST['kembalikan'])) {
$query_admin = "SELECT id_admin FROM admin WHERE email='admin@gmail.com'";
$result_admin = $connection->query($query_admin);
if ($result_admin->num_rows > 0) {
    $row_admin = $result_admin->fetch_assoc();
    $idadmin = $row_admin["id_admin"];
}

$query_pinjam = "SELECT * FROM info_pinjam WHERE id_peminjam='$idpmjn' AND no_loker='$no'";
$result_pinjam = $connection->query($query_pinjam);
if ($result_pinjam->num_rows > 0) {
    $row_pinjam = $result_pinjam->fetch_assoc();
    $kode_pinjam = $row_pinjam["kode_pinjam"];
}

$sqlCariLoker = "SELECT no FROM locker WHERE id_peminjam = '$idpmj'";
$resultCariLoker = $connection->query($sqlCariLoker);
if ($resultCariLoker->num_rows > 0) {
    $row = $resultCariLoker->fetch_assoc();
    $noLoker = $row['no'];
    $sqlSimpanLocker = "UPDATE locker SET status = 'kosong', jam_pinjam ='00:00' WHERE no = '$noLoker'";
    $resultSimpanLocker = $connection->query($sqlSimpanLocker);
    
    $sqlSimpanPeminjam = "UPDATE penitip SET no = NULL WHERE id_peminjam = '$idpmjn'";
    $resultSimpanPeminjam = $connection->query($sqlSimpanPeminjam);

    if ($resultSimpanPeminjam && $resultSimpanLocker) {
        $message = "Konfirmasi pengembalian kunci loker";
    } else {
        $message = "Terjadi kesalahan" . mysqli_error($connection);
    }
}
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
        <form action="kembalikankunci.php" method="post">
            <div class="card">
                <div class="card-header">
                    Konfirmasi Pengembalian Kunci
                </div>
                <div class="card-body">
                    <table cellpadding="8" class="w-100">
                    <tr>
                <td>Kode Pinjam</td>
                <td><input class="form-control" type="text" name="kode_pinjam" id="kode_pinjam" size="20" required readonly value="<?= $kode_pinjam ?>"></td>
              </tr>
              <tr>
                <td>Jam Kembali</td>
                <td><input class="form-control" type="text" name="jam_kembali" id="jam_kembali" size="20" required readonly value=""></td>
              </tr>
                    </table>
                    <p><?= $message ?></p> <!-- Tampilkan pesan -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="konfirmasi">Konfirmasi</button> <a class="btn btn-danger" href="index.php">Kembali</a>
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
                    document.getElementById('jam_kembali').value = formattedTime;
        </script>
        </form>
    </div>
</body>
</html>