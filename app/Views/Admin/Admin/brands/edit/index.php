<!DOCTYPE html>
<html lang="tr">

    <?php echo view("Admin/Admin/includes/head");?>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

        <?php echo view("Admin/Admin/includes/header");?>

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Marka Düzenle</h4>
                                    <a href="<?php echo base_url("admin/markalar");?>" class="btn btn-danger">Geri Git</a>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <form action="<?php echo base_url("admin/markalar/brandEdit/$ID");?>" method="POST">
                                    <label for="brand" class="ps-1">Marka İsmi</label>
                                    <input type="text" name="brand" class="form-control mb-3" placeholder="Marka İsmi" value="<?php echo $brand;?>">
                                    <div class="row pt-2">
                                        <div class="col text-center">
                                            <button type="submit" class="btn btn-primary">Kaydet</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <?php echo view("Admin/Admin/includes/scripts");?>
    </body>


</html>