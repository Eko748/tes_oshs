<?php
require_once '../../../koneksi/db_connection.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $sql = "DELETE FROM product WHERE id=?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();

    $stmt->close();
    $db->close();

    header('Location: ../../../modul/view/product/index.php');
    exit;
} else {
    echo "Product ID not provided.";
}
?>
