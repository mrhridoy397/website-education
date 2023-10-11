<?php require_once('./controller/CMSController.php'); ?>
<?php
$slider = new CMSController();
$Response = [];
$active = $slider->active;
$index = $slider->getSlider();
$settings = $slider->getSetting();
$teacher = $slider->allTeacher();
?>

<?php
require_once('./partials/header.php')
?>

<!-- ======================= Breadcrumb Start ============ -->
<section class="bradcrumb py-5">
			<div class="text-center py-3">
				<h3 class="text-center fw700 text-light">
				OUR TEACHER
				</h3>
				<p>
					<a href="index.php" class="about_home text-light">Home</a>
					<a href="teacher.php" class="about_ancor primary_color">Teacher</a>
				</p>
			</div>
		</section>
		<!-- ======================= Breadcrumb End ============ -->
		<!--======================== Course Section Start ================-->
		<section class="course py-5">
			<div class="container">
				<div class="title-section">
					<h1 class="title"><span>OUR</span>  TEACHER</h1>
				</div>
				<div class="row">
				<?php 
				foreach($teacher as $value){

					?>
				
				
					<div class="col-md-4 mt-3 ">
						<!-- Single Card Start -->
						
						<div class="card no-radius cus_border active_card_teacher ">
						
							<img src="<?php echo $value['image']; ?>" alt="!" class="img-thumbnail no-radius">
							<div class="card-body">
								<h5 class="text-center">
								<?php echo $value['name']; ?>
								</h5>
								<ul class="d-flex footer-icon justify-content-center teacher_icon">
									<li><a href="<?php echo $value['link1']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $value['link2']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $value['link3']; ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $value['link4']; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								</ul>
								
								<p class="text-center">
								<?php echo $settings[14]['description']; ?>
								</p>
								
							</div>
							
						</div>
						
						<!-- Single Card End -->
					</div>
					
					
					<?php
				}
				?></div>
				</div>
			</div>
		</section>
		<!--======================== Course Section End ================-->

<?php
require_once('./partials/cta.php')
?>

<?php
require_once('./partials/footer.php')
?>