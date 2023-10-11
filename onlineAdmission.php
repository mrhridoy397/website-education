<?php require_once('./controller/CMSController.php'); ?>
<?php
$slider = new CMSController();
$Response = [];
$active = $slider->active;
$index = $slider->getSlider();
$selectCourse = $slider->selectCourses($_REQUEST['id']);
$allCourse = $slider->AllCourses();
$settings = $slider->getSetting();
// if (isset($_REQUEST) && count($_REQUEST) > 1) $Response = $slider->createAdmission($_REQUEST);


?>

<?php
require_once('./partials/header.php')
?>
<!-- ======================= Breadcrumb Start ============ -->
<section class="bradcrumb py-5">
    <div class="text-center py-3">
        <h3 class="text-center fw700 text-light">
            ABOUT US
        </h3>
        <p>
            <a href="index.php" class="about_home text-light">Home</a>
            <a href="course.php" class="about_home text-light">courses</a>
            <a href="courseDetails.php?id= <?php echo $_REQUEST['id']; ?>" class="about_home text-light"><?php echo $selectCourse[0]['courseName']; ?></a>
            <a href="#" class="about_ancor primary_color">Onlin Admission</a>
        </p>
    </div>
</section>
<!--------------- Principle Section Start  ---------------->
<section class="principle">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 offset-4">
                <div class="card shadow">
                    <div class="card-header">
                        <h3 class="text-center">Online Admission Form</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" class="form-signin" id="admission_frm">
                            <div class="form-group">
                                <label for="sname">Student Name <span class="text-danger">*</span></label>
                                <input type="text" name="sname" id="sname" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="phone">Student Phone Number <span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="phone" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="email">Student Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="courseId">Course Name <span class="text-danger">*</span></label>
                                <select name="courseId" id="courseId" class="form-control">
                                    <option value="">``Select Course``</option>
                                    <?php 
                                    foreach ($allCourse as  $value) {
                                       ?>
                                        <option value="<?php echo  $value['id']; ?>"<?php if($value['id'] == $selectCourse[0]['id']){echo "selected";}?>><?php echo  $value['courseName']; ?></option>
                                       <?php
                                    }
                                    
                                    ?>
                                   
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type">Course Type <span class="text-danger">*</span></label>
                                <select name="type" id="type" class="form-control">
                                    <option value="1">Onlin</option>
                                    <option value="2">Offline</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="button"  class="btn btn-success btn-block" id="admission">Enroll</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
			$('#admission').on('click',function(){
                $('#admission').attr('disabled');
                $('#admission').text('Loading..');
				var data = $("#admission_frm").serialize();
				$.ajax({
					url: './admissionApi.php',
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
                        $('#admission').removeAttr('disabled');
                        $('#admission').text('Enroll');
						setTimeout(() => {
							location.reload();
						}, 3000);

					}
					else if(result.statusCode==409){
						Swal.fire({
						position: 'bottom-end',
						icon: 'error',
						text: 'Something went wrong!',
						title: result.Msg,
						showConfirmButton: false,
						timer: 3000
						});
                        $('#admission').removeAttr('disabled');
                        $('#admission').text('Enroll');
						setTimeout(() => {
							location.reload();
						}, 3000);	
					}
					console.log(result);
				}
				});
			});
		</script>
<?php
require_once('./partials/cta.php')
?>

<?php
require_once('./partials/footer.php')
?>