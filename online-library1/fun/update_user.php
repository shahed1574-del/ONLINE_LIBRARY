<?php
include '../connect.php'; // الاتصال بقاعدة البيانات

$id = $_POST['id'];       // رقم المستخدم (المفتاح الأساسي)
$job = $_POST['job'];     // الدور الجديد

$sql = "UPDATE users SET job='$job' WHERE id='$id'";
$result = $conn->query($sql);

// إعادة التوجيه بعد التحديث
header('Location: http://localhost/online_library/search_user.php');
?>
