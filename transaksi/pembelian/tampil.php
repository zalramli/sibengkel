<div class="data-table-list">
  <div class="basic-tb-hd">
    <h2>Data Permintaan Pemasokan</h2>
  </div>
  <div class="table-responsive">
    <table id="data-table-basic" class="table table-striped">
      <thead>
        <tr>
          <th>Kode Permintaan</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM permintaan_barang ORDER BY kode_permintaan ASC");
        foreach ($query as $data) {
          ?>
        <tr>
          <td><?= $data['kode_permintaan'] ?></td>
          <td><?= $data['tgl_permintaan'] ?></td>
          <td>
            <a href="?halaman=add_transaksi_pembelian&id=<?= $data['kode_permintaan'] ?>" class="btn btn-primary">Pilih</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <tr>
          <th>Kode Permintaan</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>