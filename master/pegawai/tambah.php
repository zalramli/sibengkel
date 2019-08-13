<?php
// Membuat Kode otomatis
$sql = mysqli_query($koneksi, "SELECT max(kode_pegawai) FROM pegawai");
$kode_faktur = mysqli_fetch_array($sql);
if ($kode_faktur) {
  $nilai = substr($kode_faktur[0], 2);
  $kode = (int) $nilai;
  //tambahkan sebanyak + 1
  $kode = $kode + 1;
  $auto_kode = "PG" . str_pad($kode, 3, "0",  STR_PAD_LEFT);
} else {
  $auto_kode = "PG001";
}

// Ketika tombil simpan di Klik
if (isset($_POST['simpan'])) {

  $kode_jenis_p = $_POST['kode_jenis_p'];
  $nama_pegawai = $_POST['nama_pegawai'];
  $alamat = $_POST['alamat'];
  $no_telp = $_POST['no_telp'];
  $status = '0';
  $query = mysqli_query($koneksi, "INSERT INTO pegawai (kode_pegawai,kode_jenis_p,nama_pegawai,alamat,no_telp,status_login) VALUES ('$auto_kode','$kode_jenis_p','$nama_pegawai','$alamat','$no_telp','$status') ");
  if ($query) {
    echo "<script>window.location = 'admin.php?halaman=v_pegawai'</script>";
  }
}
?>
<div class="form-element-list">
  <div class="basic-tb-hd">
    <h2>Form Tambah Pegawai</h2>
  </div>
  <form action="" method="post">

    <div class="row">

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">Nama Pegawai</label>
        <div class="form-group">
          <div class="nk-int-st">
            <input type="text" name="nama_pegawai" class="form-control" placeholder="Isi form Nama Pegawai">
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">Jenis Pegawai</label>
        <div class="form-group">
          <div class="bootstrap-select fm-cmp-mg">
            <select name="kode_jenis_p" class="selectpicker" data-live-search="true">

              <option value="">Please select</option>

              <?php
              $query_jenis = mysqli_query($koneksi, "SELECT * FROM jenis_pegawai ORDER BY nama_jenis_p ASC");
              while ($data_jenis = mysqli_fetch_array($query_jenis)) {
                ?>

              <option value="<?= $data_jenis['kode_jenis_p'] ?>"><?= $data_jenis['nama_jenis_p'] ?></option>

              <?php } ?>

            </select>
          </div>
        </div>
      </div>

    </div>

    <div class="row">

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">ALamat</label>
        <div class="form-group">
          <div class="nk-int-st">
            <textarea class="form-control" id="alamat" name="alamat" placeholder="Isi form Alamat" rows="3"></textarea>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">No telp</label>
        <div class="form-group">
          <div class="nk-int-st">
            <input type="text" name="no_telp" class="form-control" placeholder="Isi form No telp">
          </div>
        </div>
      </div>

    </div>

    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    <a href="admin.php?halaman=v_pegawai" class="btn btn-danger">Kembali</a>

  </form>

</div>