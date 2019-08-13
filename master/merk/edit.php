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
    echo "<script>window.location = 'admin.php?halaman=v_merk'</script>";
  }
}
?>
<div class="span12">          
    <div class="widget ">
          <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Hak Akses</h3>
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
                        <input type="text" class="span6" id="firstname" name="kode_merk" placeholder="Isi form nama akses" value="<?= $data['kode_merk'] ?>" readonly>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Nama Service</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="nama_merk" placeholder="Isi form nama service" value="<?= $data['nama_merk'] ?>">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 
                     <br/>
                    <div class="form-actions">
                      <button type="submit" name="update" class="btn btn-primary">Update</button> 
                      <a href="admin.php?halaman=v_merk" class="btn btn-danger">Kembali</a>
                    </div> <!-- /form-actions -->
                </form>
                </div>    
              </div>
         
          </div>

        </div> <!-- /widget-content -->
            
      </div> <!-- /widget -->
            
    </div> <!-- /span8 -->
  