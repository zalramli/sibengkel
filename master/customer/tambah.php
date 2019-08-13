<?php
// Membuat Kode otomatis
$sql = mysqli_query($koneksi, "SELECT max(kode_customer) FROM customer");
$kode_faktur = mysqli_fetch_array($sql);
if ($kode_faktur) {
  $nilai = substr($kode_faktur[0], 1);
  $kode = (int) $nilai;
  //tambahkan sebanyak + 1
  $kode = $kode + 1;
  $auto_kode = "K" . str_pad($kode, 4, "0",  STR_PAD_LEFT);
} else {
  $auto_kode = "K0001";
}
// Ketika tombil simpan di Klik
if (isset($_POST['simpan'])) {
  $nama_customer = $_POST['nama_customer'];
  $alamat = $_POST['alamat'];
  $no_telp = $_POST['no_telp'];
  $query = mysqli_query($koneksi, "INSERT INTO customer VALUES ('$auto_kode','$nama_customer','$alamat','$no_telp') ");
  if ($query) {
    echo "<script>window.location = 'cs.php?halaman=v_customer'</script>";
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
        <label for="">Nama Customer</label>
        <div class="form-group">
          <div class="nk-int-st">
            <input type="text" name="nama_customer" class="form-control" placeholder="Isi form nama Customer">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">ALamat</label>
        <div class="form-group">
          <div class="nk-int-st">
            <textarea class="form-control" id="alamat" name="alamat" placeholder="Isi form Alamat" rows="3" ></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
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
    <a href="cs.php?halaman=v_customer" class="btn btn-danger">Kembali</a>

  </form>

</div>