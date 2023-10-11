<?php 
$galary = new CMSController();
$galaryCategoris = $galary->getGalaryCategoris();
// var_dump();
?>
<!-- Footer Section Start -->
<footer class="footer t-bg">
			<div class="container py-5">
				<div class="row">
					<div class="col-md-3">
						<img src="<?php echo $settings[13]['description']; ?>" alt="!">
						<p class="text-justify text-light pt-3">
						<?php echo $settings[14]['description']; ?>
						</p>
						<ul>
						<li><a href="tel:<?php echo $settings[3]['description']; ?>" class="s-color number-family"><i class="fa fa-phone" aria-hidden="true"> </i> <span><?php echo $settings[3]['description']; ?></span></a></li>
						<li><a href="mailto:<?php echo $settings[4]['description']; ?>" class="s-color"><i class="fa fa-envelope" aria-hidden="true"></i> <span><?php echo $settings[4]['description']; ?></span></a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<h5 class="text-light pt-2">Link</h5>
						<div class="row pt-3">
							<div class="col-6">
								<ul class="left-link">
								<li><a href="index.php"><span class="fa fa-angle-right f-color"></span> Home</a></li>
								<li><a href="course.php"><span class="fa fa-angle-right f-color"></span> Courses</a></li>
								<li><a href="blog.php"><span class="fa fa-angle-right f-color"></span> News</a></li>
								<li><a href="events.php"><span class="fa fa-angle-right f-color"></span> Events</a></li>
							</ul>
							</div>
							<div class="col-6">
								<ul class="left-link">
								<li><a href="galary.php"><span class="fa fa-angle-right f-color"></span> Gallery</a></li>
								<li><a href="course.php"><span class="fa fa-angle-right f-color"></span> Courses</a></li>
								<li><a href="blog.php"><span class="fa fa-angle-right f-color"></span> News</a></li>
								<li><a href="events.php"><span class="fa fa-angle-right f-color"></span> Events</a></li>
							</ul>
							</div>
							
						</div>
						
					</div>
					<div class="col-md-2">
						<h5 class="text-light pt-2">Support</h5>
						<div class="row pt-3">
							<div class="col-12">
								<ul class="left-link">
								<li><a href="#"><span class="fa fa-angle-right f-color"></span> Documentation</a></li>
								<li><a href="#"><span class="fa fa-angle-right f-color"></span> Forums</a></li>
								<li><a href="#"><span class="fa fa-angle-right f-color"></span> Language Packs</a></li>
								<li><a href="#"><span class="fa fa-angle-right f-color"></span> Release Status</a></li>
							</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<h5 class="text-light pt-2 text-center">Flickr Album</h5>
						<div class="">
						
						<div class="row pt-3">
						<?php 
							
							foreach($galaryCategoris as $item){
							?>
							<div class="col-4">
								<a href="galaryDetails.php?gid=<?php echo $item['id']; ?>">
									<img src="<?php echo $item['image']; ?>" style="height:120px;width:120px"> 
								</a>
							</div>
							<?php }?>
						</div>
						
						</div>
					</div>
				</div>
			</div>
			<div class="container pb-3">
				<div class="line ">
					<div class="d-flex justify-content-between c-line">
						<div class="left-text pt-3">
							<p class="text-left text-light">
								<?php echo $settings[11]['description']; ?>  
							</p>
						</div>
						<div class="mid-text pt-3">
							<p class="text-left text-light">
							<?php echo $settings[12]['description']; ?>
							</p>
						</div>
						<div class="right-text pt-3">
							<ul class="d-flex footer-icon">
								<li><a href="<?php echo $settings[6]['description']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="<?php echo $settings[7]['description']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="<?php echo $settings[8]['description']; ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								<li><a href="<?php echo $settings[9]['description']; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="<?php echo $settings[10]['description']; ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- Footer Section End -->
		
		<!-- Bootstrap v4.5.3 -->
		<script src="assets/js/bootstrap.min.js"></script>
		<!-- owl carousel Js -->
		<script src="assets/js/owl.carousel.min.js"></script>
		<!-- magic popup js -->
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<!-- Main Js -->
		<!-- <script src="assets/js/sweetalert2.js"></script> -->
		<script src="assets/js/main.js"></script>
		
	</body>
</html>