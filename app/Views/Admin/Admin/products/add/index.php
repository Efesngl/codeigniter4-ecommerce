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
                                    <h4 class="mb-sm-0 font-size-18">Ürün Ekle</h4>
                                    <a href="<?php echo base_url("admin/urunler");?>" class="btn btn-danger">Geri Git</a>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                    <label for="product_name" class="ps-1">Ürün İsmi</label>
                                    <input type="text" name="product_name" id="product-name" class="form-control mb-3" placeholder="Ürün İsmi"> 
                                    <label for="product_price" class="ps-1">Ürün Fiyatı</label>
                                    <input type="text" name="product_price" id="product-price" class="form-control mb-3" placeholder="Ürün Fiyatı">
                                    <div class="row mb-3">
                                        <div class="col ">
                                            <label for="product_category" class="ps-1">Ürün Kategorisi</label>
                                            <select class="form-select" name="product_category" id="product-category">
                                                <?php foreach ($categories as $c) :
                                                    # code...
                                                    ?>
                                                    <option value="<?php echo $c["ID"];?>"><?php echo $c["name"];?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="product_brand"  class="ps-1">Ürün Markası</label>
                                            <select class="form-select" name="product_brand" id="product-brand">
                                                <?php foreach ($brands as $b) {
                                                    # code... ?>
                                                    <option value="<?php echo $b["ID"];?>"><?php echo $b["name"];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="product_color"  class="ps-1">Ürün Rengi</label>
                                            <select class="form-select" name="product_color" id="product-color">
                                                <option value="2">Siyah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                <label class="form-check-label" for="stock">Stokta Var</label>
                                                <input class="form-check-input" type="checkbox" name="stock" id="stock" >
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                <label class="form-check-label" for="is_discounted">İndirimde</label>
                                                <input class="form-check-input discount-price-check" type="checkbox" name="is-discounted" id="is-discounted">
                                                
                                            </div>
                                            <input type="text" name="discounted_price" id="discounted-price" class="form-control discount-price-value" style="display:none;" placeholder="İndirimli Fiyat">
                                        </div>
                                        <div class="col">
                                            <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                                <label class="form-check-label" for="is_new">Yeni</label>
                                                <input class="form-check-input" type="checkbox" name="is-new" id="is-new" checked>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="submit" id="add-product" class="btn btn-primary">Ürün Ekle</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <?php echo view("Admin/Admin/includes/scripts");?>
        <script src="/admin_assets/js/products/product_add.js"></script>
    </body>


</html>