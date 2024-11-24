<?php
include 'koneksi.php';
if(isset($_POST['submit'])){
    
    $nama_pelanggaran = $_POST['nama_pelanggaran'];
    $poin = $_POST['poin'];

    $insertquery =  "INSERT INTO detail_pelanggaran VALUES ('','$nama_pelanggaran','$poin')";
    $berhasil = mysqli_query($db, $insertquery);

    if($berhasil){
    ?>
        <script>
            alert("Data Berhasil Ditambahkan!");
            window.location.replace("detail.php");
        </script>
    <?php 
        } else {
    // echo 'Not Inserted';
    ?>
    <script>
            alert("Data Gagal Tersimpan");
            window.location.replace("detail.php");
        </script>
    <?php        
}
    }
?>