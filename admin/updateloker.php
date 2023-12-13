<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$no = $_POST['no'];
$status = $_POST['status'];

$query = mysqli_query($connection, "UPDATE locker SET status = '$status' WHERE no = '$no'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./indexloker.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./indexloker.php');
}
