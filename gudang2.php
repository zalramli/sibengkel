<!doctype html>
<html class="no-js" lang="">

<head>
    <?php include "_partial2/head.php"; ?>
    
    <!-- modernizr JS
        ============================================ -->
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <?php include "_partial2/header.php"; ?>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <?php include "_partial2/navbar_mobile_gudang.php"; ?>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <?php include "_partial2/navbar_desktop_gudang.php"; ?>
    <!-- Main Menu area End-->
    <!-- Breadcomb area Start-->
    <!-- Breadcomb area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php 
                        include 'koneksi/koneksi.php';

                        // Dashboard
                        if (!isset($_GET['halaman'])) {
                            error_reporting(0);
                        }
                        if ($_GET['halaman'] == 'dashboard') {
                            include "dashboard.php";
                        }
                        // Tutup Dashboard

                        // Parsing halaman Jenis Barang
                        if ($_GET['halaman'] == 'v_jenisBarang') {
                            include "master2/jenis_barang/tampil.php";
                        }
                        if ($_GET['halaman'] == 'add_jenisBarang') {
                            include "master2/jenis_barang/tambah.php";
                        }
                        if ($_GET['halaman'] == 'edit_jenisBarang') {
                            include "master2/jenis_barang/edit.php";
                        }

                        // Parsing halaman Jenis Barang
                        if ($_GET['halaman'] == 'v_merkBarang') {
                            include "master2/merk_barang/tampil.php";
                        }
                        if ($_GET['halaman'] == 'add_merkBarang') {
                            include "master2/merk_barang/tambah.php";
                        }
                        if ($_GET['halaman'] == 'edit_merkBarang') {
                            include "master2/merk_barang/edit.php";
                        }



                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
    <!-- Start Footer area-->
    <?php include "_partial2/footer.php"; ?>
    <!-- End Footer area-->
    <!-- jquery
        ============================================ -->
    <?php include "_partial2/javascript.php"; ?>

</body>

</html>