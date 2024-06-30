<?php
session_start();
include "php/koneksi.php";

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    // Jika belum login, arahkan pengguna kembali ke halaman login
    header('Location: login-Perusahaan.php');
    exit();
}

// Periksa apakah ID pengguna disimpan dalam sesi
if (!isset($_SESSION['user_id'])) {
    // Jika tidak, arahkan pengguna kembali ke halaman login
    header('Location: login-Perusahaan.php');
    exit();
}

// Ambil ID pengguna dari sesi
$user_id = $_SESSION['user_id'];

// Ambil data profil pengguna dari database berdasarkan ID pengguna
$query = "SELECT * FROM admin_perusahaan WHERE id = '$user_id'";
$result = mysqli_query($mysqli, $query);

// Periksa apakah data ditemukan
if ($result && mysqli_num_rows($result) > 0) {
    // Jika ditemukan, simpan data profil dalam array
    $data = mysqli_fetch_assoc($result);
} else {
    // Jika tidak ditemukan, tampilkan pesan dan keluar dari skrip
    echo "Data tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <script src="https://kit.fontawesome.com/97216fb713.js" crossorigin="anonymous"></script>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

* {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
}

body {
    background-color: #EDEDED;
}

.container {
    display: flex;
}

.sidebar {
    background-color: #4a55a2;
    width: 250px;
    height: 100vh;
    padding-top: 20px;
    position: fixed;
}

.sidebar .logo {
    display: block;
    margin: 0 auto 10px;
    width: 75px;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar ul li {
    padding: 10px 20px;
}

.sidebar ul li a {
    color: white;
    text-decoration: none;
    display: block;
}

.sidebar ul li a:hover {
    background-color: #5a66d6;
    border-radius: 4px;
}

.main-content {
    margin-left: 250px;
    width: calc(100% - 250px);
    padding: 20px;
    padding-top: 90px; /* Add padding to create space for the header */
}

.header {
    height: 70px;
    width: calc(100% - 250px);
    background: linear-gradient(to right, #C5DFF8, #C5DFF8, #4A55A2);
    position: fixed;
    top: 0;
    left: 250px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.header .menu-bar {
    display: flex;
    align-items: center;
    font-size: 24px;
    color: #4a55a2;
}

.header .menu-bar h1 {
    margin-left: 10px;
    font-size: 24px;
    color: #4a55a2;
}

.header ul {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
}

.header ul li {
    margin-left: 20px;
    display: flex;
    align-items: center;
}

.header ul .admin-profile i {
    font-size: 30px;
    color: #4a55a2;
}

.header ul .username a {
    text-decoration: none;
    font-size: 20px;
    font-weight: 500;
    color: #FFF;
}

.box {
    width: 100%;
    max-width: 1000px;
    background-color: #fff;
    border-radius: 10px;
    margin: 15px auto;
    padding: 1px;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.content {
    text-align: center;
    padding: 50px;
    border-radius: inherit;
    width: 100%;
    height: 100%;
    box-sizing: border-box;
}

.profile-box {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #E0E0E0;
    border-radius: 50%;
    width: 100px;
    height: 100px;
    margin-bottom: 20px;
    margin-left: auto;
    margin-right: auto;
}

.profile-pic img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    background-color: #E0E0E0;
}

.info h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.info .info-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    padding: 10px;
    border-bottom: 1px solid #E0E0E0;
}

.info .label {
    color: #4a55a2;
}

.info .value {
    font-weight: bold;
    color: #333;
}

.edit-button-container {
    margin-top: 20px;
}

.edit-profile-button {
    background-color: #4a55a2;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}

.edit-profile-button:hover {
    background-color: #5a66d6;
}

@media (max-width: 768px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }

    .header {
        margin-left: 0;
        width: 100%;
        left: 0;
    }

    .header .menu-bar {
        display: block;
    }

    .sidebar ul {
        flex-direction: column;
    }

    .box {
        margin-left: 0;
    }
}

/* CSS untuk menampilkan dropdown saat mengarahkan kursor ke teks "Manager Aset" */
.username:hover .dropdown-menu {
    display: block;
}

/* CSS untuk styling dropdown */
.dropdown-menu {
    display: none;
    position: absolute;
    background-color: #4a55a2;
    min-width: 120px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-menu {
    display: none;
    position: absolute;
    background-color: #4a55a2;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* CSS untuk menampilkan dropdown saat mengarahkan kursor ke teks "Manager Aset" */
.username:hover .dropdown-menu {
    display: block;
}

/* CSS untuk styling dropdown */
.dropdown-menu {
    display: none;
    position: absolute;
    background-color: #4a55a2;
    min-width: 120px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    margin-top: 70px; 
}

.dropdown-menu button {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    background: none;
    border: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
}

.dropdown-menu button:hover {
    background-color: #3e4b8c;
}


</style>

<body>
    <div id="daftarAset">
        <div class="container"> 
            <nav class="sidebar">
                <div class="logo-container"> 
                    <a href="#"> <img src="assets/simap.png" class="logo" alt="Logo SIMAP"></a>
                </div>
                <ul>
                    <li><a href="page-Beranda.php">Beranda</a></li>
                    <li><a href="page-daftarAset.php">Daftar Aset</a></li>
                    <li><a href="#">Daftar Pengajuan <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="dropdown">
                            <li><a href="persetujuanPengadaan.php">Pengadaan Aset</a></li>
                            <li><a href="persetujuanAlokasi.php">Alokasi Aset</a></li>
                            <li><a href="persetujuanPemeliharaan.php">Pemeliharaan Aset</a></li>
                            <li><a href="persetujuanPembuangan.php">Pembuangan Aset</a></li>
                        </ul>
                    </li>
                    <li><a href="laporan.php">Laporan Aset</a></li>
                </ul>
            </nav>

            <div class="header">
                <div class="menu-bar">
                   <a href="#"><i class="fa-solid fa-bars" style="color: #4a55a2;"></i></a>
                   <h1>Beranda</h1>
                </div>
                <ul>
                    <li class="admin-profile"><a href="#">
                        <i class="fa-solid fa-circle-user" style="color: #4a55a2;"></i>
                    </a>
                    </li>
                    <li class="username">
                        <a href="#" id="profile-button-text">Admin Perusahaan</a>
                        <div class="dropdown-menu" id="profile-dropdown">
                            <button onclick="logout()">Logout</button>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="main-content">
            <div class="box">
                    <div class="content">
                        <div class="info">
                            <h1 id="roleTitle"></h1>
                            <div class="info-item">
                                <span class="label">Role</span>
                                <span><?php echo $data['role']; ?></span>
                            </div>
                            <div class="info-item">
                                <span class="label">Nama</span>
                                <span><?php echo $data['nama']; ?></span>
                            </div>
                            <div class="info-item">
                                <span class="label">Email</span>
                                <span><?php echo $data['email']; ?></span>
                            </div>
                            <div class="info-item">
                                <span class="label">Contact</span>
                                <span><?php echo $data['kontak']; ?></span>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
        </div>   
    </div> 

    <script>
        function logout() {
            window.location.href = "index.php";
        }
    </script>
</body>
</html>
