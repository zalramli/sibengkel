<?php
// code php
?>
<div class="contact-info-area mg-t-30">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="contact-inner">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
              <h2>Cari Barang</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="bootstrap-select fm-cmp-mg">
              <select class="selectpicker" data-live-search="true">
                <option value="">Cari Barang (Stock)</option>
              </select>
            </div>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <button class="btn btn-danger btn-sm">+</button>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <button class="btn btn-danger btn-sm">Submit Pemesanan</button>
          </div>
        </div>
        <div class="row">
          <div style="margin-top: 20px" class="col-lg-12">
            <table width="100%" class="table table-hover">
              <thead>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Jumlah Barang</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>BR00001</td>
                  <td>Oli Federal</td>
                  <td width="12%"><input type="number" name="nama_barang" class="form-control"></td>
                  <td><button class="btn btn-danger btn-sm">-</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- untuk ajax -->
<script src="assets/template2/js/vendor/jquery-3.3.1.min.js"></script>