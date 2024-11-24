<?php
include 'koneksi.php';

try {
    $nama_kelas = $_POST['nama_kelas'];
    $wali_kelas = $_POST['wali_kelas'];
    $insert = "INSERT INTO kelas (nama_kelas, wali_kelas) VALUES (?, ?)";
    
    // Prepare and bind the statement
    $stmt = $db->prepare($insert);
    $stmt->bind_param("ss", $nama_kelas,$wali_kelas);
    
    // Execute the query
    if ($stmt->execute()) {
        ?>
        <script>
            alert("Data Berhasil Ditambahkan!");
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
            alert("Data Gagal Ditambahkan: Data bersifat unik.");
            window.location.replace("kelas.php");
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Data Gagal Ditambahkan: <?php echo addslashes($e->getMessage()); ?>");
            window.location.replace("kelas.php");
        </script>
        <?php
    }
} catch (Exception $e) {
    ?>
    <script>
        alert("Data Gagal Ditambahkan: <?php echo addslashes($e->getMessage()); ?>");
        window.location.replace("kelas.php");
    </script>
    <?php
}

// Close the statement and connection
$stmt->close();
$db->close();
?>
