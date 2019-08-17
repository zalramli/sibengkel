<div class="data-table-list">
    <div class="basic-tb-hd">
        <h2>Data Work Order</h2>
        <br>
        <a href="kasir.php?halaman=add_work_order" class="btn btn-success notika-btn-success">Tambah Data</a>
    </div>
    <div class="table-responsive">
        <table id="data-table-basic" class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Customer</th>
                    <th>No Plat</th>
                    <th>Kendaraan</th>
                    <th>Alamat</th>
                    <th>No Telpon</th>
                    <th>Nama Mekanik</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM work_order JOIN mekanik USING(kode_mekanik) JOIN customer USING(kode_customer) JOIN mobil USING(no_plat) WHERE status_wo='0'");
                foreach ($query as $data) {
                    ?>
                <tr>
                    <td><?= $data['nama_customer'] ?></td>
                    <td><?= $data['no_plat'] ?></td>
                    <td><?= $data['nama_mobil'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td><?= $data['no_telp'] ?></td>
                    <td><?= $data['nama_mekanik'] ?></td>
                    <td>
                        <a href="?halaman=transaksi_penjualan&id=<?= $data['kode_wo'] ?>" class="btn btn-primary">Bayar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Kode Mekanik</th>
                    <th>Nama mekanik</th>
                    <th>Alamat</th>
                    <th>No telp</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>