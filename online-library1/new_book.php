<?php
include 'navbar.php';
include 'connect.php';
$re = isset($_GET['re']) ? $_GET['re'] : null;
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>إضافة كتاب</title>
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
  <h2 class="text-center mb-4">📚 إضافة كتاب جديد</h2>

  <?php if ($re == 2): ?>
    <div class="alert alert-success text-center">تمت إضافة الكتاب بنجاح ✅</div>
  <?php elseif ($re == 1): ?>
    <div class="alert alert-warning text-center">الكتاب مضاف مسبقًا ⚠️</div>
  <?php endif; ?>

  <form method="post" action="fun/add_book.php" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="bookname">اسم الكتاب</label>
      <input type="text" id="bookname" name="book_name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="author">اسم المؤلف</label>
      <input type="text" id="author" name="author_name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="house">اسم دار النشر</label>
      <input type="text" id="house" name="publishing_house_name" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="refnum">الرقم المرجعي</label>
      <input type="text" id="refnum" name="reference_number" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="count">عدد النسخ</label>
      <input type="number" id="count" name="count_book" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="cover">صورة الغلاف</label>
      <input type="file" id="cover" name="cover_photo" class="form-control" accept="image/*">
    </div>

    <div class="text-center mt-4">
      <button type="submit" class="btn btn-success px-5">إضافة كتاب</button>
    </div>
  </form>
</div>

</body>
</html>
