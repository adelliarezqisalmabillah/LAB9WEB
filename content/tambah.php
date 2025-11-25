<?php
// Panggil koneksi database
include 'koneksi.php';

$message = "";

// 1. Cek apakah form sudah disubmit (Tombol "Simpan Data" diklik)
if (isset($_POST['submit'])) {
    // Ambil data dari form dan lindungi dari SQL Injection
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);

    // Validasi sederhana
    if (empty($judul) || empty($kategori) || empty($isi)) {
        $message = "<p style='color: red;'>Semua field harus diisi!</p>";
    } else {
        // Query INSERT
        $query = "INSERT INTO artikel (judul, kategori, isi) VALUES ('$judul', '$kategori', '$isi')";
        
        if (mysqli_query($conn, $query)) {
            // Jika berhasil, alihkan kembali ke halaman artikel dengan status sukses
            header("Location: index.php?mod=artikel&status=sukses");
            exit();
        } else {
            $message = "<p style='color: red;'>Gagal menyimpan data: " . mysqli_error($conn) . "</p>";
        }
    }
}
?>

<h2>Tambah Data Artikel Baru</h2>

<?php echo $message; ?>

<form method="POST" action="index.php?mod=tambah">
    <label for="judul">Judul Artikel:</label><br>
    <input type="text" id="judul" name="judul" required><br><br>

    <label for="kategori">Kategori:</label><br>
    <select id="kategori" name="kategori" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="Pemrograman">Pemrograman</option>
        <option value="Teknologi">Teknologi</option>
        <option value="Tutorial">Tutorial</option>
        <option value="Lainnya">Lainnya</option>
    </select><br><br>

    <label for="isi">Isi Artikel:</label><br>
    <textarea id="isi" name="isi" rows="8" required></textarea><br><br>

    <button type="submit" name="submit