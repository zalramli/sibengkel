<?php 
// mengambil ID
$id=$_GET['id'];
$query = mysqli_query($koneksi,"SELECT kode_jenis,nama_jenis FROM jenis_barang WHERE kode_jenis='$id'");
$data=mysqli_fetch_array($query);

//Proses Update Data Hak akses 
if(isset($_POST['update'])) {
  $kode_jenis = $_POST['kode_jenis'];
  $nama_jenis = $_POST['nama_jenis'];

  $update = mysqli_query($koneksi,"UPDATE jenis_barang SET nama_jenis='$nama_jenis' WHERE kode_jenis='$kode_jenis'");
  if ($update) {
    echo "<script>window.location = 'gudang.php?halaman=v_jenisBarang'</script>";
  }
}
?>
<div class="form-element-list">
    <div class="basic-tb-hd">
        <h2>Form Edit Jenis Barang</h2>
    </div>
    <div class="row">
        <form action="" method="post">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="">Kode Jenis Barang</label>
            <div class="form-group">
                <div class="nk-int-st">
                    <input type="text" name="kode_jenis" class="form-control" placeholder="Isi form nama jenis barang" readonly="" value="<?= $data['kode_jenis'] ?>">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="">Nama Jenis Barang</label>
            <div class="form-group">
                <div class="nk-int-st">
                    <input type="text" name="nama_jenis" class="form-control" placeholder="Isi form nama jenis barang" value="<?= $data['nama_jenis'] ?>">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="gudang.php?halaman=v_jenisBarang" class="btn btn-danger">Kembali</a>
        </div>
        </form>
    </div>
    
</div>