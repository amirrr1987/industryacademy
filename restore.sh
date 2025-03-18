#!/bin/bash

# نام کانتینر MySQL
CONTAINER_NAME="industry_mysql"

# نام پایگاه داده
DB_NAME="industry_db"

# نام کاربری MySQL
DB_USER="industry_admin"

# رمز عبور MySQL
DB_PASSWORD="industry_password"

# مسیر فایل پشتیبان
BACKUP_FILE="./backups/industry_db_backup.sql"

# بازگردانی پشتیبان به پایگاه داده MySQL
docker exec -i $CONTAINER_NAME mysql -u $DB_USER -p$DB_PASSWORD $DB_NAME < $BACKUP_FILE

echo "Restore completed: $BACKUP_FILE"
