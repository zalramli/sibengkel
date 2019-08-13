<?php 
// mengambil ID
$id=$_GET['id'];
$query = mysqli_query($koneksi,"SELECT kode_merk,nama_merk FROM merk WHERE kode_merk='$id'");
$data=mysqli_fetch_array($query);

//Proses Update Data Hak akses 
if(isset($_POST['update'])) {
  $kode_merk = $_POST['kode_merk'];
  $nama_merk = $_POST['nama_merk'];

  $update = mysqli_query($koneksi,"UPDATE merk SET nama_merk='$nama_merk' WHERE kode_merk='$kode_merk'");
  if ($update) {
    echo "<script>window.location = 'gudang.php?halaman=v_merkBarang'</script>";
  }
}
?>
<div class="form-element-list">
    <div class="basic-tb-hd">
        <h2>Form Edit Merk Barang</h2>
        <p>Text Inputs with different sizes by height(<code>.input-sm, .input-lg</code>) and column.</p>
    </div>
    <div class="row">
        <form action="" method="post">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="">Kode Merk Barang</label>
            <div class="form-group">
                <div class="nk-int-st">
                    <input type="text" name="kode_merk" class="form-control" placeholder="Isi form nama jenis barang" readonly="" value="<?= $data['kode_merk'] ?>">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="">Nama Kode Barang</label>
            <div class="form-group">
                <div class="nk-int-st">
                    <input type="text" name="nama_merk" class="form-control" placeholder="Isi form nama kode barang" value="<?= $data['nama_merk'] ?>">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="gudang.php?halaman=v_merkBarang" class="btn btn-danger">Kembali</a>
        </div>
        </form>
    </div>
    
</div>