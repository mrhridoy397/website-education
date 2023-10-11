<?php require_once('./controller/EventController.php'); ?>
<?php
$event = new EventController();
$Response = [];
$active = $event->active;
// $IndexBatch = $Batch->getBatch();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $event->EventDelete($_REQUEST['id']);

?>