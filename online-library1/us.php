<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>نموذج الاتصال</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- ملف التنسيقات الخاص -->
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background: linear-gradient(to bottom, #f5e6cc, #d2b48c); /* بيج متدرج */
    }

    .form-container {
      background-color: #fffaf0; /* بيج فاتح */
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.2);
      color: #4b3621;
      max-width: 420px;
      margin: auto;
    }

    .form-container h1 {
      margin-bottom: 25px;
      font-weight: bold;
      color: #5a3e2b;
    }

    .form-group label {
      font-weight: bold;
    }

    .btn-light {
      background-color: #d2b48c;
      color: white;
      font-weight: bold;
    }

    .btn-light:hover {
      background-color: #c2a67b;
    }
  </style>
</head>
<body>

  <div class="container text-center" style="margin-top: 120px;">
    <div class="form-container">
      <h1>اتصل بنا</h1>
      <form action="fun/add_us.php"  method="post">
                   >
        <div class="mb-3 text-start">
          <label class="form-label">الإسم الكامل</label>
          <input type="" name="the_name" class="form-control" required>
        </div>
         <div class="mb-3 text-start">
          <label class="form-label">رقم الهاتف</label>
          <input type="" name="phone" class="form-control" required>
        </div>
        <div class="mb-3 text-start">
          <label class="form-label">البريد الإلكتروني</label>
          <input type="email" name="e_mail" class="form-control" required>
        </div>
        <div class="mb-3 text-start">
          <label class="form-label">الرسالة</label>
          <input type="" name="msg" class="form-control" required>
        </div>
        <div class="d-grid">
          <input type="submit" value="إرسال" class="btn btn-light">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
