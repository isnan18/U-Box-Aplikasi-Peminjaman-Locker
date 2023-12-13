<?php
session_start();
require_once '../helper/connection.php';

if (isset($_POST['proses'])) {
  
  $nim_nidn = $_POST['nim_nidn'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $jurusan = $_POST['jurusan'];
  $kelas = $_POST['kelas'];
  $password = $_POST['password'];
  $nohp = $_POST['nohp'];

  $query = mysqli_query($connection, "UPDATE user SET nama = '$nama', email = '$email', jurusan = '$jurusan', kelas = '$kelas', password = '$password', nohp = '$nohp'  WHERE nim_nidn = '$nim_nidn'");
}
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
?>