<?php
// Membuat Kode otomatis
$sql = mysqli_query($koneksi, "SELECT max(kode_suplier) FROM suplier");
$kode_faktur = mysqli_fetch_array($sql);
if ($kode_faktur) {
  $nilai = substr($kode_faktur[0], 1);
  $kode = (int) $nilai;
  //tambahkan sebanyak + 1
  $kode = $kode + 1;
  $auto_kode = "S" . str_pad($kode, 3, "0",  STR_PAD_LEFT);
} else {
  $auto_kode = "S001";
}
// Ketika tombil simpan di Klik
if (isset($_POST['simpan'])) {
  $nama_suplier = $_POST['nama_suplier'];
  $alamat = $_POST['alamat'];
  $kontak_person = $_POST['kontak_person'];
  $telp = $_POST['telp'];
  $query = mysqli_query($koneksi, "INSERT INTO suplier VALUES ('$auto_kode','$nama_suplier','$alamat','$kontak_person','$telp') ");
  if ($query) {
    echo "<script>window.location = 'kasir.php?halaman=v_suplier'</script>";
  }
}
?>
<div class="form-element-list">
  <div class="basic-tb-hd">
    <h2>Form Tambah Suplier</h2>
  </div>
  <form action="" method="post">

    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">Nama Suplier</label>
        <div class="form-group">
          <div class="nk-int-st">
            <input type="text" name="nama_suplier" class="form-control" placeholder="Isi form nama Suplier">
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">Kontak Person</label>
        <div class="form-group">
          <div class="nk-int-st">
            <input type="text" name="kontak_person" class="form-control" placeholder="Isi form Kontak Person">
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
            <input type="text" name="telp" class="form-control" placeholder="Isi form No telp">
          </div>
        </div>
      </div>
    </div>

    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    <a href="kasir.php?halaman=v_suplier" class="btn btn-danger">Kembali</a>

  </form>

</div>