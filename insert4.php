<?php
include 'koneksi.php';
if(isset($_POST['submit'])){
    
    $mapel = $_POST['mapel'];
    $guru_pengajar = $_POST['guru_pengajar'];
    $kelas_id = $_POST['kelas_id'];

    $insertquery =  "INSERT INTO pelajaran VALUES ('','$mapel','$guru_pengajar','$kelas_id')";
    $berhasil = mysqli_query($db, $insertquery);

    if($berhasil){
    ?>
        <script>
            alert("Data Berhasil Ditambahkan!");
            window.location.replace("pelajaran.php");
        </script>
    <?php 
        } else {
    // echo 'Not Inserted';
    ?>
    <script>
            alert("Data Gagal Tersimpan");
            window.location.replace("pelajaran.php");
        </script>
    <?php        
}
    }
?>