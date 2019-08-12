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
    <?php include "_partial/navbar_kasir.php"; ?>
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