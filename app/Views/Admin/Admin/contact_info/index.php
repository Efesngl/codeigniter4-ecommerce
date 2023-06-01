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
                                <h4 class="mb-sm-0 font-size-18">İletişim bilgileri</h4>
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label for="phone-number-1">1. telefon numarası</label>
                                    <input type="text" class="form-control" name="phone-number-1" id="phone-number-1" placeholder="1. telefon numarası" value="<?php echo $pn1; ?>">
                                    <label for="phone-number-2" class="mt-2">2. telefon numarası</label>
                                    <input type="text" class="form-control" name="phone-number-2" id="phone-number-2" placeholder="2. telefon numarası" value="<?php echo $pn2; ?>">
                                    <label for="email" class="mt-2">E-posta</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="E-posta" value="<?php echo $email; ?>">
                                    <label for="google-maps" class="mt-2">Google maps linki</label>
                                    <input type="text" class="form-control" name="google-maps" id="google-maps" placeholder="Google maps linki" value="<?php echo $gmaps; ?>">
                                    <label for="address" class="mt-2">Adres</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Adres" value="<?php echo $address; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button id="edit-contact" class="btn btn-primary mt-5 text-center">Kaydet</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END layout-wrapper -->

                <!-- JAVASCRIPT -->
                <?php echo view("Admin/Admin/includes/scripts"); ?>
                <script src="/admin_assets/js/contact/contact.js"></script>
</body>


</html>
<!DOCTYPE html>