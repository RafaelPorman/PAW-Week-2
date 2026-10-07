# Form Data Pengguna

Halaman web sederhana berbasis PHP untuk mengisi, memvalidasi, dan menampilkan kembali data pengguna setelah formulir dikirim.

## Fitur

- Formulir berisi nama, email, jenis kelamin, alamat, dan nomor telepon.
- Mengirim data menggunakan metode `POST`.
- Memvalidasi data di browser dan di PHP.
- Menampilkan ringkasan data setelah pengiriman berhasil.
- Menyediakan tombol **Isi Data Lagi** untuk kembali ke formulir.
- Mengamankan data yang ditampilkan kembali dengan HTML escaping.
- Tampilan responsif yang dapat digunakan di layar desktop maupun ponsel.

## Menjalankan dengan XAMPP

1. Salin folder proyek ke direktori `htdocs` XAMPP, misalnya:

   ```text
   C:\xampp\htdocs\user_data
   ```

2. Jalankan **Apache** dari XAMPP Control Panel.
3. Buka alamat berikut di browser:

   ```text
   http://localhost/user_data/
   ```

4. Isi formulir, lalu tekan **Submit** untuk melihat hasilnya.

## Menjalankan dengan PHP

Pastikan PHP sudah terpasang, lalu jalankan perintah berikut dari folder proyek:

```bash
php -S localhost:8000
```

Buka `http://localhost:8000` di browser.

## Struktur Proyek

```text
user_data/
├── index.php   # Formulir, pemrosesan data, dan tampilan hasil
└── README.md   # Dokumentasi proyek
```

## Teknologi

- PHP
- HTML
- CSS

## Catatan

Data hanya diproses untuk ditampilkan pada halaman hasil dan tidak disimpan ke database.
