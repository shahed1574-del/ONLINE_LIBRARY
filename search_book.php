<?php
include 'connect.php';
include 'navbar.php'; 
$n1 = isset($_GET['n1']) ? $_GET['n1'] : '';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>بحث الكتب</title>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        * {
            direction: rtl;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }
        tr, td, th {
            padding: 10px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        th {
            background-color: #04aa6d;
            color: white;
        }
        .container {
            width: 500px;
            margin: 100px auto;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <form method="get" action="search_book.php">
        <input type="text" name="n1" value="<?php echo htmlspecialchars($n1); ?>">
        <input type="submit" value="بحث">
    </form>
</div>

<table>
    <tr>
        <th>ا</th>
        <th>اسم الكتاب</th>
        <th>اسم المؤلف</th>
        <th>اسم دار النشر</th>
        <th>الرقم المرجعي</th>
        <th>صورة الغلاف</th>
        <th>عدد النسخ الكلي</th>
        <th>المستعار</th>
        <th>المتاح</th>
    </tr>
    <?php
    $no = 0;
    $n1_safe = $conn->real_escape_string($n1); 
    $sql = "SELECT * FROM books WHERE book_name LIKE '%$n1_safe%' 
            OR author_name LIKE '%$n1_safe%' 
            OR publishing_house_name LIKE '%$n1_safe%' 
            OR reference_number LIKE '%$n1_safe%'";

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $no++;

        // عدد النسخ الكلي من الجدول
        $total_copies = $row['count_book'];

        // متغير يمثل عدد النسخ المستعارة (مبدئياً صفر أو من Session)
        $borrowed = isset($_SESSION['borrowed_'.$row['id']]) ? $_SESSION['borrowed_'.$row['id']] : 0;

        // حساب المتاح
        $available = $total_copies - $borrowed;

        echo "<tr>
            <td>{$no}</td>
            <td>{$row['book_name']}</td>
            <td>{$row['author_name']}</td>
            <td>{$row['publishing_house_name']}</td>
            <td>{$row['reference_number']}</td>
            <td>
                <a href='img/{$row['cover_photo']}'>
                    <img style='width:50px; height:50px;' src='img/{$row['cover_photo']}'>
                </a>
            </td>
             <td>{$row['count_book']}</td>
            <td>{$borrowed}</td>
            <td>{$available}</td>
        </tr>";
    }
    ?>
</table>
</body>
</html>
