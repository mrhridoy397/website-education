<?php require_once('./controller/NewsController.php'); ?>
<?php
$News = new NewsController();
$Response = [];
$active = $News->active;
$data = $News->Newsedit($_REQUEST['id']);
if (isset($_REQUEST['submit']) && count($_REQUEST) > 1) $Response = $News->NewsUpdate($_REQUEST, $_FILES);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once('./partials/meta.php');
    ?>
    <title><?php echo ucfirst($active); ?> - Educafe</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include_once('./partials/sidebar.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">


            <div id="content">

                <!-- Topbar -->
                <?php
                include_once('./partials/header.php');
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit <?php echo $active; ?></h1>
                        <a href="NewsIndex.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users-cog fa-sm text-white-50"></i> All <?php echo $active; ?></a>
                    </div>
                    <?php if (isset($Response['status']) && !$Response['status']) : ?>
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <span><B>Oops!</B> Some errors occurred in your form.</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" class="text-danger">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit <?php echo $active; ?></h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="title" >News Title </label>
                                                <input type="text" id="title" class="form-control form-control-user" placeholder="Enter Title " name="title" required autofocus value="<?php if (isset($_POST['title'])) {
                                                                                                                                                                                            echo $_POST['title'];
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo $data['title'];
                                                                                                                                                                                        } ?>">
                                                <?php if (isset($Response['title']) && !empty($Response['title'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['title']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="author" >Author</label>
                                                <input type="text" id="author" class="form-control form-control-user" placeholder="Enter Title " name="author" required autofocus value="<?php if (isset($_POST['author'])) {
                                                                                                                                                                                                echo $_POST['author'];
                                                                                                                                                                                            } else {
                                                                                                                                                                                                echo $data['author'];
                                                                                                                                                                                            } ?>">
                                                <?php if (isset($Response['author']) && !empty($Response['author'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['author']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="shortDescription" >Short Description</label>
                                                <input type="text" id="shortDescription" class="form-control form-control-user" placeholder=" Enter ShortDescription " name="shortDescription" required autofocus value="<?php if (isset($_POST['shortDescription'])) {
                                                                                                                                                                                                                                echo $_POST['shortDescription'];
                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                echo $data['shortDescription'];
                                                                                                                                                                                                                            } ?>">
                                                <?php if (isset($Response['shortDescription']) && !empty($Response['shortDescription'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['shortDescription']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                            <div class="form-group">
                                                <label for="LongDescription" >Long Description</label>
                                                <textarea name="LongDescription" id="LongDescription" cols="30" rows="10" class="form-control" placeholder="News text"><?php if (isset($_POST['LongDescription'])) {echo $_POST['LongDescription']; } else {echo $data['LongDescription'];} ?></textarea>
                                                <?php if (isset($Response['LongDescription']) && !empty($Response['LongDescription'])) : ?>
                                                    <small class="text-danger"><?php echo $Response['LongDescription']; ?></small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                        <div class="form-group">
                                            <label for="status">Is Active</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="">~~Select~~</option>
                                                <option value="1" <?php if (isset($_REQUEST['status']) && $_REQUEST['status'] == 1) {
                                                                        echo "selected";
                                                                    } elseif ($data['status'] == 1) {
                                                                        echo "selected";
                                                                    } ?>>Active </option>
                                                <option value="0" <?php if (isset($_REQUEST['status']) && $_REQUEST['status'] == 0) {
                                                                        echo "selected";
                                                                    } elseif ($data['status'] == 0) {
                                                                        echo "selected";
                                                                    } ?>>Deactive</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 mt-4">
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="../<?php echo $data['image'] ?>" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="image"> Featured Image</label>
                                                <input type="file" name="image" id="image" class="form-control" placeholder=" image">
                                                <input type="hidden" value="<?php echo $data['image'] ?>" name="oldImage">
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group text-center mt-5">
                                            <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                            <a href="NewsIndex.php" class="btn btn-danger">Cancle</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include_once('./partials/footer.php');
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="./logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once('./partials/script.php');
    ?>
     <script src="./assets/vendor/ckeditor_4.22.1_full/ckeditor/ckeditor.js"></script>
    <script>  
        CKEDITOR.replace( 'LongDescription' );
     </script>



</body>

</html>