<?php
session_start();
$email = $_POST["email"];
$password = $_POST["password"];

$conn = mysqli_connect("localhost", "root", "", "webti");
$query = "SELECT * FROM user WHERE email='$email' && password='$password'";
$login = mysqli_query($conn, $query);
$islogin = mysqli_num_rows($login);

if (isset($_POST['login'])) {
    if ($islogin > 0) {
        $data = mysqli_fetch_assoc($login);
        $_SESSION['email'] = $email;
        if ($data['status'] == 1) {
            $_SESSION['status'] = $data['status'];
            header("Location: admin/index.php");
        } else {
            $_SESSION['status'] = $data['status'];
            header("Location: user/index.php");
        }
    } else {
        $msg = "Email atau password salah.";
        header("Location: login.php?msg=$msg");
        exit;
    }
}
?>
