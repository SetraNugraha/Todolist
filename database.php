<?php
$host = 'localhost';
$dbname = 'todolist';
$user = 'root';
$pass = '';

$conn = mysqli_connect('localhost', 'root', '', 'todolist') or die ('Gagal Terhubung Ke Database');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Koneksi Berhasil";
} catch (PDOException $e) {
    die("Koneksi Gagal: " . $e->getMessage());
}
