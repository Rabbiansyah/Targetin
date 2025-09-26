# 🎯 Targetin - Aplikasi Manajemen Goal & Tracking

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.0-red?style=for-the-badge&logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.2+-blue?style=for-the-badge&logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/TailwindCSS-3.0-06B6D4?style=for-the-badge&logo=tailwindcss" alt="TailwindCSS">
  <img src="https://img.shields.io/badge/License-MIT-green?style=for-the-badge" alt="License">
</p>

## 📋 Tentang Targetin

**Targetin** adalah aplikasi web modern yang dirancang untuk membantu pengguna dalam menetapkan, melacak, dan mencapai tujuan mereka secara efektif. Aplikasi ini dibangun menggunakan Laravel 12 dengan antarmuka yang responsif dan user-friendly menggunakan TailwindCSS.

### ✨ Fitur Utama

- **🎯 Goal Setting Cerdas** - Buat dan atur tujuan dengan kategori yang fleksibel
- **📊 Tracking Progress** - Pantau kemajuan dengan visualisasi yang jelas
- **⏰ Reminder Pintar** - Sistem pengingat otomatis untuk tetap on track
- **📱 Mobile Friendly** - Responsif di semua perangkat
- **📈 Analisis Mendalam** - Laporan dan statistik pencapaian
- **🔐 Autentikasi Aman** - Sistem login dan registrasi yang aman

### 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 12.0 (PHP 8.2+)
- **Frontend**: Blade Templates + TailwindCSS
- **Database**: MySQL/SQLite
- **Authentication**: Laravel Auth
- **Build Tool**: Vite
- **Testing**: Pest PHP

## 🚀 Instalasi dan Setup

### Prasyarat

Pastikan sistem Anda memiliki:
- PHP 8.2 atau lebih tinggi
- Composer
- Node.js & NPM
- MySQL atau SQLite

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone <repository-url>
   cd goal
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi Database**
   Edit file `.env` dan sesuaikan pengaturan database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=Targetin
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Jalankan Migrasi**
   ```bash
   php artisan migrate
   ```

6. **Build Assets**
   ```bash
   npm run build
   ```

7. **Jalankan Aplikasi**
   ```bash
   php artisan serve
   ```

   Atau gunakan script development:
   ```bash
   composer run dev
   ```

## 📱 Alur Penggunaan Aplikasi

### 1. 🏠 Landing Page
- **Akses**: Kunjungi halaman utama aplikasi
- **Fitur**: 
  - Hero section dengan overview aplikasi
  - Penjelasan fitur-fitur utama
  - Call-to-action untuk registrasi

### 2. 🔐 Autentikasi
- **Registrasi**: `/registration`
  - Daftar akun baru dengan email dan password
  - Validasi form otomatis
- **Login**: `/login`
  - Masuk dengan kredensial yang sudah terdaftar
  - Session management otomatis

### 3. 📊 Dashboard
- **Akses**: `/dashboard` (setelah login)
- **Fitur**:
  - Overview statistik goals dan tasks
  - Quick actions untuk menambah data
  - Ringkasan progress terkini
  - Navigasi ke fitur utama

### 4. 🎯 Manajemen Goals
- **Tambah Goal**: `/tambah`
  - Buat goal baru dengan kategori
  - Set deadline dan prioritas
  - Deskripsi detail tujuan
- **Kelola Goal**: `/kelola`
  - Lihat semua goals yang aktif
  - Edit dan update progress
  - Hapus goals yang tidak diperlukan
- **Edit Goal**: `/goals/{id}/edit`
  - Modifikasi detail goal
  - Update status dan progress

### 5. ✅ Manajemen Tasks
- **Tambah Task**: `/tambahTask`
  - Buat task terkait dengan goal
  - Set prioritas dan deadline
- **Edit Task**: `/tasks/{id}/edit`
  - Update detail task
  - Ubah status completion

### 6. ⏰ Sistem Reminder
- **Tambah Reminder**: `/tambahReminder`
  - Buat pengingat untuk goals/tasks
  - Set waktu dan frekuensi
- **Edit Reminder**: `/reminders/{id}/edit`
  - Modifikasi pengaturan reminder
  - Aktifkan/nonaktifkan reminder

### 7. 📈 Laporan & Riwayat
- **Riwayat**: `/riwayat`
  - Lihat goals dan tasks yang sudah selesai
  - Statistik pencapaian
  - Export data (PDF/Excel)
  - Filter berdasarkan periode dan kategori

### 8. 📞 Kontak
- **Halaman Kontak**: `/kontak`
  - Informasi kontak developer
  - Form feedback dan support

## 🗂️ Struktur Proyek

```
goal/
├── app/
│   ├── Http/Controllers/
│   │   ├── AuthController.php      # Autentikasi
│   │   ├── DashboardController.php # Dashboard
│   │   ├── GoalController.php      # Manajemen Goals
│   │   ├── TaskController.php      # Manajemen Tasks
│   │   └── ReminderController.php  # Sistem Reminder
│   └── Models/
│       ├── User.php               # Model User
│       ├── Goal.php               # Model Goal
│       ├── Task.php               # Model Task
│       ├── Reminder.php           # Model Reminder
│       ├── Report.php             # Model Report
│       ├── Transaction.php        # Model Transaction
│       └── FinancialGoal.php      # Model Financial Goal
├── resources/
│   └── views/
│       ├── home.blade.php         # Landing page
│       ├── dashboard.blade.php    # Dashboard utama
│       ├── auth/                  # Views autentikasi
│       ├── goals/                 # Views manajemen goals
│       ├── tasks/                 # Views manajemen tasks
│       ├── reminders/             # Views reminder
│       └── components/            # Komponen reusable
└── routes/
    └── web.php                    # Routing aplikasi
```

## 🎨 Desain & UI

- **Framework CSS**: TailwindCSS 3.0
- **Responsif**: Mobile-first design
- **Color Scheme**: 
  - Primary: Blue gradient (blue-50 to indigo-100)
  - Text: Dark gray untuk kontras optimal
  - Accent: Blue-600 untuk highlights
- **Typography**: Inter font family
- **Components**: Modern cards, gradients, hover effects

## 🔒 Keamanan

- **Authentication**: Laravel built-in authentication
- **CSRF Protection**: Token CSRF pada semua form
- **Input Validation**: Server-side validation
- **Session Management**: Secure session handling

## 🧪 Testing

Jalankan test dengan perintah:
```bash
php artisan test
```

## 📝 Development

Untuk development mode:
```bash
composer run dev
```

Script ini akan menjalankan:
- PHP development server
- Queue listener
- Vite development server

## 🤝 Kontribusi

1. Fork repository ini
2. Buat branch fitur baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](https://opensource.org/licenses/MIT).

## 👨‍💻 Developer

Dikembangkan dengan ❤️ menggunakan Laravel Framework.

---

**Targetin** - Wujudkan Impian, Capai Tujuan! 🎯
