<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Pengajuan Pengalokasian</title>
    <link rel="stylesheet" href="../departemen-style/style-formAjukan.css">
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
                   <h1>Beranda</h1>
                </div>
                <ul>
                    <li class="admin-profile"><a href="#">
                        <i class="fa-solid fa-circle-user" style="color: #4a55a2;"></i>
                    </a>
                    </li>
                    <li class="username">
                        <a href="#">Admin Departemen</a>
                    </li>
                </ul>
            </div>

            <div class="box">
            <h1>Ajukan Alokasi Aset</h1>
                <form action="../php/ajukanAlokasi.php" method="POST">
                    <label for="idAset">ID Aset</label>
                    <input type="number" id="idAset" name="idAset" required>

                    <label for="namaAset">Nama Aset</label>
                    <input type="text" id="namaAset" name="namaAset" required>

                    <label for="kategoriAset">Kategori Aset</label>
                    <input type="text" id="kategoriAset" name="kategoriAset" required>

                    <label for="jumlah">Jumlah</label>
                    <input type="number" id="jumlah" name="jumlah" required>

                    <label for="departemenAsal">Departemen Asal</label>
                    <input type="text" id="departemenAsal" name="departemenAsal" required>

                    <label for="departemenTujuan">Departemen Tujuan</label>
                    <input type="text" id="departemenTujuan" name="departemenTujuan" required>

                    <label for="tanggalPengalokasian">Tanggal Pengalokasian</label>
                    <input type="date" id="tanggalPengalokasian" name="tanggalPengalokasian" required>

                    <label for="alasanPengalokasian">Alasan Pengalokasian</label>
                    <textarea type="text" rows="10" cols="30" id="alasanPengalokasian" name="alasanPengalokasian" required></textarea>

                    <div class="action-btn">
                        <a href="page-alokasiDepartemen.php"><button type="button" class="btn-kembali">Kembali</button></a>
                        <input type="submit" value="Simpan">
                    </div>
                </form>

                </div>
            </div>
        </div>   
    </div> 
</body>
</html>