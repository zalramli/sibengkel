<?php
// mengambil ID
$id=$_GET['id'];
$query = mysqli_query($koneksi,"SELECT kode_service,nama_service,tarif_harga FROM service WHERE kode_service='$id'");
$data=mysqli_fetch_array($query);
//Proses Update Data Hak akses
if(isset($_POST['update'])) {
$kode_service = $_POST['kode_service'];
$nama_service = $_POST['nama_service'];
$tarif_harga = $_POST['tarif_harga'];
$update = mysqli_query($koneksi,"UPDATE service SET nama_service='$nama_service',tarif_harga='$tarif_harga' WHERE kode_service='$kode_service'");
if ($update) {
echo "<script>window.location = 'kasir.php?halaman=v_tarifService'</script>";
}
}
?>
<div class="form-element-list">
    <div class="basic-tb-hd">
        <h2>Form Edit Tarif Service</h2>
    </div>
    <div class="row">
        <form action="" method="post">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label for="">Kode Tarif Service</label>
                <div class="form-group">
                    <div class="nk-int-st">
                        <input type="text" name="kode_service" class="form-control" placeholder="Isi form tarif service" readonly="" value="<?= $data['kode_service'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label for="">Nama Service</label>
                <div class="form-group">
                    <div class="nk-int-st">
                        <input type="text" name="nama_service" class="form-control" placeholder="Isi form nama jenis barang" value="<?= $data['nama_service'] ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label for="">Tarif Harga</label>
                <div class="form-group">
                    <div class="nk-int-st">
                        <input type="text" name="tarif_harga" class="form-control" placeholder="Isi form nama jenis barang" value="<?= $data['tarif_harga'] ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <button type="submit" name="update" class="btn btn-primary">Update</button>
                <a href="kasir.php?halaman=v_tarifService" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </form>
    
</div>