<?php
// Ketika tombil simpan di Klik
if (isset($_POST['simpan'])) {

  // Membuat Kode otomatis
  $sql = mysqli_query($koneksi, "SELECT max(kode_permintaan) FROM permintaan_barang");
  $kode_faktur = mysqli_fetch_array($sql);
  if ($kode_faktur) {
    $nilai = substr($kode_faktur[0], 2);
    $kode = (int) $nilai;
    //tambahkan sebanyak + 1
    $kode = $kode + 1;
    $auto_kode = "KP" . str_pad($kode, 6, "0",  STR_PAD_LEFT);
  } else {
    $auto_kode = "KP000001";
  }

  // mengupdate data tgl_last_log_in di database
  date_default_timezone_set('Asia/Jakarta');
  $now = date('Y-m-d H:i:s');

  // data table permintaan
  $kode_permintaan = $auto_kode;
  $tgl_permintaan = $now;
  $status = 0;

  // proses input data tramsaksi ke dalam database
  $query = mysqli_query($koneksi, "INSERT INTO permintaan_barang VALUES ('$kode_permintaan','$tgl_permintaan','$status') ");
  if ($query) {

    if (isset($_POST['kode_barang'])) {

      // proses input data detail tramsaksi ke dalam database
      for ($i = 0; $i < count($_POST['kode_barang']); $i++) {
        $kode_barang = $_POST['kode_barang'][$i];
        $jumlah_barang = $_POST['jumlah_barang'][$i];

        $query_detail = mysqli_query($koneksi, "INSERT INTO detail_permintaan (kode_permintaan,kode_barang,jumlah_barang) VALUES ('$kode_permintaan','$kode_barang','$jumlah_barang') ");

        if ($query_detail) {
          echo "<script>alert('Data Berhasil Ditambahkan'); window.location = 'gudang.php?halaman=v_permintaan_barang'</script>";
        } else {
          echo "<script>alert('Terjadi Kesalahan Input Database'); window.location = 'gudang.php?halaman=add_permintaan_barang'</script>";
        }
      }
    } else {
      echo "<script>alert('Isi Detail Permintaan Barang'); window.location = 'gudang.php?halaman=add_permintaan_barang'</script>";
    }
  } else {
    echo "<script>alert('Terjadi Kesalahan Input Database'); window.location = 'gudang.php?halaman=add_permintaan_barang'</script>";
  }
}
?>
<div class="form-element-list">
  <form id="transaksi_form" method="post">

    <div class="basic-tb-hd">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="form-group">
            <div class="bootstrap-select fm-cmp-mg">
              <select id="cari_kode_barang" class="selectpicker" data-live-search="true">

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
            <a id="add_more" name="add_more" class="btn btn-primary">+</a>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
          <div class="form-group">
            <button id="action" type="submit" name="simpan" class="btn btn-primary mr-2">Simpan Pemesanan</button>
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

    <div id="span_product_details">
      <!-- disini isi detail -->
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
    var kode_barang = "";

    // menambah detail pemasokan
    function add_row(count1, kode_barang, nama_barang) {

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

    // ketika click + maka akan menambah baris
    $(document).on('click', '#add_more', function() {

      // mengambil data dari select option daftar barang
      var cari_kode_barang = document.getElementById("cari_kode_barang");
      var value = cari_kode_barang.options[cari_kode_barang.selectedIndex].value;
      var value2 = cari_kode_barang.options[cari_kode_barang.selectedIndex].text;

      // validasi cari barang 
      if (value == "") {
        alert("Pilih Barang");
      } else {
        count1 = count1 + 1;
        add_row(count1, value, value2);

        document.getElementById("cari_kode_barang").selectedIndex = "0";
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