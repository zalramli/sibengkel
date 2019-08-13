<?php
// mengambil ID
$id=$_GET['id'];
$query = mysqli_query($koneksi,"SELECT kode_ha,nama_ha FROM hak_akses WHERE kode_ha='$id'");
$data=mysqli_fetch_array($query);

//Proses Update Data Hak akses 
if(isset($_POST['update'])) {
  $kode_ha = $_POST['kode_ha'];
  $nama_ha = $_POST['nama_ha'];

  $update = mysqli_query($koneksi,"UPDATE hak_akses SET nama_ha='$nama_ha' WHERE kode_ha='$kode_ha'");
  if ($update) {
    echo "<script>window.location = 'gudang.php?halaman=v_akses'</script>";
  }
}
?>
<div style="padding-bottom: 37px;" class="span12">          
    <div class="widget ">
          <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Hak Akses</h3>
          </div> <!-- /widget-header -->
          <div class="widget-content">

            <div class="tabbable">
            <ul class="nav nav-tabs">
              <li>
                <a href="gudang.php?halaman=v_akses">Input Form</a>
              </li>
              <li><a href="gudang.php?halaman=v_akses">Tampil Data</a></li>
            </ul>
            <br>
              <div class="tab-content">
                <div class="tab-pane active" id="formcontrols">
                <form method="post" action="" id="edit-profile" class="form-horizontal">  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Nama Akses</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="kode_ha" placeholder="Isi form nama akses" value="<?= $data['kode_ha'] ?>" readonly>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Nama Akses</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="nama_ha" placeholder="Isi form nama akses" value="<?= $data['nama_ha'] ?>">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 
                     <br/>
                    <div class="form-actions">
                      <button type="submit" name="update" class="btn btn-primary">Update</button> 
                      <a href="gudang.php?halaman=v_akses" class="btn btn-danger">Kembali</a>
                    </div> <!-- /form-actions -->
                </form>
                </div>    
              </div>
         
          </div>

        </div> <!-- /widget-content -->
            
      </div> <!-- /widget -->
            
    </div> <!-- /span8 -->
  