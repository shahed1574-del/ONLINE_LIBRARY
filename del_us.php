<?php
include '../connect.php';
$id = $_GET['re'];
$sql = "DELETE FROM us WHERE id = '$id'";
$result = $conn->query($sql);
header('Location:http://localhost/ONLINE-LIBRARY1/search_us.php');
?>
