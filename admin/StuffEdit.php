<?php require_once('./controller/StuffController.php'); ?>
<?php
$stuff = new Stuff();
$Response = [];
$active = $stuff->active;
$data = $stuff->edit($_REQUEST['id']);

if (isset($_REQUEST['submit']) && count($_REQUEST) > 1) $Response = $stuff->Update($_REQUEST, $_FILES);

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
                        <a href="CourseIndex.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-users-cog fa-sm text-white-50"></i> All <?php echo $active; ?></a>
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
                        <div class="col-md-12 ">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit <?php echo $active; ?></h6>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                        <div class="tile-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="stuffId">Stuff ID <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="stuffId" placeholder="ICBDEP-01" id="stuffId" value="<?php if(isset($_REQUEST['stuffId']))  { echo $__REQUEST['stuffId'];} else{echo $data['stuffId'];}?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-9">
                                                    <div class="form-group">
                                                        <label class="control-label" for="name">Stuff Name <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="name" id="name" placeholder="Mr." value="<?php if(isset($_REQUEST['name']))  { echo $__REQUEST['name'];} else{echo $data['name'];}?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="fname">Father's Name </label>
                                                        <input class="form-control " type="text" name="fname" id="fname" placeholder="Mr." value="<?php if(isset($_REQUEST['fname']))  { echo $__REQUEST['fname'];} else{echo $data['fname'];}?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="mname">Mother's Name </label>
                                                        <input class="form-control " type="text" name="mname" id="mname" placeholder="Mrs." value="<?php if(isset($_REQUEST['mname']))  { echo $__REQUEST['mname'];} else{echo $data['mname'];}?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="gender">Gender <span class="m-l-5 text-danger"> *</span></label>
                                                        <select class="form-control " name="gender" id="gender">
                                                            <option value="">--Select--</option>
                                                            <option value="1"  <?php if (isset($_REQUEST['gender']) && $_REQUEST['gender'] == 1) {
                                                                echo "selected";
                                                            } elseif ($data['gender'] == 1) {
                                                                echo "selected";
                                                            } ?>>Male</option>
                                                            <option value="2" <?php if (isset($_REQUEST['gender']) && $_REQUEST['gender'] == 2) {
                                                                echo "selected";
                                                            } elseif ($data['gender'] == 2) {
                                                                echo "selected";
                                                            } ?>>Female</option>
                                                            <option value="3" <?php if (isset($_REQUEST['gender']) && $_REQUEST['gender'] == 3) {
                                                                echo "selected";
                                                            } elseif ($data['gender'] == 3) {
                                                                echo "selected";
                                                            } ?>>Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="dob">Stuff Date of Birth </label>
                                                        <input class="form-control " type="date" name="dob" id="dob" value="<?php if(isset($_REQUEST['dob']))  { echo $__REQUEST['dob'];} else{echo $data['dob'];}?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="blood">Blood Group </label>
                                                        <select class="form-control " name="blood" id="blood">
                                                            <option value="">--Select--</option>
                                                            <option value="1" <?php if (isset($_REQUEST['blood']) && $_REQUEST['blood'] == 1) {
                                                                echo "selected";
                                                            } elseif ($data['blood'] == 1) {
                                                                echo "selected";
                                                            } ?>>A(+ve)</option>
                                                            <option value="2" <?php if (isset($_REQUEST['blood']) && $_REQUEST['blood'] == 2) {
                                                                echo "selected";
                                                            } elseif ($data['blood'] == 2) {
                                                                echo "selected";
                                                            } ?>>O(+ve)</option>
                                                            <option value="3" <?php if (isset($_REQUEST['blood']) && $_REQUEST['blood'] == 3) {
                                                                echo "selected";
                                                            } elseif ($data['blood'] == 3) {
                                                                echo "selected";
                                                            } ?>>B(+ve)</option>
                                                            <option value="4" <?php if (isset($_REQUEST['blood']) && $_REQUEST['blood'] == 4) {
                                                                echo "selected";
                                                            } elseif ($data['blood'] == 4) {
                                                                echo "selected";
                                                            } ?>>AB(+ve)</option>
                                                            <option value="5" <?php if (isset($_REQUEST['blood']) && $_REQUEST['blood'] == 5) {
                                                                echo "selected";
                                                            } elseif ($data['blood'] == 5) {
                                                                echo "selected";
                                                            } ?>>A(-ve)</option>
                                                            <option value="6" <?php if (isset($_REQUEST['blood']) && $_REQUEST['blood'] == 6) {
                                                                echo "selected";
                                                            } elseif ($data['blood'] == 6) {
                                                                echo "selected";
                                                            } ?>>O(-ve)</option>
                                                            <option value="7" <?php if (isset($_REQUEST['blood']) && $_REQUEST['blood'] == 7) {
                                                                echo "selected";
                                                            } elseif ($data['blood'] == 7) {
                                                                echo "selected";
                                                            } ?>>B(-ve)</option>
                                                            <option value="8" <?php if (isset($_REQUEST['blood']) && $_REQUEST['blood'] == 8) {
                                                                echo "selected";
                                                            } elseif ($data['blood'] == 8) {
                                                                echo "selected";
                                                            } ?>>AB(-ve)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="relagion">Relagion <span class="m-l-5 text-danger"> *</span></label>
                                                        <select class="form-control " name="relagion" id="relagion">
                                                            <option value="">--Select--</option>
                                                            <option value="1" <?php if (isset($_REQUEST['relagion']) && $_REQUEST['relagion'] == 1) {
                                                                echo "selected";
                                                            } elseif ($data['relagion'] == 1) {
                                                                echo "selected";
                                                            } ?>>Islam</option>
                                                            <option value="2" <?php if (isset($_REQUEST['relagion']) && $_REQUEST['relagion'] == 2) {
                                                                echo "selected";
                                                            } elseif ($data['relagion'] == 2) {
                                                                echo "selected";
                                                            } ?>>Hindhu</option>
                                                            <option value="3" <?php if (isset($_REQUEST['relagion']) && $_REQUEST['relagion'] == 3) {
                                                                echo "selected";
                                                            } elseif ($data['relagion'] == 3) {
                                                                echo "selected";
                                                            } ?>>Bhudist</option>
                                                            <option value="4" <?php if (isset($_REQUEST['relagion']) && $_REQUEST['relagion'] == 4) {
                                                                echo "selected";
                                                            } elseif ($data['relagion'] == 4) {
                                                                echo "selected";
                                                            } ?>>Christian</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="isMarrid">Marital Status <span class="m-l-5 text-danger"> *</span></label>
                                                        <select class="form-control " name="isMarrid" id="isMarrid">
                                                            <option value="">--Select--</option>
                                                            <option value="1" <?php if (isset($_REQUEST['isMarrid']) && $_REQUEST['isMarrid'] == 1) {
                                                                echo "selected";
                                                            } elseif ($data['isMarrid'] == 1) {
                                                                echo "selected";
                                                            } ?>>Unmerrid</option>
                                                            <option value="2" <?php if (isset($_REQUEST['isMarrid']) && $_REQUEST['isMarrid'] == 2) {
                                                                echo "selected";
                                                            } elseif ($data['isMarrid'] == 2) {
                                                                echo "selected";
                                                            } ?>>Merrid</option>
                                                            <option value="3" <?php if (isset($_REQUEST['isMarrid']) && $_REQUEST['isMarrid'] == 3) {
                                                                echo "selected";
                                                            } elseif ($data['isMarrid'] == 3) {
                                                                echo "selected";
                                                            } ?>>Divorced</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="phone">Stuff Phone Number <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="phone" id="phone" placeholder="+880" value="<?php if(isset($_REQUEST['phone']))  { echo $__REQUEST['phone'];} else{echo $data['phone'];}?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="nid">NID/BCN </label>
                                                        <input class="form-control " type="text" name="nid" placeholder="NID/BCN" id="nid" value="<?php if(isset($_REQUEST['nid']))  { echo $__REQUEST['nid'];} else{echo $data['nid'];}?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="education">Education Qualification<span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="education" id="education" placeholder="BSc" value="<?php if(isset($_REQUEST['education']))  { echo $__REQUEST['education'];} else{echo $data['education'];}?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="subject">Stuff Subjects<span class="m-l-5 text-danger"> *</span> </label>
                                                        <input class="form-control " type="text" name="subject" id="subject" placeholder="Web Developer" value="<?php if(isset($_REQUEST['subject']))  { echo $__REQUEST['subject'];} else{echo $data['subject'];}?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="desigmation">Stuff Designation<span class="m-l-5 text-danger"> *</span> </label>
                                                        <input class="form-control " type="text" name="desigmation" id="desigmation" placeholder="Director" value="<?php if(isset($_REQUEST['desigmation']))  { echo $__REQUEST['desigmation'];} else{echo $data['desigmation'];}?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="department">Stuff Department </label>
                                                        <input class="form-control " type="text" name="department" id="department" placeholder="IT" value="<?php if(isset($_REQUEST['department']))  { echo $__REQUEST['department'];} else{echo $data['department'];}?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="salary">Basic Salary <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="salary" id="salary" placeholder="Selary" value="<?php if(isset($_REQUEST['salary']))  { echo $__REQUEST['salary'];} else{echo $data['salary'];}?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="contactType">Contract Type <span class="m-l-5 text-danger"> *</span></label>
                                                        <select class="form-control " name="contactType" id="contactType">
                                                            <option value="">--Select--</option>
                                                            <option value="1" <?php if (isset($_REQUEST['contactType']) && $_REQUEST['contactType'] == 1) {
                                                                echo "selected";
                                                            } elseif ($data['contactType'] == 1) {
                                                                echo "selected";
                                                            } ?>>Permanent</option>
                                                            <option value="2" <?php if (isset($_REQUEST['contactType']) && $_REQUEST['contactType'] == 2) {
                                                                echo "selected";
                                                            } elseif ($data['contactType'] == 2) {
                                                                echo "selected";
                                                            } ?>>Intern</option>
                                                            <option value="3" <?php if (isset($_REQUEST['contactType']) && $_REQUEST['contactType'] == 3) {
                                                                echo "selected";
                                                            } elseif ($data['contactType'] == 3) {
                                                                echo "selected";
                                                            } ?>>Contractual</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="workShift">Work Shift </label>
                                                        <input class="form-control " type="text" name="workShift" id="workShift" placeholder="Morning" value="<?php if(isset($_REQUEST['workShift']))  { echo $__REQUEST['workShift'];} else{echo $data['workShift'];}?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="expriance">Work Exprience <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="text" name="expriance" id="expriance" placeholder="5 Years" value="<?php if(isset($_REQUEST['expriance']))  { echo $__REQUEST['expriance'];} else{echo $data['expriance'];}?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label" for="joiningDate">Joining Date <span class="m-l-5 text-danger"> *</span></label>
                                                        <input class="form-control " type="date" name="joiningDate" id="joiningDate" value="<?php if(isset($_REQUEST['joiningDate']))  { echo $__REQUEST['joiningDate'];} else{echo $data['joiningDate'];}?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="link1">Facebook Link </label>
                                                        <input class="form-control " type="url" name="link1" id="link1" placeholder="https://" value="<?php if(isset($_REQUEST['link1']))  { echo $__REQUEST['link1'];} else{echo $data['link1'];}?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="link2">Linkedin Link </label>
                                                        <input class="form-control " type="url" name="link2" id="link2" placeholder="https://" value="<?php if(isset($_REQUEST['link2']))  { echo $__REQUEST['link2'];} else{echo $data['link3'];}?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="link3">Github Link </label>
                                                        <input class="form-control " type="url" name="link3" id="link3" value="<?php if(isset($_REQUEST['link3']))  { echo $__REQUEST['link3'];} else{echo $data['link3'];}?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label" for="link4">Behance Link </label>
                                                        <input class="form-control " type="url" name="link4" id="link4" value="<?php if(isset($_REQUEST['link4']))  { echo $__REQUEST['link4'];} else{echo $data['link4'];}?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="address">Address<span class="m-l-5 text-danger"> *</span></label>
                                                        <textarea name="address" id="address" class="form-control " cols="30" rows="3"><?php if(isset($_REQUEST['address']))  { echo $__REQUEST['address'];} else{echo $data['address'];}?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="status">Status<span class="m-l-5 text-danger"> *</span></label>
                                                        <select class="form-control " name="status" id="status">
                                                            <option value="">--Select--</option>
                                                            <option value="1"<?php if (isset($_REQUEST['status']) && $_REQUEST['status'] == 1) {
                                                                echo "selected";
                                                            } elseif ($data['status'] == 1) {
                                                                echo "selected";
                                                            } ?>>Active</option>
                                                            <option value="2" <?php if (isset($_REQUEST['status']) && $_REQUEST['status'] == 2) {
                                                                echo "selected";
                                                            } elseif ($data['status'] == 2) {
                                                                echo "selected";
                                                            } ?>>Postponded</option>
                                                            <option value="3" <?php if (isset($_REQUEST['status']) && $_REQUEST['status'] == 3) {
                                                                echo "selected";
                                                            } elseif ($data['status'] == 3) {
                                                                echo "selected";
                                                            } ?>>Restricted</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2">
                                                    <img src="../<?php echo $data['image'] ?>" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="image"> Featured Image</label>
                                                    <input type="file" name="image" id="image" class="form-control" placeholder="image">
                                                    <input type="hidden" value="<?php echo $data['image'] ?>" name="oldImage">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                                <a href="./StuffIndex.php" class="btn btn-danger">Cancle</a>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group text-center mt-5">

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