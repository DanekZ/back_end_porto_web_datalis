# Portfolio Backend — Laravel API

## Tech Stack

- **Framework**: Laravel 13
- **Auth**: Laravel Sanctum
- **Database**: MySQL
- **PHP**: 8.4

---

## Setup

```bash
# Clone / masuk ke folder project
cd portofolio-webdev-datalis

# Install dependencies
composer install

# Copy env
cp .env.example .env

# Generate app key
php artisan key:generate

# Setup database di .env
DB_DATABASE=porto_web_datalis_db
DB_USERNAME=root
DB_PASSWORD=

# Setup API routes
php artisan install:api

# Jalankan migration + seeder
php artisan migrate:fresh --seed

# Buat symlink storage
php artisan storage:link

# Jalankan server
php artisan serve
```

---

## Struktur Folder

```
app/
├── Http/
│   └── Controllers/
│       └── Api/
│           ├── AuthController.php
│           ├── ProjectController.php
│           ├── SkillController.php
│           ├── ExperienceController.php
│           ├── AchievementController.php
│           ├── EducationController.php
│           ├── SettingController.php
│           └── UploadController.php
├── Models/
│   ├── User.php
│   ├── Project.php
│   ├── Skill.php
│   ├── Experience.php
│   ├── Achievement.php
│   ├── Education.php
│   └── Setting.php
database/
├── migrations/
│   ├── create_projects_table.php
│   ├── create_skills_table.php
│   ├── create_experiences_table.php
│   ├── create_achievements_table.php
│   ├── create_educations_table.php
│   ├── create_settings_table.php
│   ├── add_icon_color_to_skills_table.php
│   └── add_image_path_to_projects_table.php
└── seeders/
    └── DatabaseSeeder.php
routes/
├── api.php
└── web.php
config/
└── cors.php
```

---

## Database Schema

### `projects`

| Column         | Type                                 | Keterangan                        |
| -------------- | ------------------------------------ | --------------------------------- |
| id             | bigint                               | Primary key                       |
| title          | string                               | Judul project                     |
| description    | text                                 | Deskripsi                         |
| thumbnail      | string                               | URL gambar cover                  |
| thumbnail_path | string                               | Path lokal storage                |
| images         | json                                 | Array URL gambar tambahan (max 4) |
| image_paths    | json                                 | Array path lokal gambar tambahan  |
| tech_stack     | json                                 | Array teknologi yang digunakan    |
| category       | enum(web,data)                       | Kategori project                  |
| github_url     | string                               | Link GitHub                       |
| demo_url       | string                               | Link demo/live                    |
| status         | enum(completed,in-progress,archived) | Status project                    |
| featured       | boolean                              | Tampil di Home                    |
| sort_order     | integer                              | Urutan tampil                     |

### `skills`

| Column     | Type                 | Keterangan                       |
| ---------- | -------------------- | -------------------------------- |
| id         | bigint               | Primary key                      |
| name       | string               | Nama teknologi                   |
| category   | enum(web,data,other) | Kategori skill                   |
| icon       | string               | Slug Simple Icons (e.g. `react`) |
| color      | string               | Hex warna resmi (e.g. `#61DAFB`) |
| sort_order | integer              | Urutan tampil                    |

### `experiences`

| Column      | Type                          | Keterangan               |
| ----------- | ----------------------------- | ------------------------ |
| id          | bigint                        | Primary key              |
| year        | string                        | Tahun (e.g. `2024`)      |
| title       | string                        | Nama instansi/perusahaan |
| role        | string                        | Jabatan/posisi           |
| description | text                          | Deskripsi pengalaman     |
| type        | enum(work,education,training) | Tipe pengalaman          |
| sort_order  | integer                       | Urutan tampil            |

### `achievements`

| Column         | Type                             | Keterangan                  |
| -------------- | -------------------------------- | --------------------------- |
| id             | bigint                           | Primary key                 |
| title          | string                           | Nama sertifikat/penghargaan |
| issuer         | string                           | Penerbit                    |
| type           | enum(award,course,certification) | Tipe                        |
| image          | string                           | URL gambar sertifikat       |
| credential_url | string                           | Link verifikasi             |
| year           | string                           | Tahun                       |
| sort_order     | integer                          | Urutan tampil               |

### `educations`

| Column      | Type    | Keterangan                     |
| ----------- | ------- | ------------------------------ |
| id          | bigint  | Primary key                    |
| institution | string  | Nama institusi                 |
| degree      | string  | Jenjang (e.g. `Diploma (D3)`)  |
| field       | string  | Jurusan                        |
| start_year  | string  | Tahun mulai                    |
| end_year    | string  | Tahun selesai (null = Present) |
| location    | string  | Lokasi                         |
| gpa         | string  | IPK                            |
| logo        | string  | URL logo institusi             |
| sort_order  | integer | Urutan tampil                  |

### `settings`

| Column | Type          | Keterangan    |
| ------ | ------------- | ------------- |
| id     | bigint        | Primary key   |
| key    | string unique | Nama setting  |
| value  | text          | Nilai setting |

**Default settings keys:**

- `resume_url` — URL file PDF resume
- `site_name` — Nama pemilik portfolio
- `site_email` — Email kontak
- `site_location` — Lokasi

---

## API Endpoints

### Public (tanpa auth)

```
POST   /api/login

GET    /api/projects
GET    /api/projects?category=web
GET    /api/projects?category=data
GET    /api/projects?featured=true
GET    /api/projects/{id}

GET    /api/skills
GET    /api/experiences
GET    /api/achievements
GET    /api/educations
GET    /api/settings
```

### Protected (butuh Bearer Token)

```
POST   /api/logout
GET    /api/me

# Upload
POST   /api/upload
DELETE /api/upload

# Projects
POST   /api/projects
PUT    /api/projects/{id}
DELETE /api/projects/{id}

# Skills
POST   /api/skills
PUT    /api/skills/{id}
DELETE /api/skills/{id}

# Experiences
POST   /api/experiences
PUT    /api/experiences/{id}
DELETE /api/experiences/{id}

# Achievements
POST   /api/achievements
PUT    /api/achievements/{id}
DELETE /api/achievements/{id}

# Educations
POST   /api/educations
PUT    /api/educations/{id}
DELETE /api/educations/{id}

# Settings
PUT    /api/settings
```

---

## Auth Flow

```
1. POST /api/login { email, password }
   → Response: { token, user }

2. Simpan token di localStorage (admin_token)

3. Request protected endpoint dengan header:
   Authorization: Bearer {token}

4. POST /api/logout untuk logout
   → Token dihapus dari database
```

---

## File Upload

```
POST /api/upload
Content-Type: multipart/form-data
Authorization: Bearer {token}

Body: { image: File }

Response: {
  path: "projects/filename.jpg",   ← path di storage/app/public
  url: "/storage/projects/filename.jpg"  ← URL publik
}
```

**Akses file:**

```
http://localhost:8000/storage/projects/filename.jpg
```

---

## CORS

File `config/cors.php`:

```php
'allowed_origins' => [
    'http://localhost:5173',
],
```

Tambahkan domain production saat deploy.

---

## Buat Admin User

```bash
php artisan tinker

\App\Models\User::create([
    'name'     => 'Admin',
    'email'    => 'admin@example.com',
    'password' => bcrypt('password123'),
]);
```

---

## Catatan

- Laravel 13 tidak auto-generate `config/cors.php` — buat manual
- Laravel 13 tidak auto-generate `routes/api.php` — jalankan `php artisan install:api`
- Model `User` harus menggunakan trait `HasApiTokens` dari Sanctum agar `createToken()` bisa digunakan
- `php artisan storage:link` wajib dijalankan agar file upload bisa diakses publik
