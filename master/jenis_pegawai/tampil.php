<?php
    //Proses menghapus data
    if ($_GET['hapus']) {
    $id = $_GET['hapus'];
    $query_hapus = mysqli_query($koneksi,"DELETE FROM jenis_pegawai WHERE kode_jenis_p='$id'");
      if ($query_hapus) {
          echo "<script>window.location = 'cs.php?halaman=v_jenisPegawai'</script>";
      }
    }
 ?>
<div class="data-table-list">
    <div class="basic-tb-hd">
        <h2>JENIS PEGAWAI</h2>
        <a href="cs.php?halaman=add_jenisPegawai" class="btn btn-success notika-btn-success">Tambah Data</a>
    </div>
    <div class="table-responsive">
        <table id="data-table-basic" class="table table-striped">
            <thead>
                <tr>
                    <th>Kode Jenis Pegawai</th>
                    <th>Nama Jenis Pegawai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($koneksi,"SELECT kode_jenis_p,nama_jenis_p FROM jenis_pegawai");
                foreach ($query as $data) {
                 ?>
                  <tr>
                      <td><?= $data['kode_jenis_p']?></td>
                      <td><?= $data['nama_jenis_p']?></td>
                      <td>
                        <a href="?halaman=edit_jenisPegawai&id=<?= $data['kode_jenis_p']; ?>" class="btn btn-primary">Edit</a>
                        <a onclick="return confirm('Yakin ingin menghapus data ?')" href="?halaman=v_jenisPegawai&hapus=<?= $data['kode_jenis_p']; ?>" class="btn btn-danger">Hapus</a>
                      </td>
                  </tr>
                  <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                    <th>Kode Jenis Pegawai</th>
                    <th>Nama Jenis Pegawai</th>
                    <th>Aksi</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>