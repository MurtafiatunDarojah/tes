<?php
@ob_start();
session_start();
if (isset($_POST['proses'])) {
    require 'config.php';
    if (isset($_POST['submit']) && ($_POST['nama'] !== "" && $_POST['user'] !== "" && $_POST['pass'] !== "")) {
        $nama = $_POST['nama'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $cek = $conn->query("SELECT * FROM akun WHERE username='$user'");
        if ($cek->num_rows < 1) {
            $conn->query("INSERT INTO akun(nama,user,`pass`) VALUES ('$nama','$user','$pass')");

            $_SESSION['message'] = 'Register berhasil!';
            header('location:login.php');
        } else {
            $_SESSION['gagal'] = 'Registrasi gagal! Username sudah terdaftar';
        }
    } else {
        $_SESSION['gagal'] = 'Harap isi semua field!';
    }
}

?>


<body style="background-image :url(assets/img/pic/index.jpg);
  			background-repeat: repeat;
            color:#fff;">
    <center>
        <div id="app">
            <section class="section">
                <div class="container mt-5">
                    <div class="row">
                        <div class="border border-warning">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Register</h4>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION['gagal'])) {
                                    ?>
                                        <div class="alert alert-danger">
                                            <?= $_SESSION['gagal'] ?>

                                        </div>
                                    <?php
                                    }
                                    unset($_SESSION['gagal']);
                                    ?>
                                    <form method="POST">
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label for="frist_name">Nama</label>
                                                <input name="nama" id="frist_name" type="text" class="form-control" name="frist_name" autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Username</label>
                                            <input name="username" id="email" type="text" class="form-control" name="email">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label for="password" class="d-block">Password</label>
                                                <input id="password" name="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                                                <div id="pwindicator" class="pwindicator">
                                                    <div class="bar"></div>
                                                    <div class="label"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                                                Register
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="simple-footer">
                                Copyright &copy; Murtafiatun Darojah
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </center>

</body>

</html>