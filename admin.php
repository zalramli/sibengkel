<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "_partial/head.php"; ?>
    </head>
    <body>
        <!-- topbar -->
        <?php include "_partial/topbar.php"; ?>
        <!-- tutup topbar -->
        <!-- /navbar -->
        <?php include "_partial/navbar.php"; ?>
        <!-- /navbar -->
        <div class="main">
            <div class="main-inner">
                <div class="container">
                    <div class="row">
                        <?php
                        if (!isset($_GET['halaman']))
                        {
                        error_reporting(0);
                        }
                        if ($_GET['halaman']=='dashboard')
                        {
                        include "dashboard.php";
                        }
                        // Hak Akses
                        if ($_GET['halaman']=='add_akses')
                        {
                        include "master/hak_akses/tambah.php";
                        }
                        if ($_GET['halaman']=='v_akses')
                        {
                        include "master/hak_akses/tampil.php";
                        }
                        // Tutup Hak Akses
                        ?>
                        <!-- /span6 -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /main-inner -->
        </div>
        <!-- Footer -->
        <?php include "_partial/footer.php"; ?>
        <!-- Le javascript
        ================================================== -->
        <?php include "_partial/javascript.php"; ?>
    </body>
</html>