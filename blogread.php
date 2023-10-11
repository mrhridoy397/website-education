<?php require_once('./controller/CMSController.php'); ?>
<?php
$slider = new CMSController();
$Response = [];
$active = $slider->active;
$index = $slider->getSlider();
$settings = $slider->getSetting();
$blog = $slider->BlogDetails($_REQUEST['id']);


// var_dump($comments);

// if (isset($_REQUEST) && count($_REQUEST) > 1) $Response = $slider->CreateComment($_REQUEST, $_FILES);

?>

<?php
require_once('./partials/header.php')
?>
<section class="bradcrumb py-5">
    <div class="text-center py-3">
        <h3 class="text-center fw700 text-light">
            Blog
        </h3>
        <p>
            <a href="index.php" class="about_home text-light">Home</a>
            <a href="blog.php" class="about_home text-light">All Blog</a>
            <a class="about_ancor primary_color"><?php echo $blog['title']; ?></a>
        </p>
    </div>
</section>
<div class="container my-5">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <img src="<?php echo $blog['image']; ?>" alt="!">
                <div class="card-body pb-0">
                    <h5 class="card-title text-left"><?php echo $blog['title']; ?></h5>
                    <p class="card-text">By <span class="f-color"><?php echo $blog['author']; ?></span></p>
                    <p class="card-text number-family">
                        <?php
                        $date = date('d M Y', strtotime($blog['create_at']));
                        echo $date;
                        ?>
                        | <i class="fa fa-comments" aria-hidden="true"></i>
                        <?php
                        $comment = $slider->totalBlogComment($blog['id']);
                        echo $comment['totalComment'];
                        ?>
                    </p>

                    <?php echo $blog['LongDescription']; ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Recent news
                    </h2>
                </div>
                <div class="card-body">
                    <?php
                    $recentnews = $slider->recentNews();
                    foreach ($recentnews as  $item) {
                    ?>
                        <div class="card shadow mb-2 btn-f-o-h">
                            <img src="<?php echo $item['image'] ?>" alt="" class="card-img-top">
                            <div class="card-body">
                                <h6 class="card-title"><?php echo $item['title'] ?></h6>
                                published : <?php
                                $date = date('d-m-y', strtotime($item['create_at']));
                                echo $date;
                                ?>
                                <a href="blogread.php?id=<?php echo $item['id'] ?>" class="btn-link ">Read More</a>
                            </div>
                          </div>
                          <br><br>
                        <?php
                    }
                        ?>
                        

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <?php
    $comments = $slider->NewsComments($blog['id']);
    if (!empty($comments)) {
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
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="formas">
                <h1 class="text-weight-bolder text-center my-5">Leav a reaply</h1>
                <form method="post" id="Newscomment_frm" enctype="multipart/form-data" class="form-signin">
                    <div class="form-group">
                        <div class="row">
                            <input type="hidden" name="blogid" value="<?php echo $blog['id']; ?>">
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
                        <button type="submit" class="btn first-border text-dark rounded-0 border-success btn_outline_primary" id="commentNewsSubmit">Post Comment</button>
                    </div>
                </form>
            </div>
            <!-- forms end -->
        </div>
    </div>
</div>
<!-- forms start -->

<script>
    $(document).ready(function(e) {
        $("#Newscomment_frm").on('submit', (function(e) {
            e.preventDefault();
            $.ajax({
                url: './NewscommentApi.php',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
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
                        $('#commentNewsSubmit').removeAttr('disabled');
                        $('#commentNewsSubmit').text('Enroll');
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