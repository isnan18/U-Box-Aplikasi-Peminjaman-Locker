<?php
$conn = mysqli_connect("localhost","root","","webti");
if (isset($_POST['submit-usr'])){
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$jurusan = $_POST['jurusan'];
$kelas = $_POST['kelas'];
$password = $_POST['password'];
$status = $_POST['status'];

$query = "INSERT INTO user VALUES ('','$nim','$nama','$email','$jurusan','$kelas','$password','$status')";
$message = (mysqli_query($conn,$query)) ? "anda berhasil register" : "anda gagal register".mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="card">
        <div class="card-header">
            Informasi
        </div>
        <div class="card-body">
            <p><?= $message ?></p>
        </div>
        <div class="card-footer">
            <a href="index.php" class="btn btn-primary">kembali ke halaman login</a>
        </div>   
        </div>
    </div>
</body>
</html>