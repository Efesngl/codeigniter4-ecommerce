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
                                <h4 class="mb-sm-0 font-size-18">Sosyal medya</h4>
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label for="phone-number-1">Facebook</label>
                                    <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook adresi" value="<?php echo $face; ?>">
                                    <label for="phone-number-2" class="mt-2">İnstagram</label>
                                    <input type="text" class="form-control" name="instagram" id="instagram" placeholder="İnstagram adresi" value="<?php echo $insta; ?>">
                                    <label for="phone-number-2" class="mt-2">Twitter</label>
                                    <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter adresi" value="<?php echo $twitter; ?>">
                                    <label for="email" class="mt-2">Youtube</label>
                                    <input type="text" class="form-control" name="youtube" id="youtube" placeholder="Youtube adresi" value="<?php echo $yt; ?>">
                                    <label for="google-maps" class="mt-2">Tiktok</label>
                                    <input type="text" class="form-control" name="tiktok" id="tiktok" placeholder="Tiktok adresi" value="<?php echo $tiktok; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button id="edit-social" class="btn btn-primary mt-5 text-center">Kaydet</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END layout-wrapper -->

                <!-- JAVASCRIPT -->
                <?php echo view("Admin/Admin/includes/scripts"); ?>
                <script src="/admin_assets/js/social/social.js"></script>
</body>


</html>
<!DOCTYPE html>