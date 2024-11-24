<?php
include 'koneksi.php';
//inisialisasi session
session_start();
$error = '';
$validate = '';

if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $nama =$_POST['nama'];
    $kelas_id =$_POST['kelas_id'];
    $detail_id = $_POST['detail_pelanggaran_id'];

    // update user data
    $ambil= "UPDATE pelanggaran SET nama='$nama',kelas_id='$kelas_id',detail_pelanggaran_id='$detail_id' WHERE id=$id";
    $berhasiledit = mysqli_query($db, $ambil);

    if($berhasiledit){
    ?>
        <script>
            alert("Data Berhasil Diedit!");
            window.location.replace("pelanggaran.php");
        </script>
    <?php 
        } else {
    // echo 'Not Inserted';
    ?>
    <script>
            alert("Data Gagal Diedit");
            window.location.replace("pelanggaran.php");
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
$ambil= mysqli_query($db, "SELECT * FROM pelanggaran WHERE id=$id");

while ($r = mysqli_fetch_array($ambil)) {
    $nama = $r['nama'];
    $kelas_id = $r['kelas_id'];
    $detail_id = $r['detail_pelanggaran_id'];
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
			padding-top: 30%;
			text-align: center;
			font-weight: bold;
			font-family: Verdana, Geneva, Tahoma, sans-serif;
		}
        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {        
            padding-bottom: 15px;
            background: #435d7d;
            color: #fff;
            padding: 16px 30px;
            min-width: 100%;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        .table-title .btn-group {
            float: right;
        }
        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }
        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }
        table.table tr th:first-child {
            width: 200px;
        }
        table.table tr th:last-child {
            width: 100px;
        }
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }	
        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }
        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }
        table.table td a:hover {
            color: lightcoral;
        }
        table.table td a.edit {
            color: #05F6CE;
        }
        table.table td a.delete {
            color: red;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
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
        .modal form label {
            font-weight: normal;
        }
        form select{
        width: 503px;
        height: 39px;
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
                <form class="form-container" action="edit2.php" method="POST">
                    <h4> UPDATE DATA PELANGGARAN</h4>
                    <?php if ($error != '') { ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>

                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?php echo $nama; ?>">
                    </div>
                    <div class="form-group">
                        <label for="kelas_id">Kelas</label><br>
                        <!-- <input type="text" class="form-control" id="kelas_id" name="kelas_id" placeholder="Masukkan ID Kelas" value="<?php echo $kelas_id; ?>"> -->
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
                    <div class="form-group">
                        <label for="name">Jenis Pelanggaran</label>
                        <!-- <input type="text" class="form-control" id="deta$detail_id" name="deta$detail_id" placeholder="Masukkan Jenis Pelanggaran" value="<?php echo $detail_id; ?>"> -->
                        <select id="detail_pelanggaran_id" name="detail_pelanggaran_id" value="<?php echo $detail_id; ?>">
							<?php 
							$data = mysqli_query($db,"select * from detail_pelanggaran");
							while($d = mysqli_fetch_array($data)){
								?>
								<option value="<?php echo $d['id'] ?>"><?php echo $d['nama_pelanggaran'] ?></option>
								<?php
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