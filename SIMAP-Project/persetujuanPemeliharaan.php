<?php
include 'php/koneksi.php'; // Memastikan koneksi ke database

// Memanggil kolom yang ada pada tabel pengajuan pemeliharaan aset
$query_mysql = mysqli_query($mysqli, "SELECT * FROM pengajuan_pemeliharaan");

if (!$query_mysql) {
    die('Query Error: ' . mysqli_error($mysqli));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Pemeliharaan Aset</title>
    <link rel="stylesheet" href="style/style-persetujuanPengadaan.css">
    <script src="https://kit.fontawesome.com/97216fb713.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="daftarPengajuan">
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
                            <li><a href="persetujuanPengadaan.php">Pengadaan Aset</a></li>
                            <li><a href="persetujuanAlokasi.php">Alokasi Aset</a></li>
                            <li><a href="persetujuanPemeliharaan.php">Pemeliharaan Aset</a></li>
                            <li><a href="persetujuanPembuangan.php">Pembuangan Aset</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Laporan Aset</a></li>
                </ul>
            </nav>

            <div class="header">
                <div class="menu-bar">
                    <a href="#"><i class="fa-solid fa-bars" style="color: #4a55a2;"></i></a>
                    <h1>Pengajuan Pemeliharaan Aset</h1>
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
                <h2>Persetujuan Pemeliharaan Aset</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Aset</th>
                            <th>Nama Aset</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Departemen</th>
                            <th>Tanggal Pemeliharaan</th>
                            <th>Alasan Pemeliharaan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($data = mysqli_fetch_assoc($query_mysql)) { ?>
                        <tr>
                            <td><?php echo $data['idPengajuanPemeliharaan']; ?></td>
                            <td><?php echo $data['idAset']; ?></td>
                            <td><?php echo $data['namaAset']; ?></td>
                            <td><?php echo $data['kategoriAset']; ?></td>
                            <td><?php echo $data['jumlah']; ?></td>
                            <td><?php echo $data['departemen']; ?></td>
                            <td><?php echo $data['tanggalPemeliharaan']; ?></td>
                            <td><?php echo $data['alasanPemeliharaan']; ?></td>
                            <td>
                                <div class="status-text"></div>
                                <button class="approve" onclick="approveAction(this)">Approve</button>
                                <button class="reject" onclick="rejectAction(this)">Reject</button>
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

    <script>
        function approveAction(button) {
            button.textContent = 'APPROVED';
            button.style.backgroundColor = '#4caf50';
            button.style.color = 'white';
            button.disabled = true; // Disable the button to prevent multiple clicks

            // Find the closest status-text div and update its content
            var statusTextDiv = button.parentElement.querySelector('.status-text');
            statusTextDiv.textContent = 'APPROVED';
            statusTextDiv.style.color = '#4caf50';
            statusTextDiv.style.fontWeight = 'bold';

            // Hide the approve and reject buttons
            var approveButton = button.parentElement.querySelector('.approve');
            var rejectButton = button.parentElement.querySelector('.reject');
            approveButton.style.display = 'none';
            rejectButton.style.display = 'none';
        }

        function rejectAction(button) {
            button.textContent = 'REJECTED';
            button.style.backgroundColor = '#f44336';
            button.style.color = 'white';
            button.disabled = true; // Disable the button to prevent multiple clicks

            // Find the closest status-text div and update its content
            var statusTextDiv = button.parentElement.querySelector('.status-text');
            statusTextDiv.textContent = 'REJECTED';
            statusTextDiv.style.color = '#f44336';
            statusTextDiv.style.fontWeight = 'bold';

            // Hide the approve and reject buttons
            var approveButton = button.parentElement.querySelector('.approve');
            var rejectButton = button.parentElement.querySelector('.reject');
            approveButton.style.display = 'none';
            rejectButton.style.display = 'none';
        }
    </script>

        </div>
    </div>   
</div> 
</body>
</html>
                             