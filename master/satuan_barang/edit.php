<?php 
// mengambil ID
$id=$_GET['id'];
$query = mysqli_query($koneksi,"SELECT kode_satuan,nama_satuan FROM satuan WHERE kode_satuan='$id'");
$data=mysqli_fetch_array($query);

//Proses Update Data Hak akses 
if(isset($_POST['update'])) {
  $kode_satuan = $_POST['kode_satuan'];
  $nama_satuan = $_POST['nama_satuan'];

  $update = mysqli_query($koneksi,"UPDATE satuan SET nama_satuan='$nama_satuan' WHERE kode_satuan='$kode_satuan'");
  if ($update) {
    echo "<script>window.location = 'gudang.php?halaman=v_satuanBarang'</script>";
  }
}
?>
<div class="form-element-list">
    <div class="basic-tb-hd">
        <h2>Form Edit Satuan Barang</h2>
    </div>
    <div class="row">
        <form action="" method="post">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="">Kode Satuan Barang</label>
            <div class="form-group">
                <div class="nk-int-st">
                    <input type="text" name="kode_satuan" class="form-control" placeholder="Isi form nama satuan barang" readonly="" value="<?= $data['kode_satuan'] ?>">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="">Nama Satuan Barang</label>
            <div class="form-group">
                <div class="nk-int-st">
                    <input type="text" name="nama_satuan" class="form-control" placeholder="Isi form nama kode barang" value="<?= $data['nama_satuan'] ?>">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="gudang.php?halaman=v_satuanBarang" class="btn btn-danger">Kembali</a>
        </div>
        </form>
    </div>
    
</div>