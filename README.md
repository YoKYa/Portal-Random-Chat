# 💬 Portal Random Chat (Laravel + Livewire)

Portal Random Chat adalah aplikasi chat anonim berbasis **Laravel** yang mempertemukan pengguna secara **acak (random matching)** untuk mengobrol **real‑time**.  
Repositori ini menggunakan **Livewire** untuk membangun UI reaktif tanpa perlu menulis banyak JavaScript.

---

## ✨ Fitur Utama

- 🔀 **Random Match** — menemukan partner chat secara acak (1‑on‑1).
- 💬 **Live Chat** — pesan real‑time via **Livewire Events** (+ opsi Broadcast/Pusher/WebSockets).
- 👤 **Auth** — registrasi, login, logout (sesuaikan dengan implementasi repo).
- 🟢 **Status/Typing** *(opsional)* — indikator online & mengetik.
- 🗑️ **End/Next** — akhiri sesi & cari partner baru.
- 🛡️ **Moderasi dasar** *(opsional)* — lapor/blokir.

> Catatan: Gunakan **broadcasting** (Pusher/Laravel WebSockets) bila ingin skalabilitas realtime lintas proses/worker. Tanpa broadcasting, Livewire tetap dapat menangani interaksi via polling/diff update bawaan Livewire.

---

## 🧰 Teknologi

- **Laravel** (10/11/12 — sesuaikan repo)
- **Livewire** (v3/v2 — sesuaikan repo)
- **Database**: MySQL/MariaDB/PostgreSQL
- **Broadcasting (opsional)**: Pusher / Laravel WebSockets + Laravel Echo
- **Build assets**: Vite (npm)

---

## ✅ Prasyarat

- PHP ≥ 8.1
- Composer
- Node.js & npm
- MySQL/MariaDB/PostgreSQL
- (Opsional) Redis + Pusher / Laravel WebSockets

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

# 3) Konfigurasi database di .env, lalu migrate (seed jika tersedia)
php artisan migrate --seed

# 4) Pasang & build aset frontend
npm install
npm run dev     # atau: npm run build

# 5) Jalankan aplikasi
php artisan serve

# 6) (Opsional) Realtime broadcast & queue
php artisan queue:work
php artisan websockets:serve   # jika memakai Laravel WebSockets
```

> **Livewire setup:** pastikan layout memuat `@livewireStyles` dan `@livewireScripts`, serta Vite sudah terpasang. Untuk Livewire v3 dengan Blade + Vite, konfigurasi standar sudah cukup.

---

## ⚙️ Contoh konfigurasi `.env` (sesuaikan)

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

# Livewire bekerja tanpa broadcast driver, tetapi untuk realtime lintas proses gunakan:
BROADCAST_DRIVER=pusher      # atau: redis / ably / null
QUEUE_CONNECTION=database    # atau: redis
CACHE_STORE=redis            # opsional

# Pusher (jika dipakai)
PUSHER_APP_ID=your_app_id
PUSHER_APP_KEY=your_app_key
PUSHER_APP_SECRET=your_app_secret
PUSHER_APP_CLUSTER=ap1
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https

# Laravel WebSockets (alternatif self-hosted)
LARAVEL_WEBSOCKETS_ENABLED=true
LARAVEL_WEBSOCKETS_HOST=127.0.0.1
LARAVEL_WEBSOCKETS_PORT=6001
```

> Gunakan **salah satu**: Pusher **atau** Laravel WebSockets. Pastikan file JS/Vite/Echo (bila digunakan) sesuai dengan kredensial broadcast Anda.

---

## 🧩 Komponen Livewire (contoh penamaan)

- `MatchLobby` — antrian & pencarian partner
- `ChatRoom` — UI percakapan 1‑on‑1
- `TypingIndicator` — indikator mengetik
- `SessionControls` — tombol End/Next
- `ChatMessageList` & `MessageInput` — list & input pesan

> Sesuaikan dengan struktur komponen pada repository Anda.

---

## 🧪 Alur Penggunaan

1. **Register/Login** ke aplikasi.
2. Klik **Find Partner/Start** untuk masuk antrian.
3. Sistem melakukan **random matching** → ruang chat dibuat.
4. **Berkirim pesan** secara real‑time via Livewire.
5. Tekan **End/Next** untuk mengakhiri & mencari partner baru.

---

## 🔐 Keamanan & Privasi (Saran)

- Rate‑limit endpoint match & kirim pesan.
- Escape/sanitasi konten pesan (hindari XSS).
- Implementasi **report/block** jika diperlukan.
- Gunakan **HTTPS** di production & jaga kredensial broadcast.

---

## 🤝 Kontribusi

- Fork → buat branch fitur → Pull Request
- Sertakan deskripsi, langkah uji, dan dampak migrasi (jika ada)

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
