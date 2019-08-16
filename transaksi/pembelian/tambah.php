<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM work_order JOIN mekanik USING(kode_mekanik) JOIN customer USING(kode_customer) JOIN mobil USING(no_plat) WHERE kode_wo='$id'");
$data = mysqli_fetch_array($query);
?>
<div class="contact-info-area mg-t-30">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="contact-inner">
        <h2>Nama Customer : <?= $data['nama_customer'] ?></h2>
        <h2>Nama No Plat : <?= $data['no_plat'] ?></h2>
        <h2>Nama Mobil : <?= $data['nama_mobil'] ?></h2>
        <h2>Nama Mekanik : <?= $data['nama_mekanik'] ?></h2>
      </div>
    </div>
  </div>
</div>
<div class="contact-info-area mg-t-30">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <div class="contact-inner">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
              <h2>Cari Barang</h2>
            </div>
            <div class="bootstrap-select fm-cmp-mg">
              <select class="selectpicker" data-live-search="true">
                <option>Cari Barang</option>
              </select>
            </div>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
              <h2>Cari Service</h2>
            </div>
            <div class="bootstrap-select fm-cmp-mg">
              <select class="selectpicker" data-live-search="true">
                <option>Cari Service</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div style="margin-top: 20px" class="col-lg-12">
            <table width="100%" class="table table-hover">
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Total</th>
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
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Total</th>
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
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <div class="contact-inner">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
              <h2>Cari Customer</h2>
            </div>
            <div class="bootstrap-select fm-cmp-mg">
              <select class="selectpicker" data-live-search="true">
                <option>Cari Customer</option>
                <option>Cariska</option>
                <option>Cheriska</option>
                <option>Malias</option>
                <option>Kamines</option>
                <option>Austranas</option>
              </select>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label for="">Plat Nomer</label>
            <div class="form-group">
              <div class="nk-int-st">
                <input type="text" name="nama_barang" class="form-control" placeholder="otomatis" readonly="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>