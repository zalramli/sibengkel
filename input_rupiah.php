<?php 
if (isset($_POST['simpan'])) {
	$harga = $_POST['asd'];
	$pres =  preg_replace("/[^0-9]/", "", $harga);
	$harga_int = (int) $pres;
	echo $harga_int;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Membuat Format Rupiah Dengan Javascript - www.malasngoding.com</title>
</head>
<body>

	<style type="text/css">
	body {
		font-family: sans-serif;
	}
	.kotak {
		width: 350px;
		margin: auto;
		margin-top: 15px;
		padding: 10px;
	}
	p{
		margin-bottom: 20px;
		color: #0004ff;
	}
	input {
		text-align: right;
		width: 100%;
		margin-bottom: 20px;
		margin-top: 10px;
		padding: 7px 10px;
		font-size: 18px;
	}
	</style>

	<center>
		<h1>Membuat Format Rupiah Dengan Javascript <br/> www.malasngoding.com</h1>
	</center>
	<center>
		<p>Baca tutorial nya di <a href='https://www.malasngoding.com/membuat-format-rupiah-dengan-javascript/'>SINI</a>.</p>
	</center>

	<div class="kotak">
		<form action="" method="post">
		<p>Ketik jumlah nominal pada form di bawah ini.</p>
		<span>Nominal Rupiah. :</span>
		<input name="asd" type="text" id="rupiah"/>
		<button type="submit" name="simpan">asd</button>
		</form>
	</div>




	<script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? + rupiah : '');
		}
	</script>
</body>
</html>