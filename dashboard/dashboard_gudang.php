<?php 
$query_permintaan =  mysqli_query($koneksi,"SELECT COUNT(*) as jumlah_permintaan FROM permintaan_barang WHERE status='0'");
$data_permintaan = mysqli_fetch_array($query_permintaan);
$query_barang =  mysqli_query($koneksi,"SELECT COUNT(*) as jumlah_barang FROM barang");
$data_barang = mysqli_fetch_array($query_barang);
?>

    <!-- Icon Cards-->
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
          <div class="website-traffic-ctn">
            <h2><span class="counter"><?= $data_permintaan['jumlah_permintaan'] ?></span></h2>
            <p>Total Permintaan Barang</p>
          </div>
          <!-- <span style="text-align:right;font-size: 2.3em; color: Tomato;">
            <i class="fas fa-camera"></i>
          </span> -->
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
          <div class="website-traffic-ctn">
            <h2><span class="counter"><?= $data_barang["jumlah_barang"] ?></span></h2>
            <p>Total Daftar Barang</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
          <div class="website-traffic-ctn">
            <h2>$<span class="counter">40,000</span></h2>
            <p>Total Online Sales</p>
          </div>
          <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
          <div class="website-traffic-ctn">
            <h2>$<span class="counter">40,000</span></h2>
            <p>Total Online Sales</p>
          </div>
          <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
          <div class="website-traffic-ctn">
            <h2>$<span class="counter">40,000</span></h2>
            <p>Total Online Sales</p>
          </div>
          <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
        </div>
      </div>
    </div>