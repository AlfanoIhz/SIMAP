<?php
include 'koneksi.php'; // Memastikan koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form 
    $namaAset = mysqli_real_escape_string($mysqli, $_POST['namaAset']);
    $kategoriAset = mysqli_real_escape_string($mysqli, $_POST['kategoriAset']);
    $jumlah = (int)$_POST['jumlah']; 
    $departemen = mysqli_real_escape_string($mysqli, $_POST['departemen']);
    $tanggalMasuk = mysqli_real_escape_string($mysqli, $_POST['tanggalMasuk']);

    // Query untuk memasukkan data ke tabel aset
    $sql = "INSERT INTO aset (namaAset, kategoriAset, jumlah, departemen, tanggalMasuk) VALUES ('$namaAset', '$kategoriAset', $jumlah, '$departemen', '$tanggalMasuk')";

    // Eksekusi query
    if (mysqli_query($mysqli, $sql)) {
        // Redirect ke halaman daftar aset
        header("Location: ../page-daftarAset.php");
        exit(); // Pastikan untuk menghentikan eksekusi setelah header redirect
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }

    // Tutup koneksi
    mysqli_close($mysqli);
}
?>
