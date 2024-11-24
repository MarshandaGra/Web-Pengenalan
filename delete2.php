<?php
include 'koneksi.php';
$id = $_GET['ids'];
$delete = "DELETE FROM pelanggaran WHERE id = $id";
$berhasilhapus = mysqli_query($db, $delete);

    if($berhasilhapus){
    ?>
        <script>
            alert("Data Berhasil Dihapus!");
            window.location.replace("pelanggaran.php");
        </script>
    <?php 
        } else {
    // echo 'Not Inserted';
    ?>
    <script>
            alert("Data Gagal Terhapus");
            window.location.replace("pelanggaran.php");
        </script>
    <?php        
}
?>