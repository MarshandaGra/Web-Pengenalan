<?php
include 'koneksi.php';

try {
    $id = $_GET['ids'];
    $delete = "DELETE FROM detail_pelanggaran WHERE id = ?";
    
    // Prepare and bind the statement
    $stmt = $db->prepare($delete);
    $stmt->bind_param("i", $id);
    
    // Execute the query
    if ($stmt->execute()) {
        ?>
        <script>
            alert("Data Berhasil Dihapus!");
            window.location.replace("detail.php");
        </script>
        <?php
    } else {
        throw new Exception($stmt->error);
    }

} catch (mysqli_sql_exception $e) {
    // Check for foreign key constraint violation error code (usually 1451 for MySQL)
    if ($e->getCode() == 1451) {
        ?>
        <script>
            alert("Data Gagal Terhapus: Data ini berelasi dengan data lain.");
            window.location.replace("detail.php");
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Data Gagal Terhapus: <?php echo addslashes($e->getMessage()); ?>");
            window.location.replace("detail.php");
        </script>
        <?php
    }
} catch (Exception $e) {
    ?>
    <script>
        alert("Data Gagal Terhapus: <?php echo addslashes($e->getMessage()); ?>");
        window.location.replace("detail.php");
    </script>
    <?php
}

// Close the statement and connection
$stmt->close();
$db->close();
?>
