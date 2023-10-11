<?php require_once('./controller/CommentController.php'); ?>
<?php
$student = new CommentModels();
$Response = [];
$active = $student->active;
$data = $student->edit($_REQUEST['id']);

if (isset($_REQUEST['submit']) && count($_REQUEST) > 0) $Response = $student->Update($_REQUEST, $_FILES);


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
                        <a href="CommentIndex.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users-cog fa-sm text-white-50"></i> All <?php echo $active; ?></a>
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
                            <div class="col-md-12 ">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Edit <?php echo $active; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                            <div class="tile-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <input type="hidden" name="courseid" value="<?php echo $data['courseid']; ?>">
                                                        <div class="col-md-6">
                                                            <label for="name"> Name </label>
                                                            <input type="text" name="name" id="name" class="form-control" value="<?php if (isset($_REQUEST['name'])) {
                                                                                                                                        echo $__REQUEST['name'];
                                                                                                                                    } else {
                                                                                                                                        echo $data['name'];
                                                                                                                                    } ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="email">email</label>
                                                            <input type="email" name="email" id="email" class="form-control" value="<?php if (isset($_REQUEST['email'])) {
                                                                                                                                        echo $__REQUEST['email'];
                                                                                                                                    } else {
                                                                                                                                        echo $data['email'];
                                                                                                                                    } ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="comment"></label>
                                                    <textarea name="comment" id="comment" cols="30" rows="10" class="form-control rounded-0" placeholder="Post your comments here"><?php if (isset($_REQUEST['comment'])) {
                                                                                                                                        echo $__REQUEST['comment'];
                                                                                                                                    } else {
                                                                                                                                        echo $data['comment'];
                                                                                                                                    } ?></textarea>
                                                </div>
                                                 <div class="form-group">
                                                        <label class="control-label" for="status">Status<span class="m-l-5 text-danger"> *</span></label>
                                                        <select class="form-control " name="status" id="status">
                                                            <option value="">--Select--</option>
                                                            <option value="0" <?php if (isset($_REQUEST['status']) && $_REQUEST['status'] == 0) {
                                                                                    echo "selected";
                                                                                } elseif ($data['status'] == 0) {
                                                                                    echo "selected";
                                                                                } ?>>Deactive</option>
                                                            <option value="1" <?php if (isset($_REQUEST['status']) && $_REQUEST['status'] == 1) {
                                                                                    echo "selected";
                                                                                } elseif ($data['status'] == 1) {
                                                                                    echo "selected";
                                                                                } ?>>Active</option>
                                                        </select>
                                                    </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="image"> Featured Image</label>
                                                        <input type="file" name="image" id="image" class="form-control" placeholder="image">
                                                        <input type="hidden" value="<?php echo $data['image'] ?>" name="oldImage">
                                                        <img src="../<?php echo $data['image'] ?>" alt="!" height="100">
                                                    </div>
                                                    </div>
                                                <div class="col-12 offset-md-5">
                                                        <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                                        <a href="CommentIndex.php" class="btn btn-danger">Cancle</a>
                                                    </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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

    <script>
        $(document).ready(function() {
            $('#courses').on('change', function() {
                var id = $(this).val();
                let url = "courseFee.php?id=" + id;
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(data) {
                        // console.log(data);
                        let item = JSON.parse(data);
                        // console.log(item[0]['coursefee']);                
                        $('#coursefee').val(item[0]['coursefee']);
                        $('#coursefees').val(item[0]['coursefee']);
                        $('#discount').val(item[0]['Discount']);
                        $('#discounts').val(item[0]['Discount']);
                    }
                });
            });
        })
    </script>

</body>

</html>