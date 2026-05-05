#!/bin/bash

# ========================================
# LARAVEL PORTFOLIO - DEPLOYMENT SCRIPT
# ========================================
# Author: Latif Burhanudin
# Version: 1.0
# Date: 2026-05-04
# ========================================

set -e  # Exit on error

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Configuration
PROJECT_DIR="/var/www/latif-portfolio"
NGINX_CONFIG="/etc/nginx/sites-available/latif-portfolio"
PHP_VERSION="8.2"

# Functions
print_success() {
    echo -e "${GREEN}✓ $1${NC}"
}

print_error() {
    echo -e "${RED}✗ $1${NC}"
}

print_info() {
    echo -e "${YELLOW}ℹ $1${NC}"
}

check_root() {
    if [ "$EUID" -ne 0 ]; then 
        print_error "Please run as root (use sudo)"
        exit 1
    fi
}

# Main deployment function
deploy() {
    print_info "Starting deployment..."
    
    # Navigate to project directory
    cd $PROJECT_DIR || exit
    
    # Enable maintenance mode
    print_info "Enabling maintenance mode..."
    sudo -u www-data php artisan down || true
    
    # Pull latest code
    print_info "Pulling latest code from Git..."
    sudo -u www-data git pull
    
    # Install/Update Composer dependencies
    print_info "Installing Composer dependencies..."
    sudo -u www-data composer install --optimize-autoloader --no-dev
    
    # Install/Update NPM dependencies and build assets
    print_info "Building assets..."
    npm install
    npm run build
    
    # Run database migrations
    print_info "Running database migrations..."
    sudo -u www-data php artisan migrate --force
    
    # Clear and cache config
    print_info "Clearing and caching configuration..."
    sudo -u www-data php artisan config:cache
    sudo -u www-data php artisan route:cache
    sudo -u www-data php artisan view:cache
    
    # Set proper permissions
    print_info "Setting permissions..."
    chown -R www-data:www-data $PROJECT_DIR/storage
    chown -R www-data:www-data $PROJECT_DIR/bootstrap/cache
    chmod -R 775 $PROJECT_DIR/storage
    chmod -R 775 $PROJECT_DIR/bootstrap/cache
    
    # Restart services
    print_info "Restarting services..."
    systemctl restart php${PHP_VERSION}-fpm
    systemctl reload nginx
    
    # Disable maintenance mode
    print_info "Disabling maintenance mode..."
    sudo -u www-data php artisan up
    
    print_success "Deployment completed successfully!"
    print_info "Visit your website to verify: https://yourdomain.com"
}

# Rollback function
rollback() {
    print_info "Rolling back to previous version..."
    
    cd $PROJECT_DIR || exit
    
    # Enable maintenance mode
    sudo -u www-data php artisan down || true
    
    # Git reset to previous commit
    sudo -u www-data git reset --hard HEAD~1
    
    # Reinstall dependencies
    sudo -u www-data composer install --optimize-autoloader --no-dev
    npm install && npm run build
    
    # Clear cache
    sudo -u www-data php artisan config:cache
    sudo -u www-data php artisan route:cache
    sudo -u www-data php artisan view:cache
    
    # Restart services
    systemctl restart php${PHP_VERSION}-fpm
    systemctl reload nginx
    
    # Disable maintenance mode
    sudo -u www-data php artisan up
    
    print_success "Rollback completed!"
}

# Check logs function
check_logs() {
    print_info "Checking logs..."
    echo ""
    echo "=== Laravel Logs (last 20 lines) ==="
    tail -20 $PROJECT_DIR/storage/logs/laravel.log
    echo ""
    echo "=== Nginx Error Logs (last 20 lines) ==="
    tail -20 /var/log/nginx/latif-portfolio-error.log
}

# Status check function
status_check() {
    print_info "Checking system status..."
    echo ""
    
    # Check Nginx
    if systemctl is-active --quiet nginx; then
        print_success "Nginx is running"
    else
        print_error "Nginx is not running"
    fi
    
    # Check PHP-FPM
    if systemctl is-active --quiet php${PHP_VERSION}-fpm; then
        print_success "PHP-FPM is running"
    else
        print_error "PHP-FPM is not running"
    fi
    
    # Check MySQL
    if systemctl is-active --quiet mysql; then
        print_success "MySQL is running"
    else
        print_error "MySQL is not running"
    fi
    
    # Check disk space
    echo ""
    print_info "Disk usage:"
    df -h | grep -E '^/dev/'
    
    # Check memory
    echo ""
    print_info "Memory usage:"
    free -h
}

# Clear cache function
clear_cache() {
    print_info "Clearing all caches..."
    
    cd $PROJECT_DIR || exit
    
    sudo -u www-data php artisan cache:clear
    sudo -u www-data php artisan config:clear
    sudo -u www-data php artisan route:clear
    sudo -u www-data php artisan view:clear
    
    print_success "All caches cleared!"
}

# Backup function
backup() {
    print_info "Creating backup..."
    
    BACKUP_DIR="/var/backups/portfolio"
    DATE=$(date +%Y%m%d_%H%M%S)
    
    mkdir -p $BACKUP_DIR
    
    # Backup database
    print_info "Backing up database..."
    mysqldump -u portfolio_user -p portfolio_prod | gzip > $BACKUP_DIR/db_$DATE.sql.gz
    
    # Backup files
    print_info "Backing up files..."
    tar -czf $BACKUP_DIR/files_$DATE.tar.gz $PROJECT_DIR/storage/app/public
    
    print_success "Backup created: $BACKUP_DIR"
    print_info "Database: db_$DATE.sql.gz"
    print_info "Files: files_$DATE.tar.gz"
}

# Show help
show_help() {
    echo "Laravel Portfolio Deployment Script"
    echo ""
    echo "Usage: sudo ./deploy.sh [command]"
    echo ""
    echo "Commands:"
    echo "  deploy      - Deploy latest code from Git"
    echo "  rollback    - Rollback to previous version"
    echo "  status      - Check system status"
    echo "  logs        - View recent logs"
    echo "  cache       - Clear all caches"
    echo "  backup      - Create backup"
    echo "  help        - Show this help message"
    echo ""
}

# Main script
check_root

case "${1:-help}" in
    deploy)
        deploy
        ;;
    rollback)
        rollback
        ;;
    status)
        status_check
        ;;
    logs)
        check_logs
        ;;
    cache)
        clear_cache
        ;;
    backup)
        backup
        ;;
    help|*)
        show_help
        ;;
esac
