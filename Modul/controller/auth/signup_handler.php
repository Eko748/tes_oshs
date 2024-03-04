<?php
require_once '../../../koneksi/db_connection.php';

date_default_timezone_set('Asia/Jakarta');

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$is_agree = $_POST['is_agree'];
$created_at = date('Y-m-d H:i:s');

$sql = "INSERT INTO user (name, email, password, is_agree, created_at) VALUES (?, ?, ?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->bind_param("sssss", $name, $email, $password, $is_agree, $created_at);
$stmt->execute();

header('Location: ../../../modul/view/auth/login.php');
exit;
?>
