# 🔒 SECURITY CHECKLIST - PRODUCTION

## ✅ PRE-DEPLOYMENT SECURITY

### **Environment Configuration**
- [ ] `APP_ENV=production` di `.env`
- [ ] `APP_DEBUG=false` di `.env`
- [ ] `APP_KEY` sudah di-generate
- [ ] Database password kuat (min 20 karakter)
- [ ] Secret code minimal 10 digit: `3133549876`
- [ ] `.env` permission: `chmod 600`
- [ ] `.env` tidak ter-commit ke Git

### **Database Security**
- [ ] Database user bukan `root`
- [ ] Database user hanya punya akses ke 1 database
- [ ] Password database kuat & random
- [ ] MySQL bind ke `127.0.0.1` (tidak expose ke public)

### **Session & Cookies**
- [ ] `SESSION_SECURE_COOKIE=true`
- [ ] `SESSION_SAME_SITE=strict`
- [ ] `SESSION_DRIVER=database` (bukan file)

---

## 🌐 WEB SERVER SECURITY

### **HTTPS/SSL**
- [ ] SSL certificate terinstall (Let's Encrypt)
- [ ] HTTP redirect ke HTTPS
- [ ] SSL rating A atau A+ (test di ssllabs.com)
- [ ] Auto-renewal SSL aktif

### **Nginx Configuration**
- [ ] Security headers aktif:
  - [ ] `X-Frame-Options: SAMEORIGIN`
  - [ ] `X-Content-Type-Options: nosniff`
  - [ ] `X-XSS-Protection: 1; mode=block`
  - [ ] `Referrer-Policy: no-referrer-when-downgrade`
- [ ] `.env` file blocked (deny all)
- [ ] `.git` directory blocked
- [ ] Directory listing disabled
- [ ] File upload size limit set

### **PHP Security**
- [ ] `expose_php = Off`
- [ ] `display_errors = Off`
- [ ] `log_errors = On`
- [ ] OPcache enabled (performance)

---

## 🔥 FIREWALL & NETWORK

### **UFW (Uncomplicated Firewall)**
- [ ] UFW enabled
- [ ] Port 22 (SSH) allowed
- [ ] Port 80 (HTTP) allowed
- [ ] Port 443 (HTTPS) allowed
- [ ] Port 3306 (MySQL) BLOCKED dari public
- [ ] Default policy: deny incoming

### **Fail2Ban**
- [ ] Fail2Ban installed & running
- [ ] Nginx jail enabled
- [ ] SSH jail enabled
- [ ] Ban time: minimal 1 hour
- [ ] Max retry: 5 attempts

---

## 🛡️ APPLICATION SECURITY

### **Laravel Security**
- [ ] Rate limiting di login route (5/minute)
- [ ] Rate limiting di reset password (3/5minutes)
- [ ] CSRF protection aktif (default Laravel)
- [ ] Mass assignment protection (`$guarded`)
- [ ] SQL injection protection (Eloquent ORM)
- [ ] XSS protection (Blade auto-escape)

### **Authentication**
- [ ] Password hashing: Bcrypt (12 rounds)
- [ ] Session regeneration setelah login
- [ ] Session invalidation saat logout
- [ ] Remember token secure

### **File Upload (kalau ada)**
- [ ] Validasi file type
- [ ] Validasi file size (max 2MB)
- [ ] File disimpan di storage (bukan public)
- [ ] Filename di-sanitize

---

## 📁 FILE PERMISSIONS

### **Directory Permissions**
```bash
# Project root
chown -R www-data:www-data /var/www/latif-portfolio
chmod -R 755 /var/www/latif-portfolio

# Storage & cache
chmod -R 775 /var/www/latif-portfolio/storage
chmod -R 775 /var/www/latif-portfolio/bootstrap/cache

# .env file
chmod 600 /var/www/latif-portfolio/.env
```

- [ ] Project owned by `www-data`
- [ ] Storage writable (775)
- [ ] Bootstrap/cache writable (775)
- [ ] `.env` readable only by owner (600)
- [ ] Public directory readable (755)

---

## 🔍 MONITORING & LOGGING

### **Logging**
- [ ] Laravel logs aktif
- [ ] Nginx access log aktif
- [ ] Nginx error log aktif
- [ ] Log rotation configured
- [ ] Failed login attempts logged

### **Monitoring**
- [ ] Uptime monitoring (UptimeRobot, Pingdom)
- [ ] SSL expiry monitoring
- [ ] Disk space monitoring
- [ ] Memory usage monitoring

### **Backup**
- [ ] Database backup daily
- [ ] File backup weekly
- [ ] Backup retention: 7 days
- [ ] Backup tested (restore test)
- [ ] Backup stored off-site

---

## 🚨 INCIDENT RESPONSE

### **Preparation**
- [ ] Admin contact info documented
- [ ] Backup restore procedure documented
- [ ] Rollback procedure tested
- [ ] Emergency access method ready

### **Detection**
- [ ] Log monitoring aktif
- [ ] Alert system configured
- [ ] Suspicious activity detection

### **Response Plan**
- [ ] Incident response checklist ready
- [ ] Communication plan ready
- [ ] Recovery procedure documented

---

## 🔄 MAINTENANCE

### **Regular Tasks**

**Daily:**
- [ ] Check error logs
- [ ] Monitor disk space
- [ ] Verify backup success

**Weekly:**
- [ ] Review access logs
- [ ] Check SSL certificate expiry
- [ ] Update dependencies (composer, npm)

**Monthly:**
- [ ] System updates (`apt update && apt upgrade`)
- [ ] Security audit
- [ ] Test backup restore
- [ ] Review firewall rules

**Quarterly:**
- [ ] Change admin password
- [ ] Change database password
- [ ] Change secret code
- [ ] Security penetration test

---

## 🎯 SECURITY SCORE

### **Minimum (Basic Security)** - Score: 60/100
- ✅ HTTPS enabled
- ✅ Firewall active
- ✅ Basic rate limiting
- ✅ `.env` protected
- ✅ Database password strong

### **Recommended (Good Security)** - Score: 80/100
Minimum +
- ✅ Fail2Ban active
- ✅ Security headers configured
- ✅ Regular backups
- ✅ Log monitoring
- ✅ SSL A+ rating

### **Optimal (Best Security)** - Score: 95/100
Recommended +
- ✅ 2FA enabled
- ✅ IP whitelist for admin
- ✅ Intrusion detection
- ✅ Automated monitoring
- ✅ Regular security audits

---

## 📊 SECURITY TESTING

### **Manual Tests**

**1. SSL Test**
```bash
# Visit: https://www.ssllabs.com/ssltest/
# Target: A or A+ rating
```

**2. Security Headers Test**
```bash
# Visit: https://securityheaders.com/
# Target: A or A+ rating
```

**3. Rate Limiting Test**
```bash
# Try login 6 times with wrong password
# Expected: Blocked after 5 attempts
```

**4. HTTPS Redirect Test**
```bash
curl -I http://yourdomain.com
# Expected: 301 redirect to https://
```

**5. Sensitive File Access Test**
```bash
curl https://yourdomain.com/.env
# Expected: 403 Forbidden

curl https://yourdomain.com/.git/config
# Expected: 403 Forbidden
```

---

## 🚀 QUICK SECURITY AUDIT SCRIPT

```bash
#!/bin/bash

echo "=== SECURITY AUDIT ==="
echo ""

# Check HTTPS
echo "1. Checking HTTPS..."
curl -I https://yourdomain.com 2>&1 | grep -i "HTTP/2 200" && echo "✓ HTTPS OK" || echo "✗ HTTPS FAILED"

# Check .env protection
echo "2. Checking .env protection..."
curl -I https://yourdomain.com/.env 2>&1 | grep -i "403" && echo "✓ .env Protected" || echo "✗ .env EXPOSED!"

# Check firewall
echo "3. Checking firewall..."
sudo ufw status | grep -i "active" && echo "✓ Firewall Active" || echo "✗ Firewall Inactive"

# Check Fail2Ban
echo "4. Checking Fail2Ban..."
sudo systemctl is-active fail2ban && echo "✓ Fail2Ban Active" || echo "✗ Fail2Ban Inactive"

# Check SSL expiry
echo "5. Checking SSL certificate..."
sudo certbot certificates | grep -i "VALID" && echo "✓ SSL Valid" || echo "✗ SSL Issue"

# Check file permissions
echo "6. Checking .env permissions..."
stat -c "%a" /var/www/latif-portfolio/.env | grep "600" && echo "✓ .env Permissions OK" || echo "✗ .env Permissions Wrong"

echo ""
echo "=== AUDIT COMPLETE ==="
```

---

## 📞 EMERGENCY CONTACTS

**Server Issues:**
- Hosting provider support
- Server admin contact

**Security Incidents:**
- Security team email
- Emergency phone number

**Backup & Recovery:**
- Backup location
- Recovery procedure document

---

## 📝 NOTES

**Last Security Audit:** ___________  
**Next Audit Due:** ___________  
**Security Score:** ___/100  
**Critical Issues:** ___________  
**Action Items:** ___________

---

**Created:** 2026-05-04  
**Version:** 1.0  
**Status:** ✅ Production Ready
