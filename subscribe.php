<?php require_once('./controller/CMSController.php');
// header("Content-Type: application/json", true);
$slider = new CMSController();
// $email = $_POST['email'];
$slider->CreateSubscribe($_REQUEST);
?>