<?php require_once('./controller/NewsCommentController.php'); ?>
<?php
$comments = new NewsCommentModels();
$Response = [];
$active = $comments->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $comments->delete($_REQUEST['id']);

?>