<?php


//Proses Update Data Hak akses 
if(isset($_POST['update'])) {
  $kode_barang = $_POST['kode_barang'];
  $kode_merk = $_POST['kode_merk'];
  $kode_satuan = $_POST['kode_satuan'];
  $kode_jenis = $_POST['kode_jenis'];
  $nama_barang = $_POST['nama_barang'];
  $stock = $_POST['stock'];
  $stock_limit = $_POST['stock_limit'];
  $harga_pokok = $_POST['harga_pokok'];
  $harga_jual = $_POST['harga_jual'];

  $update = mysqli_query($koneksi,"UPDATE barang SET kode_merk='$kode_merk',kode_satuan='$kode_satuan',kode_jenis='$kode_jenis',nama_barang='$nama_barang',stock='$stock',stock_limit='$stock_limit',harga_pokok='$harga_pokok',harga_jual='$harga_jual' WHERE kode_barang='$kode_barang'");
  if ($update) {
    echo "<script>window.location = 'admin.php?halaman=v_barang'</script>";
  }
}

  // mengambil ID
  $id=$_GET['id'];
  $query = mysqli_query($koneksi,"SELECT * FROM barang JOIN merk USING(kode_merk) JOIN satuan USING(kode_satuan) JOIN jenis_barang USING(kode_jenis) WHERE kode_barang='$id'");
  
?>
<div style="padding-bottom: 37px;" class="span12">          
    <div class="widget ">
          <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Daftar Service</h3>
          </div> <!-- /widget-header -->
          <div class="widget-content">

            <div class="tabbable">
            <ul class="nav nav-tabs">
              <li>
                <a href="admin.php?halaman=v_barang">Input Form</a>
              </li>
              <li><a href="admin.php?halaman=v_barang">Tampil Data</a></li>
            </ul>
            <br>
              <div class="tab-content">
                <div class="tab-pane active" id="formcontrols">
                <?php
                foreach ($query as $data) 
                {
                ?>
                <form method="post" action="" id="edit-profile" class="form-horizontal">  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Kode Barang</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="kode_barang" placeholder="Isi form nama barang" readonly="" value="<?= $data['kode_barang'] ?>">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Nama Barang</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="nama_barang" placeholder="Isi form nama barang" value="<?= $data['nama_barang'] ?>">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Jenis Barang</label>
                      <div class="controls">
                        <select name="kode_jenis" id="" class="span6">
                          <?php
                          $query_jenis = mysqli_query($koneksi,"SELECT * FROM jenis_barang ORDER BY kode_jenis ASC");
                            foreach ($query_jenis as $data_jenis) 
                            {
                          ?>
                            <option value="<?php echo $data_jenis["kode_jenis"]; ?>" <?php if($data['kode_jenis']==$data_jenis["kode_jenis"]){echo "selected";} ?>>
                                    <?php echo $data_jenis["nama_jenis"]; ?>
                                </option>
                          <?php } ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Merk Barang</label>
                      <div class="controls">
                        <select name="kode_merk" id="" class="span6">
                          <?php
                          $query_merk = mysqli_query($koneksi,"SELECT * FROM merk ORDER BY kode_merk ASC");
                            foreach ($query_merk as $data_merk) 
                            {
                            ?>
                            <option value="<?php echo $data_merk["kode_merk"]; ?>" <?php if($data['kode_merk']==$data_merk["kode_merk"]){echo "selected";} ?>>
                                    <?php echo $data_merk["nama_merk"]; ?>
                            </option>
                          <?php } ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Stock Barang</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="stock" placeholder="Isi form stok barang" value="<?= $data['stock'] ?>">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Stock Limit</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="stock_limit" placeholder="Isi form stok barang limit" value="<?= $data['stock_limit'] ?>">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Satuan Barang</label>
                      <div class="controls">
                        <select name="kode_satuan" id="" class="span6">
                          <?php
                          $query_satuan = mysqli_query($koneksi,"SELECT * FROM satuan ORDER BY kode_satuan ASC");
                            foreach ($query_satuan as $data_satuan) 
                            {
                            ?>
                            <option value="<?php echo $data_satuan["kode_satuan"]; ?>" <?php if($data['kode_satuan']==$data_satuan["kode_satuan"]){echo "selected";} ?>>
                                    <?php echo $data_satuan["nama_satuan"]; ?>
                            </option>
                          <?php } ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Harga Pokok</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="harga_pokok" placeholder="Isi form harga pokok" value="<?= $data['harga_pokok'] ?>">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Harga Jual</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="harga_jual" placeholder="Isi form harga jual" value="<?= $data['harga_jual'] ?>">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 
                     <br/>
                    <div class="form-actions">
                      <button type="submit" name="update" class="btn btn-primary">Update</button> 
                      <a href="admin.php?halaman=v_barang" class="btn btn-danger">Kembali</a>
                    </div> <!-- /form-actions -->
                </form>
                </div>    
              </div>
         
          </div>

        </div> <!-- /widget-content -->
            
      </div> <!-- /widget -->
            
    </div> <!-- /span8 -->
    <?php
    } 
    ?>
  