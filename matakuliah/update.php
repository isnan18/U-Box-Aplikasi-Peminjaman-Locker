<?php
session_start();
require_once '../helper/connection.php';

$kodemk = $_POST['kodemk'];
$namamk = $_POST['namamk'];
$sks = $_POST['sks'];

$query = mysqli_query($connection, "UPDATE matakuliah SET nama_matkul = '$namamk', sks = '$sks' WHERE kode_matkul = '$kodemk'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
