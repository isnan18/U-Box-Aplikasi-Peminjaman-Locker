<?php
$conn = mysqli_connect("localhost", "root", "", "webti");

if (isset($_POST['submit-usr'])) {
    $nim_nidn = $_POST['nim_nidn'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    $kelas = $_POST['kelas'];
    $password = $_POST['password'];
    $nohp = $_POST['nohp'];

    // Gantilah SELECT id_admin dengan SELECT id_admin FROM admin WHERE kondisi_sesuai
    $query_admin = "SELECT id_admin FROM admin WHERE email='admin@gmail.com'";
    $result_admin = $conn->query($query_admin);

    if ($result_admin && $result_admin->num_rows > 0) {
        $row_admin = $result_admin->fetch_assoc();
        $idadmin = $row_admin["id_admin"];
        
        // Gantilah $query_insert dengan menggunakan parameterized query
        $query_insert = "INSERT INTO user (nim_nidn, nama, email, jurusan, kelas, password, nohp, id_admin) VALUES ('$nim_nidn', '$nama', '$email', '$jurusan', '$kelas', '$password', '$nohp', '$idadmin')";
        $stmt = $conn->prepare($query_insert);

        // Bind parameter

        // Execute query
        $stmt->execute();
        
        // Check for success
        $message = ($stmt->affected_rows > 0) ? "Anda berhasil register" : "Anda gagal register";

        // Close statement
        $stmt->close();
    } else {
        $message = "Gagal mendapatkan id_admin: " . $conn->error;
    }
    
    // Close result set
    $result_admin->close();
    
    // Close connection
    mysqli_close($conn);
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
            <a href="login.php" class="btn btn-primary">kembali ke halaman login</a>
        </div>   
        </div>
    </div>
</body>
</html>