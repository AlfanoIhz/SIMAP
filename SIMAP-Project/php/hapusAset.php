<?php
include 'koneksi.php'; 

// Memeriksa apakah parameter 'id' ada di URL
if (isset($_GET['id'])) {
    $idAset = $_GET['id'];

    // Membuat query untuk menghapus data aset berdasarkan idAset
    $query = "DELETE FROM aset WHERE idAset = '$idAset'";

    // Menjalankan query
    if (mysqli_query($mysqli, $query)) {
        header("Location: ../page-daftarAset.php?");
    } else {
        header("Location: ../page-daftarAset.php?");
    }
} else {
    // Jika parameter 'id' tidak ada, redirect ke halaman daftar aset
    header("Location: ../page-daftarAset.php");
 }
?>
