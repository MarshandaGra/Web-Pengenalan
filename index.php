<?php
//inisialisasi session
session_start();
//mengecek username pada session
if( !isset($_SESSION['username']) ){
$_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script>
    function confirmLogout() {
    var logoutConfirmed = confirm("Apakah Anda yakin ingin keluar?");
    if (logoutConfirmed) {
        // Lakukan aksi log out di sini
        alert("Anda telah keluar!"); // Contoh: tampilkan alert sebagai gantinya
		window.location.href = "register.php";
    } else {
        // Pengguna membatalkan log out, tidak ada tindakan tambahan yang diambil
        alert("Log out dibatalkan.");
    }
}
function confirmDelete() {
    var deleteConfirmed = confirm("Apakah Anda yakin ingin menhgapus data ini?");
    if (deleteConfirmed) {
        // Lakukan aksi delete di sini
        alert("Data telah dihapus!"); // Contoh: tampilkan alert sebagai gantinya
		window.location.href = "absensi1.php";
    } else {
        // Pengguna membatalkan log out, tidak ada tindakan tambahan yang diambil
        alert("Menghapus data dibatalkan");
    }
}
</script>
<style>
        @import 'animate.css';
        body{
            background-image: url(9.png);
            background-size: cover;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        h1{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin-top: 20%;
            text-align: center;
            font-size: 75px;
            font-weight: bold;
            color: whitesmoke;
        }
        .container{
            margin-top: 10%;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .overlay {
            background: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .offset::before{
            display: block;
            content: "";
            height: 6rem;
            color: #05F6CE;
        }
        .navbar{
            text-transform: uppercase;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0.2rem;
            background: lightcoral !important;
            padding: 20px 0;
        }
        .navbar-dark .navbar-nav .nav-link{
            color: #fff;
            padding-left: 20px;
        }
        .navbar-dark .navbar-nav .nav-link.active,
        .navbar-dark .navbar-nav .nav-link:hover{
            color:#05F6CE;
        }
        footer {
            background-color: lightcoral;
            color: #fff;
            text-align: center;
            padding: 8px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
</style>
</head>
<body>
<!----------------------------NAVBAR START------------------------->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                <a class="nav-link" href="index.php">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="absensi1.php">ABSENSI</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="kelas.php">KELAS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pelajaran.php">PELAJARAN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pelanggaran.php">PELANGGARAN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="detail.php">DETAIL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="confirmLogout()">LOG OUT</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
    <div class="overlay"></div>
        <h1 class="animate__animated animate__rubberBand">Selamat Datang</h1>
<!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>