
<div class="data-table-list">
    <div class="basic-tb-hd">
        <h2>Jenis Barang</h2>
        <br>
        <div class="row">
            <form action="halaman_print/print_laporan_transaksi.php" method="POST" target="_blank">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                        <label>Dari Tanggal</label>
                        <div class="input-group date nk-int-st">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" name="tgl_mulai">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                        <label>Sampai Tanggal</label>
                        <div class="input-group date nk-int-st">
                            <span class="input-group-addon"></span>
                            <input type="text" class="form-control" name="tgl_akhir">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label for=""></label>
                        <div class="input-group date nk-int-st">
                            <button type="submit" name="kirim" class="btn btn-primary">Print Laporan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table id="data-table-basic" class="table table-striped">
            <thead>
                <tr>
                    <th>Kode Jenis Barang</th>
                    <th>Nama Jenis Barang</th>
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
                    <td>
                        <a href="?halaman=edit_jenisBarang&id=<?= $data['no_faktur_penjualan']; ?>" class=" btn btn-primary">Edit</a>
                        <a onclick="return confirm('Yakin ingin menghapus data ?')" href="?halaman=v_jenisBarang&hapus=<?= $data['no_faktur_penjualan']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <th>Kode Jenis Barang</th>
                <th>Nama Jenis Barang</th>
                <th>Aksi</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>