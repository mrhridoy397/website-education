<?php require_once('./controller/GalarycategorisController.php'); ?>
<?php
$galarycategoris = new GalarycategorisController();
$Response = [];
$active = $galarycategoris->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $galarycategoris->GalarycategorisDelete($_REQUEST['id']);

?>