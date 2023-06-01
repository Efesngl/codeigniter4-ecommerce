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
                                <h4 class="mb-sm-0 font-size-18">Ürün Resimleri</h4>
                                <a href="<?php echo base_url("admin/urunler"); ?>" class="btn btn-success">Geri Git</a>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <br>
                    <div class="row text-center">
                        <form action="<?php echo base_url("admin/urunler/urunResimleri/$ID")?>" class="dropzone" id="imageForm" enctype="multipart/form-data">

                            <div class="dz-message">
                                <div class="mb-3">
                                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                </div>
                                <h4>Resimleri yüklemek için sürükleyin ya da tıklayın.</h4>
                            </div>
                        </form>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="table-primary">
                                    <td style="width: 80%;">Resim</td>
                                    <td style="width: 10%;">Ana Resim</td>
                                    <td style="width:10%;">Sil</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($images as $i) :
                                    # code...
                                    ?>
                                    <tr>
                                        <td><img style="max-width: 225px;max-height:225px;" src="<?php echo "/{$i["image"]}";?>" alt=""></td>
                                        <td>
                                            <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                <input class="form-check-input main-switch" data-image_id="<?php echo $i["image_id"];?>" type="checkbox" id="SwitchCheckSizelg" <?php if($i["is_main"]==1){echo "checked";}?>>
                                            </div>
                                        </td>
                                        <td><button data-image_id="<?php echo $i["image_id"];?>" class="btn btn-danger image-delete">Sil</button></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        </div>
                    </div>

                    <!-- container fluid end -->
                </div>

            </div>
        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <?php echo view("Admin/Admin/includes/scripts"); ?>
        <script src="/admin_assets/js/products/product_images.js"></script>
</body>


</html>