<?php
include '../connect.php';
$n1 = $_POST['n1']; // كلمة المرور الحالية
$n2 = $_POST['n2']; // كلمة المرور الجديدة
$n3 = $_POST['n3']; // تأكيد كلمة المرور الجديدة

session_start();
$the_user = $_SESSION['online_library1'];

// جلب كلمة المرور المشفرة من قاعدة البيانات
$sql = "SELECT The_password FROM users WHERE The_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $the_user);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $hashed_password = $row['The_password'];
} else {
    // المستخدم غير موجود
    header('location:http://localhost/ONLINE-LIBRARY1/pass.php?re=3');
    exit();
}

// التحقق من كلمة المرور الحالية
if (!password_verify($n1, $hashed_password)) {
    header('Location:http://localhost/ONLINE-LIBRARY1/pass.php?re=1');
    exit();
}

// التحقق من تطابق كلمة المرور الجديدة والتأكيد
if ($n2 !== $n3) {
    header('Location:Location:http://localhost/ONLINE-LIBRARY1/pass.php?re=2');
    exit();
}

// تشفير كلمة المرور الجديدة
$new_hashed_password = password_hash($n2, PASSWORD_DEFAULT);

// تحديث كلمة المرور في قاعدة البيانات
$sql = "UPDATE users SET The_password = ? WHERE The_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $new_hashed_password, $the_user);
$stmt->execute();

header('Location:http://localhost/ONLINE-LIBRARY1/personal.php');
?>
