<?php
if (isset($_POST['update'])) {
  $kode_customer = $_POST['kode_customer'];
  $nama_customer = $_POST['nama_customer'];
  $alamat = $_POST['alamat'];
  $no_telp = $_POST['no_telp'];

  $update = mysqli_query($koneksi, "UPDATE customer SET nama_customer='$nama_customer',alamat='$alamat',no_telp='$no_telp' WHERE kode_customer='$kode_customer'");
  if ($update) {
    echo "<script>window.location = 'cs.php?halaman=v_customer'</script>";
  }
}

// mengambil ID
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM customer WHERE kode_customer='$id'");
?>

<div class="form-element-list">
  <div class="basic-tb-hd">
    <h2>Form Edit Barang</h2>
  </div>

  <?php
  foreach ($query as $data) {
    ?>

  <form action="" method="post">

    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">Nama Customer</label>
        <div class="form-group">
          <div class="nk-int-st">
            <input type="hidden" name="kode_customer" class="form-control" value="<?= $data['kode_customer'] ?>">
            <input type="text" name="nama_customer" class="form-control" placeholder="Isi form nama Customer" value="<?= $data['nama_customer'] ?>">
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">ALamat</label>
        <div class="form-group">
          <div class="nk-int-st">
            <textarea class="form-control" id="alamat" name="alamat" placeholder="Isi form Alamat" rows="3"><?= $data['alamat'] ?></textarea>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">No telp</label>
        <div class="form-group">
          <div class="nk-int-st">
            <input type="text" name="no_telp" class="form-control" placeholder="Isi form No telp" value="<?= $data['no_telp'] ?>">
          </div>
        </div>
      </div>
    </div>

    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="cs.php?halaman=v_customer" class="btn btn-danger">Kembali</a>

  </form>

</div>

<?php } ?>