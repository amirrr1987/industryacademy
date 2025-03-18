#!/bin/bash

# نام کانتینر MySQL
CONTAINER_NAME="industry_mysql"

# نام پایگاه داده
DB_NAME="industry_db"

# نام کاربری MySQL
DB_USER="industry_admin"

# رمز عبور MySQL
DB_PASSWORD="industry_password"

# مسیر ذخیره فایل پشتیبان
BACKUP_DIR="./backups"
BACKUP_FILE="$BACKUP_DIR/$(date +\%F)_$DB_NAME.sql"

# اطمینان از وجود پوشه پشتیبان‌گیری
mkdir -p $BACKUP_DIR

# گرفتن پشتیبان از پایگاه داده MySQL
docker exec -i $CONTAINER_NAME mysqldump -u $DB_USER -p$DB_PASSWORD $DB_NAME > $BACKUP_FILE

echo "Backup completed: $BACKUP_FILE"
