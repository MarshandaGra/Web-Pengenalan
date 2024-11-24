<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "db_absensi";

$db = mysqli_connect($server, $user, $password, $database);

if(!$db){
    die("Gagal Terhubung ke Database: ".mysqli_connect_error());
}
?>