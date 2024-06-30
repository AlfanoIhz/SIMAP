<?php
session_start();
include "../php/koneksi.php";

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header('Location: ../login-manager.php');
    exit();
}

// Periksa apakah ID pengguna disimpan dalam sesi
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login-manager.php');
    exit();
}

// Ambil ID pengguna dari sesi
$user_id = $_SESSION['user_id'];

// Ambil data profil pengguna dari database berdasarkan ID pengguna
$query = "SELECT * FROM manager WHERE id = '$user_id'";
$result = mysqli_query($mysqli, $query);

// Periksa apakah data ditemukan
if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
} else {
    echo "Data tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="../manager-style/editProfil.css">
    <script src="https://kit.fontawesome.com/97216fb713.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="daftarAset">
        <div class="container"> 
            <nav class="sidebar">
                <div class="logo-container"> 
                    <a href="#"> <img src="../assets/simap.png" class="logo" alt="Logo SIMAP"></a>
                </div>
                <ul>
                    <li><a href="page-beranda.php">Beranda</a></li>
                    <li><a href="laporanaset.php">Laporan Aset</a></li>
                </ul>
            </nav>

            <div class="header">
                <div class="menu-bar">
                   <a href="#"><i class="fa-solid fa-bars" style="color: #4a55a2;"></i></a>
                   <h1>Edit Profil</h1>
                </div>
                <ul>
                    <li class="admin-profile"><a href="#">
                        <i class="fa-solid fa-circle-user" style="color: #4a55a2;"></i>
                    </a>
                    </li>
                    <li class="username">
                        <a href="#">Manager Aset</a>
                    </li>
                </ul>
            </div>

            <div class="box">
                <div class="content">
                    <form action="../php/editProfil-manager.php" class="info" id="editProfileForm" method="POST">
                        <h1>Edit Profil</h1>
                        <div class="info-item">
                            <span class="label">Role</span>
                            <input type="text" name="role" value="<?php echo $data['role']; ?>" class="edit-field" id="role">
                        </div>
                        <div class="info-item">
                            <span class="label">Nama</span>
                            <input type="text" name="name" value="<?php echo $data['nama']; ?>" class="edit-field" id="name">
                        </div>
                        <div class="info-item">
                            <span class="label">Email</span>
                            <input type="email" name="email" value="<?php echo $data['email']; ?>" class="edit-field" id="email">
                        </div>
                        <div class="info-item">
                            <span class="label">Contact</span>
                            <input type="text" name="kontak" value="<?php echo $data['kontak']; ?>" class="edit-field" id="kontak">
                        </div>
                        <div class="button-container">
                            <button type="button" class="editButton" onclick="window.location.href='profil.php'">
                                <i class="fa-solid fa-arrow-left"></i> Kembali
                            </button>
                            <input type="submit" class="saveButton" value="Simpan">
                                <!-- <i class="fa-solid fa-floppy-disk"></i> Simpan -->
                        </div>
                    </form>
                </div>
            </div>
        </div>   
    </div> 
</body>
</html>
