```markdown
# Example - Simple REST API dengan Symfony

Proyek ini adalah contoh sederhana REST API yang dibangun menggunakan framework Symfony. API ini dapat digunakan sebagai dasar untuk pengembangan aplikasi yang memerlukan layanan backend dengan operasi CRUD (Create, Read, Update, Delete).

## Persyaratan

- PHP 8.2 atau lebih tinggi
- Composer (untuk manajemen dependensi PHP)
- Symfony CLI (direkomendasikan)
- MySQL 5.7 atau lebih tinggi
- Node.js & npm (opsional, jika menggunakan frontend atau asset)

## Instalasi

1. **Clone repositori**:
   ```bash
   git clone https://github.com/username/project-name.git
   cd project-name
   ```

2. **Instal dependensi PHP**:
   ```bash
   composer install
   ```

3. **Salin file lingkungan dan konfigurasi**:
   ```bash
   cp .env.example .env
   ```
   - Sesuaikan variabel lingkungan di `.env` (terutama `DATABASE_URL`).

4. **Buat database**:
   ```bash
   php bin/console doctrine:database:create
   ```

5. **Jalankan migrasi database**:
   ```bash
   php bin/console doctrine:migrations:migrate
   ```

6. (Opsional) **Isi data dummy**:
   ```bash
   php bin/console doctrine:fixtures:load --env=dev
   ```

7. **Mulai server Symfony**:
   ```bash
   symfony server:start
   ```
   - API akan berjalan di `http://localhost:8000`.

## Penggunaan

### Contoh Request API

- **Mengambil semua data**:
  ```bash
  curl -X GET http://localhost:8000/api/products
  ```

- **Membuat data baru**:
  ```bash
  curl -X POST http://localhost:8000/api/products \
  -H "Content-Type: application/json" \
  -d '{"name": "Contoh Produk", "price": 100000}'
  ```

- **Update data**:
  ```bash
  curl -X PUT http://localhost:8000/api/products/1 \
  -H "Content-Type: application/json" \
  -d '{"price": 150000}'
  ```

- **Hapus data**:
  ```bash
  curl -X DELETE http://localhost:8000/api/products/1
  ```

### Contoh Respons
```json
{
  "id": 1,
  "name": "Contoh Produk",
  "price": 150000,
  "createdAt": "2023-10-01T12:00:00+00:00"
}
```

## Endpoint API

| Method | Endpoint          | Deskripsi               |
|--------|-------------------|-------------------------|
| GET    | `/api/products`   | Ambil semua produk      |
| GET    | `/api/products/{id}` | Ambil produk by ID   |
| POST   | `/api/products`   | Tambah produk baru      |
| PUT    | `/api/products/{id}` | Update produk        |
| DELETE | `/api/products/{id}` | Hapus produk        |

## Pengujian

Jalankan test suite dengan perintah:
```bash
./bin/phpunit
```

## Kontribusi

1. Fork repositori ini.
2. Buat branch fitur baru (`git checkout -b fitur/namafitur`).
3. Commit perubahan (`git commit -m 'Tambahkan fitur'`).
4. Push ke branch (`git push origin fitur/namafitur`).
5. Buat Pull Request.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).
```

---

📝 **Catatan**:  
- Sesuaikan nama endpoint (misal: `/api/products`) sesuai dengan implementasi aktual di kode Anda.
- Jika menggunakan autentikasi (JWT/OAuth), tambahkan bagian konfigurasi terkait.
- Untuk proyek yang lebih kompleks, tambahkan dokumentasi detail tentang DTO, validation, atau error handling.
