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
<div class="contact-info-area mg-t-30">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <div class="contact-inner">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="bootstrap-select fm-cmp-mg">
              <select class="selectpicker" name="kode_barang" data-live-search="true">
                <option>Cari Barang</option>

              <?php
              $query_barang = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY nama_barang ASC");
              while ($data_barang = mysqli_fetch_array($query_barang)) {
                ?>

              <option value="<?= $data_barang['kode_barang'] ?>"><?= $data_barang['nama_barang'] ?></option>

              <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="form-group">
              <a id="add_more" name="add_more" class="btn btn-primary">+</a>
            </div>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="bootstrap-select fm-cmp-mg">
              <select class="selectpicker" data-live-search="true">
                <option>Cari Service</option>

              <?php
              $query_service = mysqli_query($koneksi, "SELECT * FROM service ORDER BY nama_service ASC");
              while ($data_service = mysqli_fetch_array($query_service)) {
                ?>

              <option value="<?= $data_service['kode_service'] ?>"><?= $data_service['nama_service'] ?></option>

              <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-lg-1">
            <div class="form-group">
              <a id="add_more" name="add_more" class="btn btn-warning">+</a>
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