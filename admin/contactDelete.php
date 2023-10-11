<?php require_once('./controller/contactController.php'); ?>
<?php
$student = new contactModels();
$Response = [];
$active = $student->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $student->delete($_REQUEST['id']);

?>