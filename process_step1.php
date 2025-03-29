<?php
session_start();

$_SESSION['roll_number'] = $_POST['roll_number'];
$_SESSION['name'] = $_POST['name'];
$_SESSION['fathers_name'] = $_POST['fathers_name'];
$_SESSION['mothers_name'] = $_POST['mothers_name'];
$_SESSION['adhar'] = $_POST['adhar'];
$_SESSION['course'] = $_POST['course'];
$_SESSION['mobile'] = $_POST['mobile'];
$_SESSION['course_fee'] = $_POST['course_fee'];
$_SESSION['paid_fee'] = $_POST['paid_fee'];
$_SESSION['remaining_fee'] = $_POST['remaining_fee'];
$_SESSION['address'] = $_POST['address'];

header("Location: step2.html");
exit();
?>
