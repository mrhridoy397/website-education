<?php require_once('./controller/TestmonialController.php'); ?>
<?php
$testmonial = new TestmonialController();
$Response = [];
$active = $testmonial->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $testmonial->TestmonialDelete($_REQUEST['id']);

?>