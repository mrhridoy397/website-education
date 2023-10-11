<?php require_once('./controller/CMSController.php'); ?>
<?php
$slider = new CMSController();
$Response = [];
$active = $slider->active;
$index = $slider->getSlider();
$settings = $slider->getSetting();
$course = $slider->CourseDetails($_REQUEST['id']);
$teacher = $slider->getSelectTeacherAll($course['teacherId']);

// var_dump($comments);

// if (isset($_REQUEST) && count($_REQUEST) > 1) $Response = $slider->CreateComment($_REQUEST, $_FILES);

?>

<?php
require_once('./partials/header.php')
?>
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
<section class="courses">
    <div class="container">
        <div class="margin-not pt-5">
            <div class="course-divider divider-2"></div>
            <h1 class="text-align-left font-weight-bolder">Course Details</h1>
        </div>
    </div>
</section>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-5 l-h-n rounded-0">
                    <div class="card-header bg-success">
                        <h1 class="text-light fs-14 text-center font-weight-bolder">Course features</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="text-left">
                                <ul>
                                    <td><a href="#"><i class="fa fa-address-book" aria-hidden="true"></i></a>
                                        <span>Course name : </span>
                                    </td>
                                    <td><?php echo $course['courseName']; ?></td>
                                </ul>
                                <ul>
                                    <td><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                        <span>starts :</span>
                                    </td>
                                    <td>
                                        <?php
                                        $data = $course['Create_at'];
                                        $newDate = strtotime($data);
                                        $newdate = date('d M Y');
                                        echo $newdate;
                                        ?>
                                    </td>
                                </ul>
                                <ul>
                                    <td><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <span>duration : </span>
                                    </td>
                                    <td><?php echo $course['courseDuration']; ?> Month</td>
                                </ul>
                                <ul>
                                    <td><a href="#"><i class="fa fa-book" aria-hidden="true"></i></a>
                                        <span>class duration : </span>
                                    </td>
                                    <td>
                                        <?php
                                        $batch = $slider->getSelectBatch($course['batchId']);
                                        echo $batch['day1'];
                                        ?>

                                    </td>
                                </ul>
                                <ul>
                                    <td><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                                        <span>Seats Available : </span>
                                    </td>
                                    <td>
                                        <?php
                                        $student = $slider->countStudents($course['batchId']);
                                        echo $student['total'] - $course['classSize'];
                                        ?>
                                        Student
                                    </td>
                                </ul>
                                <ul>
                                    <td><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
                                        <span>slass size : </span>
                                    </td>
                                    <td><?php echo $course['classSize']; ?></td>
                                </ul>
                                <ul>
                                    <td class="font-weight-bolder mt-3">Course price : </td>
                                    <td class="font-weight-bolder"><?php echo number_format($course['coursefee']); ?> /-</td>
                                </ul>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="onlineAdmission.php?id=<?php echo $course['id']; ?>" class="btn bg-transparent border-success rounded-0 text-center mt-4">Enroll this course</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card rounded-0">
                    <img src="<?php echo $course['image']; ?> " alt="">
                </div>
            </div>
            <!-- top content start -->
            <div class="top-content">
                <h4 class="text-weight-bolder mb-3">About this Course</h4>
                <p class="text-justify">
                    <?php echo $course['courseAbout']; ?>
                </p>
                <h4 class="text-weight-bolder mb-3">What you will learn</h4>
                <p class="text-justify">
                    <?php echo $course['courseDetails']; ?>
                </p>
            </div>



            <!-- top content end -->

        </div>
        <div class="Instructor">
            <h3 class="font-weight-bolder mb-5">About Instructor</h3>

            <div class="col-md-4">
                <div class="row">
                    <div class="text-left mb-5">
                        <img src="<?php echo $teacher['image']; ?>" alt="" class="mr-2" height="70">
                    </div>
                    <div class="text-left  ml-3">
                        <ul>
                            <li class="font-weight-bolder">
                            <?php echo $teacher['name']; ?>
                            </li>
                        </ul>
                        <ul>
                            <li class="mt-2"><?php echo $teacher['desigmation']; ?></li>
                        </ul>
                        <ul class="d-flex justify-content-end Instructor-icon mt-2">
                            <li><a href="<?php echo $teacher['link1']; ?>" class="text-second"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $teacher['link2']; ?>" class=" text-first"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo $teacher['link3']; ?>" class="text-second"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="<?php echo $teacher['link4']; ?>" class="text-second"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <p class="text-justify pb-5">
                Typi non habent claritatem insitam est usus legentis in iis qui facit eorum claritatem
                Investigationes demonstraverunt lectores legere me lius quod ii leguntsa
                epius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium
                lectorum Mirum est notare quam littera gothica, quam nunc putamus
                parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et
                quinta decima.
            </p>
        </div>
        <!-- jhon deo start -->
        <h1 class="text-center pb-5"></h1> 
        <?php
        $comments = $slider->CourseComments($course['id']);
        if(!empty($comments)){
        foreach ($comments as $comment) {
     ?>
        <!-- Rubel hosen start -->
        <div class="row">
            <div class="col-md-2">
                <div class="text-left mb-5">
                    <img src="<?php echo $comment['image']; ?>" alt="Instructor" height="70">
                </div>
            </div>
            <div class="col-md-8">
                <h1><?php echo $comment['name']; ?></h1>
                <p class="text-justify">
                <?php echo $comment['comment']; ?>
                </p>
                <div class="d-flex">
                    <p>
                        <?php 
                        $date = date('d-M-Y', strtotime($comment['create_at']));
                        echo $date;
                        ?>
                    </p>
                    <ul class="ml-nd">
                        <li><a href="#"><a href="#"><i class="fa fa-reply" aria-hidden="true"></i></a> <span>
                                    Reaply</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Rubel hosen end -->
        <?php
        }
    }
        ?>
        <!-- forms start -->
        <div class="row">
            <div class="col-md-10">
                <div class="formas">
                    <h1 class="text-weight-bolder text-center my-5">Leav a reaply</h1>
                    <form method="post" id="comment_frm" enctype="multipart/form-data" class="form-signin">
                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" name="courseid" value="<?php echo $course['id']; ?>">
                                <div class="col-md-6">
                                    <label for="name"> Name </label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comment"></label>
                            <textarea name="comment" id="comment" cols="30" rows="10" class="form-control rounded-0" placeholder="Post your comments here"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn first-border text-dark rounded-0 border-success" id="commentSubmit">Post Comment</button>
                        </div>
                    </form>
                </div>
                <!-- forms end -->
            </div>
        </div>
    </div>
</section>
<script>
	$(document).ready(function(e) {
		$("#comment_frm").on('submit', (function(e) {
			e.preventDefault();
			$.ajax({
				url: './commentApi.php',
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
						$('#commentSubmit').removeAttr('disabled');
						$('#commentSubmit').text('Enroll');
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

<?php
require_once('./partials/cta.php')
?>

<?php
require_once('./partials/footer.php')
?>