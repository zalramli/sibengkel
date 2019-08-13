<?php
// mengambil ID
$id=$_GET['id'];
$query = mysqli_query($koneksi,"SELECT kode_jenis_p,nama_jenis_p FROM jenis_pegawai WHERE kode_jenis_p='$id'");
$data=mysqli_fetch_array($query);

//Proses Update Data Hak akses 
if(isset($_POST['update'])) {
  $kode_jenis_p = $_POST['kode_jenis_p'];
  $nama_jenis_p = $_POST['nama_jenis_p'];

  $update = mysqli_query($koneksi,"UPDATE jenis_pegawai SET nama_jenis_p='$nama_jenis_p' WHERE kode_jenis_p='$kode_jenis_p'");
  if ($update) {
    echo "<script>window.location = 'admin.php?halaman=v_jenisPegawai'</script>";
  }
}
?>
<div style="padding-bottom: 37px;" class="span12">          
    <div class="widget ">
          <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Jenis Barang</h3>
          </div> <!-- /widget-header -->
          <div class="widget-content">

            <div class="tabbable">
            <ul class="nav nav-tabs">
              <li>
                <a href="admin.php?halaman=v_jenisPegawai">Input Form</a>
              </li>
              <li><a href="admin.php?halaman=v_jenisPegawai">Tampil Data</a></li>
            </ul>
            <br>
              <div class="tab-content">
                <div class="tab-pane active" id="formcontrols">
                <form method="post" action="" id="edit-profile" class="form-horizontal">  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Kode Jenis Pegawai</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="kode_jenis_p" placeholder="Isi form nama akses" value="<?= $data['kode_jenis_p'] ?>" readonly>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Nama Jenis Pegawai</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="nama_jenis_p" placeholder="Isi form nama service" value="<?= $data['nama_jenis_p'] ?>">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 
                     <br/>
                    <div class="form-actions">
                      <button type="submit" name="update" class="btn btn-primary">Update</button> 
                      <a href="admin.php?halaman=v_jenisPegawai" class="btn btn-danger">Kembali</a>
                    </div> <!-- /form-actions -->
                </form>
                </div>    
              </div>
         
          </div>

        </div> <!-- /widget-content -->
            
      </div> <!-- /widget -->
            
    </div> <!-- /span8 -->
  