# 💬 Portal Random Chat (Laravel)

Portal Random Chat adalah aplikasi chat anonim berbasis **Laravel** yang mempertemukan pengguna secara **acak (random matching)** untuk mengobrol secara realtime. Cocok untuk eksperimen realtime, tugas kampus, atau proof‑of‑concept social chat.

---

## ✨ Fitur Utama

- 🔀 **Random Match** — menemukan partner chat secara acak (1‑on‑1).
- 💬 **Realtime Messaging** — kirim & terima pesan tanpa reload (Laravel Echo + Pusher/Laravel WebSockets).
- 👤 **Auth** — Registrasi, Login, Logout (Laravel Breeze/Fortify/Jetstream – sesuaikan dengan repo).
- 🟢 **Presence / Online Status** *(opsional)* — tampilkan status online/typing.
- 📦 **Queue & Broadcast** — skalabel untuk banyak koneksi.
- 🗑️ **End Session** — akhiri percakapan & cari partner baru.
- 🔒 **Moderasi dasar** *(opsional)* — lapor/blokir pengguna.

> Catatan: Sesuaikan opsi (Breeze/Jetstream/Fortify, Pusher/WebSockets, Queue driver) dengan konfigurasi di repository Anda.

---

## 🧰 Teknologi

- **Framework**: Laravel (10/11/12)  
- **Realtime**: Pusher / Laravel WebSockets + Laravel Echo  
- **Database**: MySQL / MariaDB / PostgreSQL (sesuaikan)  
- **Cache/Queue**: Redis / database queue (opsional)  
- **Frontend**: Blade / Inertia + Vue/React (bergantung implementasi repo)

---

## ✅ Prasyarat

- PHP >= 8.1
- Composer
- MySQL/MariaDB/PostgreSQL
- Node.js & npm
- (Opsional) Redis
- Akun **Pusher** atau **Laravel WebSockets** terpasang

---

## 🚀 Quick Start

```bash
# 1) Clone repo
git clone https://github.com/YoKYa/Portal-Random-Chat.git
cd Portal-Random-Chat

# 2) Install dependency
composer install
cp .env.example .env
php artisan key:generate

# 3) Set DB di .env lalu migrate & seed bila tersedia
php artisan migrate --seed

# 4) (Opsional) Instal frontend & build assets
npm install
npm run dev   # atau: npm run build

# 5) Set driver broadcast (Pusher/WebSockets) di .env lalu jalankan
php artisan serve
# Jika pakai queue
php artisan queue:work

# Jika pakai Laravel WebSockets
php artisan websockets:serve
```

---

## ⚙️ Contoh Konfigurasi `.env` (sesuaikan)

```env
APP_NAME="Portal Random Chat"
APP_ENV=local
APP_KEY=base64:GENERATE_ME
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portal_random_chat
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=pusher
CACHE_STORE=redis
QUEUE_CONNECTION=database
SESSION_DRIVER=file

# Pusher (jika memakai Pusher)
PUSHER_APP_ID=your_app_id
PUSHER_APP_KEY=your_app_key
PUSHER_APP_SECRET=your_app_secret
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=ap1

# Laravel WebSockets (alternatif Pusher self‑hosted)
LARAVEL_WEBSOCKETS_ENABLED=true
LARAVEL_WEBSOCKETS_HOST=127.0.0.1
LARAVEL_WEBSOCKETS_PORT=6001
```

> Gunakan **salah satu**: Pusher **atau** Laravel WebSockets. Pastikan `bootstrap.js` / file Echo Anda mengarah ke konfigurasi yang benar (key, host, cluster/port).

---

## 🧪 Alur Penggunaan

1. **Register / Login** ke aplikasi.
2. Klik **Find Partner / Start** untuk masuk ke antrian.
3. Sistem melakukan **random matching** → jika ada lawan bicara, ruangan chat dibentuk.
4. **Kirim pesan** realtime, tampilkan status typing/online (jika diaktifkan).
5. **End/Next** untuk mengakhiri & mencari partner baru.

---

## 🔐 Keamanan & Privasi (Saran)

- Gunakan **rate limiting** pada endpoint pesan & match.
- Sanitasi input, hindari XSS/HTML injection pada pesan.
- Tambahkan **report/block** bila diperlukan.
- Pakai **HTTPS** di production dan kunci kredensial Pusher/WebSockets.

---

## 🛣️ Roadmap (Opsional)

- Match by interest (tag/keyword)
- Grup chat anonim
- Pesan berformat (emoji, gambar dengan storage)
- Notifikasi push (PWA / FCM)
- Moderation/Abuse detection

---

## 🤝 Kontribusi

- Fork → buat branch fitur → Pull Request
- Sertakan deskripsi jelas & langkah uji

```bash
git checkout -b feat/nama-fitur
git commit -m "feat: tambah fitur X"
git push origin feat/nama-fitur
```

---

## 📜 Lisensi

Rilis dengan **MIT License** — bebas digunakan & dimodifikasi.

---

Jika repo ini bermanfaat, jangan lupa **⭐ Star** ya!
