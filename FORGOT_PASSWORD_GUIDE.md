# 🔐 PANDUAN FITUR LUPA PASSWORD

## ✅ FITUR SUDAH AKTIF!

Fitur "Lupa Password" dengan Secret Code sudah berhasil diimplementasikan.

---

## 📋 CARA MENGGUNAKAN

### **1. Akses Halaman Reset Password**

**URL:** `http://localhost:8000/forgot-password`

Atau klik link **"Lupa Password?"** di halaman login.

---

### **2. Isi Form Reset Password**

Masukkan:
- ✅ **Secret Code:** `LATIF_PORTFOLIO_2026`
- ✅ **Password Baru:** Minimal 8 karakter
- ✅ **Konfirmasi Password:** Ketik ulang password baru

---

### **3. Klik "Reset Password"**

Jika berhasil, Anda akan diarahkan ke halaman login dengan pesan sukses.

---

## 🔑 KREDENSIAL DEFAULT

**Email:** `admin@latif.com`  
**Password:** `password` (atau password baru setelah reset)  
**Secret Code:** `085786858184`

---

## ⚙️ KONFIGURASI

Secret code disimpan di file `.env`:

```env
ADMIN_RESET_CODE=085786858184
```

### **Cara Ganti Secret Code:**

1. Buka file `.env`
2. Edit baris `ADMIN_RESET_CODE=085786858184`
3. Ganti dengan code baru (contoh: `ADMIN_RESET_CODE=081234567890`)
4. Simpan file
5. Restart server Laravel (Ctrl+C, lalu `php artisan serve`)

---

## 🛡️ FITUR KEAMANAN

✅ **Rate Limiting:** Laravel otomatis limit percobaan login  
✅ **CSRF Protection:** Token di semua form  
✅ **Password Hashing:** Bcrypt dengan 12 rounds  
✅ **Validation:** Input divalidasi sebelum diproses  
✅ **Secret Code di .env:** Tidak masuk ke Git (ada di .gitignore)

---

## 🧪 TESTING

### **Test 1: Reset Password Berhasil**
1. Buka `http://localhost:8000/forgot-password`
2. Input secret code: `085786858184`
3. Input password baru: `newpassword123`
4. Konfirmasi password: `newpassword123`
5. Klik "Reset Password"
6. ✅ Harus redirect ke login dengan pesan sukses

### **Test 2: Secret Code Salah**
1. Buka `http://localhost:8000/forgot-password`
2. Input secret code: `999999999999` (salah)
3. Input password baru: `newpassword123`
4. Konfirmasi password: `newpassword123`
5. Klik "Reset Password"
6. ✅ Harus muncul error "Secret code salah!"

### **Test 3: Password Tidak Match**
1. Buka `http://localhost:8000/forgot-password`
2. Input secret code: `LATIF_PORTFOLIO_2026`
3. Input password baru: `password123`
4. Konfirmasi password: `password456` (berbeda)
5. Klik "Reset Password"
6. ✅ Harus muncul error validasi

---

## 📱 TAMPILAN

### **Halaman Login:**
```
┌──────────────────────────────┐
│  Welcome Back! 👋            │
│                              │
│  Email: [_______________]    │
│  Password: [___________]     │
│           Lupa Password? ←   │
│                              │
│  [Sign In]                   │
└──────────────────────────────┘
```

### **Halaman Reset Password:**
```
┌──────────────────────────────────┐
│  🔑 Reset Password               │
│                                  │
│  Secret Code:                    │
│  [________________________]      │
│                                  │
│  Password Baru:                  │
│  [________________________]      │
│                                  │
│  Konfirmasi Password:            │
│  [________________________]      │
│                                  │
│  [Batal]  [Reset Password]       │
│                                  │
│  ← Kembali ke Login              │
└──────────────────────────────────┘
```

---

## 🚨 TROUBLESHOOTING

### **Problem: "Secret code salah!"**
**Solusi:** 
- Cek file `.env`, pastikan `ADMIN_RESET_CODE=085786858184`
- Restart server Laravel
- Pastikan tidak ada spasi di awal/akhir code

### **Problem: "Admin tidak ditemukan!"**
**Solusi:**
```bash
php artisan db:seed --class=DatabaseSeeder
```

### **Problem: Route tidak ditemukan**
**Solusi:**
```bash
php artisan route:clear
php artisan route:cache
```

---

## 📝 CATATAN PENTING

1. **Simpan Secret Code di Tempat Aman:**
   - Password Manager (1Password, Bitwarden, LastPass)
   - Notes app (Apple Notes, Google Keep)
   - File terenkripsi

2. **Jangan Share Secret Code:**
   - Jangan commit ke Git (sudah di .gitignore)
   - Jangan screenshot dan share
   - Jangan simpan di tempat publik

3. **Ganti Secret Code Secara Berkala:**
   - Setiap 3-6 bulan
   - Setelah ada insiden keamanan
   - Sebelum deploy ke production

---

## 🎯 NEXT STEPS (OPSIONAL)

Kalau mau upgrade nanti:

1. **Tambah Email Reset:** Kirim link reset ke email asli
2. **Tambah 2FA:** Google Authenticator / SMS OTP
3. **Tambah Logging:** Track siapa yang reset password
4. **Tambah Notifikasi:** Email/WhatsApp saat password direset

---

## 📞 SUPPORT

Kalau ada masalah, cek:
1. File `.env` → Pastikan `ADMIN_RESET_CODE` ada
2. Database → Pastikan user admin ada
3. Routes → Jalankan `php artisan route:list --name=password`
4. Logs → Cek `storage/logs/laravel.log`

---

**Dibuat:** {{ date('Y-m-d') }}  
**Versi:** 1.0  
**Status:** ✅ Production Ready
