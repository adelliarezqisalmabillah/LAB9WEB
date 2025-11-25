# 🌐 Implementasi Modularisasi dan Routing CRUD
## Mata Kuliah: Pemograman Web 1

---

## Informasi Mahasiswa & Dosen

| Detail | Keterangan |
| :--- | :--- |
| **Nama** | Adellia Rezqi Salmabillah |
| **NIM** | 312410395 |
| **Kelas** | TI 24 A.3 |
| **Dosen Pengampu** | Agung Nugroho, S. Kom., M.Kom. |
| **Link Repository** | [LAB8WEB](https://github.com/adelliarezqisalmabillah/LAB8WEB.git) |

---

## Deskripsi Proyek

Proyek ini bertujuan untuk mengimplementasikan dua konsep utama dalam pengembangan web PHP, yaitu **Modularisasi (Templating)** dan **Routing**, yang diaplikasikan pada modul CRUD (Create, Read, Update, Delete) database dari Praktikum 8/9.

-   **Modularisasi:** Memisahkan tampilan (`header.php` dan `footer.php`) dari konten inti, memastikan setiap halaman memiliki *template* tampilan yang konsisten.
-   **Routing:** Menggunakan file `index.php` sebagai *router* utama yang menentukan konten yang dimuat berdasarkan parameter URL (`?mod=...`).
-   **CRUD:** Semua operasi database (Tambah, Tampil, Ubah, Hapus) diintegrasikan ke dalam sistem *routing*.

---
---

## Tampilan Aplikasi (Screenshots)

### 1. Tampilan Modularisasi & Routing (Halaman Home)
Menunjukkan struktur *template* yang berhasil dimuat (Header, Navigasi, dan Footer).

![Tampilan Home Proyek](assets/modularisasi & routing.png)

### 2. Tampilan Data Artikel (Read)
Menunjukkan keberhasilan koneksi ke database, menampilkan data CRUD, dan *link* aksi (Ubah & Hapus) di dalam tabel.

![Tampilan Data Artikel CRUD](assets/data artikel.png)

### 3. Tampilan Tambah Data Baru (Create)
Menunjukkan formulir input yang diakses melalui *routing* (`?mod=tambah`) dan siap untuk menyimpan data.

--

## 🚀 Panduan Menjalankan Proyek

1.  **XAMPP:** Pastikan **Apache** dan **MySQL** (untuk database) sudah berjalan.
2.  **Database:** Buat database bernama **`web_lab8`** dan buat tabel `artikel`.
3.  **Akses:** Buka browser dan akses URL: `http://localhost/LAB9WEB/index.php`
