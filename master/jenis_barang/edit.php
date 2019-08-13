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
    echo "<script>window.location = 'admin.php?halaman=v_jenis'</script>";
  }
}
?>
<div class="span12">          
    <div class="widget ">
          <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Jenis Barang</h3>
          </div> <!-- /widget-header -->
          <div class="widget-content">

            <div class="tabbable">
            <ul class="nav nav-tabs">
              <li>
                <a href="admin.php?halaman=v_akses">Input Form</a>
              </li>
              <li><a href="admin.php?halaman=v_akses">Tampil Data</a></li>
            </ul>
            <br>
              <div class="tab-content">
                <div class="tab-pane active" id="formcontrols">
                <form method="post" action="" id="edit-profile" class="form-horizontal">  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Kode Service</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="kode_jenis" placeholder="Isi form nama akses" value="<?= $data['kode_jenis'] ?>" readonly>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Nama Service</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="nama_jenis" placeholder="Isi form nama service" value="<?= $data['nama_jenis'] ?>">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 
                     <br/>
                    <div class="form-actions">
                      <button type="submit" name="update" class="btn btn-primary">Update</button> 
                      <a href="admin.php?halaman=v_jenis" class="btn btn-danger">Kembali</a>
                    </div> <!-- /form-actions -->
                </form>
                </div>    
              </div>
         
          </div>

        </div> <!-- /widget-content -->
            
      </div> <!-- /widget -->
            
    </div> <!-- /span8 -->
  