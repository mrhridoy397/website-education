<?php require_once('./controller/CMSController.php');
// header("Content-Type: application/json", true);
$slider = new CMSController();
// $email = $_POST['email'];
$slider->CreateMassege($_REQUEST, $_FILES);
// echo json_encode($_FILES);
?>