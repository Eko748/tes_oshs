<?php
session_start();
session_destroy();
header('Location: ../../Modul/View/login.php');
exit;
?>