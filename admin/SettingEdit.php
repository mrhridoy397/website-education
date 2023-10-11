<?php require_once('./controller/SettingController.php'); ?>
<?php
$settings = new Settings();
$Response = [];
$active = $settings->active;
$data = $settings->edit();
if (isset($_REQUEST['submit']) && count($_REQUEST) > 0) $Response = $settings->Update($_REQUEST, $_FILES);

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
                        <!-- <a href="SliderIndex.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users-cog fa-sm text-white-50"></i> All <?php echo $active; ?></a> -->
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
                                    <div class=" col-md-12 mt-4"> 
                                            <div class="form-group">
                                                <label for="<?php echo $data[0]['title']; ?>" ><?php echo $data[0]['title']; ?></label>
                                                <input type="text" id="<?php echo $data[0]['title']; ?>" class="form-control form-control-user" placeholder="Description " name="<?php echo $data[0]['title']; ?>"  value="<?php echo $data[0]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[3]['title']; ?>" ><?php echo $data[3]['title']; ?></label>
                                                <input type="text" id="<?php echo $data[3]['title']; ?>" class="form-control form-control-user" placeholder="Phone Number " name="<?php echo $data[3]['title']; ?>"  value="<?php echo $data[3]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[4]['title']; ?>" ><?php echo $data[4]['title']; ?></label>
                                                <input type="text" id="<?php echo $data[4]['title']; ?>" class="form-control form-control-user" placeholder="Email " name="<?php echo $data[4]['title']; ?>"  value="<?php echo $data[4]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[5]['title']; ?>" ><?php echo $data[5]['title']; ?></label>
                                                <input type="text" id="<?php echo $data[5]['title']; ?>" class="form-control form-control-user" placeholder="Opening Hours " name="<?php echo $data[5]['title']; ?>"  value="<?php echo $data[5]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[6]['title']; ?>" ><?php echo $data[6]['title']; ?></label>
                                                <input type="text" id="<?php echo $data[6]['title']; ?>" class="form-control form-control-user" placeholder="Facebook Link " name="<?php echo $data[6]['title']; ?>"  value="<?php echo $data[6]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[7]['title']; ?>" ><?php echo $data[7]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[7]['title']; ?>"> -->
                                                <input type="text" id="<?php echo $data[7]['title']; ?>" class="form-control form-control-user" placeholder="<?php echo $data[7]['title']; ?>" name="<?php echo $data[7]['title']; ?>"  value="<?php echo $data[7]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[8]['title']; ?>" ><?php echo $data[8]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[8]['title']; ?>"> -->
                                                <input type="text" id="<?php echo $data[8]['title']; ?>" class="form-control form-control-user" placeholder="<?php echo $data[8]['title']; ?>" name="<?php echo $data[8]['title']; ?>"  value="<?php echo $data[8]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[9]['title']; ?>" ><?php echo $data[9]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[9]['title']; ?>"> -->
                                                <input type="text" id="<?php echo $data[9]['title']; ?>" class="form-control form-control-user" placeholder="<?php echo $data[9]['title']; ?>" name="<?php echo $data[9]['title']; ?>"  value="<?php echo $data[9]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[10]['title']; ?>" ><?php echo $data[10]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[10]['title']; ?>"> -->
                                                <input type="text" id="<?php echo $data[10]['title']; ?>" class="form-control form-control-user" placeholder="<?php echo $data[10]['title']; ?>" name="<?php echo $data[10]['title']; ?>"  value="<?php echo $data[10]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[11]['title']; ?>" ><?php echo $data[11]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[11]['title']; ?>"> -->
                                                <input type="text" id="<?php echo $data[11]['title']; ?>" class="form-control form-control-user" placeholder="<?php echo $data[11]['title']; ?>" name="<?php echo $data[11]['title']; ?>"  value="<?php echo $data[11]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[12]['title']; ?>" ><?php echo $data[12]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[12]['title']; ?>"> -->
                                                <input type="text" id="<?php echo $data[12]['title']; ?>" class="form-control form-control-user" placeholder="<?php echo $data[12]['title']; ?>" name="<?php echo $data[12]['title']; ?>"  value="<?php echo $data[12]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[14]['title']; ?>" ><?php echo $data[14]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[14]['title']; ?>"> -->
                                                <textarea type="text" id="<?php echo $data[14]['title']; ?>" class="form-control form-control-user" placeholder="<?php echo $data[14]['title']; ?>" name="<?php echo $data[14]['title']; ?>"  cols="30" rows="5"><?php echo $data[14]['description']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[16]['title']; ?>" ><?php echo $data[16]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[16]['title']; ?>"> -->
                                                <textarea type="text" id="<?php echo $data[16]['title']; ?>" class="form-control form-control-user" placeholder="<?php echo $data[16]['title']; ?>" name="<?php echo $data[16]['title']; ?>"  cols="30" rows="5"><?php echo $data[16]['description']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[18]['title']; ?>" ><?php echo $data[18]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[18]['title']; ?>"> -->
                                                <input type="text" id="<?php echo $data[18]['title']; ?>" class="form-control form-control-user" placeholder="<?php echo $data[18]['title']; ?>" name="<?php echo $data[18]['title']; ?>"  value="<?php echo $data[18]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[19]['title']; ?>" ><?php echo $data[19]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[19]['title']; ?>"> -->
                                                <input type="text" id="<?php echo $data[19]['title']; ?>" class="form-control form-control-user" placeholder="<?php echo $data[19]['title']; ?>" name="<?php echo $data[19]['title']; ?>"  value="<?php echo $data[19]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[20]['title']; ?>" ><?php echo $data[20]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[20]['title']; ?>"> -->
                                                <input type="text" id="<?php echo $data[20]['title']; ?>" class="form-control form-control-user" placeholder="<?php echo $data[20]['title']; ?>" name="<?php echo $data[20]['title']; ?>"  value="<?php echo $data[20]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[21]['title']; ?>" ><?php echo $data[21]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[21]['title']; ?>"> -->
                                                <input type="text" id="<?php echo $data[21]['title']; ?>" class="form-control form-control-user" placeholder="<?php echo $data[21]['title']; ?>" name="<?php echo $data[21]['title']; ?>"  value="<?php echo $data[21]['description']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="" ><?php echo $data[1]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[1]['title']; ?>"> -->
                                                <input type="hidden"  name="oldsiteLogo"  value="<?php echo $data[1]['description']; ?>">
                                                <input type="file" name="<?php echo $data[1]['title']; ?>" class="form-control">
                                                <img src="../<?php echo $data[1]['description']; ?>" height="50" alt="Site Logo">
                                            </div>
                                            <div class="form-group">
                                                <label for="" ><?php echo $data[2]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[2]['title']; ?>"> -->
                                                <input type="hidden"  name="oldFaviconIcon"  value="<?php echo $data[2]['description']; ?>">
                                                <input type="file" name="<?php echo $data[2]['title']; ?>" class="form-control">
                                                <img src="../<?php echo $data[2]['description']; ?>" height="50" alt="Favicon Logo">
                                            </div>
                                            <div class="form-group">
                                                <label for="" ><?php echo $data[13]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[13]['title']; ?>"> -->
                                                <input type="hidden"  name="oldfooterLogo"  value="<?php echo $data[13]['description']; ?>">
                                                <input type="file" name="<?php echo $data[13]['title']; ?>" class="form-control">
                                                <img src="../<?php echo $data[13]['description']; ?>" height="50" alt="Footer Logo">
                                            </div>
                                            <div class="form-group">
                                                <label for="" ><?php echo $data[15]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[15]['title']; ?>"> -->
                                                <input type="hidden"  name="oldprincipleImage"  value="<?php echo $data[15]['description']; ?>">
                                                <input type="file" name="<?php echo $data[15]['title']; ?>" class="form-control">
                                                <img src="../<?php echo $data[15]['description']; ?>" height="50" alt="Principle Image">
                                            </div>
                                            <div class="form-group">
                                                <label for="" ><?php echo $data[17]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[17]['title']; ?>"> -->
                                                <input type="hidden"  name="oldprincipleSign"  value="<?php echo $data[17]['description']; ?>">
                                                <input type="file" name="<?php echo $data[17]['title']; ?>" class="form-control">
                                                <img src="../<?php echo $data[17]['description']; ?>" height="30" alt="Principle Sign">
                                            </div>
                                            <div class="form-group">
                                                <label for="<?php echo $data[22]['title']; ?>" ><?php echo $data[22]['title']; ?></label>
                                                <!-- <input type="hidden" name="title" value="<?php echo $data[22]['title']; ?>"> -->
                                                <input type="text" id="<?php echo $data[22]['title']; ?>" class="form-control form-control-user" placeholder="<?php echo $data[22]['title']; ?>" name="<?php echo $data[22]['title']; ?>"  value="<?php echo $data[22]['description']; ?>">
                                            </div>
                                        <div class="form-group text-center mt-5">
                                            <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                        </div>
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



</body>

</html>