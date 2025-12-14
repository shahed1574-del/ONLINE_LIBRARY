
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تسجيل الدخول</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="login-box">
    <h2>تسجيل الدخول</h2>

    <?php if (isset($_SESSION['error'])): ?>
      <div class="error-message" style="color:red; text-align:center; margin-bottom:10px;">
        <?= htmlspecialchars($_SESSION['error']); ?>
      </div>
      <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form action="fun/test.php" method="post">
      <label for="username">اسم المستخدم</label>
      <input type="text" id="username" name="n1" required>

      <label for="password">كلمة المرور</label>
      <input type="password" id="password" name="n2" required>

      <button type="submit">دخول</button>
      <button type="button" onclick="window.location.href='signup.php'">إنشاء حساب</button>
    </form>
  </div>
</body>
</html>

