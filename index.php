<!doctype html>
<?php 
echo $_SESSION['akses'];
include "koneksi/koneksi.php";
if (isset($_POST['login'])) {
session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // menyeleksi data admin dengan username dan password yang sesuai
    $query = mysqli_query($koneksi,"SELECT * FROM pegawai JOIN jenis_pegawai USING(kode_jenis_p) WHERE username='$username'");
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($query);
    $data=mysqli_fetch_array($query);
    $kode_pegawai = $data['kode_pegawai'];
    if($cek > 0){
        if ($data['status_login'] == "0") {
           if (password_verify($_POST['password'],$data['password'])) {
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['akses'] = $data['nama_jenis_p'];
                    $_SESSION['kode_pegawai'] = $data['kode_pegawai'];
                    mysqli_query($koneksi, "UPDATE pegawai SET status_login='1' WHERE kode_pegawai='$kode_pegawai'");
                    if ($_SESSION['akses'] == "admin") {
                        header("location:admin.php?halaman=dashboard");
                    } else if($_SESSION['akses'] == "kasir") {
                        header("location:kasir.php?halaman=dashboard");
                    } else if($_SESSION['akses'] == "gudang") {
                        header("location:gudang.php?halaman=dashboard");
                    } else if($_SESSION['akses'] == "cs") {
                         header("location:cs.php?halaman=dashboard");
                    }
            } else {
                echo "password anda salah";
            }
        } else {
            echo "Akun anda sedang digunakan";
        }
             
    } else {
        echo "usernmae anda salah";
    }
}

 ?>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Register | Notika - Notika Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="assets/template2/css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="assets/template2/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="assets/template2/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/template2/css/owl.theme.css">
    <link rel="stylesheet" href="assets/template2/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="assets/template2/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="assets/template2/css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="assets/template2/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="assets/template2/css/wave/waves.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="assets/template2/css/notika-custom-icon.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="assets/template2/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="assets/template2/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="assets/template2/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="assets/template2/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Login Register area Start-->
    <div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
            <div class="nk-form">
                <form method="POST" action="">
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="fm-checkbox">
                    <label><input type="checkbox" class="i-checks"> <i></i> Keep me signed in</label>
                </div>
                <button type="submit" name="login" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
            </div>
            </form>
        </div>
    </div>
    <!-- Login Register area End-->
    <!-- jquery
		============================================ -->
    <script src="assets/template2/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="assets/template2/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="assets/template2/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="assets/template2/js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="assets/template2/js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="assets/template2/js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="assets/template2/js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="assets/template2/js/counterup/jquery.counterup.min.js"></script>
    <script src="assets/template2/js/counterup/waypoints.min.js"></script>
    <script src="assets/template2/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="assets/template2/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="assets/template2/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/template2/js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="assets/template2/js/flot/jquery.flot.js"></script>
    <script src="assets/template2/js/flot/jquery.flot.resize.js"></script>
    <script src="assets/template2/js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="assets/template2/js/knob/jquery.knob.js"></script>
    <script src="assets/template2/js/knob/jquery.appear.js"></script>
    <script src="assets/template2/js/knob/knob-active.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="assets/template2/js/chat/jquery.chat.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="assets/template2/js/wave/waves.min.js"></script>
    <script src="assets/template2/js/wave/wave-active.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="assets/template2/js/icheck/icheck.min.js"></script>
    <script src="assets/template2/js/icheck/icheck-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="assets/template2/js/todo/jquery.todo.js"></script>
    <!-- Login JS
		============================================ -->
    <script src="assets/template2/js/login/login-action.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="assets/template2/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="assets/template2/js/main.js"></script>
</body>

</html>