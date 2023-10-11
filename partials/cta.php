<?php require_once('./controller/CMSController.php'); ?>

<!-- CTA Section Start -->

<section class="cta f-bg">
	<div class="text-center py-5">
		<h1 class="fw900 text-light">SUBSCRIBE TO OUR NEWSLETTER</h1>
		<p class="pb-1 text-light"> Signup to receive email updates about courses</p>
		<div class="d-fiex">
			<form method="post" class="form-signin" id="cta_frm">
				<div class="form-group" >
					<input type="email" name="email" id="cta_email" class="email" placeholder="Your email">
					<button type="button" class="btn test_btn" id="cta_btn">
						<span class="fa fa-envelope"></span>
					</button>
				</div>
			</form>
		</div>
	</div>
</section>
<!-- CTA Section End -->
<script>
			$('#cta_btn').on('click',function(){
				var data = $("#cta_frm").serialize();
				$.ajax({
					url: './subscribe.php',
					type: "POST",
					data : data,
					datatype: 'json',
					success: function(result){
					var result = JSON.parse(result);
					if(result.statusCode==200){
						Swal.fire({
						position: 'bottom-end',
						icon: 'success',
						title: result.Msg,
						showConfirmButton: false,
						timer: 3000
						});
						setTimeout(() => {
							location.reload();
						}, 3000);					
					}
					else if(result.statusCode==409){
						Swal.fire({
						position: 'bottom-end',
						icon: 'error',
						text: 'Please Try another Email!',
						title: result.Msg,
						showConfirmButton: false,
						timer: 3000
						});
						setTimeout(() => {
							location.reload();
						}, 3000);	
					}
					console.log(result);
				}
				});
			});
		</script>