<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../manager-style/profil.css">
    <script src="https://kit.fontawesome.com/97216fb713.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="profilePage">
        <div class="container"> 
            <nav class="sidebar">
                <div class="logo-container"> 
                    <a href="#"><img src="simap.png" class="logo" alt="Logo SIMAP"></a>
                </div>
                <ul>
                    <li><a href="page-beranda.html">Beranda</a></li>
                    <li><a href="laporanaset.html">Laporan Aset</a></li>
                </ul>
            </nav>

            <div class="main-content">
                <div class="header">
                    <div class="menu-bar">
                        <i class="fa-solid fa-bars"></i>
                        <h1>Profil</h1>
                    </div>
                    <ul>
                        <li class="admin-profile"><i class="fa-solid fa-circle-user"></i></li>
                        <li class="username">
                            <a href="#" id="profile-button-text">Manager Aset</a>
                            <div class="dropdown-menu" id="profile-dropdown">
                                <button onclick="logout()">Logout</button>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="box">
                    <div class="content">
                        <div class="profile-box">
                            <div class="profile-pic">
                                <img src="jungwoo.jpg" alt="Profile Picture of Jungwoo">
                            </div>
                        </div>
                        <div class="info">
                            <h1 id="roleTitle">Manager | JungwooUwU</h1>
                            <div class="info-item">
                                <span class="label">Role</span>
                                <span class="value" id="roleValue">Manager</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Nama</span>
                                <span class="value" id="nameValue">JungwooUwU</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Email</span>
                                <span class="value" id="emailValue">jungwoo@gmail.com</span>
                            </div>
                            <div class="info-item">
                                <span class="label">Contact</span>
                                <span class="value" id="contactValue">+62811890112</span>
                            </div>
                            <div class="edit-button-container">
                                <button class="edit-profile-button" onclick="editProfile()">Edit Profil</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div> 

    <script>
        function editProfile() {
            window.location.href = "editProfil.html";
        }

        function logout() {
            window.location.href = "index.html";
        }

        document.addEventListener('DOMContentLoaded', function() {
            const profileData = JSON.parse(localStorage.getItem('profileData'));

            if (profileData) {
                document.getElementById('roleTitle').textContent = `${profileData.role} | ${profileData.name}`;
                document.getElementById('roleValue').textContent = profileData.role;
                document.getElementById('nameValue').textContent = profileData.name;
                document.getElementById('emailValue').textContent = profileData.email;
                document.getElementById('contactValue').textContent = profileData.contact;
            }
        });
    </script>
</body>
</html>
