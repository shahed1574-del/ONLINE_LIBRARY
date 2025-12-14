<?php
include '../connect.php';
$the_name = $_POST['the_name'];
$phone = $_POST['phone'];
$e_mail = $_POST['e_mail'];
$msg = $_POST['msg'];


$sql = "INSERT INTO us (the_name ,phone,e_mail,msg)
VALUES ('$the_name' ,'$phone' ,'$e_mail' ,'$msg' )";
$result2 = $conn->query($sql);
header('Location:http://localhost/ONLINE-LIBRARY1/us.php');
?>

