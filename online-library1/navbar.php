<?php
if (session_status() === PHP_SESSION_NONE) { session_start();
}
include 'connect.php';

$Full_name = "";
$job = "";

if (isset($_SESSION['online_library1'])) {
    $n1 = $_SESSION['online_library1'];
    $sql = "SELECT * FROM users WHERE The_user = '$n1'";
    $result = $conn->query($sql);
    if ($result && $row = $result->fetch_assoc()) {
        $Full_name = $row['Full_name'];
        $job = $row['job'];
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>شكل التكوين الخاص بك</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<div style="width: 100%; position: fixed; top: 0;">
    <ul>
   <li><a href="/ONLINE-LIBRARY1/us.php">اتصل بنا</a></li>
<li><a href="/ONLINE-LIBRARY1/plan.php">الخطة</a></li>
<li><a href="/ONLINE-LIBRARY1/team.php">فريق العمل</a></li>
<li><a href="/ONLINE-LIBRARY1/book.php">الكتب</a></li>
<li><a href="/ONLINE-LIBRARY1/about_lib.php">حول</a></li>
<li><a href="/ONLINE-LIBRARY1/index.php">الصفحة الرئيسية</a></li>

        <?php if (!isset($_SESSION['online_library1'])): ?>
            <li style="float: right;"><a href="login.php">تسجيل الدخول</a></li>
        <?php else: ?>
            <li style="float:right;"><a href="logout.php">تسجيل خروج</a></li>
            <li style="float:right;"><a href="personal.php">الصفحة الشخصية</a></li>
        <?php endif; ?>
    </ul>
</div>
</body>
</html>
