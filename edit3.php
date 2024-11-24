<?php
include 'koneksi.php';
//inisialisasi session
session_start();
$error = '';
$validate = '';

if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $nama_kelas = $_POST['nama_kelas'];
    $walas = $_POST['wali_kelas'];

    try {
        // Prepare the update statement
        $stmt = $db->prepare("UPDATE kelas SET nama_kelas=?, wali_kelas=? WHERE id=?");
        $stmt->bind_param("ssi", $nama_kelas, $walas, $id);
        
        // Execute the update statement
        if ($stmt->execute()) {
            ?>
            <script>
                alert("Data Berhasil Diedit!");
                window.location.replace("kelas.php");
            </script>
            <?php
        } else {
            throw new Exception($stmt->error);
        }
    } catch (mysqli_sql_exception $e) {
        // Check for duplicate entry error code (usually 1062 for MySQL)
        if ($e->getCode() == 1062) {
            ?>
            <script>
                alert("Data Gagal Diedit: Data sudah tersedia.");
                window.location.replace("kelas.php");
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Data Gagal Diedit: <?php echo addslashes($e->getMessage()); ?>");
                window.location.replace("kelas.php");
            </script>
            <?php
        }
    } catch (Exception $e) {
        ?>
        <script>
            alert("Data Gagal Diedit: <?php echo addslashes($e->getMessage()); ?>");
            window.location.replace("kelas.php");
        </script>
        <?php
    }

    // Close the statement and connection
    $stmt->close();
    $db->close();
}

// Fetch selected user data based on id
$id = $_GET['id'];
$nama_kelas = '';
$walas = '';

if ($id) {
    $ambil = mysqli_query($db, "SELECT * FROM kelas WHERE id=$id");

    if ($r = mysqli_fetch_array($ambil)) {
        $nama_kelas = $r['nama_kelas'];
        $walas = $r['wali_kelas'];
    } else {
        ?>
        <script>
            alert("Data tidak ditemukan.");
            window.location.replace("kelas.php");
        </script>
        <?php
    }
} else {
    ?>
    <script>
        alert("ID tidak ditemukan.");
        window.location.replace("kelas.php");
    </script>
    <?php
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
                <form class="form-container" action="edit3.php" method="POST">
                    <h4> UPDATE DATA KELAS</h4>
                    <?php if ($error != '') { ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>

                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas</label>
                        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas" value="<?php echo $nama_kelas; ?>">
                    </div>
                    <div class="form-group">
                        <label for="wali_kelas">Wali Kelas</label>
                        <input type="text" class="form-control" id="wali_kelas" name="wali_kelas" placeholder="Masukkan Nama Wali Kelas" value="<?php echo $walas; ?>">
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
