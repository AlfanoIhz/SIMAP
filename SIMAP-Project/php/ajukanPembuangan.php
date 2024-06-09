<?php
include '../php/koneksi.php'; // Pastikan koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $idAset = (int)$_POST['idAset'];
    $namaAset = mysqli_real_escape_string($mysqli, $_POST['namaAset']);
    $kategoriAset = mysqli_real_escape_string($mysqli, $_POST['kategoriAset']);
    $jumlah = (int)$_POST['jumlah'];
    $departemen = mysqli_real_escape_string($mysqli, $_POST['departemen']);
    $tanggalPembuangan = mysqli_real_escape_string($mysqli, $_POST['tanggalPembuangan']);
    $alasanPembuangan = mysqli_real_escape_string($mysqli, $_POST['alasanPembuangan']);

    // Query untuk memasukkan data ke tabel pengajuan_pembuangan
    $sql = "INSERT INTO pengajuan_pembuangan (idAset, namaAset, kategoriAset, jumlah, departemen, tanggalPembuangan, alasanPembuangan) 
            VALUES ($idAset, '$namaAset', '$kategoriAset', $jumlah, '$departemen', '$tanggalPembuangan', '$alasanPembuangan')";

    // Eksekusi query
    if (mysqli_query($mysqli, $sql)) {
        header("Location: ../departemen-page/page-pembuanganDepartemen.php");
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }

    // Tutup koneksi
    mysqli_close($mysqli);
}
?>
