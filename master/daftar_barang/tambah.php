<?php
// Membuat Kode otomatis
$sql = mysqli_query($koneksi, "SELECT max(kode_barang) FROM barang");
$kode_faktur = mysqli_fetch_array($sql);
if ($kode_faktur) {
  $nilai = substr($kode_faktur[0], 1);
  $kode = (int) $nilai;
  //tambahkan sebanyak + 1
  $kode = $kode + 1;
  $auto_kode = "B" . str_pad($kode, 4, "0",  STR_PAD_LEFT);
} else {
  $auto_kode = "B0001";
}
// Ketika tombil simpan di Klik
if (isset($_POST['simpan'])) {
  $kode_merk = $_POST['kode_merk'];
  $kode_satuan = $_POST['kode_satuan'];
  $kode_jenis = $_POST['kode_jenis'];
  $nama_barang = ucfirst($_POST['nama_barang']);
  $stock = $_POST['stock'];
  $stock_limit = $_POST['stock_limit'];
  $harga_pokok = $_POST['harga_pokok'];
  $harga_jual = $_POST['harga_jual'];
  $query = mysqli_query($koneksi, "INSERT INTO barang VALUES ('$auto_kode','$kode_merk','$kode_satuan','$kode_jenis','$nama_barang','$stock','$stock_limit','$harga_pokok','$harga_jual') ");
  if ($query) {
    echo "<script>alert('Data Berhasil Ditambahkan'); window.location = 'gudang.php?halaman=v_daftarBarang'</script>";
  } else {
    echo "<script>alert('Terjadi Kesalahan Input Database'); window.location = 'gudang.php?halaman=add_daftarBarang'</script>";
  }
}
?>
<div class="form-element-list">
  <div class="basic-tb-hd">
    <h2>Form Tambah Barang</h2>
  </div>
  <form action="" method="post">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">Nama Barang</label>
        <div class="form-group">
          <div class="nk-int-st">
            <input type="text" name="nama_barang" class="form-control" placeholder="Isi form nama barang" required="" maxlength="50" oninvalid="this.setCustomValidity('Nama Wajib Diisi')" oninput="setCustomValidity('')">
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <label for="">Jenis Barang</label>
        <div class="form-group">
          <div class="bootstrap-select fm-cmp-mg">
            <select name="kode_jenis" class="selectpicker" data-live-search="true" required="">

              <option value="">Please select</option>

              <?php
              $query_jenis = mysqli_query($koneksi, "SELECT * FROM jenis_barang ORDER BY kode_jenis ASC");
              while ($data_jenis = mysqli_fetch_array($query_jenis)) {
                ?>

              <option value="<?= $data_jenis['kode_jenis'] ?>"><?= $data_jenis['nama_jenis'] ?></option>

              <?php } ?>

            </select>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <label for="">Merk Barang</label>
        <div class="form-group">
          <div class="bootstrap-select fm-cmp-mg">
            <select name="kode_merk" class="selectpicker" data-live-search="true" required="">

              <option value="">Please select</option>

              <?php
              $query_merk = mysqli_query($koneksi, "SELECT * FROM merk ORDER BY kode_merk ASC");
              while ($data_merk = mysqli_fetch_array($query_merk)) {
                ?>

              <option value="<?= $data_merk['kode_merk'] ?>"><?= $data_merk['nama_merk'] ?></option>

              <?php } ?>

            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">Stock Barang</label>
        <div class="form-group">
          <div class="nk-int-st">
            <input type="number" name="stock" class="form-control" placeholder="Isi form stock barang" required="" max="99999" oninvalid="this.setCustomValidity('Stock Barang Wajib Diisi')" oninput="setCustomValidity('')">
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <label for="">Stock Limit Barang</label>
        <div class="form-group">
          <div class="nk-int-st">
            <input type="number" name="stock_limit" class="form-control" placeholder="Isi form stock limit barang" required="" max="99999" oninvalid="this.setCustomValidity('Stock Limit Barang Wajib Diisi')" oninput="setCustomValidity('')">
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <label for="">Satuan Barang</label>
        <div class="form-group">
          <div class="bootstrap-select fm-cmp-mg">
            <select name="kode_satuan" class="selectpicker" data-live-search="true" required="">

              <option value="">Please select</option>

              <?php
              $query_satuan = mysqli_query($koneksi, "SELECT * FROM satuan ORDER BY kode_satuan ASC");
              while ($data_satuan = mysqli_fetch_array($query_satuan)) {
                ?>

              <option value="<?= $data_satuan['kode_satuan'] ?>"><?= $data_satuan['nama_satuan'] ?></option>

              <?php } ?>

            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">Harga Pokok</label>
        <div class="form-group">
          <div class="nk-int-st">
            <input type="number" name="harga_pokok" class="form-control" placeholder="Isi form harga pokok barang" required="" max="999999999" oninvalid="this.setCustomValidity('Harga Pokok Wajib Diisi')" oninput="setCustomValidity('')">
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">Harga Jual</label>
        <div class="form-group">
          <div class="nk-int-st">
            <input type="number" name="harga_jual" class="form-control" placeholder="Isi form harga jual barang" required="" max="999999999" oninvalid="this.setCustomValidity('Harga Jual Wajib Diisi')" oninput="setCustomValidity('')">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="gudang.php?halaman=v_daftarBarang" class="btn btn-danger">Kembali</a>
      </div>

    </div>
  </form>

</div>