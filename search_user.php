<?php include 'navbar.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>بحث المستخدمين</title>
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
    <form method="get" action="search_user.php">
        <input type="text" name="n1" value="<?php echo htmlspecialchars($n1); ?>">
        <input type="submit" value="بحث">
    </form>
</div>

<table>
    <tr>
        <th>ا</th>
        <th>اسم المستخدم</th>
        <th>الاسم الكامل</th>
        <th>الدور الوظيفي</th>
        <th>العنوان</th>
    </tr>
    <?php
    $no = 0;
    $sql = "SELECT * FROM users WHERE Full_name LIKE '%$n1%'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $no++;
        echo "<tr>
                <td>{$no}</td>
                <td>{$row['The_user']}</td>
                <td>{$row['Full_name']}</td>
                <td>
                    <form action='fun/update_user.php' method='post'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <select name='job'>
                            <option value='{$row['job']}'>{$row['job']}</option>
                            <option value='طالب'>طالب</option>
                            <option value='مدير'>مدير</option>
                            <option value='موظف'>موظف</option>
                        </select>
                        <input type='submit' value='حفظ'>
                    </form>
                </td>
                <td>{$row['Address']}</td>
              </tr>";
    }
    ?>
</table>
</body>
</html>
