<?php
include 'koneksi.php';

// Pastikan ada parameter id yang dikirim dari URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Query DELETE
    $query = "DELETE FROM artikel WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        // Jika berhasil, redirect kembali ke halaman artikel
        header("Location: index.php?mod=artikel&status=hapus_sukses");
        exit();
    } else {
        // Jika gagal
        header("Location: index.php?mod=artikel&status=gagal_hapus");
        exit();
    }
} else {
    // Jika tidak ada ID, redirect kembali
    header("Location: index.php?mod=artikel");
    exit();
}
?>