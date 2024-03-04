<?php
require_once '../../../koneksi/db_connection.php';

date_default_timezone_set('Asia/Jakarta');

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    
    $sql = "UPDATE product SET product_name=?, category=?, stock=?, price=? WHERE id=?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssssi", $product_name, $category, $stock, $price, $id);
    $stmt->execute();

    header('Location: ../../../modul/view/product/index.php');
    exit;
} else {
    echo "Product ID not provided.";
}
?>
