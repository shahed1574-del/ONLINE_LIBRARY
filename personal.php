<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>الصفحة الشخصية</title>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        body {
            display: flex;
            justify-content: center;   /* أفقيًا */
            align-items: center;       /* عموديًا */
            height: 100vh;             /* ملء الشاشة */
            margin: 0;
            background-color: #f9f9f9; /* خلفية خفيفة */
        }

        .container {
            text-align: center;
        }

        button {
            background-color: #4caf50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            display: block;            /* ✅ تحت بعض */
            margin: 10px auto;         /* ✅ توسيط وتباعد */
            font-size: 16px;
            width: 200px;              /* ✅ نفس الحجم */
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php
    include 'navbar.php'; // ✅ هنا رح يجي متغير $jop من ملف الشريط
    ?>

    <div class="container">
        <a href="pass.php"><button>تغيير كلمة السر</button></a>

        <?php
        // ✅ الشرط رح يشتغل لأن $jop معرف داخل navbar.php
        if ($job == 'مدير') { ?>
            <a href="new_book.php?re="><button>إضافة كتاب جديد</button></a>
            <a href="search_user.php?n1="><button>المستخدمين</button></a>
            <a href="search_book.php"><button>الكتب</button></a>
            <a href="search_us.php"><button>رسائل الزوار</button></a>
            <a href="fun/report_books.php"><button>تقرير الاستعارات</button></a>


        <?php } ?>
    </div>
</body>
</html>
