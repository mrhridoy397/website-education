<?php require_once('./controller/CustomPageController.php'); ?>
<?php
$custompage = new CustomPageController();
$Response = [];
$active = $custompage->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $custompage->CustomPageDelete($_REQUEST['id']);

?>