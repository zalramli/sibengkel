<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM work_order JOIN mekanik USING(kode_mekanik) JOIN customer USING(kode_customer) JOIN mobil USING(no_plat) WHERE kode_wo='$id'");
$data = mysqli_fetch_array($query);
?>
<div class="contact-info-area mg-t-30">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="contact-inner">
        <table width="100%"  class="table table-hover">
          <thead>
            <tr>
              <th width="13%">Nama Customer</th>
              <th width="1%">:</th>
              <th><?= $data['nama_customer'] ?></th>
              <th width="13%">Nama Mekanik</th>
              <th width="1%">:</th>
              <th><?= $data['nama_mekanik'] ?></th>
            </tr>
            <tr>
              <th>No Plat</th>
              <th>:</th>
              <th><?= $data['no_plat'] ?></th>
              <th>Nama Mobil</th>
              <th>:</th>
              <th><?= $data['nama_mobil'] ?></th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
<form action="" method="post">
<div class="contact-info-area mg-t-30">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <div class="contact-inner">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="bootstrap-select fm-cmp-mg">
              <select class="selectpicker" name="kode_barang" id="kode_barang" data-live-search="true">
                <option>Cari Barang</option>

              <?php
              $query_barang = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY nama_barang ASC");
              while ($data_barang = mysqli_fetch_array($query_barang)) {
                ?>

              <option value="<?= $data_barang['kode_barang'] ?>"><?= $data_barang['nama_barang'] ?></option>

              <?php } ?>
              </select>
              <div id="tampil_barang">
                <!-- disini load barang ketika dipilih option diatas -->
              </div>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="form-group">
              <button type="submit" name="cari_barang" id="cari_barang" class="btn btn-primary">+</button>
            </div>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="bootstrap-select fm-cmp-mg">
              <select class="selectpicker" id="kode_service" name="kode_service" data-live-search="true">
                <option>Cari Service</option>

              <?php
              $query_service = mysqli_query($koneksi, "SELECT * FROM service ORDER BY nama_service ASC");
              while ($data_service = mysqli_fetch_array($query_service)) {
                ?>

              <option value="<?= $data_service['kode_service'] ?>"><?= $data_service['nama_service'] ?></option>

              <?php } ?>
              </select>
              
              <div id="tampil_service">
                <!-- disini load service ketika dipilih option diatas -->
              </div>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="form-group">
              <button type="submit" name="cari_service" id="cari_service" class="btn btn-warning">+</button>
            </div>
          </div>
        </div>
        <div class="row">
          <div style="margin-top: 20px" class="col-lg-12">
            <table width="100%" class="table table-hover">
              <thead>
                <tr>
                  <th width="45%">Nama Barang</th>
                  <th width="22%">Harga</th>
                  <th width="10%">Qty</th>
                  <th width="22%">Total</th>
                  <th width="1%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Crusal Damperal</td>
                  <td>$500</td>
                  <td width="12%"><input type="text" name="nama_barang" class="form-control"></td>
                  <td>$3000</td>
                  <td><a href="" class="btn btn-danger btn-sm"><i class="notika-icon notika-trash"></i></a></td>
                </tr>
              </tbody>
            </table>
            <table width="100%" class="table table-hover">
              <thead>
                <tr>
                  <th width="77%">Nama Service</th>
                  <th width="21%">Harga</th>
                  <th width="1%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Crusal Damperal</td>
                  <td>$500</td>
                  <td><a href="" class="btn btn-danger btn-sm"><i class="notika-icon notika-trash"></i></a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <div class="contact-inner">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="basic-tb-hd">
              <h2 class="text-center">Form Pembayaran</h2>
            </div>
            <table width="100%" >
              <tr>
                <td width="60%"><h5>Sub Total</h5></td>
                <td width="40%" style="text-align: right;"><h5>900.000</h5></td>
              </tr>
              <tr>
                <td style="padding-top: 9px;"><h5>Potongan Harga</h5></td>
                <td style="text-align: right; padding-top: 5px"><input type="text" class="form-control"></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div style="margin-top: 30px;" class="contact-inner">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table width="100%" >
              <tr>
                <td style="padding-top: 15px;" width="60%"><h5>Bayar</h5></td>
                <td width="40%" style="text-align: right;"><input type="text" class="form-control"></td>
              </tr>
              <tr>
                <td style="padding: 20px 0px;"><h5>Kembalian</h5></td>
                <td style="text-align: right; padding: 20px 0px;"><h5>900.000</h5></td>
              </tr>
              
            </table>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            <button type="submit" name="batal" class="btn btn-danger">Batal</button>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>
</form>

        <script src="assets/template2/js/vendor/jquery-3.3.1.min.js"></script>

 <!--Load barang ketika di klik select option (FORM penjualan work order)  -->
         <script>  
         $(document).ready(function(){  
              $('#kode_barang').change(function(){  
                   var kode_barang = $(this).val();  
                   $.ajax({  
                        url:"transaksi/penjualan/load_data_barang.php",  
                        method:"POST",  
                        data:{kode_barang:kode_barang},  
                        success:function(data){  
                             $('#tampil_barang').html(data);  
                        }  
                   });  
              });  
         });  
         </script>  

         <!--Load service ketika di klik select option (FORM penjualan work order)  -->
         <script>  
         $(document).ready(function(){  
              $('#kode_service').change(function(){  
                   var kode_service = $(this).val();  
                   $.ajax({  
                        url:"transaksi/penjualan/load_data_service.php",  
                        method:"POST",  
                        data:{kode_service:kode_service},  
                        success:function(data){  
                             $('#tampil_service').html(data);  
                        }  
                   });  
              });  
         });  
         </script>  