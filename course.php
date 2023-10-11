<?php require_once('./controller/CMSController.php'); ?>
<?php
$slider = new CMSController();
$Response = [];
$active = $slider->active;
$index = $slider->getSlider();
$settings = $slider->getSetting();
$course = $slider->Courses();

?>

<?php
require_once('./partials/header.php')
?>

<!-- ======================= Breadcrumb Start ============ -->
<section class="bradcrumb py-5">
    <div class="text-center py-3">
        <h3 class="text-center fw700 text-light">
         COURSE
        </h3>
        <p>
            <a href="index.php" class="about_home text-light">Home</a>
            <a href="course.php" class="about_ancor primary_color">Course</a>
        </p>
    </div>
</section>
<!-- ======================= Breadcrumb End ============ -->
<!--======================== Course Section Start ================-->
<section class="course py-5">
    <div class="container">
    <?php if (isset($Response['status']) && !$Response['status']) : ?>
            <br>
            <div class="alert alert-danger" role="alert">
                <span><B>Oops!</B> Some errors occurred in your form.</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" class="text-danger">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="d-flex justify-content-between d-block-sm">
            <div class="title-section">
                <h1 class="title"><span>Our</span> all Course</h1>
            </div>
            <div class="sorting-section">
                <select name="" id="" class="custom_select">
                    <option value="">Select Category</option>

                </select>
                <select name="" id="" class="custom_select">
                    <option value="">Sort by</option>

                </select>
                <button type="button" class="btn c_btn_border">
                    <i class="fa fa-table" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn c_btn_border">
                    <i class="fa fa-th-list" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($course as $item) {


            ?>
                <div class="col-md-4 mt-3 ">
                    <!-- Single Card Start -->
                    <div class="card no-radius cus_border btn-f-o-h ">
                        <img src="<?php echo $item['image']; ?>" alt="!" class="card-img-top no-radius ">
                        <div class="card-body custom_body ">
                            <h5 class="text-center">
                                <?php echo $item['courseName']; ?>
                            </h5>
                            <div class="pre">
                                <p class="text-center h_line">by <span class="primary_color"> <?php $teacher = $slider->getSelectTeacher($item['teacherId']); echo $teacher['name']; ?></span></p><p class="border_btrn"></p>
                            </div>

                            <p class="text-center">
                                <?php echo $item['courseAbout']; ?>
                            </p>
                            <ul class="course-list d-flex justify-content-between">
                                <li class="c_font_family"><i class="fa fa-user"></i> 389</li>
                                <li><a href="courseDetails.php?id=<?php echo $item['id']; ?>">APPLY NOW</a></li>
                                <li class="c_font_family">$ <?php echo $item['coursefee']; ?></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Card End -->
                </div>
            <?php
            }
            ?>
            <!-- Single Card End -->
        </div>

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