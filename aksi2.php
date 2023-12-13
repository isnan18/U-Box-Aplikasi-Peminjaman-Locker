<?php
session_start();
$email = $_POST["email"];
$password = $_POST["password"];

$conn = mysqli_connect("localhost","root","","webti");
$query = "SELECT * FROM admin WHERE email='$email' && password='$password'";
$login = mysqli_query($conn, $query);
$islogin = mysqli_num_rows($login);

if (isset($_POST['login'])){
    if ($islogin > 0){
        $data = mysqli_fetch_assoc($login);
        //var_dump($data);
        $_SESSION['email'] = $email;
        if ($data['id_admin'] == 111){
            $_SESSION['id_admin'] = $data['id_admin'];
            header("Location: admin/index.php");
            
        }
    }else{
        $msg = "<p class = 'alert-danger'>Email / Password salah... </p>";
        header("Location: login2.php?msg=$msg");
        exit;
    }
}
?>