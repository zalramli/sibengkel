<?php 
if (isset($_POST['simpan'])) {
  $kode = kode('kode_ha','hak_akses',2,'H');
  $nm_akses = $_POST['nm_akses'];

  $query = mysqli_query($koneksi,"INSERT INTO hak_akses (kode_ha,nama_ha) VALUES ('$kode','$kategori') ");
  if($query){
    echo "<script>window.location = 'admin.php?halaman=v_akses'</script>";
  }
}
 ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bentuk Perhiasan</h1>
    </div>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link" href="">Tambah Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Daftar Bentuk</a>
                        </li>
                    </ul>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- disini isinya konten -->
                    <form method="POST" action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nm_akses">Nama Hak Akses</label>
                                <input type="text" class="form-control" id="nm_akses" name="nm_akses" placeholder="Bentuk Perhiasan" oninvalid="this.setCustomValidity('Isi Nama Akses')" oninput="setCustomValidity('')">
                                <div class="invalid-feedback">
                                    <!-- error muncul -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="" class="btn btn-danger">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>