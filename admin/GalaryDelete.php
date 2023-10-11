<?php require_once('./controller/GalaryController.php'); ?>
<?php
$galary = new GalaryController();
$Response = [];
$active = $galary->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $galary->GalaryDelete($_REQUEST['id']);

?>