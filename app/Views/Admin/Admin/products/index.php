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
                                <h4 class="mb-sm-0 font-size-18">Ürünler</h4>
                                <a href="<?php echo base_url("admin/urunler/ekle"); ?>" class="btn btn-success">Ürün Ekle</a>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row  text-end">
                        <div class="col">
                            <input type="text" class="w-25 d-inline form-control search-product" id="product_search" placeholder="Ürün Arayın...">
                        </div>
                    </div>
                    <br>
                    <div class="row" id="products">
                        <?php foreach ($products as $p) :
                        ?>
                            <div class="col-xl-3 col-4 product">
                                <div class="card">
                                    <img style="height:100%; width:100%;aspect-ratio:10/10;" src="/<?php echo $p["product_image"]; ?>" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title"><?php echo $p["product_name"]; ?></h5>
                                        <a href="<?php echo "/admin/urunler/duzenle/{$p["ID"]}"; ?>" class="btn btn-primary">Düzenle</a>
                                        <button data-product_id="<?php echo $p["ID"]; ?>" id="delete-product" class="btn btn-danger">Sil</button>
                                        <a href="<?php echo "/admin/urunler/resimler/{$p["ID"]}"; ?>" class="btn btn-warning">Resimler</a>
                                        <br>
                                        <a href="<?php echo "/admin/urunler/urunYorumlari/{$p["ID"]}"; ?>" class="btn btn-info mt-1">Ürün yorumları</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <?php echo view("Admin/Admin/includes/scripts"); ?>
        <script src="/admin_assets/js/products/products.js"></script>
</body>


</html>