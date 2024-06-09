<?php
include '../php/koneksi.php'; // Pastikan koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $idAset = (int)$_POST['idAset'];
    $namaAset = mysqli_real_escape_string($mysqli, $_POST['namaAset']);
    $kategoriAset = mysqli_real_escape_string($mysqli, $_POST['kategoriAset']);
    $jumlah = (int)$_POST['jumlah'];
    $departemen = mysqli_real_escape_string($mysqli, $_POST['departemen']);
    $tanggalPemeliharaan = mysqli_real_escape_string($mysqli, $_POST['tanggalPemeliharaan']);
    $alasanPemeliharaan = mysqli_real_escape_string($mysqli, $_POST['alasanPemeliharaan']);

    // Query untuk memasukkan data ke tabel pengajuan_alokasi
    $sql = "INSERT INTO pengajuan_pemeliharaan (idAset, namaAset, kategoriAset, jumlah, departemen, tanggalPemeliharaan, alasanPemeliharaan) 
            VALUES ($idAset, '$namaAset', '$kategoriAset', $jumlah, '$departemen', '$tanggalPemeliharaan', '$alasanPemeliharaan')";

    // Eksekusi query
    if (mysqli_query($mysqli, $sql)) {
        header("Location: ../departemen-page/page-pemeliharaanDepartemen.php");
        exit(); // Pastikan untuk menghentikan eksekusi setelah header redirect
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }

    // Tutup koneksi
    mysqli_close($mysqli);
}
?>
