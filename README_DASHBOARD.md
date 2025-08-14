# Dashboard Laravel - Berita & Jurusan

## Fitur Utama

### 1. Berita Terkini
- **Tampil Berita**: Menampilkan berita terkini di halaman dashboard
- **Tambah Berita**: Hanya admin yang bisa menambah berita
- **Upload Foto**: Support upload foto untuk berita
- **Detail Berita**: User bisa klik "Baca Selengkapnya" untuk melihat detail

### 2. Program Studi/Jurusan
- **6 Jurusan**: 
  - Teknik Komputer Jaringan
  - Rekayasa Perangkat Lunak
  - Desain Komunikasi Visual
  - Teknik Instalasi Tenaga Listrik
  - Teknik Audio Video
  - Teknik Automasi Industri
- **Detail Jurusan**: Klik icon untuk melihat detail jurusan

## Struktur Database

### Tabel Beritas
```sql
- id (primary key)
- judul (string)
- isi (text)
- foto (string, nullable)
- slug (string, unique)
- user_id (foreign key)
- created_at
- updated_at
```

### Tabel Jurusans
```sql
- id (primary key)
- nama (string)
- icon (string)
- deskripsi (text)
- slug (string, unique)
- created_at
- updated_at
```

## Instalasi

### 1. Jalankan Migration
```bash
php artisan migrate
```

### 2. Jalankan Seeder
```bash
php artisan db:seed
```

### 3. Setup Storage Link
```bash
php artisan storage:link
```

### 4. Jalankan Server
```bash
php artisan serve
```

## Routes

### Berita
- `GET /dashboard` - Halaman utama dengan berita
- `GET /berita` - Daftar semua berita
- `GET /berita/create` - Form tambah berita (admin only)
- `POST /berita` - Simpan berita baru (admin only)
- `GET /berita/{slug}` - Detail berita

### Jurusan
- `GET /jurusan/{slug}` - Detail jurusan

## Validasi Admin
- Hanya user dengan role 'admin' yang bisa menambah berita
- Middleware `role:admin` digunakan untuk proteksi

## File Structure

### Models
- `app/Models/Berita.php`
- `app/Models/Jurusan.php`

### Controllers
- `app/Http/Controllers/BeritaController.php`
- `app/Http/Controllers/JurusanController.php`

### Views
- `resources/views/dashboard.blade.php` - Dashboard utama
- `resources/views/berita/create.blade.php` - Form tambah berita
- `resources/views/berita/show.blade.php` - Detail berita
- `resources/views/jurusan/show.blade.php` - Detail jurusan

### Migrations
- `database/migrations/2025_08_13_000000_create_beritas_table.php`
- `database/migrations/2025_08_13_000001_create_jurusans_table.php`

### Seeders
- `database/seeders/JurusanSeeder.php`
- `database/seeders/BeritaSeeder.php`

## CSS Styling
- Responsive design untuk mobile dan desktop
- Card layout untuk berita dan jurusan
- Hover effects untuk interaktivitas
- Bootstrap 5 integration

## Testing
1. Login sebagai admin untuk test tambah berita
2. Login sebagai user biasa untuk test view berita
3. Klik icon jurusan untuk test detail jurusan
4. Upload foto untuk test fitur upload

## Troubleshooting
- Pastikan storage link sudah dibuat: `php artisan storage:link`
- Pastikan permission folder storage: `chmod -R 755 storage/`
- Clear cache jika perlu: `php artisan cache:clear`
