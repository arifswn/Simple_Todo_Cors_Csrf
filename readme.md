# Simple Laravel API with CORS and CSRF

## Deskripsi

Materi Sebelumnya [Laravel Todo CORS CSRF](https://github.com/arifswn/Laravel_Todo_Cors_Csrf).

Dalam proyek ini, kita akan membahas cara mengatur CORS (Cross-Origin Resource Sharing) dan CSRF (Cross-Site Request Forgery) dalam aplikasi Laravel.

- **CORS (Cross-Origin Resource Sharing)** adalah mekanisme keamanan yang membatasi permintaan HTTP lintas domain. Jika aplikasi frontend dan backend berada di domain yang berbeda, CORS memungkinkan permintaan dari domain frontend ke domain backend.
- **CSRF (Cross-Site Request Forgery)** adalah mekanisme perlindungan yang melindungi aplikasi web dari permintaan yang tidak sah. CSRF memastikan bahwa permintaan dari aplikasi klien yang sama (seperti formulir HTML) memiliki token yang valid untuk menghindari tindakan berbahaya.

## Panduan Implementasi

### 1. Pengaturan CORS di Laravel

Untuk mengizinkan permintaan dari domain frontend yang berbeda, Anda perlu mengonfigurasi CORS di Laravel:

1. Buka file konfigurasi `config/cors.php`.
2. Tambahkan domain frontend Anda ke `allowed_origins`:

   ```php
   return [
       'paths' => ['api/*', 'sanctum/csrf-cookie'],
       'allowed_methods' => ['*'],
       'allowed_origins' => ['http://your-frontend-domain.com'],
       'allowed_headers' => ['*'],
       'exposed_headers' => [],
       'max_age' => 0,
       'supports_credentials' => true,
   ];
   ```

## Upload menggunakan Vercel

Untuk mendepoy aplikasi HTML ke Vercel, ikuti langkah-langkah berikut:

1. **Persiapkan Proyek**

   Pastikan proyek HTML Anda siap untuk di-deploy dan telah diatur untuk digunakan di lingkungan produksi.

2. **Buat Akun di Vercel**

   Kunjungi [Vercel](https://vercel.com/) dan buat akun jika Anda belum memilikinya.

3. **Install Vercel CLI**

   Install Vercel CLI dengan menjalankan perintah berikut di terminal:

   ```bash
   npm install -g vercel

   ```

4. **Login ke Vercel**

   Login ke Vercel dengan perintah:

   ```bash
   vercel login
   ```

5. **Deploy Proyek**

   Untuk mendeploy HTML, jalankan perintah berikut di terminal:

   ```bash
   vercel
   ```

   Ikuti langkah-langkah yang ditampilkan di terminal untuk mendeploy HTML.

6. **Selesai**

   Setelah proses deploy selesai, proyek Anda akan di-host di Vercel dan dapat diakses melalui URL yang diberikan oleh Vercel.

## Link Aplikasi

- [Laravel Todo CORS CSRF](https://simple-todo-cors-csrf.vercel.app/)

## Feedback

Silakan beri tahu saya jika Anda memiliki pertanyaan atau umpan balik tentang pembahasan ini.
[Intagram](https://www.instagram.com/swn.setiawan/)
