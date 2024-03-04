<?php
session_start();
session_destroy();
header('Location: ../../../modul/view/auth/login.php');
exit;
?>