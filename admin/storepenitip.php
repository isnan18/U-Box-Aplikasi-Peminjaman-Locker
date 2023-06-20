<?php
session_start();
require_once '../helper/connection.php';

$nama = $_POST['nama'];
$barang = $_POST['barang'];
$jumlah = $_POST['jumlah'];
$status = $_POST['status'];
$loker = $_POST['loker'];

$query = mysqli_query($connection, "insert into penitip(id, nama, barang, jumlah, status, loker) value('','$nama', '$barang','$jumlah', '$status', $loker)");
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
