<?php
// İstek URL'sini alıyoruz (query string olmadan)
$request = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// Ana sayfa için index.php'yi çalıştırıyoruz
if ($request === '/' || $request === '') {
    require 'index.php';
    return;
}

// Eğer istenen dosya fiziksel olarak varsa, PHP yerleşik sunucusunun bu dosyayı sunmasına izin veriyoruz
if (file_exists(__DIR__ . $request) && is_file(__DIR__ . $request)) {
    return false;
}

// .php uzantılı dosya varsa onu dahil ediyoruz
if (file_exists(__DIR__ . $request . '.php')) {
    require __DIR__ . $request . '.php';
    return;
}

// Hiçbir eşleşme bulunamazsa, varsayılan olarak index.php'yi çalıştırıyoruz
require 'index.php';
