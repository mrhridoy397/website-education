<?php require_once('./controller/CMSController.php'); ?>
<?php
$slider = new CMSController();
$Response = [];
$active = $slider->active;
$index = $slider->getSlider();
$settings = $slider->getSetting();
$teacher = $slider->getTeacher();
$Tcount = $slider->TeacherCount();
$Ccount = $slider->courseCount();
$Scount = $slider->studentCount();

?>

<?php 
	require_once('./partials/header.php')
?>
<style>
    .owl-carousel .owl-nav button.owl-next,
    .owl-carousel .owl-nav button.owl-prev {
        position: static !important;
        font-size: 22px !important;
        color: #fff !important;
        background: #56ab2f !important;
        padding-left: 15px !important;
        padding-right: 15px !important;
        margin-top: 7%;
        border-radius: 0px !important;
    }

    .owl-carousel .owl-nav button.owl-next:hover,
    .owl-carousel .owl-nav button.owl-prev:hover {
        background-color: transparent;
        color: #fff !important;
    }

    .owl-carousel .owl-nav button.owl-next:focus,
    .owl-carousel .owl-nav button.owl-prev:focus {
        border: transparent !important;
        outline: transparent !important;
    }
</style>

<!-- ======================= Breadcrumb Start ============ -->
<section class="bradcrumb py-5">
			<div class="text-center py-3">
				<h3 class="text-center fw700 text-light">
				ABOUT US
				</h3>
				<p>
					<a href="index.php" class="about_home text-light">Home</a>
					<a href="#" class="about_ancor primary_color">About</a>
				</p>
			</div>
		</section>
		<!-- ======================= Breadcrumb End ============ -->
		<!--------------- Principle Section Start  ---------------->
		<section class="principle">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-5 offset-md-1">
						<h2 class="text-ind fw900 pb-2">Message From The Principal</h2>
						<p class="text-justify">
                        <?php echo $settings[16]['description']; ?>
						</p>
						
					</div>
					<div class="col-md-6">
						<div class="ml-5 pl-5">
							<img src="assets/img/home/agadimy.png" alt="!" class="img-fluid">
						</div>
						<img src="./<?php echo $settings[15]['description']; ?>" alt="" class="img-fluid mt_50 max_200" >
					</div>
				</div>
				<div class="container">
					<p class="text-justify">
						Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat Ut wisien
						im ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat Duis autem vel eum iriure dolor in hen
						drerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesen
						t luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quodm
						azim placerat facer possim assumTypi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem Investigationes demonstraverunt lecto
						res legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quaml
						ittera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima Eodem modo typi
						qui nunc nobis videntur parum clari, fiant sollemnes in futurum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut lao
						reet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commod
						oconsequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros etac
						cumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleife
						nd option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eor
						um claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutation
						em consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seac
						ula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
					</p>
				</div>
			</div>
		</section>
		<!--------------- Principle Section End    ---------------->
		<!--------------- Facts Section Start  ------------------>
		<section class="facts py-5">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h2 class="text-left text-light">
						Important Facts
						</h2>
						<p class="text-light">
                        <?php echo $settings[18]['description']; ?>
						</p>
						<a href="contact.php" class="btn btn-outline-light">CONTACT US</a>
					</div>
					<div class="col-md-2 text-center">
						<h2 class="text-light pt-5 c_font_family"><?php echo $Tcount['Teacher']; ?>+</h2>
						<p class="text-light fw500">
							Teachers
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h2 class="text-light pt-5 c_font_family"><?php echo $Scount['Student']; ?>+</h2>
						<p class="text-light fw500">
							Students
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h2 class="text-light pt-5 c_font_family"><?php echo $Ccount['Course']; ?></h2>
						<p class="text-light fw500">
							Courses
						</p>
					</div>
					<div class="col-md-2 text-center">
						<h2 class="text-light pt-5 c_font_family">500+</h2>
						<p class="text-light fw500">
							Award Winning
						</p>
					</div>
				</div>
			</div>
		</section>
		<!--------------- Facts Section End    ------------------>
		<!--==================== Testimonial Section Start =======================-->
		<section class="teacher">
			<div class="container py-5">
				<div class="text-center">
					<h1 class="fw900">Our Teacher</h1>
					<p class="pb-5"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet<br>
					doming id quod mazim placerat facer possim assum.</p>
				</div>
				<!-- Slide -->
				
				<div class="teacher_slide owl-carousel owl-theme">
				<?php 
					foreach($teacher[0]  as $item){
						
					
				?>
					<!-- single card Start -->
					<div class="card no-radius active_card teacher_card ">
						<img src="./<?php echo $item['image']; ?>" alt="!" class="card-img-top no-radius">
						<div class="custom-card-body">
							<h5 class="text-center">
							<?php echo $item['name']; ?>
							</h5>
							<p class="text-center">
							<?php echo $item['desigmation']; ?>
							</p>
						</div>
						<div class="overlay_card">
							<ul class="overlay_list">
								<li><a href="<?php echo $item['link1']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="<?php echo $item['link2']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="<?php echo $item['link3']; ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								<li><a href="<?php echo $item['link4']; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<div class="card-body">
							<p class="text-center">
							<?php echo $item['education']; ?>
							</p>
						</div>
						</div>
						<!-- single card End -->
						<?php 
					}
					?>
					</div>
					
				</div>
			</section>
			<!--==================== Testimonial Section End =========================-->

<?php 
	require_once('./partials/cta.php')
?>

<?php 
	require_once('./partials/footer.php')
?>