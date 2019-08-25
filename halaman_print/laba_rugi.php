<!doctype html>
<html class="no-js" lang="">

<head>
    <link href="_partial/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="_partial/bootstrap.min.js"></script>
    <!-- modernizr JS
        ============================================ -->
</head>

<body>

    <?php
    include '../koneksi/koneksi.php';

    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_akhir = $_POST['tgl_akhir'];


    ?>

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <hr>

                <div class="row">
                    <div class="col col-md-3">
                        <img src="" width="190" alt="logo_catering.png">
                    </div>
                    <div class="col col-md-8" style="margin-left:-40px ">
                        <strong style="font-size:30">Henny Catering</strong><br>
                        <address style="font-size: 15">Jalan Fatahillah No. 35 , Kabupaten Jember, Jawa Timur <br>
                            Telp : (0331) 426 746 <br>
                            HP / WA : 081 236 647 71 / 082 232 419 229 </address>
                    </div>
                </div>

                <hr style="border-width: 3px">
                <div class="row">
                    <div class="col col-md-12">

                        <address class="text-center" style="font-size: 18">LAPORAN TRANSAKSI (PRASMANAN) <br> PERIODE <?php echo $tgl_mulai ?> SAMPAI <?php echo $tgl_akhir ?> </address>

                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">

                            <div class="row">
                                <div class="col col-md-6">

                                    <div class="row form-group" style="font-size: 18">
                                        <div class="col col-md-3">
                                            <strong>PEMASUKAN</strong>
                                        </div>

                                        <div class="col col-md-9 text-right">
                                            <strong>Rp. </strong>
                                        </div>

                                    </div>

                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <td class=""><strong>Detail Pemasukan</strong></td>
                                                <td class="text-right"><strong>Nominal</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <!-- Detail pemasukan -->

                                            <tr>
                                                <td class="">Penjualan Obat</td>
                                                <td class="text-right">Rp. </td>
                                            </tr>

                                            <tr>
                                                <td class="">Perawatan</td>
                                                <td class="text-right">Rp. </td>
                                            </tr>

                                            <tr>
                                                <td class="">Konsultasi</td>
                                                <td class="text-right">Rp. </td>
                                            </tr>

                                            <!-- Detail pemasukan -->

                                        </tbody>
                                    </table>
                                </div>

                                <div class="col col-md-6">
                                    <div class="row form-group" style="font-size: 18">
                                        <div class="col col-md-3">
                                            <strong>PENGELUARAN</strong>
                                        </div>
                                        <div class="col col-md-9 text-right">
                                            <strong>Rp. </strong>
                                        </div>
                                    </div>

                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <td class=""><strong>Detail Pengeluaran</strong></td>
                                                <td class="text-right"><strong>Nominal</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <!-- Detail Pengeluaran -->
                                            <tr>
                                                <td class="">Pemasokan</td>
                                                <td class="text-right">Rp. </td>
                                            </tr>
                                            <!-- Detail Pengeluaran -->

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div style="font-size: 17">
                                <div class="row">
                                    <div class="col col-md-2">
                                        <strong>Total Pemasukan</strong>
                                    </div>
                                    <div class="col">
                                        <strong>: Rp. </strong>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col col-md-2">
                                        <strong>Total Pengeluaran</strong>
                                    </div>
                                    <div class="col">
                                        <strong>: Rp. </strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-2">
                                        <strong>Total Laba(Rugi)</strong>
                                    </div>
                                    <div class="col">
                                        <strong>: Rp. </strong>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row" style="font-size: 15">
                                <div class="col col-md-5"></div>
                                <div class="col col-md-4"></div>

                                <div class="col-md-2 text-center">
                                    <address>
                                        Lumajang, <?php echo date("Y-m-d"); ?>
                                        <br>
                                        Penanggung Jawab <br><br><br>
                                        TTD
                                    </address>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- bagian js -->
    <?php include "../_partial/javascript.php"; ?>

</body>

</html>