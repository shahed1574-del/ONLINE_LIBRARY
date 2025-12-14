<?php
include '../connect.php';
session_start(); // لإدارة الرسائل عبر الـ Session

if (
    isset($_POST['The_user']) &&
    isset($_POST['Full_name']) &&
    isset($_POST['The_password']) &&
    isset($_POST['Address']) &&
    isset($_POST['job']) &&
    isset($_POST['confirm'])
) {
    $the_user     = trim($_POST['The_user']);
    $Full_name    = trim($_POST['Full_name']);
    $The_password = trim($_POST['The_password']);
    $Address      = trim($_POST['Address']);
    $job    = trim($_POST['job']);
    $confirm      = trim($_POST['confirm']);

    // التحقق من تطابق كلمة المرور والتأكيد

       if ($The_password !== $confirm) {
    $_SESSION['error'] = "❌ كلمة المرور وتأكيدها غير متطابقين.";
    header('Location: http://localhost/ONLINE-LIBRARY1/signup.php?re=1');
    exit();
}


    // تأمين البيانات
    $the_user  = $conn->real_escape_string($the_user);
    $Full_name = $conn->real_escape_string($Full_name);
    $Address   = $conn->real_escape_string($Address);
    $jop   = $conn->real_escape_string($job);

    // تشفير كلمة المرور
    $hashed_password = password_hash($The_password, PASSWORD_DEFAULT);

    // إدخال البيانات في قاعدة البيانات
    $sql = "INSERT INTO users (The_user, Full_name,job, The_Password, Address)
            VALUES ('$the_user', '$Full_name','$job', '$hashed_password', '$Address')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "✅ تم إضافة المستخدم بنجاح.";
        header('Location: http://localhost/ONLINE-LIBRARY1/signup.php');
        exit();
    } else {
        $_SESSION['error'] = "❌ خطأ في الإدخال: " . $conn->error;
        header('Location: http://localhost/ONLINE-LIBRARY1/signup.php?re=2');
        exit();
    }
} else {
    $_SESSION['error'] = "⚠️ بعض الحقول ناقصة، يرجى التحقق من البيانات المرسلة.";
    header('Location: http://localhost/ONLINE-LIBRARY1/signup.php?re=3');
    exit();
}
?>