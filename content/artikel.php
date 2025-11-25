<?php
// Panggil koneksi database
include 'koneksi.php'; 

// Tampilkan pesan status (Sukses Tambah/Hapus/Ubah)
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'sukses') {
        echo "<p style='color: green; font-weight: bold;'>Data berhasil ditambahkan!</p>";
    } elseif ($_GET['status'] == 'hapus_sukses') {
        echo "<p style='color: orange; font-weight: bold;'>Data berhasil dihapus!</p>";
    } elseif ($_GET['status'] == 'ubah_sukses') {
        echo "<p style='color: blue; font-weight: bold;'>Data berhasil diubah!</p>";
    } elseif ($_GET['status'] == 'gagal_hapus') {
        echo "<p style='color: red; font-weight: bold;'>Gagal menghapus data!</p>";
    }
}

// Query Database untuk menampilkan data
$sql = "SELECT id, judul, kategori FROM artikel ORDER BY id DESC"; // GANTI jika nama tabel berbeda
$result = mysqli_query($conn, $sql);
?>

<h2>Data Artikel</h2>

<p><a href="index.php?mod=tambah">Tambah Data Baru</a></p> 

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Aksi</th>
    </tr>
    
    <?php if ($result && mysqli_num_rows($result) > 0): ?>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['kategori']; ?></td>
            <td>
                <a href="index.php?mod=ubah&id=<?= $row['id']; ?>">Ubah</a> |
                <a href="index.php?mod=hapus&id=<?= $row['id']; ?>" 
                   onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="4">Tidak ada data.</td></tr>
    <?php endif; ?>
</table>