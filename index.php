<?php
// 1. Load Bagian Atas (Header)
require('template/header.php');

// 2. Logika Routing
// Ambil nilai 'mod' dari URL, jika tidak ada, defaultnya 'home'
$mod = isset($_GET['mod']) ? $_GET['mod'] : 'home';

switch ($mod) {
    case 'home':
        require('content/home.php');
        break;
    case 'about':
        // Konten halaman About
        echo "<h2>Halaman About</h2><p>Isi halaman about disini.</p>"; 
        break;
    case 'kontak':
        // Konten halaman Kontak
        echo "<h2>Halaman Kontak</h2><p>Hubungi kami di sini.</p>"; 
        break;
    case 'artikel':
        // Modul Tampil Data (Read)
        require('content/artikel.php');
        break;
    case 'tambah':
        // Modul Tambah Data (Create)
        require('content/tambah.php');
        break;
    case 'hapus':
        // Modul Hapus Data (Delete)
        require('content/hapus.php');
        break;
    case 'ubah':
        // Modul Ubah Data (Update) - Akan dibuat di langkah selanjutnya
        require('content/ubah.php');
        break;
    default:
        echo "<h2>404 Not Found</h2><p>Halaman tidak ditemukan!</p>";
        break;
} // <-- TUTUP BLOK SWITCH HANYA SATU KALI DI SINI!

// 3. Load Bagian Bawah (Footer)
require('template/footer.php');
?>