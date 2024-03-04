<?php
require_once '../../../koneksi/db_connection.php';

date_default_timezone_set('Asia/Jakarta');

$product_name = $_POST['product_name'];
$category = $_POST['category'];
$stock = $_POST['stock'];
$price = $_POST['price'];
$created_at = date('Y-m-d H:i:s');

$sql = "INSERT INTO product (product_name, category, stock, price, created_at) VALUES (?, ?, ?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->bind_param("sssss", $product_name, $category, $stock, $price, $created_at);
$stmt->execute();

header('Location: ../../../modul/view/product/index.php');
exit;
?>
