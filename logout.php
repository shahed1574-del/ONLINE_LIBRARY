<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

  // بدء الجلسة
session_unset();      // مسح كل المتغيرات من الجلسة
session_destroy();    // إنهاء الجلسة بالكامل
header("Location: login.php"); // إعادة التوجيه لصفحة تسجيل الدخول
exit();
?>
