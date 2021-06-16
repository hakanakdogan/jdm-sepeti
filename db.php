<?php

$server = 'localhost';
$user = 'root';
$password = '';
$database = 'jdm-sepeti';

$connection = mysqli_connect($server, $user, $password, $database);

if (!$connection) {
    echo "MYSQL Sunucu ile Bağlantı Kurulamadı";
    echo "HATA" . mysqli_connect_error();
    exit();
}
