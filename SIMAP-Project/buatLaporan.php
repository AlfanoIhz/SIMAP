<?php
include 'php/koneksi.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = mysqli_real_escape_string($mysqli, $_POST['judul']);
    $departemen = mysqli_real_escape_string($mysqli, $_POST['departemen']);
    $bulan = (int)$_POST['bulan'];
    $tahun = (int)$_POST['tahun'];

    $sql_insert = "INSERT INTO laporan_aset (judul, departemen, bulan, tahun) VALUES ('$judul', '$departemen', $bulan, $tahun)";

    if (mysqli_query($mysqli, $sql_insert)) {
        header("Location: laporan.php");
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buat Laporan Aset</title>
    <link rel="stylesheet" href="style/style-formtambah.css">
    <script src="https://kit.fontawesome.com/97216fb713.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="daftarAset">
        <div class="container"> 
            <nav class="sidebar">
                <div class="logo-container"> 
                    <a href="#"> <img src="assets/simap.png" class="logo" alt="Logo SIMAP"></a>
                </div>
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="page-daftarAset.php">Daftar Aset</a></li>
                    <li><a href="#">Daftar Pengajuan <i class="fa-solid fa-angle-down"></i></a>
                        <ul class="dropdown">
                            <li><a href="persetujuanPengadaan.php">Pengadaan Aset</a></li>
                            <li><a href="#">Alokasi Aset</a></li>
                            <li><a href="persetujuanPemeliharaan.php">Pemeliharaan Aset</a></li>
                            <li><a href="#">Pembuangan Aset</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Laporan Aset</a></li>
                </ul>
            </nav>

            <div class="header">
                <div class="menu-bar">
                   <a href="#"><i class="fa-solid fa-bars" style="color: #4a55a2;"></i></a>
                   <h1>Laporan Aset</h1>
                </div>
                <ul>
                    <li class="admin-profile"><a href="#">
                        <i class="fa-solid fa-circle-user" style="color: #4a55a2;"></i>
                    </a>
                    </li>
                    <li class="username">
                        <a href="#">Admin Perusahaan</a>
                    </li>
                </ul>
            </div>

            <div class="box">
            <h2>Buat Laporan Aset</h2>
                <form method="POST" action="buatLaporan.php">
                    <label for="judul">Judul Laporan</label>
                    <input type="text" id="judul" name="judul" required>

                    <label for="departemen">Departemen</label>
                    <input type="text" id="departemen" name="departemen" required>

                    <label for="bulan">Bulan Masuk (1-12)</label>
                    <input type="number" id="bulan" name="bulan" min="1" max="12" required>

                    <label for="tahun">Tahun Masuk</label>
                    <input type="number" id="tahun" name="tahun" required>

                    <div class="action-btn">
                        <a href="laporan.php"><button type="button" class="btn-kembali">Kembali</button></a>
                        <input type="submit" value="Buat Laporan">
                    </div>
                </form>
                </div>
            </div>
        </div>   
    </div> 
</body>
</html>