<?php
include 'navbar.php';
$re = isset($_GET['re']) ? $_GET['re'] : null;
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تغيير كلمة المرور</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #fdf4e5;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .form-box {
      width: 100%;
      max-width: 500px;
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.2);
      color: #4b3621;
    }
    label {
      font-weight: bold;
      margin-bottom: 5px;
    }
  </style>
</head>
<body>

<div class="form-box">
  <h2 class="text-center mb-4">🔑 تغيير كلمة المرور</h2>

  <?php if ($re == 1): ?>
    <div class="alert alert-danger text-center">كلمة السر القديمة خطأ ❌</div>
  <?php elseif ($re == 2): ?>
    <div class="alert alert-warning text-center">عدم تطابق الكلمات الجديدة ⚠️</div>
  <?php endif; ?>

  <form action="fun/change_pass.php" method="post">
    <div class="mb-3">
      <label for="oldpass">كلمة المرور القديمة</label>
      <input type="password" id="oldpass" name="n1" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="newpass">كلمة المرور الجديدة</label>
      <input type="password" id="newpass" name="n2" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="confirmpass">تأكيد كلمة المرور</label>
      <input type="password" id="confirmpass" name="n3" class="form-control" required>
    </div>

    <div class="text-center mt-4">
      <button type="submit" class="btn btn-success px-5">تأكيد</button>
    </div>
  </form>
</div>

</body>
</html>
