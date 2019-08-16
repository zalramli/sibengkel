<?php

?>
<div class="form-element-list">
  <div class="basic-tb-hd">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group">
          <div class="bootstrap-select fm-cmp-mg">
            <select id="cari_kode_barang" name="kode_barang" class="selectpicker" data-live-search="true" required="">

              <option value="">Cari Barang</option>

              <?php
              $query_jenis = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY kode_barang ASC");
              while ($data_jenis = mysqli_fetch_array($query_jenis)) {
                ?>

              <option value="<?= $data_jenis['kode_barang'] ?>"><?= $data_jenis['nama_barang'] ?></option>

              <?php } ?>

            </select>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
        <div class="form-group">
          <button id="add_more" name="add_more" class="btn btn-primary">+</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
      <label>No</label>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
      <label>Kode Barang</label>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
      <label>Nama Barang</label>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
      <label>Jumlah Barang</label>
    </div>
  </div>

  <form id="transaksi_form" method="post">
    <div id="span_product_details">
      <!-- disini isi detail -->
    </div>

    <button id="action" type="submit" class="btn btn-primary mr-2">Simpan Pemesanan</button>

  </form>
</div>

<!-- untuk ajax -->
<script src="assets/template2/js/vendor/jquery-3.3.1.min.js"></script>


<!-- script logika -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#span_product_details').html('');
    var count1 = -1;
    var kode_barang = "";

    function add_row_obat(count1 = '', kode_barang, nama_barang) {

      var nomer = count1 + 1;

      $('#span_product_details').append(`

        <br />
        <div id="row` + count1 + `" class="row">
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
            <p>` + nomer + `</p>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <input type="text" class="form-control" id="kode_barang` + count1 + `" name="kode_barang[]" readonly="" value="` + kode_barang + `">
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <input type="text" class="form-control" id="nama_barang` + count1 + `" name="nama_barang[]" readonly="" value="` + nama_barang + `">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div class="form-group">
              <div class="nk-int-st">
                <input type="number" id="jumlah_barang` + count1 + `" name="jumlah_barang[]" class="form-control" placeholder="Isi form Jumlah Pesan" required="" max="32000" oninvalid="this.setCustomValidity('Wajib Diisi')" oninput="setCustomValidity('')">
              </div>
            </div>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
            <button id="` + count1 + `" name="remove" class="remove btn btn-primary">-</button>
          </div>
        </div>
        
      `);
    }

    // menambah detail pemasokan
    $(document).on('click', '#add_more', function() {

      var cari_kode_barang = document.getElementById("cari_kode_barang");
      var value = cari_kode_barang.options[cari_kode_barang.selectedIndex].value;
      var value2 = cari_kode_barang.options[cari_kode_barang.selectedIndex].text;

      count1 = count1 + 1;
      add_row_obat(count1, value,value2);

    });
    // menambah detail pemasokan

    // mengurangi detail pemasokan
    $(document).on('click', '.remove', function() {
      var row_no = $(this).attr("id");
      $('#row' + row_no).remove();
    });
    // mengurangi detail pemasokan

    // tambah ke database
    $(document).on('submit', '#transaksi_form', function(event) {
      
      event.preventDefault();
        $('#action').attr('disabled', 'disabled');
        var form_data = $(this).serialize();
        $.ajax({
          url: "",
          method: "POST",
          data: form_data,
          success: function(data) {
            location.reload();
          }
        });

    });
    // tambah ke database

  });
</script>
<!-- script logika -->