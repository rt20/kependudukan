<?php
include('../../config/koneksi.php');

if ($_SESSION['user']['status_user'] != 'Admin'){
  $iduser = $_SESSION['user']['id_user'];
  // ambil dari database 
  // edited by rootspace
  $query = "SELECT *, TIMESTAMPDIFF(YEAR, `tanggal_lahir_warga`, CURDATE()) AS usia_warga FROM warga where id_user=$iduser";
  
  $hasil = mysqli_query($db, $query);
  
  $data_warga = array();
  
  while ($row = mysqli_fetch_assoc($hasil)) {
    $data_warga[] = $row;
  }
} else {
   // ambil dari database
   $query = "SELECT *, TIMESTAMPDIFF(YEAR, `tanggal_lahir_warga`, CURDATE()) AS usia_warga FROM warga";
  
   $hasil = mysqli_query($db, $query);
   
   $data_warga = array();
   
   while ($row = mysqli_fetch_assoc($hasil)) {
     $data_warga[] = $row;
   }
}

