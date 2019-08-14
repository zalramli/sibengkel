<?php
if (isset($_POST['update'])) {
  $kode_pegawai = $_POST['kode_pegawai'];
  $kode_jenis_p = $_POST['kode_jenis_p'];
  $nama_pegawai = $_POST['nama_pegawai'];
  $alamat = $_POST['alamat'];
  $no_telp = $_POST['no_telp'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $update = mysqli_query($koneksi, "UPDATE pegawai SET kode_jenis_p='$kode_jenis_p',nama_pegawai='$nama_pegawai',alamat='$alamat',no_telp='$no_telp',username='$username',password='$password' WHERE kode_pegawai='$kode_pegawai'");
  if ($update) {
    echo "<script>window.location = 'admin.php?halaman=v_pegawai'</script>";
  }
}

// mengambil ID
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM pegawai JOIN jenis_pegawai USING(kode_jenis_p) WHERE kode_pegawai='$id'");
?>
<div class="form-element-list">
  <div class="basic-tb-hd">
    <h2>Form Edit Pegawai</h2>
  </div>
  <?php
  foreach ($query as $data) {
    ?>


  <form action="" method="post">

    <div class="row">

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">Nama Pegawai</label>
        <div class="form-group">
          <div class="nk-int-st">
            <input type="hidden" name="kode_pegawai" class="form-control" value="<?= $data['kode_pegawai'] ?>">
            <input type="text" name="nama_pegawai" class="form-control" placeholder="Isi form Nama Pegawai" value="<?= $data['nama_pegawai'] ?>">
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">Jenis Pegawai</label>
        <div class="form-group">
          <div class="bootstrap-select fm-cmp-mg">
            <select name="kode_jenis_p" class="selectpicker" data-live-search="true">

              <?php
                $query_jenis = mysqli_query($koneksi, "SELECT * FROM jenis_pegawai ORDER BY nama_jenis_p ASC");
                foreach ($query_jenis as $data_jenis) {
                  ?>
              <option value="<?php echo $data_jenis["kode_jenis_p"]; ?>" <?php if ($data['kode_jenis_p'] == $data_jenis["kode_jenis_p"]) {
                                                                                echo "selected";
                                                                              } ?>>
                <?php echo $data_jenis["nama_jenis_p"]; ?>
              </option>
              <?php } ?>

            </select>
          </div>
        </div>
      </div>

    </div>

    <div class="row">

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">Username</label>
        <div class="form-group">
          <div class="nk-int-st">
            <input type="text" name="username" class="form-control" placeholder="Isi form Username" value="<?= $data['username'] ?>">
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">Password</label>
        <div class="form-group">
          <div class="nk-int-st">
            <input type="password" name="password" class="form-control" placeholder="Isi form Password">
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

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <label for="">Konfirmasi Password</label>
        <div class="form-group">
          <div class="nk-int-st">
            <input type="password" name="k_password" class="form-control" placeholder="Isi form Konfirmasi Password">
          </div>
        </div>
      </div>

    </div>

    <div class="row">

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <label for="">Alamat</label>
        <div class="form-group">
          <div class="nk-int-st">
            <textarea class="form-control" id="alamat" name="alamat" placeholder="Isi form Alamat" rows="3"><?= $data['alamat'] ?></textarea>
          </div>
        </div>
      </div>

    </div>

    <button type="submit" name="update" class="btn btn-primary">Update</button>
    <a href="admin.php?halaman=v_pegawai" class="btn btn-danger">Kembali</a>

  </form>

</div>
<?php } ?>