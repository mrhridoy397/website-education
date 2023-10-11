<?php require_once('./controller/Batch.php'); ?>
<?php
$Batch = new Batch();
$Response = [];
$active = $Batch->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $Batch->deleteBatchData($_REQUEST['id']);

?>