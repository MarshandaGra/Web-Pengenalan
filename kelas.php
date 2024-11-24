<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>DATA KELAS</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});

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


</script>
<style>
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
    color: #05F6CE
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
    color:#05F6CE
}
h1{
	margin-top: 6%;
	font-weight: bold;
	text-align: center;
}
h4{
	padding-top: 15%;
	text-align: center;
	font-weight: bold;
	font-family: Verdana, Geneva, Tahoma, sans-serif;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(87, 87, 87, 0.664);
}
.table-title {        
	padding-bottom: 15px;
	background: dimgrey;
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
	color: #2196F3;
}
table.table td a.edit {
	color: #45e108;
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
.modal form label {
	font-weight: 600;
	letter-spacing: 0.1rem;
	font-size: 15px;
}
.modal form label2{
	padding-right: 2%;
}
</style>
</head>
<body>
<!-- --------------------------NAVBAR START----------->
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
<!----------------------------NAVBAR END------------------------ -->
<!----------------------------ISI HALAMANN-------------------------->
<div class="crud">
	<h1>DATA KELAS</h1>
</div>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				
				<div class="row">
					<div class="col-sm-6"></div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambahkan Data</span></a>		
					</div>
				</div>
			</div>
			
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nama Kelas</th>
						<th>Wali Kelas</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
			<?php
			include 'koneksi.php';
			$query = 'SELECT * FROM kelas';
			$mysqliquery = mysqli_query($db, $query);
			while ($result = mysqli_fetch_assoc($mysqliquery)) {
				?>
				<tr>
					<td>
						<?php echo $result['nama_kelas']; ?>
					</td>
					<td>
						<?php echo $result['wali_kelas']; ?>
					</td>
					<td>
						<a href="edit3.php?id=<?php echo $result['id']; ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Update">&#xE254;</i></a>
						<a href="delete3.php?ids=<?php echo $result['id']; ?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
					</td>
				</tr>
				<?php
			}
			?>

				</tbody>
			</table>
			
	</div>        
</div>
<!-- Add User HTML-->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="insert3.php" >
				<div class="modal-header">						
					<h4 class="modal-title">Tambahkan Data Kelas</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Nama Kelas</label>
						<input type="text" name="nama_kelas" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Wali Kelas</label>
						<input type="text"  class="form-control" name="wali_kelas" required>
					</div>			
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!----------------------------ISI HALAMANN ENDD-------------------------->
</body>
</html>