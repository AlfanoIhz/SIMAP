<?php
include 'php/koneksi.php'; // Memastikan koneksi ke database

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
                            <link rel="stylesheet" href="style/style-persetujuanPengadaan.css">
                            <script src="https://kit.fontawesome.com/97216fb713.js" crossorigin="anonymous"></script>
                        </head>
                        <body>
                            <div id="daftarAset">
                                <div class="container"> 
                                    <nav class="sidebar">
                                        <div class="logo"> 
                                            <a href="#"> <img src="assets/simap.png" class="logo" alt="Logo SIMAP"></a>
                                        </div>
                                        <ul>
                                            <li><a href="page-Beranda.php">Beranda</a></li>
                                            <li><a href="page-daftarAset.php">Daftar Aset</a></li>
                                            <li><a href="#">Daftar Pengajuan <i class="fa-solid fa-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="persetujuanPengadaa">Pengadaan Aset</a></li>
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
                                           <h1>Pengajuan Pengadaan Aset</h1>
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
                                        <h2>Persetujuan Pengadaan Aset</h2>
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
                                                        <button class="approve">Approve</button>
                                                        <button class="reject">Reject</button>
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
                             <i class="fa-solid fa-circle-user" style="color: #4a55a2;"></i>
                    </a>
                    </li>
                    <li class="username">
                        <a href="#">Admin Perusahaan</a>
                    </li>
                </ul>
            </div>
            </div>
        </div>   
    </div> 
</body>
</html>