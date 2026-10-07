# Personal Web

Website personal sederhana dan responsif yang dibuat menggunakan HTML, CSS, dan JavaScript tanpa framework.

## Menjalankan website

1. Unduh atau clone repository ini.
2. Buka `index.html` di browser.

Tidak perlu memasang dependency atau menjalankan build.

## Mengubah isi profil

Edit `index.html`, lalu ganti teks contoh berikut dengan data sendiri:

- `Nama Anda`, deskripsi singkat, NIM, fakultas, dan program studi.
- Tautan GitHub, Instagram, LinkedIn, dan email pada bagian `Tautan media sosial`.
- Gambar `assets/profile-placeholder.svg` dengan foto sendiri, lalu sesuaikan alamat gambar dan teks `alt`.
- Judul halaman dan nama di bagian footer.

Tautan media sosial dibuka di tab baru. Untuk menghapus tautan yang tidak digunakan, hapus elemen `<a>` miliknya.

## Struktur berkas

```text
.
├── index.html
├── styles.css
├── script.js
└── assets/
    ├── favicon.svg
    └── profile-placeholder.svg
```

`styles.css` mengatur tampilan dan responsivitas. `script.js` menampilkan jam, tanggal, serta tahun saat ini berdasarkan zona waktu WIB (`Asia/Jakarta`).

## Publikasi ke GitHub Pages

1. Push seluruh berkas ke repository GitHub.
2. Buka **Settings → Pages** pada repository.
3. Di bagian **Build and deployment**, pilih **Deploy from a branch**.
4. Pilih branch `main` (atau branch yang dipakai) dan folder `/ (root)`, lalu simpan.
5. Setelah deployment selesai, alamat situs akan ditampilkan di halaman Pages.

Untuk alamat `https://username.github.io`, nama repository harus `username.github.io`. Untuk repository biasa, alamat biasanya `https://username.github.io/nama-repository/`.
