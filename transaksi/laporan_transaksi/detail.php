<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM penjualan JOIN pegawai USING (kode_pegawai) WHERE no_faktur_penjualan='$id'");
$data = mysqli_fetch_array($query);
$query2 = mysqli_query($koneksi,"SELECT COUNT(*) AS jumlah_barang FROM detail_penjualan WHERE no_faktur_penjualan = '$id'");
$data2 = mysqli_fetch_array($query2);
$query3 = mysqli_query($koneksi,"SELECT * FROM detail_penjualan JOIN penjualan USING(no_faktur_penjualan) JOIN barang USING(kode_barang) WHERE no_faktur_penjualan='$id'");
?>
<div class="container">
    
    <div style="margin-bottom: 20px;">
        <a href="?halaman=laporan_transaksi" class="btn btn-primary btn-lg">Kembali</a>
    </div>
    <table class="table table-borderless" width="100">
        <tr>
            <th width="9%">Pelanggan</th>
            <th width="1%">:</th>
            <th>Safri</th>
            <th width="9%">Kasir</th>
            <th width="1%">:</th>
            <th><?= $data['nama_pegawai']?></th>
        </tr>
        <tr>
            <th>Tanggal</th>
            <th>:</th>
            <th><?=$data['tgl_transaksi']?></th>
            <th>Jumlah</th>
            <th>:</th>
            <th><?= $data2['jumlah_barang'] ?></th>
        </tr>
    </table>
    <table class="table table-borderless" width="100%">
        <thead>
            <tr>
                <th width="7%" scope="col">NO</th>
                <th width="35%" scope="col">NAMA BARANG</th>
                <th width="10%" scope="col">QTY</th>
                <th width="24%" scope="col">HARGA BARANG</th>
                <th width="24%" style="text-align:center" scope="col">TOTAL HARGA</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($query3 as $data3) {
            ?>
            <tr>
                <th scope="row"><?= $no++ ?></th>
                <td><?= $data3['nama_barang'] ?></td>
                <td><?= $data3['jumlah_barang'] ?></td>
                <td style="text-align:right"><?= $data3['harga_jual'] ?></td>
                <td style="text-align:right"><?= $data3['sub_total_harga'] ?></td>
            </tr>
            <?php }?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <th>GRAND TOTAL</th>
                <th style="text-align:right"><?= $data['total_harga'] ?></th>
            </tr>
        </tbody>
    </table>
</div>