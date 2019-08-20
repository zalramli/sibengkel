<?php
if (isset($_GET['id'])) {
    // mengambil ID no_faktur_pembelian
    $id = $_GET['id'];

    // query ambil tabel pembelian
    $ambil_pembelian = mysqli_query($koneksi, "SELECT * FROM pembelian JOIN suplier USING(kode_suplier) WHERE no_faktur_pembelian='$id'");
    foreach ($ambil_pembelian as $ambil_data) {
        $kode_pegawai =  $ambil_data['kode_pegawai'];
        $nama_suplier =  $ambil_data['nama_suplier'];
        $tgl_transaksi =  $ambil_data['tgl_transaksi'];
        $sub_total =  $ambil_data['sub_total'];
        $potongan =  $ambil_data['potongan'];
        $total_harga =  $ambil_data['total_harga'];
        $bayar =  $ambil_data['bayar'];
        $kembalian =  $ambil_data['kembalian'];
        $status =  $ambil_data['status'];
    }

    // ambil kode_permintaan di table purcase order
    $po = mysqli_query($koneksi, "SELECT kode_permintaan FROM purchase_order WHERE no_faktur_pembelian='$id'");
    foreach ($po as $ambil_data_po) {
        $kode_permintaan =  $ambil_data_po['kode_permintaan'];
    }

    // query ambil tabel detail permintaan
    $query_tampil_detail = mysqli_query($koneksi, "SELECT * FROM detail_permintaan JOIN barang USING(kode_barang) JOIN merk USING(kode_merk) JOIN satuan USING(kode_satuan) JOIN jenis_barang USING(kode_jenis) WHERE kode_permintaan='$kode_permintaan' ORDER BY kode_detail_permintaan ASC");
}
?>
<div class="form-element-list">
    <form id="transaksi_form" method="post">

        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

                <div class="basic-tb-hd">

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <div class="bootstrap-select fm-cmp-mg">
                                    <p>Suplier : <?= $nama_suplier ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                        <label>No</label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>Kode Barang</label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>Nama Barang</label>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label>Jumlah Barang</label>
                    </div>
                </div>

                <div id="span_product_details">
                    <!-- disini isi detail -->
                    <?php
                    $index = 0;
                    foreach ($query_tampil_detail as $data) {
                        $index++;
                        ?>
                    <br />
                    <div id="row" class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                            <p><?= $index ?></p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <input type="text" class="form-control" id="kode_barang<?= $index ?>" name="kode_barang[]" readonly="" value="<?= $data['kode_barang'] ?>">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <input type="text" class="form-control" id="nama_barang<?= $index ?>" name="nama_barang[]" readonly="" value="<?= $data['nama_barang'] ?>">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <input type="text" class="form-control" id="jumlah_barang<?= $index ?>" name="jumlah_barang[]" readonly="" value="<?= $data['jumlah_barang'] ?>">
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="contact-inner">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="basic-tb-hd">
                                <h2 class="text-center">Form Pembayaran</h2>
                            </div>
                            <table width="100%">
                                <tr>
                                    <td width="60%">
                                        <h5>Sub Total</h5>
                                    </td>
                                    <td width="40%" style="text-align: right;">
                                        <p><?= $sub_total ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="60%">
                                        <h5>Potongan Harga</h5>
                                    </td>
                                    <td style="text-align: right;  padding-top: 10px;">
                                        <p><?= $potongan ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="40%">
                                        <h5>Total</h5>
                                    </td>
                                    <td style="text-align: right;  padding-top: 10px;">
                                        <p><?= $total_harga ?></p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="contact-inner">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table width="100%">
                                <tr>
                                    <td width="60%">
                                        <h5>Bayar</h5>
                                    </td>
                                    <td width="40%" style="text-align: right;">
                                        <p><?= $bayar ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="60%">
                                        <h5>Kembalian</h5>
                                    </td>
                                    <td width="40%" style="text-align: right;  padding-top: 10px;">
                                        <p><?= $kembalian ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="60%">
                                        <h5>Status</h5>
                                    </td>
                                    <td width="40%" style="text-align: right;  padding-top: 10px;">
                                        <p><?php if ($status == "1") {
                                                echo "Berhasil";
                                            } else {
                                                echo "Belum Berhasil";
                                            }
                                            $status ?></p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <br>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <a href="kasir.php?halaman=v_data_transaksi_pembelian" class="btn btn-success notika-btn-success col-md-12">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

<!-- untuk ajax -->
<script src="assets/template2/js/vendor/jquery-3.3.1.min.js"></script>