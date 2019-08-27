<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Laporan Transaksi Penjualan</title>
		<link href="_partial/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="_partial/bootstrap.min.js"></script>
	</head>
	<body>
		<?php
		include '../koneksi/koneksi.php';
		include '../koneksi/function.php';
		$tgl_mulai = $_POST['tgl_mulai'];
		$format_mulai =  date('Y-m-d', strtotime($tgl_mulai));
		$mulai = $format_mulai." 00:00:00";
		$tgl_akhir = $_POST['tgl_akhir'];
		$format_akhir =  date('Y-m-d', strtotime($tgl_akhir));
		$akhir = $format_akhir." 23:59:59";
		?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<hr>
					<div class="row">
						<div class="col col-md-3">
							<img src="" width="190" alt="logo_catering.png">
						</div>
						<div class="col col-md-8" style="margin-left:-40px ">
							<strong style="font-size:30">Bengkel Cemerlang Jaya</strong><br>
							<address style="font-size: 15">Jalan Fatahillah No. 35 , Kabupaten Jember, Jawa Timur <br>
								Telp : (0331) 426 746 <br>
							HP / WA : 081 236 647 71 / 082 232 419 229 </address>
						</div>
					</div>
					<hr style="border-width: 3px">
					<div class="row">
						<div class="col col-md-12">
							<address class="text-center" style="font-size: 18">LAPORAN TRANSAKSI PENJUALAN
							<br> PERIODE <?php echo $tgl_mulai ?> SAMPAI <?php echo $tgl_akhir ?> </address>
							<?php
									$query2 = mysqli_query($koneksi, "SELECT * FROM penjualan  WHERE tgl_transaksi BETWEEN '$mulai' AND '$akhir'");
									$grand = 0;
									foreach ($query2 as $data2) {
										$grand += $data2['total_harga'];
									}
							?>
							<div class="row">
								<div class="col-md-8">
									
								</div>
								<div class="col-md-2 text-left">
									<h5><b>GRAND TOTAL</b></h5>
								</div>
								<div class="col-md-2 text-right">
									<h5><b><?php echo number_format($grand, 2, ",", "."); ?></b></h5>
								</div>
							</div>
							<table class="table table-bordered mt-2">
								<thead class="thead-dark">
									<tr>
										<th style="text-align: center;">No.</th>
										<th style="text-align: center;">FAKTUR PENJUALAN</th>
										<th style="text-align: center;">NAMA CUSTOMER</th>
										<th style="text-align: center;">KASIR</th>
										<th style="text-align: center;">TANGGAL TRANSAKSI</th>
										<th style="text-align: center;">TOTAL HARGA</th>
									</tr>
								</thead>
								<tbody>
									<?php
									
									$query = mysqli_query($koneksi, "SELECT * FROM penjualan JOIN customer USING(kode_customer) JOIN pegawai USING(kode_pegawai) WHERE tgl_transaksi BETWEEN '$mulai' AND '$akhir'");
									$no = 1;
									foreach ($query as $data) {
									$tgl_transaksi = $data['tgl_transaksi'];
									$data_transaksi = date('Y-m-d', strtotime($tgl_transaksi));
									$total_harga = $data['total_harga'];
									?>
									<tr>
										<td style="text-align: center;"><?= $no++ ?></td>
										<td><?= $data['no_faktur_penjualan'] ?></td>
										<td><?= $data['nama_customer'] ?></td>
										<td><?= $data['nama_pegawai'] ?></td>
										<td><?= tgl_indo($data_transaksi) ?></td>
										<td style="text-align: right"><?php echo number_format($total_harga, 2, ",", "."); ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>