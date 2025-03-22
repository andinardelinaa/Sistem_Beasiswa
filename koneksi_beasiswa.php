<?php

//deklasrasi variabel
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_beasiswa";    

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
//kondisi jika koneksi berhasil
if ($connection) {
    echo "Koneksi Berhasil!";
} else {
    //kondisi jika koneksi gagal
    echo "Koneksi Gagal! : ". mysqli_connect_error();
}

?>