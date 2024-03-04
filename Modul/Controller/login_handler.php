<?php
session_start();
require_once '../../Koneksi/db_connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE email = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
    die("User not found");
}
$user = $result->fetch_assoc();

if (!password_verify($password, $user['password'])) {
    die("Incorrect password");
}

$_SESSION['loggedin'] = true;
$_SESSION['userid'] = $user['id'];
$_SESSION['name'] = $user['name'];

header('Location: ../../Modul/View/home/index.php');
exit;
