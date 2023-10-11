<?php require_once('./controller/CMSController.php'); ?>
<?php
$slider = new CMSController();
$Response = [];
$active = $slider->active;
$index = $slider->getSlider();
$settings = $slider->getSetting();
$event = $slider->AllEvents();

?>

<?php 
	require_once('./partials/header.php')
?>
<!-- ======================= Breadcrumb Start ============ -->
<section class="bradcrumb py-5">
			<div class="text-center py-3">
				<h3 class="text-center fw700 text-light">
				OUR EVENTS
				</h3>
				<p>
					<a href="index.php" class="about_home text-light">Home</a>
					<a href="events.php" class="about_ancor primary_color">Event</a>
				</p>
			</div>
		</section>
		<!-- ======================= Breadcrumb End ============ -->

		<section class="course py-5">
    <div class="container">
        <div class="row">
            <?php
			if(!empty($event)){
            foreach ($event as $item) {
            ?>
                <div class="col-md-4 mt-3">
                    <!-- Single Card Start -->
                    <div class="card btn-f-o-h">
					<img src="<?php echo $item['image']; ?>" alt="!">
					<div class="card-body pb-0">
						<h5 class="card-title text-left"><?php echo $item['eventName']; ?></h5>
						<p class="card-text"><i class="fa fa-map-marker"></i> Venue : <?php echo $item['vanue']; ?></p>
						<p class="card-text number-family"><i class="fa fa-clock-o"></i> Start : 
							<?php
							$date = date('d-m-y', strtotime($item['eventStartDate']));
							echo $date;
							?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<i class="fa fa-clock-o"></i>  End : <?php
							$date = date('d-m-Y', strtotime($item['eventEndDate']));
							echo $date;
							?>
						<p class="card-text">
							<?php 
								$string = $item['eventDetails'];
								$string = (strlen($string) > 13) ? substr($string,0,100).'...' : $string;
								echo $string;
							  ?>
						</p>
						<a href="Eventread.php?id=<?php echo $item['id']; ?>" class="btn pl-0">READ MORE <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>
                    <!-- Single Card End -->
                </div>
            <?php } }else{ echo "Empty" ;} ?>
            <!-- Single Card End -->
        </div>

    </div>
    </div>
</section>

<?php 
	require_once('./partials/cta.php')
?>

<?php 
	require_once('./partials/footer.php')
?>