<?php
include 'koneksi.php';
if(isset($_POST['submit'])){

    $nama = $_POST['nama'];
    $kelas_id = $_POST['kelas_id'];
    $detail_id = $_POST['detail_pelanggaran_id'];

    $insertquery =  "INSERT INTO pelanggaran VALUES ('','$nama','$kelas_id','$detail_id')";
    $berhasil = mysqli_query($db, $insertquery);

    if($berhasil){
    ?>
        <script>
            alert("Data Berhasil Ditambahkan!");
            window.location.replace("pelanggaran.php");
        </script>
    <?php 
        } else {
    // echo 'Not Inserted';
    ?>
    <script>
            alert("Data Gagal Tersimpan");
            window.location.replace("pelanggaran.php");
        </script>
    <?php        
}
    }
?>