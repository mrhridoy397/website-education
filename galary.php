<?php require_once('./controller/CMSController.php'); ?>
<?php
$slider = new CMSController();
$Response = [];
$active = $slider->active;
$index = $slider->getSlider();
$settings = $slider->getSetting();
$galaryCategoris = $slider->getGalaryCategoris();

?>

<?php
require_once('./partials/header.php')
?>
<!-- ======================= Breadcrumb Start ============ -->
<section class="bradcrumb py-5">
    <div class="text-center py-3">
        <h3 class="text-center fw700 text-light">
            Galary
        </h3>
        <p>
            <a href="index.php" class="about_home text-light">Home</a>
            <a href="#" class="about_ancor primary_color">Galary</a>
        </p>
    </div>
</section>
<!-- ======================= Breadcrumb End ============ -->

<section class="course py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <?php
                foreach ($galaryCategoris as  $value) {
                ?>
                    <div class="col-md-4">
                        <div class="card shadow mb-2">
                            <img src="<?php echo $value['image']; ?>" alt="<?php echo $value['categorisname']; ?>" class="card-img-top" style="height: 250px; widht: 200px;">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="card-body">
                                <h3 class="text-center"><?php echo $value['categorisname']; ?></h3>
                                <a href="galaryDetails.php?gid=<?php echo $value['id']; ?>" class="btn btn-link">See More...</a>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>

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