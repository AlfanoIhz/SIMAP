<?php
include 'php/koneksi.php'; // Memastikan koneksi ke database

// Memeriksa apakah ID Aset ada di URL
if (isset($_GET['id'])) {
    $idAset = $_GET['id'];

    // Ambil data aset dari database berdasarkan ID
    $query = "SELECT * FROM aset WHERE idAset = '$idAset'";
    $result = mysqli_query($mysqli, $query);

    // Periksa apakah data ditemukan
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "Data aset tidak ditemukan.";
        exit();
    }
} else {
    echo "ID Aset tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Aset</title>
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
                   <h1>Edit Aset</h1>
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
                <h2>Edit Aset</h2>
                <form action="php/editAset.php" method="POST">
                    <input type="hidden" name="idAset" value="<?php echo $data['idAset']; ?>">
                    <label for="namaAset">Nama Aset:</label>
                    <input type="text" name="namaAset" value="<?php echo $data['namaAset']; ?>" >

                    <label for="kategoriAset">Kategori Aset:</label>
                    <input type="text" name="kategoriAset" value="<?php echo $data['kategoriAset']; ?>" >

                    <label for="jumlah">Jumlah:</label>
                    <input type="number" name="jumlah" value="<?php echo $data['jumlah']; ?>" >

                    <label for="departemen">Departemen:</label>
                    <input type="text" name="departemen" value="<?php echo $data['departemen']; ?>" >

                    <label for="tanggalMasuk">Tanggal Masuk:</label>
                    <input type="date" name="tanggalMasuk" value="<?php echo $data['tanggalMasuk']; ?>" >
                    
                <div class="action-btn">
                    <a href="page-daftarAset.php"><button type="button" class="btn-kembali">Kembali</button></a>
                    <input type="submit" value="Simpan">
                </div>
                </form>
                
            </div>
        </div>   
    </div> 
</body>
</html>
