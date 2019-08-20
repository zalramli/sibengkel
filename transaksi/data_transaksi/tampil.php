
<div class="data-table-list">
    <div class="basic-tb-hd">
        <h2>Data Transaksi</h2>
        <br>
    </div>
    <div class="table-responsive">
        <table id="data-table-basic" class="table table-striped">
            <thead>
                <tr>
                    <th>No Faktur</th>
                    <th>Yang Melayani</th>
                    <th>Tanggal Transaksi</th>
                    <th>Total Harga</th>
                    <th>Total Bayar</th>
                    <th>Total Kembalian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM penjualan JOIN pegawai USING(kode_pegawai) ORDER BY tgl_transaksi DESC");
                foreach ($query as $data) {
                ?>
                <tr>
                    <td><?= $data['no_faktur_penjualan'] ?></td>
                    <td><?= $data['nama_pegawai'] ?></td>
                    <td><?= $data['tgl_transaksi'] ?></td>
                    <td style="text-align: right;"><?= $data['total_harga'] ?></td>
                    <td style="text-align: right;"><?= $data['bayar'] ?></td>
                    <td style="text-align: right;"><?= $data['kembalian'] ?></td>
                    <td style="text-align: center;">
                        <a href="?halaman=detail_transaksi&id=<?= $data['no_faktur_penjualan']; ?>" class=" btn btn-warning">Detail</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <th>No Faktur</th>
                <th>Yang Melayani</th>
                <th>Tanggal Transaksi</th>
                <th>Total Harga</th>
                <th>Total Bayar</th>
                <th>Total Kembalian</th>
                <th>Aksi</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>