<?php include 'navbar.php'; ?>
<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>الكتب</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- ملف التنسيقات الخاص بك -->
  <link rel="stylesheet" href="style.css">

  <style>
    body {
      background-color: #f8f9fa;
    }
    h1 {
      margin-top: 120px;
      text-align: center;
      margin-bottom: 40px;
      font-weight: bold;
    }
    .book-card {
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      border-radius: 8px;
      background-color: #fff;
      padding: 15px;
      margin-bottom: 30px;
      text-align: center;
      transition: transform 0.3s;
    }
    .book-card:hover {
      transform: translateY(-5px);
    }
    .book-card img {
      width: 100%;
      height: auto;
      max-height: 300px;
      object-fit: cover;
      border-radius: 4px;
    }
    .book-card h5 {
      margin-top: 15px;
      font-size: 18px;
      font-weight: bold;
    }
    .book-card p {
      margin: 5px 0;
      color: #555;
    }
  </style>
</head>
<body>

  <h1>الكتب المتوفرة</h1>

  <div class="container">
    <div class="row">
      <?php
        $sql = "SELECT * FROM books LIMIT 8";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
      ?>
        <div class="col-md-4 col-lg-3">
          <div class="book-card">
            <img src="img/<?php echo $row['cover_photo']; ?>" alt="غلاف الكتاب">
            <h5><?php echo $row['book_name']; ?></h5>
            <p><?php echo $row['author_name']; ?></p>
            <p><?php echo $row['publishing_house_name']; ?></p><br>
            <a href="<?php if (!isset($_SESSION['online_library1'])){ 
              echo'login.php';
            } 
            
            if (isset($_SESSION['online_library1'])){ 
             echo 'fun/borrow_a_book.php?id=' . $row['id'];

            }
            ?>"><button>طلب استعارة</button></a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

</body>
</html>
