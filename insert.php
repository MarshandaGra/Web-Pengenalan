<?php
include 'koneksi.php';
if(isset($_POST['submit'])){
    
    $nama = $_POST['nama'];
    $kelas_id = $_POST['kelas_id'];
    $keterangan = $_POST['keterangan'];

    $insertquery =  "INSERT INTO absensi VALUES ('','$nama','$kelas_id','$keterangan')";
    // mysqli_query($db, $insertquery);
    $berhasil = mysqli_query($db, $insertquery);

    if($berhasil){
    ?>
        <script>
            alert("Data Berhasil Ditambahkan!");
            window.location.replace("absensi1.php");
        </script>
    <?php 
        } else {
    // echo 'Not Inserted';
    ?>
    <script>
            alert("Data Gagal Tersimpan");
            window.location.replace("absensi1.php");
        </script>
    <?php        
}
    }
?>