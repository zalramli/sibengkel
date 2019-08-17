<?php  
 //load_data.php  
include '../../koneksi/koneksi.php'; 
 $output = ''; 
 if(isset($_POST["kode_barang"]))  
 {  
      if($_POST["kode_barang"] != '')  
      {  
           $sql = "SELECT * FROM barang WHERE kode_barang = '".$_POST["kode_barang"]."'"; 
            $result = mysqli_query($koneksi, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
           <input type="text" name="nama_barang" value="'.$row["nama_barang"].'">
           <input type="text" name="harga_jual" value="'.$row["harga_jual"].'">
           <input type="text" name="stock" value="'.$row["stock"].'">
           ';  
      }   
      }
     
      echo $output;  
 }  
 ?>  