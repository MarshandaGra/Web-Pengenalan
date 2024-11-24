<?php
include 'koneksi.php';
//inisialisasi session
session_start();
$error = '';
$validate = '';

if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $mapel =$_POST['mapel'];
    $guru_pengajar = $_POST['guru_pengajar'];
    $kelas_id =$_POST['kelas_id'];
    

    // update user data
    $ambil= "UPDATE pelajaran SET mapel='$mapel',guru_pengajar='$guru_pengajar',kelas_id='$kelas_id' WHERE id=$id";
    $berhasiledit = mysqli_query($db, $ambil);

    if($berhasiledit){
    ?>
        <script>
            alert("Data Berhasil Diedit!");
            window.location.replace("pelajaran.php");
        </script>
    <?php 
        } else {
    // echo 'Not Inserted';
    ?>
    <script>
            alert("Data Gagal Diedit");
            window.location.replace("pelajaran.php");
        </script>
    <?php        
}
}
?>
<?php
// Display selected user data based on id
// Getting id from url
// if (isset($_GET['ubah']))
$id = $_GET['id'];

// Fetech user data based on id
$ambil= mysqli_query($db, "SELECT * From pelajaran WHERE id=$id");

while ($r = mysqli_fetch_array($ambil)) {
    $mapel = $r['mapel'];
    $guru_pengajar = $r['guru_pengajar'];
    $kelas_id = $r['kelas_id'];
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    
<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- costum css -->
	<style>
        @import url('https://fonts.googleapis.com/css2?family=Labrada&family=Mynerve&display=swap');
        body {
            color: lightcoral;
            background: #f5f5f5;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 13px;
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
        h4{
            padding-top: 23%;
            padding-bottom: 4%;
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        /* Modal styles */
        .modal .modal-dialog {
            max-width: 500px;
        }
        .modal .modal-header, .modal .modal-body, .modal .modal-footer {
            padding: 20px 30px;
        }
        .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }
        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }
        .modal .modal-title {
            display: inline-block;
        }
        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }
        .modal textarea.form-control {
            resize: vertical;
        }
        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }	
        form label {
            font-weight: 600;
            letter-spacing: 0.1rem;
            font-size: 15px;
        }
        form label2{
            padding-right: 2%;
            font-size: 13px;
        }
        form select{
        width: 500px;
        height: 37px;
        border-radius: 4px;
        border-color: #dddddd;
        }
	</style>
</head>
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
<!----------------------------NAVBAR END-------------------------->
<body>
    <section class="container-fluid mb-4">
        <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">
                <form class="form-container" action="edit4.php" method="POST">
                    <h4> UPDATE DATA MATA PELAJARAN </h4>
                    <?php if ($error != '') { ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>

                    <div class="form-group">
                        <label for="nama">Mata Pelajaran</label>
                        <input type="text" class="form-control" id="mapel" name="mapel" placeholder="Masukkan Nama Mata Pelajaran" value="<?php echo $mapel; ?>">
                    </div>
                    <div class="form-group">
                        <label for="guru_pengajar">Guru Pengajar</label>
                        <input type="text" class="form-control" id="guru_pengajar" name="guru_pengajar" placeholder="Masukkan Nama Guru Pengajar" value="<?php echo $guru_pengajar; ?>">
                    </div>
                    <div class="form-group">
                        <label for="kelas_id">Kelas</label><br>
                        <!-- <input type="text" class="form-control" id="kelas_id" name="kelas_id" placeholder="Masukkan ID Kelas" value=""> -->
                        <select id="kelas_id" name="kelas_id" value="<?php echo $nama_kelas; ?>">
							<?php 
							$data = $db->query("select * from kelas");
                            if ($data->num_rows > 0 ){
                                while($d = $data->fetch_assoc()){
                                    $selected = ($d['id']== $kelas_id)?'selected':'';
                                    echo "<option value=\"{$d['id']}\"$selected>{$d['nama_kelas']}</option>";
                            }
                        } else {
                            echo "<option value=\"\">Tidak Ada Kelas</option>";
                        }
							?>				
						</select>
                    </div>
                    <div>
                        <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                        <button type=" submit" name="ubah" class="btn btn-outline-danger btn-block">SIMPAN</button>
                    </div>
                </form>
            </section>
        </section>
    </section>
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>


<?php
$error = '';
$validate = '';

if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $mapel =$_POST['mapel'];
    $guru_pengajar =$_POST['guru_pengajar'];

    // update user data
    $ambil= mysqli_query($db, "UPDATE pelajaran SET mapel='$mapel',guru_pengajar='$guru_pengajar' WHERE id=$id");
    $result = mysqli_query($koneksi, $ambil);

    // Redirect to homepage to display updated user in list
    header("Location: pelajaran.php");
}
?>