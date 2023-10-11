<?php require_once('./controller/CourseController.php'); ?>
<?php
$Batch = new Course();
$Response = [];
$active = $Batch->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $Batch->delete($_REQUEST['id']);

?>