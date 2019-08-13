<?php
    //Proses menghapus data
    if ($_GET['hapus']) {
    $id = $_GET['hapus'];
    $query_hapus = mysqli_query($koneksi,"DELETE FROM merk WHERE kode_merk='$id'");
      if ($query_hapus) {
          echo "<script>window.location = 'gudang.php?halaman=v_merkBarang'</script>";
      }
    }
 ?>
<div class="data-table-list">
    <div class="basic-tb-hd">
        <h2>Merk BARANG</h2>
        <a href="gudang.php?halaman=add_merkBarang" class="btn btn-success notika-btn-success">Tambah Data</a>
    </div>
    <div class="table-responsive">
        <table id="data-table-basic" class="table table-striped">
            <thead>
                <tr>
                    <th>Kode Merk Barang</th>
                    <th>Nama Merk Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($koneksi,"SELECT kode_merk,nama_merk FROM merk");
                foreach ($query as $data) {
                 ?>
                  <tr>
                      <td><?= $data['kode_merk']?></td>
                      <td><?= $data['nama_merk']?></td>
                      <td>
                        <a href="?halaman=edit_merkBarang&id=<?= $data['kode_merk']; ?>"" class="btn btn-primary">Edit</a>
                        <a onclick="return confirm('Yakin ingin menghapus data ?')" href="?halaman=v_merkBarang&hapus=<?= $data['kode_merk']; ?>" class="btn btn-danger">Hapus</a>
                      </td>
                  </tr>
                  <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                    <th>Kode Merk Barang</th>
                    <th>Nama Merk Barang</th>
                    <th>Aksi</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>