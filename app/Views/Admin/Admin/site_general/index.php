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
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Genel site ayarları</h4>
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <form name="site-general-form" action="" enctype="multipart/form-data" method="post">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="phone-number-1">Firma logosu</label>
                                        <input type="file" class="form-control" name="logo" id="logo" placeholder="Firma logosu" accept="image/*" value="<?php echo $site_general["logo"]; ?>">
                                        <label for="phone-number-2" class="mt-2">Favicon</label>
                                        <input type="file" class="form-control" name="favicon" id="favicon" placeholder="Site faviconu" accept="image/*" value="<?php echo $site_general["favicon"]; ?>">
                                        <label for="phone-number-2" class="mt-2">Footer yazısı</label>
                                        <input type="text" class="form-control" name="footer_text" id="footer-text" placeholder="Footer yazısı" value="<?php echo $site_general["footer_text"]; ?>">
                                        <label for="email" class="mt-2">Telif Hakkı</label>
                                        <input type="text" class="form-control" name="copyright" id="copyright" placeholder="Telif hakkı" value="<?php echo $site_general["copyright"]; ?>">
                                        <label for="google-maps" class="mt-2">Header yazısı</label>
                                        <input type="text" class="form-control" name="header_text" id="header-text" placeholder="Header yazısı" value="<?php echo $site_general["header_text"]; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button id="edit-site-general" class="btn btn-primary mt-5 text-center">Kaydet</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END layout-wrapper -->

                <!-- JAVASCRIPT -->
                <?php echo view("Admin/Admin/includes/scripts"); ?>
                <script src="/admin_assets/js/site_general/site_general.js"></script>
</body>


</html>
<!DOCTYPE html>