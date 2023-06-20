<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$barang = $_POST['barang'];
$jumlah = $_POST['jumlah'];
$status = $_POST['status'];
$loker = $_POST['loker'];

$query = mysqli_query($connection, "UPDATE penitip SET nama = '$nama', barang = '$barang', jumlah = '$jumlah', status='$status', loker='$loker' WHERE id = '$id'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./indexpenitip.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./indexpenitip.php');
}
