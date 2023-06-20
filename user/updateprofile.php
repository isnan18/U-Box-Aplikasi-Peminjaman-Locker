<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id'];
$nim = $_POST['nim_nidn'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$jurusan = $_POST['jurusan'];
$kelas = $_POST['kelas'];
$password = $_POST['password'];
$status = $_POST['status'];

$query = mysqli_query($connection, "UPDATE user SET nim_nidn = '$nim', nama = '$nama', email = '$email', jurusan = '$jurusan', kelas = '$kelas', password = '$password', status = '$status'  WHERE id = '$id'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./indexprofile.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./indexprofile.php');
}
