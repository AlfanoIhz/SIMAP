<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "simap";

$mysqli = mysqli_connect($host, $user, $password, $database);

if (!$mysqli){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

