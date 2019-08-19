<div class="data-table-list">
    <div class="basic-tb-hd">
        <h2>Daftar Detail Penggajian</h2>
        <br>
        <a href="admin.php?halaman=v_penggajian" class="btn btn-success notika-btn-success">Kembali</a>
    </div>
    <div class="table-responsive">
        <table id="data-table-basic" class="table table-striped">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Priode Gaji</th>
                    <th>Jumlah Hari Kerja</th>
                    <th>Total Gaji</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // mengambil ID
                $id = $_GET['id'];

                $query = mysqli_query($koneksi, "SELECT * FROM detail_penggajian JOIN pegawai USING(kode_pegawai) JOIN jenis_pegawai USING(kode_jenis_p) WHERE kode_penggajian='$id' ORDER BY kode_detail_penggajian ASC");
                foreach ($query as $data) {
                    ?>
                <tr>
                    <td><?= $data['kode_pegawai'] ?></td>
                    <td><?= $data['nama_pegawai'] ?></td>
                    <td><?= $data['nama_jenis_p'] ?></td>
                    <td><?= $data['periode_gaji'] ?></td>
                    <td><?= $data['jumlah_hari_kerja'] ?></td>
                    <td><?= $data['total_gaji'] ?></td>
                </tr>
                <?php }

                $query2 = mysqli_query($koneksi, "SELECT * FROM detail_penggajian_m JOIN mekanik USING(kode_mekanik) WHERE kode_penggajian='$id' ORDER BY kode_detail_pm ASC");
                foreach ($query2 as $data2) {
                    ?>
                <tr>
                    <td><?= $data['kode_mekanik'] ?></td>
                    <td><?= $data['nama_mekanik'] ?></td>
                    <td>Mekanik</td>
                    <td><?= $data['periode_gaji'] ?></td>
                    <td><?= $data['jumlah_hari_kerja'] ?></td>
                    <td><?= $data['total_gaji'] ?></td>
                </tr>
                <?php }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Priode Gaji</th>
                    <th>Jumlah Hari Kerja</th>
                    <th>Total Gaji</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>