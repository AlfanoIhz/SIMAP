<?php
include 'koneksi.php';

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form dan lakukan sanitasi
    $idAset = mysqli_real_escape_string($mysqli, $_POST['idAset']);
    $namaAset = mysqli_real_escape_string($mysqli, $_POST['namaAset']);
    $kategoriAset = mysqli_real_escape_string($mysqli, $_POST['kategoriAset']);
    $jumlah = (int)$_POST['jumlah']; 
    $departemen = mysqli_real_escape_string($mysqli, $_POST['departemen']);
    $tanggalMasuk = mysqli_real_escape_string($mysqli, $_POST['tanggalMasuk']);

    // Query untuk memperbarui data aset
    $updateQuery = "UPDATE aset SET 
                    namaAset = '$namaAset', 
                    kategoriAset = '$kategoriAset', 
                    jumlah = $jumlah, 
                    departemen = '$departemen', 
                    tanggalMasuk = '$tanggalMasuk' 
                    WHERE idAset = '$idAset'";

    // Eksekusi query
    if (mysqli_query($mysqli, $updateQuery)) {
        // Redirect ke halaman daftar aset setelah update berhasil
        header("Location: ../page-daftarAset.php");
        exit(); // Pastikan untuk menghentikan eksekusi setelah header redirect
    } else {
        echo "Error: " . $updateQuery . "<br>" . mysqli_error($mysqli);
    }
}

// Tutup koneksi
mysqli_close($mysqli);
?>
