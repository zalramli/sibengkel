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
                <select class="selectpicker kode_barangs" name="kode_barang" id="kode_barang" data-live-search="true">
                  <option value="">Cari Barang</option>
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
                <button type="submit" name="cari_barang" id="btn_cart_barang" class="btn btn-primary">+</button>
              </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
              <div class="bootstrap-select fm-cmp-mg">
                <select class="selectpicker" id="kode_service" name="kode_service" data-live-search="true">
                  <option value="">Cari Service</option>
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
                <button type="submit" name="cari_service" id="btn_cart_service" class="btn btn-warning">+</button>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
              <label>No</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <label>Nama Barang</label>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
              <label>Harga</label>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
              <label>Jumlah</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <label>Sub Total</label>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
              <label>Aksi</label>
            </div>
            
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div id="cart_barang">
                <!-- disini isi detail -->
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
              <label>No</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <label>Kode Service</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <label>Nama Service</label>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <label>Tarif</label>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div id="cart_service">
                <!-- disini isi detail -->
              </div>
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
  <!-- Ambil Harga Barang -->
  <script>  
           $(document).ready(function(){  
                $('.kode_barangs').change(function(){  
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
  <script type="text/javascript">
    $(document).ready(function() {
      $('#cart_barang').html('');
      var count1 = -1;
      var kode_barang = "";

      // menambah detail pemasokan
      function add_row(count1, kode_barang, nama_barang,harga_jual,sub_total) {

        var nomer = count1 + 1;

        $('#cart_barang').append(`

          <br />
          <div id="row` + count1 + `" class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
              <p>` + nomer + `</p>
            </div>
            <div class="">
              <input type="hidden" class="form-control" id="kode_barang` + count1 + `" name="kode_barang[]" readonly="" value="` + kode_barang + `">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <input type="text" class="form-control" id="nama_barang` + count1 + `" name="nama_barang[]" readonly="" value="` + nama_barang + `">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
              <input style="text-align:right;" type="text" class="form-control" id="harga_jual` + count1 + `" name="harga_jual[]" readonly="" value="` + harga_jual + `">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
              <div class="form-group">
                <div class="nk-int-st">
                  <input type="number" id="jumlah_barang` + count1 + `" name="jumlah_barang[]" class="form-control" placeholder="Isi form Jumlah Pesan" required="" max="32000" oninvalid="this.setCustomValidity('Wajib Diisi')" oninput="setCustomValidity('')">
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <input style="text-align:right;" type="text" class="form-control" id="sub_total` + count1 + `" name="sub_total[]" readonly="" value="` + harga_jual + `">
            </div>
            
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
              <button id="` + count1 + `" name="remove" class="remove btn btn-danger"><i class="notika-icon notika-trash"></i></button>
            </div>
          </div>
          
        `);
      }

      // ketika click + maka akan menambah baris
      $(document).on('click', '#btn_cart_barang', function() {

        // mengambil data dari select option daftar barang
        var cari_kode_barang = document.getElementById("kode_barang");
        var value = cari_kode_barang.options[cari_kode_barang.selectedIndex].value;
        var value2 = cari_kode_barang.options[cari_kode_barang.selectedIndex].text;
        var value3 = document.getElementById("harga_jual").value;

        // validasi cari barang 
        if (value == "") {
          alert("Pilih Barang");
        } else {
          count1 = count1 + 1;
          add_row(count1, value, value2,value3,value3);

          document.getElementById("kode_barang").selectedIndex = "0";
          $('.selectpicker').selectpicker('refresh');
        }

      });

      // ketika di click - maka akan mengurangi detail pemasokan
      $(document).on('click', '.remove', function() {
        var row_no = $(this).attr("id");
        $('#row' + row_no).remove();
      });

    });
  </script>
  <!-- script logika -->
  
  <script type="text/javascript">
    $(document).ready(function() {
      $('#cart_service').html('');
      var count2 = -1;
      var kode_service = "";

      // menambah detail pemasokan
      function add_row(count2, kode_service, nama_service) {

        var nomer = count2 + 1;

        $('#cart_service').append(`

          <br />
          <div id="row2` + count2 + `" class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
              <p>` + nomer + `</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
              <input type="text" class="form-control" id="kode_service` + count2 + `" name="kode_service[]" readonly="" value="` + kode_service + `">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <input type="text" class="form-control" id="nama_service` + count2 + `" name="nama_service[]" readonly="" value="` + nama_service + `">
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
              <button id="` + count2 + `" name="remove2" class="remove2 btn btn-danger"><i class="notika-icon notika-trash"></i></button>
            </div>
          </div>
          
        `);
      }

      // ketika click + maka akan menambah baris
      $(document).on('click', '#btn_cart_service', function() {

        // mengambil data dari select option daftar barang
        var cari_kode_service = document.getElementById("kode_service");
        var value = cari_kode_service.options[cari_kode_service.selectedIndex].value;
        var value2 = cari_kode_service.options[cari_kode_service.selectedIndex].text;

        // validasi cari barang 
        if (value == "") {
          alert("Pilih Service");
        } else {
          count2 = count2 + 1;
          add_row(count2, value, value2);

          document.getElementById("kode_service").selectedIndex = "0";
          $('.selectpicker').selectpicker('refresh');
        }

      });

      // ketika di click - maka akan mengurangi detail pemasokan
      $(document).on('click', '.remove2', function() {
        var row_no2 = $(this).attr("id");
        $('#row2' + row_no2).remove();
      });

    });
  </script>
