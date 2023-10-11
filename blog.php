<?php require_once('./controller/CMSController.php'); ?>
<?php
$slider = new CMSController();
$Response = [];
$active = $slider->active;
$index = $slider->getSlider();
$settings = $slider->getSetting();
$blog = $slider->AllBlog();
?>

<?php 
	require_once('./partials/header.php')
?>
<!-- ======================= Breadcrumb Start ============ -->
<section class="bradcrumb py-5">
    <div class="text-center py-3">
        <h3 class="text-center fw700 text-light">
            All Blog
        </h3>
        <p>
            <a href="index.php" class="about_home text-light">Home</a>
            <a class="about_ancor primary_color">blog</a>
        </p>
    </div>
</section>
<!-- ======================= Breadcrumb End ============ -->
<section class="course py-5">
    <div class="container">
        <div class="row">
            <?php
            foreach ($blog as $item) {
            ?>
                <div class="col-md-4 mt-3">
                    <!-- Single Card Start -->
                    <div class="card btn-f-o-h">
					<img src="<?php echo $item['image']; ?>" alt="!">
					<div class="card-body pb-0">
						<h5 class="card-title text-left"><?php echo $item['title']; ?></h5>
						<p class="card-text">By <span class="f-color"><?php echo $item['author']; ?></span></p>
						<p class="card-text number-family">
							<?php
							$date = date('d M Y', strtotime($item['create_at']));
							echo $date;
							?>
							| <i class="fa fa-comments" aria-hidden="true"></i> <?php
												$comment = $slider->totalBlogComment($item['id']);
												echo $comment['totalComment'];
											?></p>
						<p class="card-text">
							<?php echo $item['shortDescription']; ?>
						</p>
						<a href="blogread.php?id=<?php echo $item['id']; ?>" class="btn pl-0">READ MORE <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
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