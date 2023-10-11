<?php require_once('./controller/CMSController.php'); ?>
<?php
$slider = new CMSController();
$Response = [];
$active = $slider->active;
$index = $slider->getSlider();
$settings = $slider->getSetting();

?>

<?php 
	require_once('./partials/header.php')
?>


<?php 
	require_once('./partials/cta.php')
?>

<?php 
	require_once('./partials/footer.php')
?>