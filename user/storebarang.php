<?php
session_start();
require_once '../helper/connection.php';

if (isset($_POST['proses'])){


$nama = $_POST['nama'];
$barang = $_POST['barang'];
$jumlah = $_POST['jumlah'];
$status = $_POST['status'];
$loker = $_POST['loker'];

$query = mysqli_query($connection, "insert into penitip(id, nama, barang, jumlah, status, loker) value('','$nama', '$barang', '$jumlah', '$status', '$loker')");
if ($query== 'true') {
    $message = "Data berhasil diinput.";
} else {
    $message = "Terjadi kesalahan" . mysqli_error($conn);
} 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="viewport" content="widht=device-widht, initial-scale=1.0">
    <title>Aksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Informasi
            </div>
            <div class="card-body">
                <p> Berhasil mengajukan request </p>
            </div>
            <div class="card-footer">
                <a href="indexbarang.php"><button type="submit" class="btn btn-primary" name="submit">Cek Request</button></a>
            </div>
        </div>
    </div>
</body>
</html>