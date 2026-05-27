<?php

$host = 'localhost';
$user = 'straa';
$password = '53715';
$database = 'todolist_native';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch (PDOException $e) {
    die('koneksi database gagal: ' . $e->getMessage());
}
