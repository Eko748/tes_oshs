<?php
$db = new mysqli('localhost', 'u778534470_oshs', '@Nezam123', 'u778534470_tes_oshs
');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
