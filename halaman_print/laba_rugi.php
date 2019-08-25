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

    $format_mulai =  date('Y-m-d', strtotime($tgl_mulai));
    $format_akhir =  date('Y-m-d', strtotime($tgl_akhir));

    $data1 = mysqli_query($koneksi, " SELECT SUM(p.total_harga) total_pembelian
                                        FROM pembelian p
                                        where p.tgl_transaksi >= '$format_mulai' && p.tgl_transaksi <= '$format_akhir' ");

    $data2 = mysqli_query($koneksi, " SELECT SUM(p.total_penggajian) total_penggajian
                                        FROM penggajian p
                                        where p.tgl_transaksi >= '$format_mulai' && p.tgl_transaksi <= '$format_akhir' ");

    $data3 = mysqli_query($koneksi, " SELECT SUM(dpb.sub_total_harga) sub_total_harga
                                        FROM detail_penjualan_barang dpb JOIN penjualan p USING (no_faktur_penjualan)
                                        where p.tgl_transaksi >= '$format_mulai' && p.tgl_transaksi <= '$format_akhir' ");

    $data4 = mysqli_query($koneksi, " SELECT pw.kode_wo AS kode_wo FROM penjualan_wo pw JOIN penjualan p                                                 USING (no_faktur_penjualan) where p.tgl_transaksi >=                                                  '$format_mulai' && p.tgl_transaksi <= '$format_akhir' ");



    foreach ($data1 as $d1) {
        if (isset($d1["total_pembelian"])) {
            $total_pembelian = $d1["total_pembelian"];
        } else {
            $total_pembelian = 0;
        }
    }

    foreach ($data2 as $d2) {
        if (isset($d2["total_penggajian"])) {
            $total_penggajian = $d2["total_penggajian"];
        } else {
            $total_penggajian = 0;
        }
    }

    foreach ($data3 as $d3) {
        if (isset($d3["sub_total_harga"])) {
            $sub_total_harga = $d3["sub_total_harga"];
        } else {
            $sub_total_harga = 0;
        }
    }

    foreach ($data4 as $d4) {
        if (isset($d4["kode_wo"])) {
            $kode_wo = $d4["kode_wo"];
            $tarif_harga = 0;

            $penjumlahan_t = mysqli_query($koneksi, " SELECT SUM(s.tarif_harga) tarif_harga
                                        FROM detail_penjualan_service dps JOIN service s USING (kode_service) where dps.kode_wo = '$kode_wo' ");

            foreach ($penjumlahan_t as $pt) {
                if (isset($pt["tarif_harga"])) {
                    $tarif_harga =  $tarif_harga + $pt["tarif_harga"];
                } else {
                    $tarif_harga = $tarif_harga + 0;
                }
            }
        } else {
            $tarif_harga = 0;
        }
    }

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
                        <strong style="font-size:30">Bengkel Cemerlang Jaya</strong><br>
                        <address style="font-size: 15">Jalan Fatahillah No. 35 , Kabupaten Jember, Jawa Timur <br>
                            Telp : (0331) 426 746 <br>
                            HP / WA : 081 236 647 71 / 082 232 419 229 </address>
                    </div>
                </div>

                <hr style="border-width: 3px">
                <div class="row">
                    <div class="col col-md-12">

                        <address class="text-center" style="font-size: 18">LAPORAN LABA - RUGI
                            <br> PERIODE <?php echo $tgl_mulai ?> SAMPAI <?php echo $tgl_akhir ?> </address>

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
                                                <td class="">Penjualan Barang dan Sperpart</td>
                                                <td class="text-right">Rp. <?php echo number_format($sub_total_harga, 2, ",", "."); ?></td>
                                            </tr>

                                            <tr>
                                                <td class="">Jasa Service</td>
                                                <td class="text-right">Rp. <?php echo number_format($tarif_harga, 2, ",", "."); ?></td>
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
                                                <td class="">Pemasokan Barang dan Sperpart</td>
                                                <td class="text-right">Rp. <?php echo number_format($total_pembelian, 2, ",", "."); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="">Penggajian Pegawai</td>
                                                <td class="text-right">Rp. <?php echo number_format($total_penggajian, 2, ",", "."); ?></td>
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
                                        Jember, <?php echo date("Y-m-d"); ?>
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