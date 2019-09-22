<?php
//Proses menghapus data
if (isset($_GET['hapus'])) {

    // menerima id
    $id = $_GET['hapus'];

    // query detail
    $query_hapus_detail1 = mysqli_query($koneksi, "DELETE FROM detail_penggajian WHERE kode_penggajian='$id'");
    $query_hapus_detail2 = mysqli_query($koneksi, "DELETE FROM detail_penggajian_m WHERE kode_penggajian='$id'");

    if ($query_hapus_detail1) {
        if ($query_hapus_detail2) {

            // query penggajian
            $query_hapus = mysqli_query($koneksi, "DELETE FROM penggajian WHERE kode_penggajian='$id'");

            if ($query_hapus) {
                echo "<script>alert('Data Berhasil Dihapus'); window.location = 'admin.php?halaman=v_penggajian'</script>";
            }
        }
    }
}
?>
<div class="data-table-list">
    <div class="basic-tb-hd">
        <h2>Data Penggajian</h2>
        <br>
        <a href="admin.php?halaman=add_penggajian" class="btn btn-success notika-btn-success">Lakukan Penggajian</a>
    </div>
    <div class="table-responsive">
        <table id="data-table-basic" class="table table-striped">
            <thead>
                <tr>
                    <th>Kode Penggajian</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM penggajian WHERE status='1' ORDER BY kode_penggajian ASC");
                foreach ($query as $data) {
                    $tgl_transaksi = $data['tgl_transaksi'];
                    $tanggal = date('d/m/Y H:i:s', strtotime($tgl_transaksi));
                    ?>
                <tr>
                    <td><?= $data['kode_penggajian'] ?></td>
                    <td><?= $tanggal ?></td>
                    <td>
                        <a href="?halaman=v_detail_penggajian&id=<?= $data['kode_penggajian'] ?>" class="btn btn-primary">Detail</a>
                        <a onclick="return confirm('Yakin ingin menghapus data ?')" href="?halaman=v_penggajian&hapus=<?= $data['kode_penggajian']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Kode Penggajian</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>