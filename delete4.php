<?php
include 'koneksi.php';
$id = $_GET['id'];
$delete = "DELETE FROM pelajaran WHERE id = $id";
$berhasilhapus = mysqli_query($db, $delete);

    if($berhasilhapus){
    ?>
        <script>
            alert("Data Berhasil Dihapus!");
            window.location.replace("pelajaran.php");
        </script>
    <?php 
        } else {
    // echo 'Not Inserted';
    ?>
    <script>
            alert("Data Gagal Terhapus");
            window.location.replace("pelajaran.php");
        </script>
    <?php        
}
?>