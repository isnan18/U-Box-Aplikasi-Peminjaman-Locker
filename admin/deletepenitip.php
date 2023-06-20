<?php
session_start();
require_once '../helper/connection.php';

$id = $_GET['id'];

$result = mysqli_query($connection, "DELETE FROM penitip WHERE id='$id'");

if (mysqli_affected_rows($connection) > 0) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menghapus data'
  ];
  header('Location: ./indexpenitip.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./indexpenitip.php');
}
