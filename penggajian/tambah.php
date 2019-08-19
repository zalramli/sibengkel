<?php
// Ketika tombil simpan di Klik

?>
<div class="form-element-list">
  <form id="transaksi_form" method="post">

    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

        <div class="basic-tb-hd">

          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="form-group">
                <div class="bootstrap-select fm-cmp-mg">
                  <select id="cari_kode_pegawai" class="selectpicker" data-live-search="true">

                    <option value="">Cari Pegawai</option>

                    <?php
                    $query_pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai ORDER BY kode_pegawai ASC");
                    while ($data_pegawai = mysqli_fetch_array($query_pegawai)) {
                      ?>

                    <option value="<?= $data_pegawai['kode_pegawai'] ?>"><?= $data_pegawai['nama_pegawai'] ?></option>

                    <?php } ?>

                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
              <div class="form-group">
                <a id="add_more1" name="add_more1" class="btn btn-primary">+</a>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="form-group">
                <div class="bootstrap-select fm-cmp-mg">
                  <select id="cari_kode_mekanik" class="selectpicker" data-live-search="true">

                    <option value="">Cari Mekanik</option>

                    <?php
                    $query_mekanik = mysqli_query($koneksi, "SELECT * FROM mekanik ORDER BY kode_mekanik ASC");
                    while ($data_mekanik = mysqli_fetch_array($query_mekanik)) {
                      ?>

                    <option value="<?= $data_mekanik['kode_mekanik'] ?>"><?= $data_mekanik['nama_mekanik'] ?></option>

                    <?php } ?>

                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
              <div class="form-group">
                <a id="add_more2" name="add_more2" class="btn btn-primary">+</a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <label>Kode</label>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <label>Nama</label>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <label>Priode Gaji</label>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <label>Jumlah Hari Kerja</label>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Total Gaji</label>
          </div>
        </div>

        <div id="span_product_details">
          <!-- disini isi detail -->

        </div>

      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="contact-inner">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="basic-tb-hd">
                <h2 class="text-center">Form Penggajian</h2>
              </div>
              <table width="100%">
                <tr>
                  <td width="60%">
                    <h5>Total</h5>
                  </td>
                  <td width="40%" style="text-align: right;">
                    <input type="number" class="form-control" id="total_penggajian" name="total_penggajian" readonly="">
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div style="margin-top: 30px;" class="contact-inner">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <table width="100%">
                <tr>
                  <td style="padding-top: 15px;" width="60%">
                    <h5>Bayar</h5>
                  </td>
                  <td width="40%" style="text-align: right;"><input type="number" class="form-control" id="bayar" name="bayar" required="" max="9999999999" oninvalid="this.setCustomValidity('Bayar Wajib Diisi')" oninput="setCustomValidity('')" onkeyup="update()" onchange="update()"></td>
                </tr>
                <tr>
                  <td style="padding: 20px 0px;">
                    <h5>Kembalian</h5>
                  </td>
                  <td style="text-align: right; padding: 20px 0px;">
                    <input type="number" class="form-control" id="kembalian" name="kembalian" readonly="">
                  </td>
                </tr>

              </table>
              <button onclick="return confirm('Yakin ingin Melakukan Penggajian ?')" id="action" type="submit" name="simpan" class="btn btn-primary mr-2">Simpan Penggajian</button>
              <a href="admin.php?halaman=v_penggajian" class="btn btn-success notika-btn-success">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </form>
</div>

<!-- untuk ajax -->
<script src="assets/template2/js/vendor/jquery-3.3.1.min.js"></script>

<!-- script logika -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#span_product_details').html('');
    var count1 = -1;
    var count2 = -1;

    // menambah detail pemasokan
    function add_row(count1, kode_pegawai, nama_pegawai) {

      var nomer = count1 + 1;

      $('#span_product_details').append(`

        <div id="row` + count1 + `" class="row">
          <br />
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <input type="text" class="form-control" id="kode_pegawai` + count1 + `" name="kode_pegawai[]" readonly="" value="` + kode_pegawai + `">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <input type="text" class="form-control" id="nama_pegawai` + count1 + `" name="nama_pegawai[]" readonly="" value="` + nama_pegawai + `">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <select id="periode_gaji` + count1 + `" name="periode_gaji[]" class="form-control selectpicker" data-live-search="true" required="" oninvalid="this.setCustomValidity('Wajib Diisi')" oninput="setCustomValidity('')">

              <option value="">Priode</option>

              <option value="Januari">Januari</option>
              <option value="Februari">Februari</option>
              <option value="Maret">Maret</option>

              <option value="April">April</option>
              <option value="Mei">Mei</option>
              <option value="Juni">Juni</option>

              <option value="Juli">Juli</option>
              <option value="Agustus">Agustus</option>
              <option value="September">September</option>

              <option value="Oktober">Oktober</option>
              <option value="Nopember">Nopember</option>
              <option value="Desember">Desember</option>

            </select>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <input type="number" class="form-control" id="jumlah_hari_kerja` + count1 + `" name="jumlah_hari_kerja[]" required="" oninvalid="this.setCustomValidity('Wajib Diisi')" oninput="setCustomValidity('')" value="">
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <input type="number" class="form-control" id="total_gaji` + count1 + `" name="total_gaji[]" max="9999999999" required="" oninvalid="this.setCustomValidity('Wajib Diisi')" oninput="setCustomValidity('')" value="">
          </div>
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
            <a id="` + count1 + `" name="remove" class="remove btn btn-primary">-</a>
          </div>
        </div>
        
      `);
    }

    // menambah detail pemasokan
    function add_row2(count2, kode_mekanik, nama_mekanik) {

      var nomer = count2 + 1;

      $('#span_product_details').append(`

        <div id="row2` + count2 + `" class="row">
          <br />
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <input type="text" class="form-control" id="kode_mekanik` + count2 + `" name="kode_mekanik[]" readonly="" value="` + kode_mekanik + `">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <input type="text" class="form-control" id="nama_mekanik` + count2 + `" name="nama_mekanik[]" readonly="" value="` + nama_mekanik + `">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <select id="periode_gaji` + count2 + `" name="periode_gaji[]" class="form-control selectpicker" data-live-search="true" required="" oninvalid="this.setCustomValidity('Wajib Diisi')" oninput="setCustomValidity('')">

              <option value="">Priode</option>

              <option value="Januari">Januari</option>
              <option value="Februari">Februari</option>
              <option value="Maret">Maret</option>

              <option value="April">April</option>
              <option value="Mei">Mei</option>
              <option value="Juni">Juni</option>

              <option value="Juli">Juli</option>
              <option value="Agustus">Agustus</option>
              <option value="September">September</option>

              <option value="Oktober">Oktober</option>
              <option value="Nopember">Nopember</option>
              <option value="Desember">Desember</option>

            </select>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <input type="number" class="form-control" id="jumlah_hari_kerja` + count2 + `" name="jumlah_hari_kerja[]" required="" oninvalid="this.setCustomValidity('Wajib Diisi')" oninput="setCustomValidity('')" value="">
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <input type="number" class="form-control" id="total_gaji` + count2 + `" name="total_gaji[]" max="9999999999" required="" oninvalid="this.setCustomValidity('Wajib Diisi')" oninput="setCustomValidity('')" value="">
          </div>
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
            <a id="` + count2 + `" name="remove" class="remove2 btn btn-primary">-</a>
          </div>
        </div>
        
      `);
    }

    // ketika click + maka akan menambah baris
    $(document).on('click', '#add_more1', function() {

      // mengambil data dari select option 
      var cari_kode_pegawai = document.getElementById("cari_kode_pegawai");
      var value = cari_kode_pegawai.options[cari_kode_pegawai.selectedIndex].value;
      var value2 = cari_kode_pegawai.options[cari_kode_pegawai.selectedIndex].text;

      // validasi cari 
      if (value == "") {
        alert("Pilih Pegawai");
      } else {
        count1 = count1 + 1;
        add_row(count1, value, value2);

        document.getElementById("cari_kode_pegawai").selectedIndex = "0";
        $('.selectpicker').selectpicker('refresh');
      }

    });

    // ketika click + maka akan menambah baris
    $(document).on('click', '#add_more2', function() {

      // mengambil data dari select option 
      var cari_kode_mekanik = document.getElementById("cari_kode_mekanik");
      var value = cari_kode_mekanik.options[cari_kode_mekanik.selectedIndex].value;
      var value2 = cari_kode_mekanik.options[cari_kode_mekanik.selectedIndex].text;

      // validasi cari 
      if (value == "") {
        alert("Pilih Mekanik");
      } else {
        count2 = count2 + 1;
        add_row2(count2, value, value2);

        document.getElementById("cari_kode_mekanik").selectedIndex = "0";
        $('.selectpicker').selectpicker('refresh');
      }

    });

    // ketika di click - maka akan mengurangi detail pegawai
    $(document).on('click', '.remove', function() {
      var row_no = $(this).attr("id");
      $('#row' + row_no).remove();
    });

    // ketika di click - maka akan mengurangi detail mekanik
    $(document).on('click', '.remove2', function() {
      var row_no = $(this).attr("id");
      $('#row2' + row_no).remove();
    });

  });
</script>
<!-- script logika -->