<?php
require_once '../helper/connection.php';
require_once '../layoutuser/_top.php';

if (isset($_POST['konfirmasi'])){
    $jam_kembali = $_POST['jam_kembali'];
    $kodepmj = isset($_POST['kode_pinjam']) ? $_POST['kode_pinjam'] : ''; 

    $query = "SELECT * FROM info_pinjam WHERE kode_pinjam = '$kodepmj' ";
    $result = mysqli_query($connection, $query);    
    if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $code = $row["kode_pinjam"];
    $idpmj = $row["id_peminjam"];

    $simpanlaporan = "UPDATE info_pinjam SET jam_kembali = '$jam_kembali' WHERE kode_pinjam = '$code' AND id_peminjam = '$idpmj'";
    $resultlaporan = $connection->query($simpanlaporan);
    if ($resultlaporan) {
        $message = "Berhasil mengembalikan Kunci Loker";
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
                    </table>
                    <p><?= $message ?></p> <!-- Tampilkan pesan -->
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary" href="pinjamlagi.php">Pinjam Kunci Lagi</a> <a class="btn btn-danger" href="index.php">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>