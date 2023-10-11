<?php require_once('./controller/NewsCommentController.php'); ?>
<?php
$comments = new NewsCommentModels();
$Response = [];
$active = $comments->active;
$Index = $comments->get();
if (isset($_REQUEST) && count($_REQUEST) > 0) $Response = $comments->statuschanges($_REQUEST);

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
                        <h1 class="h3 mb-0 text-gray-800">All <?php echo ucfirst($active); ?></h1>
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
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>image </th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Comment</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $i = 1;
                                        if(!empty($Index)){
                                        foreach ($Index as $data) {
                                        ?>
                                            <tr>
                                            <td><?php echo $i; ?></td>
                                                <td><img src="../<?php echo $data['image']; ?>" height="50"></img></td>
                                            
                                                <td><?php echo $data['name']; ?></td>
                                               
                                                <td><?php echo $data['email']; ?></td>
                                               
                                                <td><?php echo $data['comment']; ?></td>
                                                <td>
                                                    <?php
                                                     if ($data['status'] == 0) {
                                                    ?>
                                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                                                        <input type="hidden" name="status" value="1">
                                                        <button type="submit" class='btn btn-info'>Pending</button>
                                                    </form>
                                                    <?php
                                                    }
                                                    elseif ($data['status'] == 1) {
                                                    ?>
                                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                                                        <input type="hidden" name="status" value="0">
                                                        <button type="submit" class='btn btn-success'>Approve</button>
                                                    </form>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="NewsCommentEdit.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                                    <button  class="btn btn-sm btn-danger delete" id="delete" <?php echo $data['id']; ?> value="<?php echo $data['id']; ?>"><i class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>
                                        <?php
                                        $i++;
                                        }
                                        }
                                        ?>
                                    </tbody>
                                </table>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are ready to Remove current Filds.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" id="deletemain">delete</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once('./partials/script.php');
    ?>


    <script>
        $('.delete').on('click',function(){
            var value = $(this).val();
            var url = "NewsCommentDelete.php?id="+value;
            $('#DeleteModal').modal('show');
            $('#deletemain').attr('href',url);
        });
    </script>
    

</body>

</html>