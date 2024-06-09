<?php
include '../php/koneksi.php'; // Memastikan koneksi ke database

// Memanggil kolom yang ada pada tabel pengajuan pengadaan aset
$query_mysql = mysqli_query($mysqli, "SELECT * FROM pengajuan_pengadaan");

if (!$query_mysql) {
    die('Query Error: ' . mysqli_error($mysqli));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Pengadaan Aset</title>
    <link rel="icon" href="../assets/simap.png">
    <link rel="stylesheet" href="../departemen-style/style-pengadaanDepartemen.css">
    <script src="https://kit.fontawesome.com/97216fb713.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="daftarAset">
        <div class="container"> 
            <nav class="sidebar">
                <div class="logo"> 
                    <a href="#"> <img src="../assets/simap.png" class="logo" alt="Logo SIMAP"></a>
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

            <div class="header">
                <div class="menu-bar">
                    <a href="#"><i class="fa-solid fa-bars" style="color: #4a55a2;"></i></a>
                    <h1>Pengajuan Pengadaan Aset</h1>
                </div>
                <ul>
                    <li class="admin-profile"><a href="../departemen-page/page-profileDepartemen.html">
                        <i class="fa-solid fa-circle-user" style="color: #4a55a2;"></i>
                    </a>
                    </li>
                    <li class="username">
                        <a href="../departemen-page/page-profileDepartemen.html">Admin Departemen</a>
                    </li>
                </ul>
            </div>

            <div class="box">
                <h2>Pengajuan Pengadaan Aset</h2>
                <!-- Tambah Pengajuan -->
                <a href="form-tambahPengadaan.php"><button class="btn-tambah"><i class="fa-solid fa-plus" style="color: #ffff; font-size: 20px;"></i>Ajukan Aset Baru</button></a>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Aset</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Departemen</th>
                            <th>Tanggal Pengadaan</th>
                            <th>Alasan Pengadaan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($data = mysqli_fetch_assoc($query_mysql)) { ?>
                        <tr>
                            <td><?php echo $data['idPengajuanPengadaan']; ?></td>
                            <td><?php echo $data['namaAset']; ?></td>
                            <td><?php echo $data['kategoriAset']; ?></td>
                            <td><?php echo $data['jumlah']; ?></td>
                            <td><?php echo $data['departemen']; ?></td>
                            <td><?php echo $data['tanggalPengadaan']; ?></td>
                            <td><?php echo $data['alasanPengadaan']; ?></td>
                            <td>
                                <div class="status-text <?php echo ($data['status'] == 'APPROVED') ? 'status-approved' : (($data['status'] == 'REJECTED') ? 'status-rejected' : ''); ?>">
                                    <?php echo $data['status']; ?>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="pagination">
                    <button class="prev">Previous</button>
                    <button class="next">Next</button>
                </div>
            </div>
        </div>   
    </div> 
</body>
</html>
