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
                                <h4 class="mb-sm-0 font-size-18">Ürün Düzenle</h4>
                                <a href="<?php echo base_url("admin/urunler"); ?>" class="btn btn-danger">Geri Git</a>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <form action="<?php echo base_url("admin/urunler/productedit"); ?>" id="product-form" method="POST">
                                <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                                <label for="product_name" class="ps-1">Ürün İsmi</label>
                                <input type="text" name="product_name" class="form-control mb-3" placeholder="Ürün İsmi" value="<?php echo $product_name; ?>">
                                <label for="product_price" class="ps-1">Ürün Fiyatı</label>
                                <input type="text" name="product_price" class="form-control mb-3" placeholder="Ürün Fiyatı" value="<?php echo $product_price; ?>">
                                <div class="row mb-3">
                                    <div class="col ">
                                        <label for="product_category" class="ps-1">Ürün Kategorisi</label>
                                        <select class="form-select" name="product_category" id="">
                                            <option value="" <?php if ($product_category == "null"):?> selected <?php endif; ?>>---</option>
                                            <?php foreach ($categories as $c) :
                                                # code...
                                            ?>
                                                <option <?php if ($c["name"] == $product_category) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $c["ID"]; ?>"><?php echo $c["name"]; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="product_brand" class="ps-1">Ürün Markası</label>
                                        <select class="form-select" name="product_brand" id="">
                                            <option value="" <?php if ($product_brand == "null") :?> selected <?php endif; ?>>---</option>
                                            <?php foreach ($brands as $b) :
                                                # code... 
                                            ?>
                                                <option <?php if ($b["name"] == $product_brand) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $b["ID"]; ?>"><?php echo $b["name"]  ; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="product_color" class="ps-1">Ürün Rengi</label>
                                        <select class="form-select" name="product_color" id="">
                                            <option value="">Siyah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                            <label class="form-check-label" for="stock">Stokta Var</label>
                                            <input class="form-check-input" type="checkbox" name="stock" id="stock" <?php if ($product_status == 1) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                            <label class="form-check-label" for="is_discounted">İndirimde</label>
                                            <input class="form-check-input discount-price-check" type="checkbox" name="is_discounted" id="is_discounted" <?php if ($is_discounted == 1) {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>

                                        </div>
                                        <input type="text" name="discounted_price" class="form-control discount-price-value" value="<?php echo $discounted_price; ?>" style="display:none;" placeholder="İndirimli Fiyat">
                                    </div>
                                    <div class="col">
                                        <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                            <label class="form-check-label" for="is_new">Yeni</label>
                                            <input class="form-check-input" type="checkbox" name="is_new" id="is_new" <?php if ($is_new == 1) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="product-desc">Ürün açıklaması</label>
                                    <textarea class="form" name="product-desc" id="product-desc">
                                        <?php echo $product_desc;?>
                                    </textarea>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" id="submit" class="btn btn-primary">Kaydet</button>
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
        <?php echo view("Admin/Admin/includes/scripts"); ?>
        <script src="<?php echo base_url("admin_assets/libs/tinymce/tinymce.min.js"); ?>"></script>
        <script src="/admin_assets/js/products/product_edt.js"></script>

</body>


</html>