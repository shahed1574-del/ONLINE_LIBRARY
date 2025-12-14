<?php
include '../connect.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$the_book = $_GET['id'];
$The_user = $_SESSION['online_library1'];
$order_time = (new \DateTime())->format('Y-m-d H:i:s');
$order_status = 'طلب';

// 1. جلب عدد النسخ الكلي من جدول الكتب
$sql = "SELECT count_book FROM books WHERE id = $the_book";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_copies = $row['count_book'];

// 2. تعريف المتغيرات (المستعارة والمتاحة) باستخدام Session حتى تبقى محفوظة
$borrowed = isset($_SESSION['borrowed_'.$the_book]) ? $_SESSION['borrowed_'.$the_book] : 0;
$available = $total_copies - $borrowed;

// 3. التحقق إذا فيه نسخ متاحة
if ($available > 0) {
    // تسجيل طلب الاستعارة في جدول الطلبات
    $sql = "INSERT INTO borrow_a_book (the_book, The_user, order_time, order_status)
            VALUES ('$the_book', '$The_user', '$order_time', '$order_status')";
    $conn->query($sql);

    // تحديث المتغيرات
    $borrowed++;
    $_SESSION['borrowed_'.$the_book] = $borrowed;
    $available = $total_copies - $borrowed;

    // رجوع للصفحة مع تمرير القيم
    header("Location:http://localhost/ONLINE-LIBRARY1/book.php?msg=تمت الاستعارة بنجاح&total=$total_copies&borrowed=$borrowed&available=$available");
    exit;
} else {
    // إذا ما فيه نسخ متاحة
    header("Location:http://localhost/ONLINE-LIBRARY1/book.php?msg=لا توجد نسخ متاحة&total=$total_copies&borrowed=$borrowed&available=$available");
    exit;
}
?>
