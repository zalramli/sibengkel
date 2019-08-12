<?php
	$koneksi = mysqli_connect("localhost","root","","db_wisata");
	if ($koneksi == false) {
		echo "Koneksi Anda gagal karena ".mysqli_connect_error();
	}
	else{
		 //echo "Haloo Berhasilll";
	}

	// function kode($field,$tabel,$digit,$kode){
	// $data = mysqli_fetch_array(mysqli_query($koneksi,"SELECT MAX(RIGHT($field,$digit)) FROM $tabel"));
	// $id = (int)$data[0]+1;
	// $id_baru = $kode.sprintf('%0'.$digit.'s',$id);
	// echo $id_baru;
	// }
?>
