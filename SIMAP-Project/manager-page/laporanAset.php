<?php
include '../php/koneksi.php';

$sql_fetch_reports = "SELECT * FROM laporan_aset";
$result_reports = mysqli_query($mysqli, $sql_fetch_reports);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Aset</title>
    <link rel="stylesheet" href="../manager-style/laporanAset.css">
    <script src="https://kit.fontawesome.com/97216fb713.js" crossorigin="anonymous"></script>
    <style>
        /* Add styles for the dropdown menu */
        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #4a55a2;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-menu button {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
        }

        .dropdown-menu button:hover {
            background-color: #3e4b8c;
        }

        .username:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body>
    <div id="laporanAset">
        <div class="container"> 
            <nav class="sidebar">
                <div class="logo"> 
                    <a href="#"><img src="../assets/simap.png" class="logo" alt="Logo SIMAP"></a>
                </div>
                <ul>
                    <li><a href="page-Beranda.html">Beranda</a></li>
                    <li><a href="#">Laporan Aset</a></li>
                </ul>
            </nav>

            <div class="header">
                <div class="menu-bar">
                   <a href="#"><i class="fa-solid fa-bars" style="color: #4a55a2"></i></a>
                   <h1>Laporan Aset</h1>
                </div>
                <ul>
                    <li class="admin-profile">
                        <a href="#" id="profile-button">
                            <i class="fa-solid fa-circle-user" style="color: #4a55a2;"></i>
                        </a>
                    </li>
                    <li class="username">
                        <a href="#" id="profile-button-text">Manager Aset</a>
                        <div class="dropdown-menu" id="profile-dropdown">
                            <button onclick="editProfile()">Edit Profil</button>
                            <button onclick="logout()">Logout</button>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="box">
                <div class="filter-section">
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result_reports)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></a></td>
                                <td><a href="isiLaporan.php?id=<?php echo $row['id']; ?>"><?php echo $row['judul']; ?></td>
                                <td><?php echo $row['departemen']; ?></td>
                                <td><?php echo $row['tanggal_laporan']; ?></td>
                                <td class="action">
                                <button class="btn-download" onclick="downloadReport('report-1')"><i class="fa-solid fa-download" style="color: #4a55a2;"></i></button>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>   
    </div> 

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Buat Laporan</h2>
            <form id="createReportForm">
                <label for="namaLaporan">Nama Laporan:</label>
                <input type="text" id="namaLaporan" name="namaLaporan" required>
                <label for="idLaporan">ID:</label>
                <input type="text" id="idLaporan" name="idLaporan" required>
                <label for="kategori">Kategori:</label>
                <input type="text" id="kategori" name="kategori" required>
                <label for="departemen">Nama Departemen:</label>
                <input type="text" id="departemen" name="departemen" required>
                <label for="tanggalDibuat">Tanggal Dibuat:</label>
                <input type="date" id="tanggalDibuat" name="tanggalDibuat" required>
                <button type="button" onclick="addReport()">Simpan</button>
            </form>
        </div>
    </div>

    <script src="laporanAset.js"></script>

    <script>
        function downloadReport(reportId) {
            alert("Laporan dengan ID " + reportId + " sedang diunduh.");
        }

        function searchReports() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("reportsTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2]; // Kolom "Nama Laporan"
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }       
            }
        }

        function editProfile() {
            window.location.href = "profil.html";
        }

        function logout() {
            window.location.href = "index.html";
        }
    </script>
</body>
</html>
