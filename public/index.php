<?php

$viewPath = __DIR__ . '/modul/view/auth/signup.php';

if (file_exists($viewPath)) {
    require $viewPath;
} else {
    http_response_code(404);
    echo 'Halaman tidak ditemukan';
}
