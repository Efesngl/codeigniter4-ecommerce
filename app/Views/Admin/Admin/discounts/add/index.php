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
                                <h4 class="mb-sm-0 font-size-18">İndirim Kodu Ekle</h4>
                                <a href="<?php echo base_url("admin/indirimler"); ?>" class="btn btn-danger">Geri Git</a>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                        <label for="code" class="ps-1">İndirim kodu</label>
                                        <input type="text" name="code" id="code" class="form-control mb-3" placeholder="İndirim kodu">
                                    </div>
                                    <div class="col">
                                        <label for="discount">İndirim miktarı</label>
                                        <div class="input-group">
                                            <input type="text" id="discount" name="discount" class="form-control" placeholder="İndirim miktarı" aria-describedby="discount_amount">
                                            <span class="input-group-text" id="discount_amount">%</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="min_total">Minimum sepet tutarı</label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="min-total" name="min_total" class="form-control" placeholder="Minimum sepet tutarı" aria-describedby="discount_min_total">
                                            <span class="input-group-text" id="discount_min_total">TL</span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mt-5 mb-5">
                                    <div class="col-12 text-center">
                                        <h4>İndirim türü</h4>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input discount_type" value="1" type="radio" name="discount_type" id="discount_type1" checked>
                                            <label class="form-check-label" for="discount_type1">
                                                Yüzdelik İndirim
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input discount_type" value="2" type="radio" name="discount_type" id="discount_type2">
                                            <label class="form-check-label" for="discount_type2">
                                                TL olarak İndirim
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row pt-2">
                                    <div class="col text-center">
                                        <button type="submit" id="add-discount" class="btn btn-primary">Kaydet</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <?php echo view("Admin/Admin/includes/scripts"); ?>
        <script src="/admin_assets/js/discounts/discount_add.js"></script>
</body>


</html>