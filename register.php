<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block"><img src="./img/uin.png" style="margin-top: 100px; margin-left: 80px;"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat akun baru!</h1>
                            </div>
                            <form class="user">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="exampleInputNIM"
                                        placeholder="NIM / NIDN">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputNama"
                                        placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputJurusan"
                                        placeholder="Jurusan">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputKelas"
                                        placeholder="Kelas">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                        placeholder="Password">
                                </div>
                                <fieldset class="form-group">
                                    <div class="row" style="margin-left: 5px;">
                                    <legend class="col-form-label col-sm-2 pt-0" >Status</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status" value="2">
                                        <label class="form-check-label" for="status">
                                            Mahasiswa
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status" value="3">
                                        <label class="form-check-label" for="status">
                                            Dosen
                                        </label>
                                        </div>
                                    </div>   
                                    </div>
                                </fieldset>
                                <a href="login.html" class="btn btn-primary btn-user btn-block">
                                    Register Akun
                                </a>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>