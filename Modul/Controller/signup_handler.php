<?php
require_once '../../Koneksi/db_connection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$is_agree = $_POST['is_agree'];
$created_at = date('Y-m-d H:i:s');

$sql = "INSERT INTO user (name, email, password, is_agree, created_at) VALUES (?, ?, ?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->bind_param("sssss", $name, $email, $password, $is_agree, $created_at);
$stmt->execute();

header('Location: ../../Modul/View/login.php');
exit;
?>
