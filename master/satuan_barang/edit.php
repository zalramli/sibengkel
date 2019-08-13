<?php
// mengambil ID
$id=$_GET['id'];
$query = mysqli_query($koneksi,"SELECT kode_satuan,nama_satuan FROM satuan WHERE kode_satuan='$id'");
$data=mysqli_fetch_array($query);

//Proses Update Data Hak akses 
if(isset($_POST['update'])) {
  $kode_satuan = $_POST['kode_satuan'];
  $nama_satuan = $_POST['nama_satuan'];

  $update = mysqli_query($koneksi,"UPDATE satuan SET nama_satuan='$nama_satuan' WHERE kode_satuan='$kode_satuan'");
  if ($update) {
    echo "<script>window.location = 'admin.php?halaman=v_satuan'</script>";
  }
}
?>
<div class="span12">          
    <div class="widget ">
          <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Merk Barang</h3>
          </div> <!-- /widget-header -->
          <div class="widget-content">

            <div class="tabbable">
            <ul class="nav nav-tabs">
              <li>
                <a href="admin.php?halaman=v_satuan">Input Form</a>
              </li>
              <li><a href="admin.php?halaman=v_satuan">Tampil Data</a></li>
            </ul>
            <br>
              <div class="tab-content">
                <div class="tab-pane active" id="formcontrols">
                <form method="post" action="" id="edit-profile" class="form-horizontal">  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Kode Satuan</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="kode_satuan" placeholder="Isi form nama akses" value="<?= $data['kode_satuan'] ?>" readonly>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Nama Satuan</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="nama_satuan" placeholder="Isi form nama service" value="<?= $data['nama_satuan'] ?>">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 
                     <br/>
                    <div class="form-actions">
                      <button type="submit" name="update" class="btn btn-primary">Update</button> 
                      <a href="admin.php?halaman=v_satuan" class="btn btn-danger">Kembali</a>
                    </div> <!-- /form-actions -->
                </form>
                </div>    
              </div>
         
          </div>

        </div> <!-- /widget-content -->
            
      </div> <!-- /widget -->
            
    </div> <!-- /span8 -->
  