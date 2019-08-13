<?php
    // Membuat Kode otomatis
    $sql = mysqli_query($koneksi,"SELECT max(kode_barang) FROM barang");
    $kode_faktur = mysqli_fetch_array($sql);
    if($kode_faktur){
      $nilai = substr($kode_faktur[0], 1);
      $kode = (int) $nilai;
      //tambahkan sebanyak + 1
      $kode = $kode + 1;
      $auto_kode = "B" .str_pad($kode, 3, "0",  STR_PAD_LEFT);
    } else {
      $auto_kode = "B001";
    }

    // Ketika tombil simpan di Klik
    if (isset($_POST['simpan'])) {
      $kode_merk = $_POST['kode_merk'];
      $kode_satuan = $_POST['kode_satuan'];
      $kode_jenis = $_POST['kode_jenis'];
      $nama_barang = $_POST['nama_barang'];
      $stock = $_POST['stock'];
      $stock_limit = $_POST['stock_limit'];
      $harga_pokok = $_POST['harga_pokok'];
      $harga_jual = $_POST['harga_jual'];

      $query = mysqli_query($koneksi,"INSERT INTO barang VALUES ('$auto_kode','$kode_merk','$kode_satuan','$kode_jenis','$nama_barang','$stock','$stock_limit','$harga_pokok','$harga_jual') ");
      if($query){
        echo "<script>window.location = 'admin.php?halaman=v_barang'</script>";
      }
    }

    //Proses menghapus data
    if ($_GET['hapus']) {
    $id = $_GET['hapus'];
    $query_hapus = mysqli_query($koneksi,"DELETE FROM barang WHERE kode_barang='$id'");
      if ($query_hapus) {
          echo "<script>window.location = 'admin.php?halaman=v_barang'</script>";
      }
    }
 ?>
<div class="span12">          
    <div class="widget ">
          <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Daftar Barang</h3>
          </div> <!-- /widget-header -->
          <div class="widget-content">

            <div class="tabbable">
            <ul class="nav nav-tabs">
              <li>
                <a href="#formcontrols" data-toggle="tab">Tambah Data</a>
              </li>
              <li  class="active"><a href="#jscontrols" data-toggle="tab">Tampil Data</a></li>
            </ul>
            <br>
              <div class="tab-content">
                <div class="tab-pane" id="formcontrols">
                <form method="post" action="" id="edit-profile" class="form-horizontal">  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Nama Barang</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="nama_barang" placeholder="Isi form nama barang">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Jenis Barang</label>
                      <div class="controls">
                        <select name="kode_jenis" id="" class="span6">
                          <?php
                          $query_jenis = mysqli_query($koneksi,"SELECT * FROM jenis_barang ORDER BY kode_jenis ASC");
                          while($data_jenis = mysqli_fetch_array($query_jenis)){
                          ?>
                            <option value="<?= $data_jenis['kode_jenis'] ?>"><?= $data_jenis['nama_jenis'] ?></option>
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
                          while($data_merk = mysqli_fetch_array($query_merk)){
                          ?>
                            <option value="<?= $data_merk['kode_merk'] ?>"><?= $data_merk['nama_merk'] ?></option>
                          <?php } ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Stock Barang</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="stock" placeholder="Isi form stok barang">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Stock Limit</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="stock_limit" placeholder="Isi form stok barang limit">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Satuan Barang</label>
                      <div class="controls">
                        <select name="kode_satuan" id="" class="span6">
                          <?php
                          $query_satuan = mysqli_query($koneksi,"SELECT * FROM satuan ORDER BY kode_satuan ASC");
                          while($data_satuan = mysqli_fetch_array($query_satuan)){
                          ?>
                            <option value="<?= $data_satuan['kode_satuan'] ?>"><?= $data_satuan['nama_satuan'] ?></option>
                          <?php } ?>
                        </select>
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Harga Pokok</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="harga_pokok" placeholder="Isi form harga pokok">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Harga Jual</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="harga_jual" placeholder="Isi form harga jual">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group --> 
                     <br/>
                    <div class="form-actions">
                      <button type="submit" name="simpan" class="btn btn-primary">Save</button> 
                      <button class="btn">Cancel</button>
                    </div> <!-- /form-actions -->
                    
                </form>
                </div>
                
                <div class="tab-pane active" id="jscontrols">
                        <table id="example" class="table hover table-bordered" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Nama Barang</th>
                                  <th>Jenis</th>
                                  <th>Merk</th>
                                  <th>Stock</th>
                                  <th>Satuan</th>
                                  <th>Harga Pokok</th>
                                  <th>Harga Jual</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            $query = mysqli_query($koneksi,"SELECT * FROM barang JOIN merk USING(kode_merk) JOIN satuan USING(kode_satuan) JOIN jenis_barang USING(kode_jenis) ORDER BY kode_barang ASC");
                            foreach ($query as $data) {
                             ?>
                              <tr>
                                  <td><?= $data['nama_barang'] ?></td>
                                  <td><?= $data['nama_jenis'] ?></td>
                                  <td><?= $data['nama_merk'] ?></td>
                                  <td><?= $data['stock'] ?></td>
                                  <td><?= $data['nama_satuan'] ?></td>
                                  <td><?= $data['harga_pokok'] ?></td>
                                  <td><?= $data['harga_jual'] ?></td>
                                  <td>
                                    <a href="?halaman=edit_barang&id=<?= $data['kode_barang'] ?>" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Yakin ingin menghapus data ?')" href="?halaman=v_barang&hapus=<?= $data['kode_barang'] ?>" class="btn btn-danger">Hapus</a>
                                  </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                      </table>    
                      <br/>
                </div>
                
              </div>
         
          </div>

        </div> <!-- /widget-content -->
            
      </div> <!-- /widget -->
            
    </div> <!-- /span8 -->
  