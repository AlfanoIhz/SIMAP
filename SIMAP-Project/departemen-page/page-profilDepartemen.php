<?php
session_start();
include "../php/koneksi.php";

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    // Jika belum login, arahkan pengguna kembali ke halaman login
    header('Location: ../login-Departemen.php');
    exit();
}

// Periksa apakah ID pengguna disimpan dalam sesi
if (!isset($_SESSION['user_id'])) {
    // Jika tidak, arahkan pengguna kembali ke halaman login
    header('Location: ../login-Departemen.php');
    exit();
}

// Ambil ID pengguna dari sesi
$user_id = $_SESSION['user_id'];

// Ambil data profil pengguna dari database berdasarkan ID pengguna
$query = "SELECT * FROM admin_departemen WHERE id = '$user_id'";
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
    <title>Profile</title>
    <link rel="icon" href="../assets/simap.png">
    <link rel="stylesheet" href="../departemen-style/profil.css">
    <script src="https://kit.fontawesome.com/97216fb713.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="daftarAset">
        <div class="container"> 
        <nav class="sidebar">
                <div class="logo"> 
                    <a href="page-berandaDepartemen.php"> <img src="../assets/simap.png" class="logo" alt="Logo SIMAP"></a>
                </div>
                <ul>
                    <li><a href="page-berandaDepartemen.php">Beranda</a></li>
                    <li><a href="page-daftarAset.php">Daftar Aset</a></li>
                    <li><a href="#">Daftar Pengajuan <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="dropdown">
                            <li><a href="page-PengadaanDepartemen.php">Pengadaan Aset</a></li>
                            <li><a href="page-alokasiDepartemen.php">Alokasi Aset</a></li>
                            <li><a href="page-pemeliharaanDepartemen.php">Pemeliharaan Aset</a></li>
                            <li><a href="page-pembuanganDepartemen.php">Pembuangan Aset</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <div class="main-content">
            <div class="header">
                <div class="menu-bar">
                   <a href="#"><i class="fa-solid fa-bars" style="color: #4a55a2;"></i></a>
                   <h1>Profile</h1>
                </div>
                <ul>
                    <li class="admin-profile"><i class="fa-solid fa-circle-user"></i></li>
                        <li class="username">
                            <a href="#" id="profile-button-text">Admin Departemen</a>
                            <div class="dropdown-menu" id="profile-dropdown">
                                <button onclick="logout()">Logout</button>
                            </div>
                        </li>
                    </li>
                </ul>
            </div>

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
    </div> 

    <script>
        function logout() {
            window.location.href = "../index.php";
        }
    </script>
</body>
</html>
