<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../connect.php';

if (isset($_POST['n1'], $_POST['n2'])) {
    $n1 = $conn->real_escape_string($_POST['n1']);
    $n2 = $_POST['n2'];

    $sql = "SELECT * FROM users WHERE The_user='$n1' LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // ✅ التحقق من كلمة المرور المشفّرة
        if (password_verify($n2, $row['The_Password'])) {
            $_SESSION['online_library1'] = $n1;
            header('Location: ../index.php');
            exit();
        } else {
            $_SESSION['error'] = "❌ كلمة المرور غير صحيحة.";
            header('Location: ../login.php');
            exit();
        }
    } else {
        $_SESSION['error'] = "❌ اسم المستخدم غير موجود.";
        header('Location: ../login.php');
        exit();
    }
} else {
    $_SESSION['error'] = "❌ يرجى إدخال البيانات.";
    header('Location: ../login.php');
    exit();
}
