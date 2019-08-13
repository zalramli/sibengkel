<?php 
// Membuat Kode otomatis
    $sql = mysqli_query($koneksi,"SELECT max(kode_service) FROM service");
    $kode_faktur = mysqli_fetch_array($sql);
    if($kode_faktur){
      $nilai = substr($kode_faktur[0], 2);
      $kode = (int) $nilai;
      //tambahkan sebanyak + 1
      $kode = $kode + 1;
      $auto_kode = "SV" .str_pad($kode, 2, "0",  STR_PAD_LEFT);
    } else {
      $auto_kode = "SV01";
    }

    // Ketika tombil simpan di Klik
    if (isset($_POST['simpan'])) {
      $nama_service = $_POST['nama_service'];
      $tarif_harga = $_POST['tarif_harga'];
      $query = mysqli_query($koneksi,"INSERT INTO service (kode_service,nama_service,tarif_harga) VALUES ('$auto_kode','$nama_service','$tarif_harga') ");
      if($query){
        echo "<script>window.location = 'kasir.php?halaman=v_tarifService'</script>";
      }
    }
?>
<div class="form-element-list">
    <div class="basic-tb-hd">
        <h2>Form Tambah Tarif Service</h2>
    </div>
    <div class="row">
        <form action="" method="post">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="">Nama Service</label>
            <div class="form-group">
                <div class="nk-int-st">
                    <input type="text" name="nama_service" class="form-control" placeholder="Isi form nama service">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="">Tarif Service</label>
            <div class="form-group">
                <div class="nk-int-st">
                    <input type="text" name="tarif_harga" class="form-control" placeholder="Isi form tarif service">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            <a href="kasir.php?halaman=v_tarifService" class="btn btn-danger">Kembali</a>
        </div>
        </form>
    </div>
    
</div>