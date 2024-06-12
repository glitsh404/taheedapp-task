# مشروع Laravel

## المتطلبات الأساسية

قبل أن تبدأ، تأكد من أن لديك المتطلبات الأساسية التالية مثبتة على جهازك:

<p dir="rtl">
1. <a href="https://git-scm.com/">Git</a><br>
2. <a href="https://getcomposer.org/">Composer</a><br>
3. <a href="https://nodejs.org/">Node.js</a> و <a href="https://www.npmjs.com/">npm</a><br>
4. <a href="https://www.apachefriends.org/index.html">XAMPP</a> أو أي خادم محلي آخر
</p>

## الخطوات

### 1. استنساخ المستودع

أولاً، قم باستنساخ المستودع إلى جهازك المحلي باستخدام الأمر التالي:

```bash
git clone https://github.com/glitsh404/taheedapp-task.git
```

### 2. الانتقال إلى مجلد المشروع

بعد استنساخ المستودع، انتقل إلى مجلد المشروع:

```bash
cd taheedapp-task
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
DB_DATABASE=taheedapp
DB_USERNAME=root
DB_PASSWORD=
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
