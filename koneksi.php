<?php 

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'db_baking_delights';

// membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $database);

// mengecek koneksi
if(!$koneksi) {
    die('Connection Failed:' . mysqli_connect_error());
}
 ?>
