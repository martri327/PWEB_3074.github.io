<?php
$username ='root';
$hostname ='localhost';
$password ='';
$dbaname = 'kopi';


$koneksi = mysqli_connect($hostname, $username, $password, $dbaname);

if ($koneksi->connect_error) {
  die("koneksi database gagal:".$conn->connect_error);
}