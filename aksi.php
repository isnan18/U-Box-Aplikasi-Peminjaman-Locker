<?php
session_start();
$email = $_POST["email"];
$password = $_POST["password"];

$conn = mysqli_connect("localhost","root","","webti");
$query = "SELECT * FROM user WHERE email='$email' && password='$password'";
$login = mysqli_query($conn, $query);
$islogin = mysqli_num_rows($login);

if (isset($_POST['login'])){
    if ($islogin > 0){
        $data = mysqli_fetch_assoc($login);
        //var_dump($data);
        $_SESSION['email'] = $email;
        if ($data['status'] == 1){
            $_SESSION['status'] = $data['status'];
            header("Location: admin/index.php");
            
        }else{
            $_SESSION['status'] = $data['status'];
            header("Location: user/index.php");
        }
    }else{
        $msg = "<p class = 'alert-danger'>Email / Password salah... </p>";
        header("Location: index.php?msg=$msg");
        exit;
    }
}
?>