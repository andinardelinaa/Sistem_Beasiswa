<?php

//include koneksi database
include('koneksi_beasiswa.php');

//mengambil dari database dengan form input
$nim     = $_POST['nim'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$nomor =$_POST['nomor'];
$semester =$_POST['semester'];
$ipk =$_POST['ipk'];
$beasiswa =$_POST['beasiswa'];

$nama_foto =$_FILES['foto']['name'];
$explode_foto = explode('.', $nama_foto);
$ekstensi_foto = $explode_foto[1];
$ukuran_foto = $_FILES['foto']['size'];
$tmp_foto = $_FILES['foto']['tmp_name'];
$ekstensi_boleh = array ('jpg', 'zip', 'pdf');
$ukuran_boleh = 1028000;
$direktori_foto = 'foto/';

if (in_array($ekstensi_foto, $ekstensi_boleh)) {
  if ($ukuran_foto <= $ukuran_boleh);

  move_uploaded_file($tmp_foto, $direktori_foto.$nama_foto);

} 


//query insert data ke dalam database
$query = "INSERT INTO  beasiswa (nim, nama, email, nomor_hp, semester, ipk, beasiswa, foto) 
VALUES ('$nim', '$nama', '$email', '$nomor', '$semester', '$ipk', '$beasiswa', '$nama_foto')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($connection->query($query)) {

    //redirect ke halaman tampil.php 
    header("location: tampil_beasiswa.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>

