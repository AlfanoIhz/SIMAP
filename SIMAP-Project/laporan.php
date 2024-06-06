<?php
include 'php/koneksi.php';

$sql_fetch_reports = "SELECT * FROM laporan_aset";
$result_reports = mysqli_query($mysqli, $sql_fetch_reports);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Aset</title>
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
                    <li><a href="laporan.php">Laporan Aset</a></li>
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
                <div class="filter-section">
                    <!-- tambah laporan -->
                    <a href="buatLaporan.php"><button class="btn-tambah-laporan"><i class="fa-solid fa-plus" style="color: #ffff; font-size: 20px;">
                    </i> Buat Laporan</button></a>
                    <!-- search -->
                    <input type="text" id="search" placeholder="Search..." onkeyup="searchReports()">
                    <button class="btn-search" onclick="searchReports()"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <table id= "daftarLaporan">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul Laporan</th>
                            <th>Departemen</th>
                            <th>Waktu Pembuatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result_reports)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></a></td>
                                <td><a href="isiLaporan.php?id=<?php echo $row['id']; ?>"><?php echo $row['judul']; ?></td>
                                <td><?php echo $row['departemen']; ?></td>
                                <td><?php echo $row['tanggal_laporan']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script>
    function searchReports() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("daftarLaporan");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) { // Start from 1 to skip the header row
                tr[i].style.display = "none"; // Hide all rows initially
                td = tr[i].getElementsByTagName("td"); // Get all columns in the current row

                for (var j = 0; j < td.length; j++) { // Loop through all columns
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = ""; // Show the row if match found
                            break; // Stop loop if match found in one column
                        }
                    }
                }
            }
        }
    </script>

</body>
</html>


