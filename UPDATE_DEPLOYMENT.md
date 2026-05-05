# 🔄 UPDATE DEPLOYMENT GUIDE - FITUR BARU

## 📦 FITUR YANG DITAMBAHKAN

### **1. Forgot Password dengan Secret Code**
- Route: `/forgot-password`
- Method: Secret code (angka 6 digit)
- Security: Rate limiting 3 percobaan per 5 menit

### **2. Show/Hide Password**
- Halaman login: Toggle password visibility
- Halaman forgot password: Toggle di 2 field password
- Client-side only (aman untuk production)

---

## ✅ PRE-DEPLOYMENT CHECKLIST

Sebelum deploy, pastikan:

- [ ] Code sudah di-commit ke Git
- [ ] Sudah test di local (semua fitur work)
- [ ] Backup database production (just in case)
- [ ] Maintenance window sudah dijadwalkan (opsional)

---

## 🚀 DEPLOYMENT STEPS

### **STEP 1: Backup Production** ⏱️ 2 menit

```bash
# SSH ke server
ssh root@your-server-ip

# Backup database
sudo /usr/local/bin/backup-portfolio.sh

# Atau manual:
mysqldump -u portfolio_user -p portfolio_prod > /tmp/backup_before_update_$(date +%Y%m%d).sql
```

**✅ Checkpoint:** Backup file tersimpan di `/var/backups/portfolio/`

---

### **STEP 2: Pull Latest Code** ⏱️ 1 menit

```bash
# Masuk ke project directory
cd /var/www/latif-portfolio

# Enable maintenance mode (opsional, kalau mau zero downtime skip ini)
sudo -u www-data php artisan down --message="Updating system, back in 2 minutes"

# Pull latest code
sudo -u www-data git pull origin main
# Atau: sudo -u www-data git pull origin master (tergantung branch)
```

**✅ Checkpoint:** Git pull success, no conflicts

---

### **STEP 3: Update Environment Variable** ⏱️ 1 menit

```bash
# Edit .env
sudo nano /var/www/latif-portfolio/.env
```

**Tambahkan baris ini di akhir file:**
```env
# Admin Reset Password Secret Code
ADMIN_RESET_CODE=085786858184
```

**Save:** `Ctrl+O`, `Enter`, `Ctrl+X`

**✅ Checkpoint:** Secret code sudah ditambahkan

---

### **STEP 4: Update Dependencies** ⏱️ 2 menit

```bash
# Update Composer (kalau ada perubahan)
sudo -u www-data composer install --optimize-autoloader --no-dev

# Update NPM & rebuild assets (kalau ada perubahan view)
npm install
npm run build
```

**Note:** Kalau tidak ada perubahan di `composer.json` atau `package.json`, bisa skip step ini.

**✅ Checkpoint:** Dependencies up to date

---

### **STEP 5: Clear & Cache Configuration** ⏱️ 1 menit

```bash
# Clear old cache
sudo -u www-data php artisan config:clear
sudo -u www-data php artisan route:clear
sudo -u www-data php artisan view:clear

# Cache new config
sudo -u www-data php artisan config:cache
sudo -u www-data php artisan route:cache
sudo -u www-data php artisan view:cache
```

**✅ Checkpoint:** Cache cleared & rebuilt

---

### **STEP 6: Verify Routes** ⏱️ 30 detik

```bash
# Check route forgot password sudah terdaftar
sudo -u www-data php artisan route:list --name=password

# Expected output:
# GET|HEAD  forgot-password
# POST      reset-password
```

**✅ Checkpoint:** Route baru sudah terdaftar

---

### **STEP 7: Test di Server** ⏱️ 2 menit

```bash
# Test artisan command
sudo -u www-data php artisan tinker

# Di tinker, test:
>>> env('ADMIN_RESET_CODE');
# Expected: "085786858184"

>>> \App\Models\User::where('email', 'admin@latif.com')->exists();
# Expected: true

# Exit tinker
>>> exit
```

**✅ Checkpoint:** Environment variable terbaca, admin user exists

---

### **STEP 8: Restart Services** ⏱️ 30 detik

```bash
# Restart PHP-FPM
sudo systemctl restart php8.2-fpm

# Reload Nginx (soft restart, no downtime)
sudo systemctl reload nginx

# Disable maintenance mode (kalau tadi di-enable)
sudo -u www-data php artisan up
```

**✅ Checkpoint:** Services restarted

---

### **STEP 9: Verify di Browser** ⏱️ 3 menit

**Test 1: Homepage**
- Buka: `https://yourdomain.com`
- ✅ Homepage load normal

**Test 2: Login Page**
- Buka: `https://yourdomain.com/login`
- ✅ Ada link "Lupa Password?"
- ✅ Icon mata di field password
- ✅ Klik icon mata → password show/hide

**Test 3: Forgot Password**
- Klik "Lupa Password?"
- ✅ Redirect ke `/forgot-password`
- ✅ Form muncul dengan 3 field (secret code, password, confirm)
- ✅ Icon mata di 2 field password

**Test 4: Reset Password (Full Flow)**
- Input secret code: `085786858184`
- Input password baru: `testpassword123`
- Confirm password: `testpassword123`
- Klik "Reset Password"
- ✅ Redirect ke login dengan success message
- ✅ Login dengan password baru berhasil
- ✅ Ganti password kembali ke password lama (via dashboard)

**Test 5: Rate Limiting**
- Coba reset password dengan secret code salah 4x
- ✅ Percobaan ke-4 harus di-block (rate limit)

**✅ Checkpoint:** Semua fitur berfungsi normal

---

## 🔄 ROLLBACK PROCEDURE (Kalau Ada Masalah)

Kalau ada error setelah deploy:

### **Quick Rollback** ⏱️ 2 menit

```bash
cd /var/www/latif-portfolio

# Enable maintenance mode
sudo -u www-data php artisan down

# Rollback Git
sudo -u www-data git reset --hard HEAD~1

# Clear cache
sudo -u www-data php artisan config:clear
sudo -u www-data php artisan route:clear
sudo -u www-data php artisan view:clear

# Restart services
sudo systemctl restart php8.2-fpm
sudo systemctl reload nginx

# Disable maintenance mode
sudo -u www-data php artisan up
```

### **Restore Database (Kalau Perlu)**

```bash
# Restore dari backup
mysql -u portfolio_user -p portfolio_prod < /tmp/backup_before_update_YYYYMMDD.sql
```

---

## 📊 POST-DEPLOYMENT MONITORING

### **Immediate (0-1 jam setelah deploy)**

```bash
# Monitor error logs
sudo tail -f /var/www/latif-portfolio/storage/logs/laravel.log

# Monitor Nginx logs
sudo tail -f /var/log/nginx/latif-portfolio-error.log

# Check system status
sudo ./deploy.sh status
```

**Watch for:**
- ❌ 500 errors
- ❌ Route not found errors
- ❌ Database connection errors
- ❌ Permission errors

### **Short-term (1-24 jam)**

- [ ] Check analytics (traffic normal?)
- [ ] Monitor error rate (Sentry, Bugsnag)
- [ ] Test forgot password dari device lain
- [ ] Check email notifications (kalau ada)

### **Long-term (1-7 hari)**

- [ ] Monitor forgot password usage
- [ ] Check rate limiting effectiveness
- [ ] Review security logs
- [ ] Verify backup still running

---

## 🔒 SECURITY VERIFICATION

Setelah deploy, verify security:

### **1. Secret Code Protection**
```bash
# Test: Secret code tidak bisa di-brute force
# Coba 4x dengan code salah → harus di-block
```

### **2. Rate Limiting Active**
```bash
# Check route middleware
sudo -u www-data php artisan route:list --name=password.reset

# Expected: throttle:3,5 di middleware
```

### **3. HTTPS Still Working**
```bash
curl -I https://yourdomain.com/forgot-password

# Expected: HTTP/2 200
```

### **4. .env Still Protected**
```bash
curl -I https://yourdomain.com/.env

# Expected: 403 Forbidden
```

---

## 📝 DEPLOYMENT LOG TEMPLATE

Copy & isi setiap kali deploy:

```
=== DEPLOYMENT LOG ===
Date: ___________
Time: ___________
Deployed by: ___________

Features Added:
- [ ] Forgot Password (Secret Code)
- [ ] Show/Hide Password

Pre-deployment:
- [ ] Backup created: ___________
- [ ] Git commit: ___________

Deployment:
- [ ] Git pull: SUCCESS / FAILED
- [ ] .env updated: YES / NO
- [ ] Cache cleared: YES / NO
- [ ] Services restarted: YES / NO

Testing:
- [ ] Homepage: OK / ERROR
- [ ] Login: OK / ERROR
- [ ] Forgot Password: OK / ERROR
- [ ] Show/Hide Password: OK / ERROR
- [ ] Rate Limiting: OK / ERROR

Post-deployment:
- [ ] Error logs: CLEAN / ERRORS FOUND
- [ ] Performance: NORMAL / DEGRADED
- [ ] Rollback needed: NO / YES

Issues Found:
___________

Resolution:
___________

Status: SUCCESS / FAILED / ROLLED BACK
```

---

## 🎯 QUICK REFERENCE

### **One-Line Update Command**

Kalau mau cepat (untuk update selanjutnya):

```bash
cd /var/www/latif-portfolio && \
sudo -u www-data git pull && \
sudo -u www-data php artisan config:cache && \
sudo -u www-data php artisan route:cache && \
sudo -u www-data php artisan view:cache && \
sudo systemctl restart php8.2-fpm && \
sudo systemctl reload nginx && \
echo "✓ Update completed!"
```

### **Emergency Rollback**

```bash
cd /var/www/latif-portfolio && \
sudo -u www-data git reset --hard HEAD~1 && \
sudo -u www-data php artisan config:clear && \
sudo systemctl restart php8.2-fpm && \
echo "✓ Rolled back!"
```

---

## 💡 TIPS UNTUK UPDATE SELANJUTNYA

### **Best Practices:**

1. **Always Backup First**
   - Database backup sebelum deploy
   - Git commit sebelum pull

2. **Test di Staging (Opsional)**
   - Setup subdomain staging
   - Test update di situ dulu

3. **Deploy di Off-Peak Hours**
   - Malam hari (traffic rendah)
   - Weekend (kalau portfolio personal)

4. **Monitor After Deploy**
   - Check logs 1 jam pertama
   - Siap rollback kalau ada issue

5. **Document Everything**
   - Isi deployment log
   - Catat issue & resolution

### **Automation (Advanced):**

Kalau mau otomatis, bisa pakai:

```bash
# Create update script
sudo nano /usr/local/bin/update-portfolio.sh
```

**Paste:**
```bash
#!/bin/bash
cd /var/www/latif-portfolio
sudo -u www-data git pull
sudo -u www-data composer install --no-dev
npm install && npm run build
sudo -u www-data php artisan migrate --force
sudo -u www-data php artisan config:cache
sudo -u www-data php artisan route:cache
sudo -u www-data php artisan view:cache
sudo systemctl restart php8.2-fpm
sudo systemctl reload nginx
echo "✓ Update completed!"
```

**Set permission:**
```bash
sudo chmod +x /usr/local/bin/update-portfolio.sh
```

**Usage:**
```bash
sudo /usr/local/bin/update-portfolio.sh
```

---

## 🚨 TROUBLESHOOTING

### **Problem: Route not found**
```bash
# Solution:
sudo -u www-data php artisan route:clear
sudo -u www-data php artisan route:cache
```

### **Problem: View not found**
```bash
# Solution:
sudo -u www-data php artisan view:clear
sudo -u www-data php artisan view:cache
```

### **Problem: Config cached**
```bash
# Solution:
sudo -u www-data php artisan config:clear
sudo -u www-data php artisan config:cache
```

### **Problem: Permission denied**
```bash
# Solution:
sudo chown -R www-data:www-data /var/www/latif-portfolio/storage
sudo chmod -R 775 /var/www/latif-portfolio/storage
```

---

## ✅ FINAL CHECKLIST

Sebelum close deployment:

- [ ] Backup created & verified
- [ ] Code deployed successfully
- [ ] .env updated with secret code
- [ ] Cache cleared & rebuilt
- [ ] Services restarted
- [ ] All features tested
- [ ] No errors in logs
- [ ] Performance normal
- [ ] Security verified
- [ ] Deployment log filled
- [ ] Team notified (kalau ada)

---

**Total Deployment Time:** ~10-15 menit  
**Downtime:** 0 menit (kalau tidak pakai maintenance mode)  
**Risk Level:** Low (fitur baru, tidak mengubah existing features)

---

**Created:** 2026-05-04  
**Version:** 1.0  
**For:** Portfolio Update - Forgot Password Feature
