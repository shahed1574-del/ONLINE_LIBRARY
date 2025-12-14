
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>إنشاء حساب</title>
  <link rel="stylesheet" href="signup.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

  <div class="signup-box">
    <h2>تسجيل مستخدم جديد</h2>

    <!-- ✅ عرض رسالة الخطأ أو النجاح -->
    <?php if (isset($_SESSION['error'])): ?>
      <div class="alert alert-danger text-center">
        <?= $_SESSION['error']; ?>
      </div>
      <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
      <div class="alert alert-success text-center">
        <?= $_SESSION['success']; ?>
      </div>
      <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <!-- ✅ نموذج إنشاء الحساب -->
    <form method="post" action="fun/add_user.php">
      <label for="username">اسم المستخدم</label>
      <input type="text" id="username" name="The_user" required>

      <label for="fullname">الاسم الكامل</label>
      <input type="text" id="fullname" name="Full_name" required>

      <label for="password">كلمة السر</label>
      <input type="password" id="password" name="The_password" required>

      <label for="confirm">إعادة كلمة السر</label>
      <input type="password" id="confirm" name="confirm" required>

      <label for="address">العنوان</label>
      <input type="text" id="address" name="Address">

      <label for="JOB">الدور الوظيفي</label>
      <input type="text" id="JOB" name="job">

      <button type="submit">إنشاء حساب</button>
      <button type="button" onclick="window.location.href='login.php'">رجوع</button>
    </form>
  </div>

</body>
</html>

