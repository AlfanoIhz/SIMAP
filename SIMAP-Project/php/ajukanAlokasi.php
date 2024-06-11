<?php
include '../php/koneksi.php'; // Pastikan koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $idAset = (int)$_POST['idAset'];
    $namaAset = mysqli_real_escape_string($mysqli, $_POST['namaAset']);
    $kategoriAset = mysqli_real_escape_string($mysqli, $_POST['kategoriAset']);
    $jumlah = (int)$_POST['jumlah'];
    $departemenAsal = mysqli_real_escape_string($mysqli, $_POST['departemenAsal']);
    $departemenTujuan = mysqli_real_escape_string($mysqli, $_POST['departemenTujuan']);
    $tanggalPengalokasian = mysqli_real_escape_string($mysqli, $_POST['tanggalPengalokasian']);
    $alasanPengalokasian = mysqli_real_escape_string($mysqli, $_POST['alasanPengalokasian']);

    // Query untuk memasukkan data ke tabel pengajuan_alokasi
    $sql = "INSERT INTO pengajuan_alokasi (idAset, namaAset, kategoriAset, jumlah, departemenAsal, departemenTujuan, tanggalPengalokasian, alasanPengalokasian) 
            VALUES ($idAset, '$namaAset', '$kategoriAset', $jumlah, '$departemenAsal', '$departemenTujuan', '$tanggalPengalokasian', '$alasanPengalokasian')";

    // Eksekusi query
    if (mysqli_query($mysqli, $sql)) {
        header("Location: ../departemen-page/page-alokasiDepartemen.php");
        exit(); // Pastikan untuk menghentikan eksekusi setelah header redirect
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }

    // Tutup koneksi
    mysqli_close($mysqli);
}
?>
