<?php 
require_once 'env.php';

$app_name = $_ENV['BARIST'];
$url = $_ENV['localhost'];
$host = $_ENV['DB_HOST'];
$username = $_ENV['martri'];
$password = $_ENV['No042MQ0Dn6nBzMpWn73'];
$database = $_ENV['barista'];

$koneksi = mysqli_connect($hostname, $username, $password, $dbaname);

if ($koneksi->connect_error) {
  die("koneksi database gagal:".$conn->connect_error);
}