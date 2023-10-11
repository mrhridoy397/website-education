<?php require_once('./controller/CMSController.php'); ?>
<?php
$slider = new CMSController();
$Response = [];
$active = $slider->active;
$index = $slider->getSlider();
$settings = $slider->getSetting();
$event = $slider->EventDetails($_REQUEST['id']);
$eventsidebar = $slider->EventSidebars();
?>

<?php
require_once('./partials/header.php')
?>
<section class="bradcrumb py-5">
    <div class="text-center py-3">
        <h3 class="text-center fw700 text-light">
            Event
        </h3>
        <p>
            <a href="index.php" class="about_home text-light">Home</a>
            <a href="events.php" class="about_home text-light">All Event</a>
            <a class="about_ancor primary_color"><?php echo $event['eventName']; ?></a>
        </p>
    </div>
</section>
<div class="container my-5">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <img src="<?php echo $event['image']; ?>" alt="!">
                <div class="card-body pb-0">
                    <h5 class="card-title text-left"><?php echo $event['eventName']; ?></h5>
                    <p class="card-text"><i class="fa fa-map-marker"></i> Venue : <?php echo $event['vanue']; ?></p>
                    <p class="card-text number-family"><i class="fa fa-clock-o"></i> Start : 
							<?php
							$date = date('d-m-y', strtotime($event['eventStartDate']));
							echo $date;
							?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<i class="fa fa-clock-o"></i>  End : <?php
							$date = date('d-m-Y', strtotime($event['eventEndDate']));
							echo $date;
							?>
                     <p class="card-text">       
                    <?php echo $event['eventDetails']; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title text-center">
                        Events
                    </h2>
                </div>
                <div class="card-body">
                    <?php
                    foreach ($eventsidebar as  $items) {
                    ?>
                        <div class="card shadow mb-2 btn-f-o-h">
                            <img src="<?php echo $items['image'] ?>" alt="" class="card-img-top">
                            <div class="card-body">
                                <h6 class="card-title"><?php echo $items['eventName'] ?></h6>
                                <p class="card-text number-family"><i class="fa fa-clock-o"></i> Start : 
                                <?php
                                $date = date('d-m-y', strtotime($items['eventStartDate']));
                                echo $date;
                                ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="fa fa-clock-o"></i>  End : <?php
                                $date = date('d-m-Y', strtotime($items['eventEndDate']));
                                echo $date;
                                ?>
                                <a href="Eventread.php?id=<?php echo $items['id'] ?>" class="btn-link">Read More</a>
                            </div>
                          </div>
                          <br><br>
                        <?php
                    }
                        ?>
                        

                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once('./partials/cta.php')
?>

<?php
require_once('./partials/footer.php')
?>