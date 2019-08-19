<?php 
include "../../koneksi/koneksi.php";
function data_stok_obat($kode_barang, $koneksi)
{
	$sql = "SELECT * FROM barang WHERE kode_barang = '".$kode_barang."' ";
	$result = mysqli_query($koneksi, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
		$output['kode_barang'] = $row["kode_barang"];
		$output['nama_barang'] = $row["nama_barang"];
		$output['harga_jual'] = $row["harga_jual"];
	}
	return $output;
}

$jumlah_barang = 0;
$total_hrg1 = 0;
if (isset($_POST["jumlah_barang"])) 
{
	$jumlah_barang = $_POST["jumlah_barang"];
	if ( $jumlah_barang > 0) 
	{
		for($count = 0; $count<count($_POST["kode_barang2"]); $count++)
		{
			$product_details1 = data_stok_obat($_POST["kode_barang2"][$count], $koneksi);
			$harga1 = $_POST["harga_jual"][$count] * $_POST["jumlah_barang"][$count];
			$total_hrg1 = $total_hrg1 + $harga1;
		}
	}
}
echo $total_hrg1;
?>