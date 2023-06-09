<?php
session_start();
require_once '../helper/connection.php';

$kodemk = $_POST['kodemk'];
$namamk = $_POST['namamk'];
$sks = $_POST['sks'];

$query = mysqli_query($connection, "insert into matakuliah(kode_matkul, nama_matkul, sks) value('$kodemk', '$namamk','$sks')");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
                                            } else {
                                              $_SESSION['info'] = [
                                                'status' => 'failed',
                                                'message' => mysqli_error($connection)
                                              ];
                                              header('Location: ./index.php');
                                            }
