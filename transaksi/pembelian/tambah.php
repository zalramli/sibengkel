<?php
if (isset($_GET['id'])) {
    // mengambil ID kode_permintaan
    $id = $_GET['id'];

    // query ambil tabel detail permintaan
    $query_tampil_detail = mysqli_query($koneksi, "SELECT * FROM detail_permintaan JOIN barang USING(kode_barang) JOIN merk USING(kode_merk) JOIN satuan USING(kode_satuan) JOIN jenis_barang USING(kode_jenis) WHERE kode_permintaan='$id' ORDER BY kode_detail_permintaan ASC");

    // query ambil total / sub total
    $ambil_sub_total = mysqli_query($koneksi, "SELECT SUM(sub_total_harga) AS sub_total FROM detail_permintaan WHERE kode_permintaan='$id'");

    foreach ($ambil_sub_total as $ambil_data) {
        $sub_total =  $ambil_data['sub_total'];
    }
}
?>

<?php
// Ketika tombil simpan di Klik
if (isset($_POST['simpan'])) {

    // validasi apakah ada detail
    if (isset($_POST['kode_barang'])) {

        // Membuat Kode otomatis
        $sql = mysqli_query($koneksi, "SELECT max(kode_permintaan) FROM permintaan_barang");
        $kode_faktur = mysqli_fetch_array($sql);
        if ($kode_faktur) {
            $nilai = substr($kode_faktur[0], 2);
            $kode = (int) $nilai;
            //tambahkan sebanyak + 1
            $kode = $kode + 1;
            $auto_kode = "PB" . str_pad($kode, 6, "0",  STR_PAD_LEFT);
        } else {
            $auto_kode = "PB000001";
        }

        // mengupdate data tgl_last_log_in di database
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');

        // data table permintaan
        $kode_permintaan = $auto_kode;
        $tgl_permintaan = $now;
        $status = 0;

        // proses input data tramsaksi ke dalam database
        $query = mysqli_query($koneksi, "INSERT INTO permintaan_barang VALUES ('$kode_permintaan','$tgl_permintaan','$status') ");
        if ($query) {

            // proses input data detail tramsaksi ke dalam database
            for ($i = 0; $i < count($_POST['kode_barang']); $i++) {
                $kode_barang = $_POST['kode_barang'][$i];
                $jumlah_barang = $_POST['jumlah_barang'][$i];

                $query_detail = mysqli_query($koneksi, "INSERT INTO detail_permintaan (kode_permintaan,kode_barang,jumlah_barang) VALUES ('$kode_permintaan','$kode_barang','$jumlah_barang') ");

                if ($query_detail) {
                    echo "<script>alert('Data Berhasil Ditambahkan'); window.location = 'kasir.php?halaman=v_transaksi_pembelian'</script>";
                } else {
                    echo "<script>alert('Terjadi Kesalahan Input Database'); window.location = 'kasir.php?halaman=add_transaksi_pembelian&id=" . $id . "'</script>";
                }
            }
        } else {
            echo "<script>alert('Terjadi Kesalahan Input Database'); window.location = 'kasir.php?halaman=add_transaksi_pembelian&id=" . $id . "'</script>";
        }
    } else {
        echo "<script>alert('Gagal Mengirim Data , data detail harus ada !'); window.location = 'kasir.php?halaman=add_transaksi_pembelian&id=" . $id . "'</script>";
    }
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
                                    <select id="cari_kode_suplier" required="" class="selectpicker" data-live-search="true">

                                        <option value="">Cari Suplier</option>

                                        <?php
                                        $query_suplier = mysqli_query($koneksi, "SELECT * FROM suplier ORDER BY kode_suplier ASC");
                                        while ($data_suplier = mysqli_fetch_array($query_suplier)) {
                                            ?>

                                        <option value="<?= $data_suplier['kode_suplier'] ?>"><?= $data_suplier['nama_suplier'] ?></option>

                                        <?php } ?>

                                    </select>
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
                                        <input type="number" class="form-control" id="sub_total_hrg" readonly="" value="<?= $sub_total ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 9px;">
                                        <h5>Potongan Harga</h5>
                                    </td>
                                    <td style="text-align: right; padding-top: 5px"><input type="number" class="form-control" id="potongan" max="9999999999" onkeyup="update()" onchange="update()"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 30px;" class="contact-inner">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table width="100%">
                                <tr>
                                    <td style="padding-top: 15px;" width="60%">
                                        <h5>Bayar</h5>
                                    </td>
                                    <td width="40%" style="text-align: right;"><input type="number" class="form-control" id="bayar" required="" max="9999999999" oninvalid="this.setCustomValidity('Bayar Wajib Diisi')" oninput="setCustomValidity('')" onkeyup="update()" onchange="update()"></td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0px;">
                                        <h5>Kembalian</h5>
                                    </td>
                                    <td style="text-align: right; padding: 20px 0px;">
                                        <input type="number" class="form-control" id="kembalian" readonly="">
                                    </td>
                                </tr>

                            </table>
                            <button onclick="return confirm('Yakin ingin Melakukan Pemasokan ?')" id="action" type="submit" name="simpan" class="btn btn-primary mr-2">Simpan Pemasokan</button>
                            <a href="kasir.php?halaman=v_transaksi_pembelian" class="btn btn-success notika-btn-success">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

<!-- untuk ajax -->
<script src="assets/template2/js/vendor/jquery-3.3.1.min.js"></script>

<script>
    // Menghitung kembalian
    function update() {
        var sub_total_hrg = document.getElementById("sub_total_hrg");
        var potongan = document.getElementById("potongan");
        var bayar = document.getElementById("bayar");
        var kembalian = document.getElementById("kembalian");

        // cek apakah kosong
        if (potongan.value.length == 0) {
            potongan.value = 0;
        }

        // parsing dan perhitungan
        var v_total = parseFloat(sub_total_hrg.value) - parseFloat(potongan.value);
        var v_bayar = parseFloat(bayar.value);

        if (v_bayar >= v_total) {
            kembalian.value = bayar.value - v_total;
        } else {
            kembalian.value = null;
        }
    }
    // Menghitung kembalian
</script>