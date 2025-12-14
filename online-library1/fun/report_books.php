<?php
include '../connect.php';
include '../navbar.php';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>تقرير المكتبة</title>
<link rel="stylesheet" href="../report_style.css">
<link rel="stylesheet" href="../style.css">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        padding: 30px;
    }
    h2 {
        text-align: center;
        color: #333;
        margin-top: 50px;
    }
    table {
        width: 90%;
        margin: 30px auto;
        border-collapse: collapse;
        text-align: center;
    }
    th, td {
        padding: 12px;
        border: 1px solid #ccc;
    }
    th {
        background-color: #04aa6d;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    img {
        width: 60px;
        height: auto;
    }
    .status {
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 4px;
        display: inline-block;
    }
    .status.طلب {
        background-color: #ffc107;
        color: #000;
    }
    .status.موافق {
        background-color: #4caf50;
        color: #fff;
    }
    .status.مرفوض {
        background-color: #f44336;
        color: #fff;
    }
</style>
</head>
<body>

<h2>📖 تقرير طلبات الاستعارة</h2>

<?php
$query = "SELECT b.id, b.the_user, bk.book_name, b.order_time, b.order_status, b.nots, 
                 b.borrowing_date, b.replay_date
          FROM borrow_a_book b
          JOIN books bk ON b.the_book = bk.id
          ORDER BY b.order_time DESC";

$result = $conn->query($query);

echo "<table>
        <tr>
            <th>م</th>
            <th>اسم الكتاب</th>
            <th>اسم الطالب</th>
            <th>وقت الطلب</th>
            <th>حالة الطلب</th>
            <th>تاريخ الاستعارة</th>
            <th>تاريخ الإعادة</th>
            <th>ملاحظات</th>
        </tr>";

$counter = 1;

while ($row = $result->fetch_assoc()) {
    $status_class = str_replace(" ", "_", $row['order_status']);

    echo "<tr>
            <td>{$counter}</td>
            <td>{$row['book_name']}</td>
            <td>{$row['the_user']}</td>
            <td>{$row['order_time']}</td>
            <td><span class='status {$status_class}'>{$row['order_status']}</span></td>
            <td>{$row['borrowing_date']}</td>
            <td>{$row['replay_date']}</td>
            <td>{$row['nots']}</td>
          </tr>";
    $counter++;
}

echo "</table>";
?>

<h2>📚 تقرير أرصدة المكتبة</h2>

<?php
$query2 = "SELECT book_name, author_name, publishing_house_name, reference_number, 
                  cover_photo, count_book 
           FROM books";

$result2 = $conn->query($query2);

echo "<table>
        <tr>
            <th>اسم الكتاب</th>
            <th>اسم المؤلف</th>
            <th>دار النشر</th>
            <th>رقم المرجع</th>
            <th>عدد النسخ</th>
            <th>صورة الغلاف</th>
        </tr>";

while ($row = $result2->fetch_assoc()) {
    echo "<tr>
            <td>{$row['book_name']}</td>
            <td>{$row['author_name']}</td>
            <td>{$row['publishing_house_name']}</td>
            <td>{$row['reference_number']}</td>
            <td>{$row['count_book']}</td>
            <td><img src='../img/{$row['cover_photo']}'></td>
          </tr>";
}

echo "</table>";
?>

</body>
</html>
