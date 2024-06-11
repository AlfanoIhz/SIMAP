<?php
include '../php/koneksi.php'; // Memastikan koneksi ke database

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
    <link rel="icon" href="../assets/simap.png">
    <link rel="stylesheet" href="../departemen-style/style-daftarAset.css">
    <script src="https://kit.fontawesome.com/97216fb713.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="page">
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
                    <h1>Daftar Aset</h1>
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
            <div class="filter-section">
            <!-- search -->
            <input type="text" id="search" placeholder="Search..." onkeyup="search()">
            <button class="btn-search" onclick="search()"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <table id="daftarAset">
                    <thead>
                        <tr>
                            <th>ID Aset</th>
                            <th>Nama Aset</th>
                            <th>Kategori Aset</th>
                            <th>Jumlah</th>
                            <th>Departemen</th>
                            <th>Tanggal Masuk</th>
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
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>   
    </div> 

    <script>
    function search() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("daftarAset");
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