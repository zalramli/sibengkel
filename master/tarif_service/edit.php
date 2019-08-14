<?php
// mengambil ID
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT kode_service,nama_service,tarif_harga FROM service WHERE kode_service='$id'");
$data = mysqli_fetch_array($query);

//Proses Update Data Hak akses
if (isset($_POST['update'])) {
    $kode_service = $_POST['kode_service'];
    $nama_service = $_POST['nama_service'];
    $tarif_harga = $_POST['tarif_harga'];
    $update = mysqli_query($koneksi, "UPDATE service SET nama_service='$nama_service',tarif_harga='$tarif_harga' WHERE kode_service='$kode_service'");
    if ($update) {
        echo "<script>alert('Data Berhasil Terupdate'); window.location = 'kasir.php?halaman=v_tarifService'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Update Database'); window.location = 'kasir.php?halaman=edit_tarifService&id=" .$id."'</script>";
    }
}
?>
<div class="form-element-list">
    <div class="basic-tb-hd">
        <h2>Form Edit Tarif Service</h2>
    </div>

    <form action="" method="post">

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label for="">Nama Service</label>
                <div class="form-group">
                    <div class="nk-int-st">
                        <input type="hidden" name="kode_service" class="form-control" placeholder="Isi form tarif service" readonly="" value="<?= $data['kode_service'] ?>">
                        <input type="text" name="nama_service" class="form-control" placeholder="Isi Form Nama Service" required="" maxlength="30" oninvalid="this.setCustomValidity('Nama Wajib Diisi')" oninput="setCustomValidity('')" value="<?= $data['nama_service'] ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <label for="">Tarif Harga</label>
                <div class="form-group">
                    <div class="nk-int-st">
                        <input type="number" name="tarif_harga" class="form-control" placeholder="Isi form Tarif Harga" required="" max="999999999" oninvalid="this.setCustomValidity('Tarif Service Wajib Diisi')" oninput="setCustomValidity('')" value="<?= $data['tarif_harga'] ?>">
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="kasir.php?halaman=v_tarifService" class="btn btn-danger">Kembali</a>
    </form>

</div>