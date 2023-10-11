<?php require_once('./controller/CMSController.php'); ?>
<?php
$slider = new CMSController();
$Response = [];
$active = $slider->active;
$index = $slider->getSlider();
$settings = $slider->getSetting();
$galary = $slider->getGalary($_REQUEST['gid']);

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
            <a href="galary.php" class="about_ancor primary_color about_home text-light">Galary</a>
            <a class="about_ancor primary_color"><?php echo $galary[0]['name']; ?></a>
        </p>
    </div>
</section>
<!-- ======================= Breadcrumb End ============ -->

<section class="course py-5">
    <div class="container">
        <div class="popup-gallery">
            <div class="row">
                <?php
               
                // var_dump($galary);
                if(!empty($galary)){
                foreach ($galary as $item) {
                ?>
                    <div class="col-md-3">
                        <a href="<?php echo $item['image'] ?>" title="<?php echo $item['name'] ?>">
                            <img src="<?php echo $item['image'] ?>" alt="<?php echo $item['name'] ?>" class="img-fluid">
                        </a>
                    </div>
                <?php } }else{ echo "Empty" ;} ?>
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