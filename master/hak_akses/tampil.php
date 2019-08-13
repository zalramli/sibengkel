<?php
    // Membuat Kode otomatis
    $sql = mysqli_query($koneksi,"SELECT max(kode_ha) FROM hak_akses");
    $kode_faktur = mysqli_fetch_array($sql);
    if($kode_faktur){
      $nilai = substr($kode_faktur[0], 1);
      $kode = (int) $nilai;
      //tambahkan sebanyak + 1
      $kode = $kode + 1;
      $auto_kode = "H" .str_pad($kode, 2, "0",  STR_PAD_LEFT);
    } else {
      $auto_kode = "H01";
    }

    // Ketika tombil simpan di Klik
    if (isset($_POST['simpan'])) {
      $nm_akses = $_POST['nm_akses'];
      $query = mysqli_query($koneksi,"INSERT INTO hak_akses (kode_ha,nama_ha) VALUES ('$auto_kode','$nm_akses') ");
      if($query){
        echo "<script>window.location = 'admin.php?halaman=v_akses'</script>";
      }
    }

    //Proses menghapus data
    if ($_GET['hapus']) {
    $id = $_GET['hapus'];
    $query_hapus = mysqli_query($koneksi,"DELETE FROM hak_akses WHERE kode_ha='$id'");
      if ($query_hapus) {
          echo "<script>window.location = 'admin.php?halaman=v_akses'</script>";
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
                <a href="#formcontrols" data-toggle="tab">Input Form</a>
              </li>
              <li  class="active"><a href="#jscontrols" data-toggle="tab">Tampil Data</a></li>
            </ul>
            <br>
              <div class="tab-content">
                <div class="tab-pane" id="formcontrols">
                <form method="post" action="" id="edit-profile" class="form-horizontal">  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Nama Akses</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="nm_akses" placeholder="Isi form nama akses">
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
                                  <th>Kode</th>
                                  <th>Nama Akses</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            $query = mysqli_query($koneksi,"SELECT kode_ha,nama_ha FROM hak_akses");
                            foreach ($query as $data) {
                             ?>
                              <tr>
                                  <td><?= $data['kode_ha']?></td>
                                  <td><?= $data['nama_ha']?></td>
                                  <td>
                                    <a href="?halaman=edit_akses&id=<?= $data['kode_ha']; ?>"" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Yakin ingin menghapus data ?')" href="?halaman=v_akses&hapus=<?= $data['kode_ha']; ?>" class="btn btn-danger">Hapus</a>
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
  