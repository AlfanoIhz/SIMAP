<?php
$host = 'localhost';
$port = 3307; 
$user = 'root';
$password = '';
$database = 'simap';

// Membuat koneksi ke database
$mysqli = new mysqli($host, $user, $password, $database, $port);

// Memeriksa koneksi
if ($mysqli->connect_error) {
    die('Koneksi gagal: ' . $mysqli->connect_error);
}
?>
