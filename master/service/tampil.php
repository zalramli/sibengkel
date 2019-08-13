<?php
    // Membuat Kode otomatis
    $sql = mysqli_query($koneksi,"SELECT max(kode_service) FROM service");
    $kode_faktur = mysqli_fetch_array($sql);
    if($kode_faktur){
      $nilai = substr($kode_faktur[0], 1);
      $kode = (int) $nilai;
      //tambahkan sebanyak + 1
      $kode = $kode + 1;
      $auto_kode = "SV" .str_pad($kode, 2, "0",  STR_PAD_LEFT);
    } else {
      $auto_kode = "SV01";
    }

    // Ketika tombil simpan di Klik
    if (isset($_POST['simpan'])) {
      $nama_service = $_POST['nama_service'];
      $tarif_harga = $_POST['tarif_harga'];
      $query = mysqli_query($koneksi,"INSERT INTO service (kode_service,nama_service,tarif_harga) VALUES ('$auto_kode','$nama_service','$tarif_harga') ");
      if($query){
        echo "<script>window.location = 'admin.php?halaman=v_service'</script>";
      }
    }

    //Proses menghapus data
    if ($_GET['hapus']) {
    $id = $_GET['hapus'];
    $query_hapus = mysqli_query($koneksi,"DELETE FROM service WHERE kode_service='$id'");
      if ($query_hapus) {
          echo "<script>window.location = 'admin.php?halaman=v_service'</script>";
      }
    }
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
                <a href="#formcontrols" data-toggle="tab">Tambah Data</a>
              </li>
              <li  class="active"><a href="#jscontrols" data-toggle="tab">Tampil Data</a></li>
            </ul>
            <br>
              <div class="tab-content">
                <div class="tab-pane" id="formcontrols">
                <form method="post" action="" id="edit-profile" class="form-horizontal">  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Nama Service</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="nama_service" placeholder="Isi form nama service">
                      </div> <!-- /controls -->       
                    </div> <!-- /control-group -->  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Tarif Harga</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="tarif_harga" placeholder="Isi form tarif harga">
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
                                  <th>Nama Service</th>
                                  <th>Tarif Harga</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            $query = mysqli_query($koneksi,"SELECT kode_service,nama_service,tarif_harga FROM service");
                            foreach ($query as $data) {
                             ?>
                              <tr>
                                  <td><?= $data['kode_service']?></td>
                                  <td><?= $data['nama_service']?></td>
                                  <td><?= $data['tarif_harga']?></td>
                                  <td>
                                    <a href="?halaman=edit_service&id=<?= $data['kode_service']; ?>"" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Yakin ingin menghapus data ?')" href="?halaman=v_service&hapus=<?= $data['kode_service']; ?>" class="btn btn-danger">Hapus</a>
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
  