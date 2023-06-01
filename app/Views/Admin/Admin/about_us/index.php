<!DOCTYPE html>
<html lang="tr">

<?php echo view("Admin/Admin/includes/head"); ?>


<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php echo view("Admin/Admin/includes/header"); ?>



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-10">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Hakkımızda</h4>
                            </div>
                        </div>
                        <div class="col-2 text-end">
                            <a href="<?php echo base_url("admin/hakkimizda/duzenle"); ?>" class="btn btn-success">Düzenle</a>
                        </div>
                    </div>
                    <br>

                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-stripped table-hover table-bordered">
                                <thead class="table-secondary">
                                    <tr>
                                        <td>1. içerik</td>
                                        <td>1. başlık</td>
                                        <td>2. başlık</td>
                                        <td>Hakkımızda yazı</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img style="width: 100%;aspect-ratio:5/5" src="/<?php echo $media_1; ?>" alt=""></td>
                                        <td><?php echo $header_1; ?></td>
                                        <td><?php echo $header_2; ?></td>
                                        <td class="w-50"><?php echo $content; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END layout-wrapper -->

                <!-- JAVASCRIPT -->
                <?php echo view("Admin/Admin/includes/scripts"); ?>
</body>


</html>
<!DOCTYPE html>