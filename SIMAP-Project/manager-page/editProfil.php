<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="../manager-style/editProfil.css">
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
                    <li><a href="page-beranda.html">Beranda</a></li>
                    <li><a href="laporanaset.html">Laporan Aset</a></li>
                </ul>
            </nav>

            <div class="header">
                <div class="menu-bar">
                   <a href="#"><i class="fa-solid fa-bars" style="color: #4a55a2;"></i></a>
                   <h1>Edit Profil</h1>
                </div>
                <ul>
                    <li class="admin-profile"><a href="#">
                        <i class="fa-solid fa-circle-user" style="color: #4a55a2;"></i>
                    </a>
                    </li>
                    <li class="username">
                        <a href="#">Manager Aset</a>
                    </li>
                </ul>
            </div>

            <div class="box">
                <div class="content">
                    <form class="info" id="editProfileForm">
                        <h1>Edit Profil</h1>
                        <div class="info-item">
                            <span class="label">Role</span>
                            <input type="text" name="role" value="Manager Aset" class="edit-field" id="role">
                        </div>
                        <div class="info-item">
                            <span class="label">Nama</span>
                            <input type="text" name="name" value="JungwooUwU" class="edit-field" id="name">
                        </div>
                        <div class="info-item">
                            <span class="label">Email</span>
                            <input type="email" name="email" value="jungwoo@gmail.com" class="edit-field" id="email">
                        </div>
                        <div class="info-item">
                            <span class="label">Contact</span>
                            <input type="text" name="contact" value="+62811890112" class="edit-field" id="contact">
                        </div>
                        <div class="button-container">
                            <button type="button" class="editButton" onclick="window.location.href='profil.html'">
                                <i class="fa-solid fa-arrow-left"></i> Kembali
                            </button>
                            <button type="submit" class="saveButton">
                                <i class="fa-solid fa-floppy-disk"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>   
    </div> 

    <script>
        document.getElementById('editProfileForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const role = document.getElementById('role').value;
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const contact = document.getElementById('contact').value;

            const profileData = {
                role,
                name,
                email,
                contact
            };

            localStorage.setItem('profileData', JSON.stringify(profileData));
            window.location.href = 'profil.html';
        });
    </script>
</body>
</html>
