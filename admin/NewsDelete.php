<?php require_once('./controller/NewsController.php'); ?>
<?php
$News = new NewsController();
$Response = [];
$active = $News->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $News->NewsDelete($_REQUEST['id']);

?>