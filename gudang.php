<!DOCTYPE html>
<html lang="en">

<head>

    <!-- head -->
    <?php include "_partial/head.php"; ?>
    <!-- tutup head -->

</head>

<body>

    <!-- topbar -->
    <?php include "_partial/topbar.php"; ?>
    <!-- tutup topbar -->

    <!-- /navbar -->
    <?php include "_partial/navbar_gudang.php"; ?>
    <!-- /navbar -->

    <!-- konten -->
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="row">
                    <?php

                    // koneksi database
                    include 'koneksi/koneksi.php';

                    // Dashboard
                    if (!isset($_GET['halaman'])) {
                        error_reporting(0);
                    }
                    if ($_GET['halaman'] == 'dashboard') {
                        include "dashboard.php";
                    }
                    // Tutup Dashboard

                    // Merk Barang
                    if ($_GET['halaman'] == 'v_merk') {
                        include "master/merk_barang/tampil.php";
                    }
                    if ($_GET['halaman'] == 'edit_merk') {
                        include "master/merk_barang/edit.php";
                    }
                    // Tutup merk

                    // Jenis Barang
                    if ($_GET['halaman'] == 'v_jenis') {
                        include "master/jenis_barang/tampil.php";
                    }
                    if ($_GET['halaman'] == 'edit_jenis') {
                        include "master/jenis_barang/edit.php";
                    }
                    // Tutup jenis

                    // Satuan
                    if ($_GET['halaman'] == 'v_satuan') {
                        include "master/satuan_barang/tampil.php";
                    }
                    if ($_GET['halaman'] == 'edit_satuan') {
                        include "master/satuan_barang/edit.php";
                    }
                    // Tutup Satuan

                    // Data Barang
                    if ($_GET['halaman'] == 'v_barang') {
                        include "master/barang/tampil.php";
                    }
                    if ($_GET['halaman'] == 'edit_barang') {
                        include "master/barang/edit.php";
                    }
                    // Tutup Data Barang


                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- tutup konten -->

    <!-- Footer -->
    <?php include "_partial/footer.php"; ?>
    <!-- Tutup Footer -->

    <!-- javascript -->
    <?php include "_partial/javascript.php"; ?>
    <!-- Tutup Javascript -->

</body>

</html>