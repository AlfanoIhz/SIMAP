<?php
// Koneksi ke database
include 'koneksi.php';

// Ambil id laporan dari parameter GET
$idLaporan = $_GET['id'];

// Query untuk mengambil isi laporan berdasarkan id
$query = "SELECT * FROM laporan_aset WHERE id = $idLaporan";
$result = mysqli_query($koneksi, $query);

// Tampilkan isi laporan
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo $row['isi_laporan'];
} else {
    echo "Laporan tidak ditemukan.";
}
?>
