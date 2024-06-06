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
    <title>Daftar Aset</title>
    <link rel="stylesheet" href="style/style-daftarAset.css">
    <script src="https://kit.fontawesome.com/97216fb713.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="daftarAset">
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
                   <a href="#"><i class="fa-solid fa-bars" style="color: #4a55a2"></i></a>
                   <h1>Daftar Aset</h1>
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
            <!-- tambah aset -->
            <a href="form-tambahAset.php"><button class="btn-tambah"><i class="fa-solid fa-plus" style="color: #ffff; font-size: 20px;"></i> Tambah Aset</button></a>
                <table>
                    <thead>
                        <tr>
                            <th>ID Aset</th>
                            <th>Nama Aset</th>
                            <th>Kategori Aset</th>
                            <th>Jumlah</th>
                            <th>Departemen</th>
                            <th>Tanggal Masuk</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = mysqli_fetch_assoc($query_mysql)) { ?>
                            <tr>
                                <td><?php echo $data['idAset']; ?></td>
                                <td><?php echo $data['namaAset']; ?></td>
                                <td><?php echo $data['kategoriAset']; ?></td>
                                <td><?php echo $data['jumlah']; ?></td>
                                <td><?php echo $data['departemen']; ?></td>
                                <td><?php echo $data['tanggalMasuk']; ?></td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <a href="form-editAset.php?id=<?php echo $data['idAset']; ?>" class="btn-edit">
                                    <i class="fa-solid fa-pen-to-square" style="color: #4a55a2;"></i></a>
                                    <!-- Tombol Hapus -->
                                    <a href="php/hapusAset.php?id=<?php echo $data['idAset']; ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fa-solid fa-trash-can" style="color: #D62F2F;"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>   
    </div> 
</body>
</html>
