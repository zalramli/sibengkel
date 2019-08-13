<?php
    // Membuat Kode otomatis
    $sql = mysqli_query($koneksi,"SELECT max(kode_satuan) FROM satuan");
    $kode_faktur = mysqli_fetch_array($sql);
    if($kode_faktur){
      $nilai = substr($kode_faktur[0], 1);
      $kode = (int) $nilai;
      //tambahkan sebanyak + 1
      $kode = $kode + 1;
      $auto_kode = "S" .str_pad($kode, 2, "0",  STR_PAD_LEFT);
    } else {
      $auto_kode = "S01";
    }

    // Ketika tombil simpan di Klik
    if (isset($_POST['simpan'])) {
      $nama_satuan = $_POST['nama_satuan'];
      $query = mysqli_query($koneksi,"INSERT INTO satuan (kode_satuan,nama_satuan) VALUES ('$auto_kode','$nama_satuan') ");
      if($query){
        echo "<script>window.location = 'admin.php?halaman=v_satuan'</script>";
      }
    }

    //Proses menghapus data
    if ($_GET['hapus']) {
    $id = $_GET['hapus'];
    $query_hapus = mysqli_query($koneksi,"DELETE FROM satuan WHERE kode_satuan='$id'");
      if ($query_hapus) {
          echo "<script>window.location = 'admin.php?halaman=v_satuan'</script>";
      }
    }
 ?>
<div class="span12">          
    <div class="widget ">
          <div class="widget-header">
                <i class="icon-user"></i>
                <h3>Satuan Barang</h3>
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
                      <label class="control-label" for="firstname">Nama Satuan</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="nama_satuan" placeholder="Isi form nama satuan">
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
                        <table id="example" class="hover table-bordered" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Kode</th>
                                  <th>Nama Akses</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            $query = mysqli_query($koneksi,"SELECT kode_satuan,nama_satuan FROM satuan");
                            foreach ($query as $data) {
                             ?>
                              <tr>
                                  <td><?= $data['kode_satuan']?></td>
                                  <td><?= $data['nama_satuan']?></td>
                                  <td>
                                    <a href="?halaman=edit_satuan&id=<?= $data['kode_satuan']; ?>"" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Yakin ingin menghapus data ?')" href="?halaman=v_satuan&hapus=<?= $data['kode_satuan']; ?>" class="btn btn-danger">Hapus</a>
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
  