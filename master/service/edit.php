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
    echo "<script>window.location = 'admin.php?halaman=v_service'</script>";
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
                        <input type="text" class="span6" id="firstname" name="kode_service" value="<?= $data['kode_service'] ?>" readonly>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Nama Service</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="nama_service" placeholder="Isi form nama akses" value="<?= $data['nama_service'] ?>">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Tarif Harga</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="tarif_harga" placeholder="Isi form nama akses" value="<?= $data['tarif_harga'] ?>">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 
                     <br/>
                    <div class="form-actions">
                      <button type="submit" name="update" class="btn btn-primary">Update</button> 
                      <a href="admin.php?halaman=v_service" class="btn btn-danger">Kembali</a>
                    </div> <!-- /form-actions -->
                </form>
                </div>    
              </div>
         
          </div>

        </div> <!-- /widget-content -->
            
      </div> <!-- /widget -->
            
    </div> <!-- /span8 -->
  