<?php include 'navbar.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>رسائل الزوار</title>
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include 'connect.php';
$n1 = isset($_GET['n1']) ? $_GET['n1'] : '';
?>
<div class="container">
    <form method="get" action="search_us.php">
        <input type="text" name="n1" value="<?php echo htmlspecialchars($n1); ?>">
        <input type="submit" value="بحث">
    </form>
</div>

<table>
    <tr>
        <th>ا</th>
        <th>اسم المرسل</th>
        <th>رقم المرسل</th>
        <th>ايميل المرسل</th>
        <th>الرسالة</th>
        <th>حذف</th>
    </tr>
    <?php
    $no = 0;
    $sql = "SELECT * FROM us WHERE the_name LIKE '%$n1%' or phone LIKE '%$n1%' or e_mail LIKE '%$n1%' or msg LIKE '%$n1%' ";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $no++;
        $id = $row['id'];
        echo "<tr>
            <td>{$no}</td>
            <td>{$row['the_name']}</td>
            <td>{$row['phone']}</td>
            <td>{$row['e_mail']}</td>
            <td>{$row['msg']}</td>
            <td><a href='fun/del_us.php?re={$id}'>حذف</a></td>
        </tr>";
    }
    ?>
</table>
</body>
</html>
