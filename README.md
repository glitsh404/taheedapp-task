# مشروع Laravel

## المتطلبات الأساسية

قبل أن تبدأ، تأكد من أن لديك المتطلبات الأساسية التالية مثبتة على جهازك:

1. [Git](https://git-scm.com/)
2. [Composer](https://getcomposer.org/)
3. [Node.js](https://nodejs.org/) و [npm](https://www.npmjs.com/)
4. [XAMPP](https://www.apachefriends.org/index.html) أو أي خادم محلي آخر

## الخطوات

### 1. استنساخ المستودع

أولاً، قم باستنساخ المستودع إلى جهازك المحلي باستخدام الأمر التالي:

```bash
git clone https://github.com/username/repository.git
```

### 2. الانتقال إلى مجلد المشروع

بعد استنساخ المستودع، انتقل إلى مجلد المشروع:

```bash
cd repository
```

### 3. تثبيت Composer

قم بتثبيت التبعيات باستخدام Composer:

```bash
composer install
```

### 4. إعداد قاعدة البيانات

افتح ملف .env وقم بتحديث إعدادات قاعدة البيانات الخاصة بك:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. تشغيل XAMPP

قم بتشغيل XAMPP وتأكد من تشغيل Apache و MySQL.

XAMPP Control Panel

### 6. تشغيل الترحيلات

قم بتشغيل الترحيلات لإنشاء جداول قاعدة البيانات:

```bash
php artisan migrate
```

### 7. تثبيت npm

قم بتثبيت التبعيات الأمامية باستخدام npm:

```bash
npm install
```

### 8. تشغيل المشروع

قم بتشغيل المشروع باستخدام الأمر التالي:

```bash
php artisan serve
```

الآن يمكنك الوصول إلى المشروع عبر المتصفح على الرابط التالي: http://127.0.0.1:8000

### استمتع!

الآن يجب أن يكون لديك مشروع Laravel يعمل بشكل كامل على جهازك المحلي. استمتع بالتطوير!
