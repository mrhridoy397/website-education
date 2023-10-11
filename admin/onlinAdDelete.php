<?php require_once('./controller/onlineAdmission.php'); ?>
<?php
$student = new onlineAdmission();
$Response = [];
$active = $student->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $student->delete($_REQUEST['id']);

?>