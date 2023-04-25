<?php
include 'config.php';
session_start();
$sql = mysqli_query($db, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
$row = mysqli_fetch_assoc($sql);


$name = $row['user'];
$ask = $_POST['ask'];
$title = $_POST['title'];

$row = mysqli_num_rows(mysqli_query($db, "select * from questions")) + 1;
$query = "insert into questions(id, user, title, question, answer, felrakva) values('$row', '$name', '$title', '$ask', '', CURRENT_TIMESTAMP)";

$is_success = "";
header("location:../ask.php");
?>
