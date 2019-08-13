<?php 
  // Membuat Kode otomatis
    $sql = mysqli_query($koneksi,"SELECT max(kode_merk) FROM merk");
    $kode_faktur = mysqli_fetch_array($sql);
    if($kode_faktur){
      $nilai = substr($kode_faktur[0], 1);
      $kode = (int) $nilai;
      //tambahkan sebanyak + 1
      $kode = $kode + 1;
      $auto_kode = "M" .str_pad($kode, 2, "0",  STR_PAD_LEFT);
    } else {
      $auto_kode = "M01";
    }

    // Ketika tombil simpan di Klik
    if (isset($_POST['simpan'])) {
      $nama_merk = $_POST['nama_merk'];
      $query = mysqli_query($koneksi,"INSERT INTO merk (kode_merk,nama_merk) VALUES ('$auto_kode','$nama_merk') ");
      if($query){
        echo "<script>window.location = 'gudang2.php?halaman=v_merkBarang'</script>";
      }
    }
?>
<div class="form-element-list">
    <div class="basic-tb-hd">
        <h2>Form Tambah Merk Barang</h2>
        <p>Text Inputs with different sizes by height(<code>.input-sm, .input-lg</code>) and column.</p>
    </div>
    <div class="row">
        <form action="" method="post">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label for="">Nama Merk Barang</label>
            <div class="form-group">
                <div class="nk-int-st">
                    <input type="text" name="nama_merk" class="form-control" placeholder="Isi form nama merk barang">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            <a href="gudang2.php?halaman=v_merkBarang" class="btn btn-danger">Kembali</a>
        </div>
        </form>
    </div>
    
</div>