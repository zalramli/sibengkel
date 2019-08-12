<!DOCTYPE html>
<html lang="en">

<head>
    <!-- header -->
    <?php include "_partial/head.php"; ?>
    <!-- end header -->

</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "_partial/sidebar.php"; ?>
        

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "_partial/topbar.php"; ?>
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?php 
                    if (!isset($_GET['halaman'])) 
                        {
                            error_reporting(0);
                        }
                    if ($_GET['halaman']=='dashboard') 
                        {
                            include "dashboard.php";
                        }
                    if ($_GET['halaman']=='add_akses') 
                    {
                        include "master/hak_akses/tambah.php";
                    }
                    if ($_GET['halaman']=='v_akses') 
                    {
                        include "master/hak_akses/tampil.php";
                    }
                ?>  
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "_partial/footer.php"; ?>

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php include "_partial/modal_logout.php"; ?>


    <!-- Bootstrap core JavaScript-->
    <?php include "_partial/javascript.php"; ?>


</body>

</html>