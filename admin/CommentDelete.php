<?php require_once('./controller/CommentController.php'); ?>
<?php
$student = new CommentModels();
$Response = [];
$active = $student->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $student->delete($_REQUEST['id']);

?>