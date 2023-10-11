<?php require_once('./controller/CMSController.php'); ?>
<?php
$slider = new CMSController();
$Response = [];
$active = $slider->active;
$index = $slider->getSlider();
$settings = $slider->getSetting();
// if (isset($_REQUEST) && count($_REQUEST) > 1) $Response = $slider->CreateMassege($_REQUEST, $_FILES);

?>

<?php
require_once('./partials/header.php')
?>
<!-- ======================= Breadcrumb Start ============ -->
<section class="bradcrumb py-5">
	<div class="text-center py-3">
		<h3 class="text-center fw700 text-light">
			COUNTACT US
		</h3>
		<p>
			<a href="index.php" class="about_home text-light">Home</a>
			<a href="contact.php" class="about_ancor primary_color">Contact</a>
		</p>
	</div>
</section>
<!-- ======================= Breadcrumb End ============ -->
<!-- ======================= Contact Section Start ============ -->
<section class="contactus py-5">
	<div class="container">
		<div class="text-center">
			<h2 class="pb-5">Get in touch</h2>
		</div>
		<div class="row">
			<div class="col-md-6">
				<h6 class="fw700">Contact Details</h6>
				<br>
				<p class="text-justify">
					<?php echo $settings[14]['description']; ?>
				</p>
				<br>
				<ul class="contact-list">
					<li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a> <?php echo $settings[3]['description']; ?></li>
					<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a> <?php echo $settings[4]['description']; ?></li>
					<li><a href="#"><i class="fa fa-firefox" aria-hidden="true"></i></a><?php echo $settings[0]['description']; ?></li>
				</ul>
			</div>
			<div class="col-md-6">
				<form method="post" id="massage_frm" enctype="multipart/form-data" class="form-signin">
					<div class="form-group">
						<label for="name"> Name </label>
						<input type="text" name="name" id="name" class="form-control" placeholder="Your name">
					</div>
					<div class="form-group">
						<label for="email"> Email </label>
						<input type="email" name="email" id="email" class="form-control" placeholder="Your email address">
					</div>
					<div class="form-group">
						<label for="subject"> Subject </label>
						<input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
					</div>
					<div class="form-group">
						<label for="image">Image</label>
						<input type="file" name="image" id="image" class="form-control">
					</div>
					<div class="form-group">
						<label for="massage"> Massage </label>
						<textarea name="massage" id="massage" cols="30" rows="10" class="form-control" placeholder="massage here...."></textarea>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn_outline_primary" id="massageSubmit">Submit now</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</section>
<script>
	$(document).ready(function(e) {
		$("#massage_frm").on('submit', (function(e) {
			e.preventDefault();
			$.ajax({
				url: './contactApi.php',
				type: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(result) {
					var result = JSON.parse(result);
					if (result.statusCode == 200) {
						Swal.fire({
							position: 'bottom-end',
							icon: 'success',
							title: result.Msg,
							showConfirmButton: false,
							timer: 3000
						});
						$('#massageSubmit').removeAttr('disabled');
						$('#massageSubmit').text('Enroll');
						setTimeout(() => {
							location.reload();
						}, 3000);

					} 
					console.log(result);
				}
			});
		}));
	});
</script>
<!-- ======================= Contact Section End ============ -->
<!-- map -->
<div class="container-fluid">
	<iframe src="<?php echo $settings[22]['description']; ?>" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<!-- map -->

<?php
require_once('./partials/cta.php')
?>

<?php
require_once('./partials/footer.php')
?>