<?php require_once('./controller/CMSController.php'); ?>
<?php
$slider = new CMSController();
$Response = [];
$active = $slider->active;
$index = $slider->getSlider();
$indexTestmonial = $slider->getSliders();
$indexNews = $slider->getsSlider();
$TwoNews = $slider->getTwoNews();
$settings = $slider->getSetting();
$Tcount = $slider->TeacherCount();
$Ccount = $slider->courseCount();
$Scount = $slider->studentCount();
// var_dump($indexTestmonial);

// if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $slider->CreateSubscribe($_REQUEST);
?>
<?php
require_once('./partials/header.php')
?>
<!-- Slider Start -->
<div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">

	<div class="carousel-inner">
		<?php
		$i = 1;
		foreach ($index[0] as $items) {
			echo $i;
		?>
			<div class="carousel-item  <?php if ($i == 1) {
											echo "active";
										} ?> position-rel">
				<img src="<?php echo $items['image']; ?>" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block position-abs  ">
					<h1 class="text-left text-dark fw-b "><?php echo $items['title']; ?></h1>
					<p class="text-left text-dark"><?php echo $items['shortDescription']; ?></p>
					<div class="text-left">
						<a href="<?php echo $items['btnOneLink']; ?>" class="btn btn-f"><?php echo $items['btnOne']; ?></a>
						<a href="<?php echo $items['btnTwoLink']; ?>" class="btn btn-f-o"><?php echo $items['btnTwo']; ?></a>
					</div>
				</div>
			</div>
		<?php $i++;
		} ?>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<!-- Slider End -->
<!-- About US Start -->
<section class="about-us">
	<div class="container-fluid py-5">
		<div class="row">
			<div class="col-md-5 offset-md-1 pt-5">
				<h1>
					Message From The Principal
				</h1>
				<p class="text-justify pt-5">
					<?php echo $settings[16]['description']; ?>
				</p>
				<p class="sign pt-3">
					<img src="<?php echo $settings[17]['description']; ?>" alt=""><br>
					<span>Principal of Educare</span>
				</p>
			</div>
			<div class="col-md-6">
				<div class="acady">
					<img src="<?php echo $settings[15]['description']; ?>" alt="" class="princ">
				</div>
			</div>
		</div>
	</div>
</section>
<!-- About End -->
<!-- Course Section Start -->
<?php
$courses = $slider->getCourses();
if (!empty($courses)) {
?>

	<section class="course ">
		<div class="container py-5">
			<h1 class="text-center fw-b">
				Our Popular Courses
			</h1>
			<p class="text-center">
				<?php echo $settings[19]['description']; ?>
			</p>
			<div class="row">
				<div class="col-md-12">
					<div class="owl-carousel owl-theme">
						<?php

						foreach ($courses[0] as $items) {
						?>
							<div class="item">
								<div class="card btn-f-o-h">
									<img src="<?php echo $items['image']; ?>" alt="" class="card-img-top">
									<div class="card-body custom-card">
										<h4 class="text-center"><?php echo ($items['courseName']); ?></h4>
										<p class="text-center">
											by <span class="f-color">
												<?php
												$teacher = $slider->getSelectTeacher($items['teacherId']);
												echo $teacher['name'];
												?>
											</span>
										</p>
										<p class="text-center">
											<?php
											echo $items['courseAbout'];
											?>
										</p>
										<ul class="d-flex justify-content-between course-list">
											<li><i class="fa fa-user"> 389</i> </li>
											<li><a href="courseDetails.php?id=<?php echo $items['id']; ?>" >APPLAY NOW</a></li>
											<li><i class="fa fa-usd"></i><?php echo $items['coursefee']; ?></li>
										</ul>
									</div>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>
			</div>
			<div class="text-center py-5">
				<a href="course.php" class="btn btn-f-o">BROWSE ALL COURSES</a>
			</div>
		</div>
	</section>

<?php
}
?>
<!-- Course Section End -->
<!-- Fatcs Section Start -->
<section class="facts">
	<div class="container py-5">
		<div class="row">
			<div class="col-md-4">
				<h2 class="text-left text-light pt-3 fw-bold">Important Facts</h2>
				<p class="text-left text-light">
					<?php echo $settings[18]['description']; ?>
				</p>
				<a href="contact.php" class="btn contact-btn">CONTACT US</a>
			</div>
			<div class="col-md-2">
				<h2 class="text-center text-light pt-5 fw-bold number-family"><?php echo $Tcount['Teacher']; ?>+</h2>
				<p class="text-center text-light">
					Teachers
				</p>
			</div>
			<div class="col-md-2">
				<h2 class="text-center text-light pt-5 fw-bold number-family"><?php echo $Scount['Student']; ?>+</h2>
				<p class="text-center text-light">
					Students
				</p>
			</div>
			<div class="col-md-2">
				<h2 class="text-center text-light pt-5 fw-bold number-family"><?php echo ($Ccount['Course']);  ?>+</h2>
				<p class="text-center text-light">
					Courses
				</p>
			</div>
			<div class="col-md-2">
				<h2 class="text-center text-light pt-5 fw-bold number-family">500+</h2>
				<p class="text-center text-light">
					Award Winning
				</p>
			</div>
		</div>
	</div>
</section>
<!-- Fatcs Section Start -->
<!-- Blog Section Start -->
<section class="blog">
	<div class="container py-5">
		<h1 class="text-center fw-bold">
			Recent News
		</h1>
		<p class="text-center">
			<?php echo $settings[20]['description']; ?>
		</p>
		<div class="row py-5">
			<?php
			// foreach($indexNews[0] as $item){
			// var_dump($indexNews[0]);
			// var_dump($TwoNews);
			?>
			<div class="col-md-6">
				<div class="card btn-f-o-h">
					<img src="<?php echo $indexNews[0]['image']; ?>" alt="!">
					<div class="card-body pb-0">
						<h5 class="card-title text-left"><?php echo $indexNews[0]['title']; ?></h5>
						<p class="card-text">By <span class="f-color"><?php echo $indexNews[0]['author']; ?></span></p>
						<p class="card-text number-family">
							<?php
							$date = date('d M Y', strtotime($indexNews[0]['create_at']));
							echo $date;
							?>
							| <i class="fa fa-comments" aria-hidden="true"></i> 
							<?php
												$comment = $slider->totalBlogComment($indexNews[0]['id']);
												echo $comment['totalComment'];
											?>
						</p>
						<p class="card-text">
							<?php echo $indexNews[0]['shortDescription']; ?>
						</p>
						<a href="blogread.php?id=<?php echo $indexNews[0]['id']; ?>" class="btn pl-0">READ MORE <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<?php
				foreach ($TwoNews[0] as  $value) {
				?>
					<div class="card mb-4">
						<div class="card-body p-0  btn-f-o-h">
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-6 p-0 ">
										<img src="<?php echo $value['image']; ?>" alt="!" class="img-fluid" style="height:100%">
									</div>
									<div class="col-md-6">
										<h5 class="card-title text-left"><?php echo $value['title']; ?></h5>
										<p class="card-text">By <span class="f-color"><?php echo $value['author']; ?></span></p>
										<p class="card-text number-family">
											<?php
											// echo $value['create_at'];
											$date = date('d M Y', strtotime($value['create_at']));
											echo $date;
											?>
											| <i class="fa fa-comments" aria-hidden="true"></i>
											<?php
												$comment = $slider->totalBlogComment($value['id']);
												echo $comment['totalComment'];
											?>
										</p>
										<p class="card-text" style="height: 50px !important;overflow: hidden !important;">
											<?php echo $value['shortDescription']; ?>
										</p>
										<a href="blogread.php?id=<?php echo $value['id']; ?>" class="btn pl-0">READ MORE <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="text-center py-5">
			<a href="blog.php" class="btn btn-f-o">BROWSE ALL NEWSES</a>
		</div>
	</div>
</section>
<!-- Blog Section End -->
<!-- TESTIMONIAL Section Start -->
<section class="testmonial">
	<div class="container py-5">
		<h1 class="text-center fw-bold">
			What Student Says?
		</h1>
		<p class="text-center">
			<?php echo $settings[21]['description']; ?>
		</p>
		<div class="row py-5 ">
			<div class="col-md-12 ">

				<div class="testimonial owl-carousel owl-theme ">
					<?php

					foreach ($indexTestmonial[0] as $item) {

					?>
						<div class="item ">
							<div class="recent btn-f-o-h">
								<img src="<?php echo $item['image']; ?>" class="recent-img " alt="!">
								<div class="card-body bg-light pt-5 recent-card ">
									<p class="text-justify pt-3">
										<?php echo $item['massage']; ?>
									</p>
									<p class="pt-3">
										<span class="fw900"><?php echo $item['name']; ?></span> <br>
										<?php echo $item['class']; ?>
									</p>
								</div>
							</div>
						</div>

					<?php } ?>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- TESTIMONIAL Section End -->
<?php
require_once('./partials/cta.php')
?>

<?php
require_once('./partials/footer.php');
?>