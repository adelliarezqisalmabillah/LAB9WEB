<?php
include 'koneksi.php';

// Pastikan ada ID yang dikirim
if (!isset($_GET['id'])) {
    header("Location: index.php?mod=artikel");
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);
$message = "";

// --- Bagian 1: Proses Form Update ---
if (isset($_POST['submit'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    
    // Query UPDATE
    $query = "UPDATE artikel SET 
                judul = '$judul', 
                kategori = '$kategori', 
                isi = '$isi' 
              WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php?mod=artikel&status=ubah_sukses");
        exit();
    } else {
        $message = "<p style='color: red;'>Gagal mengubah data: " . mysqli_error($conn) . "</p>";
    }
}

// --- Bagian 2: Ambil Data Lama untuk ditampilkan di Form ---
$query_ambil = "SELECT * FROM artikel WHERE id = '$id'";
$result_ambil = mysqli_query($conn, $query_ambil);

if (mysqli_num_rows($result_ambil) == 0) {
    echo "<h2>Data tidak ditemukan!</h2>";
    exit();
}

$data = mysqli_fetch_assoc($result_ambil);

// Fungsi untuk memilih kategori yang sedang aktif di <select>
function is_selected($kategori_data, $nilai) {
    return ($kategori_data == $nilai) ? 'selected' : '';
}
?>

<h2>Ubah Data Artikel: <?php echo $data['judul']; ?></h2>

<?php echo $message; ?>

<form method="POST" action="index.php?mod=ubah&id=<?php echo $id; ?>">
    <label for="judul">Judul Artikel:</label><br>
    <input type="text" id="judul" name="judul" value="<?php echo htmlspecialchars($data['judul']); ?>" required><br><br>

    <label for="kategori">Kategori:</label><br>
    <select id="kategori" name="kategori" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="Pemrograman" <?php echo is_selected($data['kategori'], 'Pemrograman'); ?>>Pemrograman</option>
        <option value="Teknologi" <?php echo is_selected($data['kategori'], 'Teknologi'); ?>>Teknologi</option>
        <option value="Tutorial" <?php echo is_selected($data['kategori'], 'Tutorial'); ?>>Tutorial</option>
        <option value="Lainnya" <?php echo is_selected($data['kategori'], 'Lainnya'); ?>>Lainnya</option>
    </select><br><br>

    <label for="isi">Isi Artikel:</label><br>
    <textarea id="isi" name="isi" rows="8" required><?php echo htmlspecialchars($data['isi']); ?></textarea><br><br>

    <button type="submit" name="submit">Simpan Perubahan</button>
    <a href="index.php?mod=artikel">Batal</a>
</form>