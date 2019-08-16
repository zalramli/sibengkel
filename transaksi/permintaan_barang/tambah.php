<?php

?>
<div class="form-element-list">
  <div class="basic-tb-hd">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group">
          <div class="bootstrap-select fm-cmp-mg">
            <select name="kode_barang" class="selectpicker" data-live-search="true" required="">

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
          <button id="" name="" class="btn btn-primary">+</button>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
          <button id="" name="" class="btn btn-primary">Simpan Pemesanan</button>
        </div>
      </div>
    </div>
  </div>

  <form action="" method="post">

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
        <label>Jumlah Pesan</label>
      </div>
    </div>

    <div id="detail_list">


    </div>

    <div class="row">
      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
        <p>1</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <p>BR0001</p>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <p>Oli Federal</p>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
        <div class="form-group">
          <div class="nk-int-st">
            <input type="number" name="stock_limit" class="form-control" placeholder="Isi form Jumlah Pesan" required="" max="32000" oninvalid="this.setCustomValidity('Wajib Diisi')" oninput="setCustomValidity('')">
          </div>
        </div>
      </div>
      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
        <button id="" name="" class="btn btn-primary">-</button>
      </div>
    </div>

  </form>
</div>

<!-- untuk ajax -->
<script src="assets/template2/js/vendor/jquery-3.3.1.min.js"></script>