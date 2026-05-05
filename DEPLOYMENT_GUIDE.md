# 🚀 DEPLOYMENT GUIDE - LARAVEL PORTFOLIO

## 📋 SERVER SPECIFICATIONS

- **OS:** Ubuntu 22.04
- **Web Server:** Nginx
- **PHP:** 8.2
- **Database:** MySQL
- **Access:** SSH + Root/Sudo
- **Deployment:** Git
- **Domain:** Ready & Pointing

---

## 🎯 DEPLOYMENT CHECKLIST

### **PHASE 1: SERVER PREPARATION** ⏱️ ~15 menit

#### **1.1 Update System**
```bash
sudo apt update && sudo apt upgrade -y
```

#### **1.2 Install Required Packages**
```bash
# Install PHP extensions yang dibutuhkan Laravel
sudo apt install -y php8.2-cli php8.2-fpm php8.2-mysql php8.2-xml php8.2-mbstring php8.2-curl php8.2-zip php8.2-gd php8.2-bcmath php8.2-intl

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer

# Install Git (kalau belum ada)
sudo apt install -y git

# Install Node.js & NPM (untuk build assets)
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs
```

#### **1.3 Setup MySQL Database**
```bash
# Login ke MySQL
sudo mysql -u root -p

# Buat database & user
CREATE DATABASE portfolio_prod CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'portfolio_user'@'localhost' IDENTIFIED BY 'GANTI_PASSWORD_KUAT_DISINI';
GRANT ALL PRIVILEGES ON portfolio_prod.* TO 'portfolio_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

**💡 Tips:** Generate password kuat:
```bash
openssl rand -base64 32
```

---

### **PHASE 2: DEPLOY APPLICATION** ⏱️ ~10 menit

#### **2.1 Clone Repository**
```bash
# Masuk ke directory web
cd /var/www

# Clone project (ganti dengan repo Anda)
sudo git clone https://github.com/USERNAME/portfolio.git latif-portfolio
cd latif-portfolio

# Set ownership ke www-data (Nginx user)
sudo chown -R www-data:www-data /var/www/latif-portfolio
sudo chmod -R 755 /var/www/latif-portfolio
```

#### **2.2 Install Dependencies**
```bash
# Install PHP dependencies
sudo -u www-data composer install --optimize-autoloader --no-dev

# Install Node dependencies & build assets
npm install
npm run build
```

#### **2.3 Setup Environment**
```bash
# Copy .env.example ke .env
sudo -u www-data cp .env.example .env

# Generate APP_KEY
sudo -u www-data php artisan key:generate

# Edit .env untuk production
sudo nano .env
```

**Edit `.env` dengan konfigurasi ini:**
```env
APP_NAME="Latif Portfolio"
APP_ENV=production
APP_KEY=base64:xxx  # Sudah di-generate otomatis
APP_DEBUG=false
APP_URL=https://yourdomain.com

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_prod
DB_USERNAME=portfolio_user
DB_PASSWORD=PASSWORD_YANG_TADI_DIBUAT

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_SECURE_COOKIE=true
SESSION_SAME_SITE=strict

CACHE_STORE=database
QUEUE_CONNECTION=database

# Secret code untuk reset password
ADMIN_RESET_CODE=3133549876

# API Keys (kalau ada)
API_MONKEYTYPE=xxx
FONNTE_TOKEN=xxx
```

**Save:** `Ctrl+O`, `Enter`, `Ctrl+X`

#### **2.4 Setup Storage & Permissions**
```bash
# Create storage link
sudo -u www-data php artisan storage:link

# Set proper permissions
sudo chown -R www-data:www-data /var/www/latif-portfolio/storage
sudo chown -R www-data:www-data /var/www/latif-portfolio/bootstrap/cache
sudo chmod -R 775 /var/www/latif-portfolio/storage
sudo chmod -R 775 /var/www/latif-portfolio/bootstrap/cache

# Protect .env file
sudo chmod 600 /var/www/latif-portfolio/.env
```

#### **2.5 Run Migrations & Seeder**
```bash
# Run migrations
sudo -u www-data php artisan migrate --force

# Seed admin user
sudo -u www-data php artisan db:seed --class=DatabaseSeeder

# Clear & cache config
sudo -u www-data php artisan config:cache
sudo -u www-data php artisan route:cache
sudo -u www-data php artisan view:cache
```

---

### **PHASE 3: NGINX CONFIGURATION** ⏱️ ~10 menit

#### **3.1 Create Nginx Config**
```bash
sudo nano /etc/nginx/sites-available/latif-portfolio
```

**Paste konfigurasi ini:**
```nginx
server {
    listen 80;
    listen [::]:80;
    server_name yourdomain.com www.yourdomain.com;
    
    # Redirect HTTP to HTTPS (nanti setelah SSL aktif)
    # return 301 https://$server_name$request_uri;
    
    root /var/www/latif-portfolio/public;
    index index.php index.html;

    # Security headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;
    add_header Referrer-Policy "no-referrer-when-downgrade" always;

    # Logging
    access_log /var/log/nginx/latif-portfolio-access.log;
    error_log /var/log/nginx/latif-portfolio-error.log;

    # Laravel routing
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    # PHP-FPM
    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # Deny access to sensitive files
    location ~ /\.(?!well-known).* {
        deny all;
    }

    location ~ /\.env {
        deny all;
    }

    # Cache static assets
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|svg|woff|woff2|ttf|eot)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }
}
```

**Save:** `Ctrl+O`, `Enter`, `Ctrl+X`

#### **3.2 Enable Site**
```bash
# Create symbolic link
sudo ln -s /etc/nginx/sites-available/latif-portfolio /etc/nginx/sites-enabled/

# Remove default site (opsional)
sudo rm /etc/nginx/sites-enabled/default

# Test Nginx config
sudo nginx -t

# Restart Nginx
sudo systemctl restart nginx
```

---

### **PHASE 4: SSL CERTIFICATE (Let's Encrypt)** ⏱️ ~5 menit

#### **4.1 Install Certbot**
```bash
sudo apt install -y certbot python3-certbot-nginx
```

#### **4.2 Generate SSL Certificate**
```bash
# Generate certificate (ganti yourdomain.com)
sudo certbot --nginx -d yourdomain.com -d www.yourdomain.com

# Pilih opsi:
# 1. Email: masukkan email Anda
# 2. Terms: Yes (A)
# 3. Share email: No (N)
# 4. Redirect HTTP to HTTPS: Yes (2)
```

#### **4.3 Test Auto-Renewal**
```bash
# Test renewal
sudo certbot renew --dry-run

# Certbot akan auto-renew setiap 60 hari
```

#### **4.4 Update Nginx Config (Otomatis oleh Certbot)**
Certbot akan otomatis update config Nginx dengan SSL. Verifikasi:
```bash
sudo nano /etc/nginx/sites-available/latif-portfolio
```

Seharusnya ada tambahan:
```nginx
listen 443 ssl;
ssl_certificate /etc/letsencrypt/live/yourdomain.com/fullchain.pem;
ssl_certificate_key /etc/letsencrypt/live/yourdomain.com/privkey.pem;
```

---

### **PHASE 5: SECURITY HARDENING** ⏱️ ~15 menit

#### **5.1 Setup Firewall (UFW)**
```bash
# Enable UFW
sudo ufw enable

# Allow SSH (PENTING! Jangan lupa ini)
sudo ufw allow 22/tcp

# Allow HTTP & HTTPS
sudo ufw allow 80/tcp
sudo ufw allow 443/tcp

# Check status
sudo ufw status
```

#### **5.2 Fail2Ban (Protection dari Brute Force)**
```bash
# Install Fail2Ban
sudo apt install -y fail2ban

# Copy default config
sudo cp /etc/fail2ban/jail.conf /etc/fail2ban/jail.local

# Edit config
sudo nano /etc/fail2ban/jail.local
```

**Tambahkan di akhir file:**
```ini
[nginx-limit-req]
enabled = true
filter = nginx-limit-req
logpath = /var/log/nginx/*error.log
maxretry = 5
findtime = 600
bantime = 3600
```

**Save & restart:**
```bash
sudo systemctl restart fail2ban
sudo systemctl enable fail2ban
```

#### **5.3 Disable Directory Listing**
Sudah di-handle oleh Laravel, tapi pastikan:
```bash
# Edit php.ini
sudo nano /etc/php/8.2/fpm/php.ini

# Cari dan set:
expose_php = Off
display_errors = Off
```

**Restart PHP-FPM:**
```bash
sudo systemctl restart php8.2-fpm
```

#### **5.4 Setup Rate Limiting di Laravel**
Edit `routes/web.php`:
```php
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:5,1')  // Max 5 percobaan per menit
        ->name('login.post');
    
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])
        ->name('password.request');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])
        ->middleware('throttle:3,5')  // Max 3 percobaan per 5 menit
        ->name('password.reset');
});
```

**Deploy perubahan:**
```bash
cd /var/www/latif-portfolio
sudo -u www-data git pull
sudo -u www-data php artisan route:cache
```

---

### **PHASE 6: MONITORING & BACKUP** ⏱️ ~10 menit

#### **6.1 Setup Cron untuk Laravel Scheduler**
```bash
sudo crontab -e -u www-data
```

**Tambahkan:**
```cron
* * * * * cd /var/www/latif-portfolio && php artisan schedule:run >> /dev/null 2>&1
```

#### **6.2 Setup Database Backup**
```bash
# Create backup script
sudo nano /usr/local/bin/backup-portfolio.sh
```

**Paste script ini:**
```bash
#!/bin/bash
BACKUP_DIR="/var/backups/portfolio"
DATE=$(date +%Y%m%d_%H%M%S)
DB_NAME="portfolio_prod"
DB_USER="portfolio_user"
DB_PASS="PASSWORD_ANDA"

# Create backup directory
mkdir -p $BACKUP_DIR

# Backup database
mysqldump -u $DB_USER -p$DB_PASS $DB_NAME | gzip > $BACKUP_DIR/db_$DATE.sql.gz

# Backup files
tar -czf $BACKUP_DIR/files_$DATE.tar.gz /var/www/latif-portfolio/storage/app/public

# Keep only last 7 days
find $BACKUP_DIR -type f -mtime +7 -delete

echo "Backup completed: $DATE"
```

**Set permission & schedule:**
```bash
sudo chmod +x /usr/local/bin/backup-portfolio.sh

# Add to crontab (daily at 2 AM)
sudo crontab -e
```

**Tambahkan:**
```cron
0 2 * * * /usr/local/bin/backup-portfolio.sh >> /var/log/portfolio-backup.log 2>&1
```

#### **6.3 Setup Log Rotation**
```bash
sudo nano /etc/logrotate.d/laravel-portfolio
```

**Paste:**
```
/var/www/latif-portfolio/storage/logs/*.log {
    daily
    missingok
    rotate 14
    compress
    delaycompress
    notifempty
    create 0640 www-data www-data
    sharedscripts
}
```

---

## ✅ VERIFICATION CHECKLIST

Setelah deployment, cek:

### **1. Website Accessible**
```bash
# Test HTTP (should redirect to HTTPS)
curl -I http://yourdomain.com

# Test HTTPS
curl -I https://yourdomain.com
```

### **2. SSL Certificate Valid**
```bash
# Check SSL
sudo certbot certificates

# Test SSL rating
# Buka: https://www.ssllabs.com/ssltest/
```

### **3. Application Working**
- [ ] Homepage load: `https://yourdomain.com`
- [ ] Login page: `https://yourdomain.com/login`
- [ ] Admin dashboard: `https://yourdomain.com/admin/dashboard`
- [ ] Forgot password: `https://yourdomain.com/forgot-password`
- [ ] Static assets load (images, CSS, JS)

### **4. Security Headers**
```bash
# Check security headers
curl -I https://yourdomain.com | grep -i "x-frame\|x-content\|x-xss"
```

### **5. Database Connection**
```bash
cd /var/www/latif-portfolio
sudo -u www-data php artisan tinker

# Test query
>>> \App\Models\User::count();
# Should return 1 (admin user)
```

### **6. Logs**
```bash
# Check Laravel logs
sudo tail -f /var/www/latif-portfolio/storage/logs/laravel.log

# Check Nginx logs
sudo tail -f /var/log/nginx/latif-portfolio-error.log
```

---

## 🔄 UPDATE WORKFLOW

Untuk update aplikasi nanti:

```bash
# 1. Masuk ke directory
cd /var/www/latif-portfolio

# 2. Pull latest code
sudo -u www-data git pull

# 3. Install dependencies (kalau ada perubahan)
sudo -u www-data composer install --optimize-autoloader --no-dev
npm install && npm run build

# 4. Run migrations (kalau ada)
sudo -u www-data php artisan migrate --force

# 5. Clear cache
sudo -u www-data php artisan config:cache
sudo -u www-data php artisan route:cache
sudo -u www-data php artisan view:cache

# 6. Restart services
sudo systemctl restart php8.2-fpm
sudo systemctl reload nginx
```

---

## 🚨 TROUBLESHOOTING

### **Problem: 500 Internal Server Error**
```bash
# Check Laravel logs
sudo tail -100 /var/www/latif-portfolio/storage/logs/laravel.log

# Check Nginx logs
sudo tail -100 /var/log/nginx/latif-portfolio-error.log

# Check permissions
sudo chown -R www-data:www-data /var/www/latif-portfolio/storage
sudo chmod -R 775 /var/www/latif-portfolio/storage
```

### **Problem: Database Connection Failed**
```bash
# Test MySQL connection
mysql -u portfolio_user -p portfolio_prod

# Check .env
sudo nano /var/www/latif-portfolio/.env

# Clear config cache
sudo -u www-data php artisan config:clear
```

### **Problem: Assets Not Loading**
```bash
# Rebuild assets
cd /var/www/latif-portfolio
npm run build

# Check storage link
sudo -u www-data php artisan storage:link

# Check permissions
sudo chmod -R 755 /var/www/latif-portfolio/public
```

### **Problem: SSL Certificate Error**
```bash
# Renew certificate
sudo certbot renew

# Check certificate
sudo certbot certificates

# Restart Nginx
sudo systemctl restart nginx
```

---

## 📞 SUPPORT COMMANDS

### **Check Service Status**
```bash
# Nginx
sudo systemctl status nginx

# PHP-FPM
sudo systemctl status php8.2-fpm

# MySQL
sudo systemctl status mysql

# Fail2Ban
sudo fail2ban-client status
```

### **View Logs**
```bash
# Laravel
sudo tail -f /var/www/latif-portfolio/storage/logs/laravel.log

# Nginx Access
sudo tail -f /var/log/nginx/latif-portfolio-access.log

# Nginx Error
sudo tail -f /var/log/nginx/latif-portfolio-error.log

# MySQL
sudo tail -f /var/log/mysql/error.log
```

### **Performance Monitoring**
```bash
# Check disk usage
df -h

# Check memory
free -h

# Check CPU
top

# Check processes
ps aux | grep php
ps aux | grep nginx
```

---

## 🎯 SECURITY BEST PRACTICES

1. ✅ **Regular Updates**
   ```bash
   sudo apt update && sudo apt upgrade -y
   ```

2. ✅ **Monitor Logs**
   ```bash
   # Setup log monitoring alert (opsional)
   # Gunakan tools seperti Logwatch atau Papertrail
   ```

3. ✅ **Backup Verification**
   ```bash
   # Test restore backup secara berkala
   ```

4. ✅ **Change Default Passwords**
   - Database password
   - Admin password
   - Secret code (kalau perlu)

5. ✅ **Keep Dependencies Updated**
   ```bash
   cd /var/www/latif-portfolio
   sudo -u www-data composer update
   npm update
   ```

---

## 📊 PERFORMANCE OPTIMIZATION (OPSIONAL)

### **Enable OPcache**
```bash
sudo nano /etc/php/8.2/fpm/php.ini
```

**Set:**
```ini
opcache.enable=1
opcache.memory_consumption=128
opcache.interned_strings_buffer=8
opcache.max_accelerated_files=10000
opcache.revalidate_freq=2
```

### **Enable Gzip Compression**
Sudah di-handle oleh Nginx default config.

### **Setup Redis (Advanced)**
```bash
# Install Redis
sudo apt install -y redis-server php8.2-redis

# Update .env
CACHE_STORE=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis
```

---

**Deployment Guide Created:** 2026-05-04  
**Version:** 1.0  
**Status:** ✅ Production Ready
