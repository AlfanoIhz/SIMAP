<?php
include 'koneksi.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form 
    $namaAset = mysqli_real_escape_string($mysqli, $_POST['namaAset']);
    $kategoriAset = mysqli_real_escape_string($mysqli, $_POST['kategoriAset']);
    $jumlah = (int)$_POST['jumlah']; 
    $departemen = mysqli_real_escape_string($mysqli, $_POST['departemen']);
    $tanggalPengadaan = mysqli_real_escape_string($mysqli, $_POST['tanggalPengadaan']);
    $alasanPengadaan = mysqli_real_escape_string($mysqli, $_POST['alasanPengadaan']);

    // Query untuk memasukkan data ke tabel pengajuan
    $sql = "INSERT INTO pengajuan_pengadaan (namaAset, kategoriAset, jumlah, departemen, tanggalPengadaan, alasanPengadaan) VALUES ('$namaAset', '$kategoriAset', $jumlah, '$departemen', '$tanggalPengadaan', '$alasanPengadaan')";

    // Eksekusi query
    if (mysqli_query($mysqli, $sql)) {

        header("Location: ../departemen-page/page-PengadaanDepartemen.php");
        exit(); // Pastikan untuk menghentikan eksekusi setelah header redirect
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }

    // Tutup koneksi
    mysqli_close($mysqli);
}
?>
