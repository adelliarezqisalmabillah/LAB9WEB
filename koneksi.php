<?php
// GANTI DENGAN NAMA DATABASE Lab 8 Anda
$db = "web_lab8"; 

$conn = mysqli_connect("localhost", "root", "", $db);

// Cek Koneksi (Jika gagal, tampilkan pesan error)
if (mysqli_connect_errno()) {
    echo "<h1>Koneksi Database GAGAL!</h1>";
    echo "<p>Error: " . mysqli_connect_error() . "</p>";
    exit(); // Hentikan skrip jika koneksi gagal
}
// echo "Koneksi Berhasil!"; // (Bisa dihapus setelah berhasil)
?>