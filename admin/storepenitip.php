<?php
session_start();
require_once '../helper/connection.php';

$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$nohp = $_POST['nohp'];
$nim = $_POST['nim_nidn'];

$query = mysqli_query($connection, "insert into penitip(id, nama, jurusan, nohp, nim_nidn) value('','$nama', '$jurusan','$nohp', '$nim')");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./indexpenitip.php');
                                            } else {
                                              $_SESSION['info'] = [
                                                'status' => 'failed',
                                                'message' => mysqli_error($connection)
                                              ];
                                              header('Location: ./indexpenitip.php');
                                            }
