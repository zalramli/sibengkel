<?php
    // Membuat Kode otomatis
    $sql = mysqli_query($koneksi,"SELECT max(kode_merk) FROM merk");
    $kode_faktur = mysqli_fetch_array($sql);
    if($kode_faktur){
      $nilai = substr($kode_faktur[0], 1);
      $kode = (int) $nilai;
      //tambahkan sebanyak + 1
      $kode = $kode + 1;
      $auto_kode = "M" .str_pad($kode, 2, "0",  STR_PAD_LEFT);
    } else {
      $auto_kode = "M01";
    }

    // Ketika tombil simpan di Klik
    if (isset($_POST['simpan'])) {
      $nama_merk = $_POST['nama_merk'];
      $query = mysqli_query($koneksi,"INSERT INTO merk (kode_merk,nama_merk) VALUES ('$auto_kode','$nama_merk') ");
      if($query){
        echo "<script>window.location = 'admin.php?halaman=v_merk'</script>";
      }
    }

    //Proses menghapus data
    if ($_GET['hapus']) {
    $id = $_GET['hapus'];
    $query_hapus = mysqli_query($koneksi,"DELETE FROM merk WHERE kode_merk='$id'");
      if ($query_hapus) {
          echo "<script>window.location = 'admin.php?halaman=v_merk'</script>";
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
                <a href="#formcontrols" data-toggle="tab">Tambah Data</a>
              </li>
              <li  class="active"><a href="#jscontrols" data-toggle="tab">Tampil Data</a></li>
            </ul>
            <br>
              <div class="tab-content">
                <div class="tab-pane" id="formcontrols">
                <form method="post" action="" id="edit-profile" class="form-horizontal">  
                    <div class="control-group">                     
                      <label class="control-label" for="firstname">Nama Merk</label>
                      <div class="controls">
                        <input type="text" class="span6" id="firstname" name="nama_merk" placeholder="Isi form nama merk">
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
                            $query = mysqli_query($koneksi,"SELECT kode_merk,nama_merk FROM merk");
                            foreach ($query as $data) {
                             ?>
                              <tr>
                                  <td><?= $data['kode_merk']?></td>
                                  <td><?= $data['nama_merk']?></td>
                                  <td>
                                    <a href="?halaman=edit_merk&id=<?= $data['kode_merk']; ?>"" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Yakin ingin menghapus data ?')" href="?halaman=v_merk&hapus=<?= $data['kode_merk']; ?>" class="btn btn-danger">Hapus</a>
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
  