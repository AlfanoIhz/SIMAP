<?php
include 'php/koneksi.php'; // Memastikan koneksi ke database

// Memanggil kolom yang ada pada tabel aset
$query_mysql = mysqli_query($mysqli, "SELECT * FROM aset");

if (!$query_mysql) {
    die('Query Error: ' . mysqli_error($mysqli));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Aset</title>
    <link rel="icon" href="assets/simap.png">
    <link rel="stylesheet" href="style/style-tambahAset.css">
    <script src="https://kit.fontawesome.com/97216fb713.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="page">
        <div class="container"> 
            <nav class="sidebar">
                <div class="logo"> 
                    <a href="#"><img src="assets/simap.png" class="logo" alt="Logo SIMAP"></a>
                </div>
                <ul>
                    <li><a href="page-Beranda.php">Beranda</a></li>
                    <li><a href="page-daftarAset.php">Daftar Aset</a></li>
                    <li><a href="#">Daftar Pengajuan <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="dropdown">
                            <li><a href="page-pengadaan.php">Pengadaan Aset</a></li>
                            <li><a href="#">Alokasi Aset</a></li>
                            <li><a href="#">Pemeliharaan Aset</a></li>
                            <li><a href="#">Pembuangan Aset</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Laporan Aset</a></li>
                </ul>
            </nav>

            <div class="header">
                <div class="menu-bar">
                    <a href="#"><i class="fa-solid fa-bars" style="color: #4a55a2;"></i></a>
                    <h1>Daftar Aset</h1>
                </div>
                <ul>
                    <li class="admin-profile"><a href="#">
                        <i class="fa-solid fa-circle-user" style="color: #4a55a2;"></i>
                    </a></li>
                    <li class="username"><a href="#">Admin Perusahaan</a></li>
                </ul>
            </div>

            <div class="box">
                <h1>Tambah Aset</h1>
                <form action="php/tambahAset.php" method="POST">
                    <div class="form-row">
                        <div class="form-column">
                            <label for="namaAset">Nama Aset</label>
                            <input type="text" id="namaAset" name="namaAset" required>
                        </div>
                        <div class="form-column">
                            <label for="idAset">ID</label>
                            <input type="text" id="idAset" name="idAset" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column">
                            <label for="kategoriAset">Kategori Aset</label>
                            <input type="text" id="kategoriAset" name="kategoriAset" required>
                        </div>
                        <div class="form-column">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" id="jumlah" name="jumlah" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column">
                            <label for="tanggalMasuk">Tanggal Peroleh</label>
                            <input type="date" id="tanggalMasuk" name="tanggalMasuk" required>
                        </div>
                        <div class="form-column">
                            <label for="departemen">Nama Departemen</label>
                            <input type="text" id="departemen" name="departemen" required>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn-kembali">Kembali</button>
                        <button type="button" class="btn-simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>   
    </div> 
</body>
</html>

