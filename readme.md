# Simple Laravel API with CORS and CSRF

### Repository ini adalah materi lanjutan dari [Laravel Todo CORS CSRF](https://github.com/arifswn/Laravel_Todo_Cors_Csrf)

- **CORS (Cross-Origin Resource Sharing)** adalah mekanisme keamanan yang membatasi permintaan HTTP lintas domain. Jika aplikasi frontend dan backend berada di domain yang berbeda, CORS memungkinkan permintaan dari domain frontend ke domain backend.

- **CSRF (Cross-Site Request Forgery)** adalah mekanisme perlindungan yang melindungi aplikasi web dari permintaan yang tidak sah. CSRF memastikan bahwa permintaan dari aplikasi klien yang sama (seperti formulir HTML) memiliki token yang valid untuk menghindari tindakan berbahaya.

## Panduan Implementasi

### 1. **Pengaturan CORS di Laravel**

Untuk mengizinkan permintaan dari domain frontend yang berbeda, Anda perlu mengonfigurasi CORS di Laravel.

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
