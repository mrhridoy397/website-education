<?php require_once('./controller/StuffController.php'); ?>
<?php
$Batch = new Stuff();
$Response = [];
$active = $Batch->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $Batch->delete($_REQUEST['id']);

?>