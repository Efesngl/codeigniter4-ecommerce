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
                    <?php if (isset($_SESSION["edit-success"])) : ?>
                        <div style="z-index: 99999; position:absolute; top:3%; right:10px;">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                İndirim kodu başarıyla güncellendi !
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION["add-success"])) : ?>
                        <div style="z-index: 99999; position:absolute; top:3%; right:10px;">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                İndirim kodu başarıyla eklendi !
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="row justify-content-between">
                        <div class="col-10">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">İndirim kodları</h4>
                            </div>
                        </div>
                        <div class="col-2 text-end">
                            <a href="<?php echo base_url("admin/indirimler/ekle"); ?>" class="btn btn-success">İndirim Kodu Ekle</a>
                        </div>
                    </div>
                    <div class="row justify-content-end mt-3">
                        <div class="col-3">
                            <input type="text" name="ds" id="discount_search" class="form-control" placeholder="Kod Ara">
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row mt-3">
                        <div class="col-12">
                            <table class="table table-hover table-stripped table-bordered" id="discounts">
                                <thead class="table-secondary">
                                    <tr>
                                        <td>Kod</td>
                                        <td>İndirim</td>
                                        <td>Alt limit</td>
                                        <td>İndirim türü</td>
                                        <td style="width: 5%;" class="text-center">Aktif</td>
                                        <td style="width: 10%;" class="text-center">Düzenle</td>
                                    </tr>
                                </thead>
                                <tbody id="discounts_table_body">
                                    <?php foreach ($codes as $c) : ?>
                                        <tr>
                                            <td><?php echo $c["code"]; ?></td>
                                            <td><?php echo $c["discount"];
                                                echo ($c["discount_type"] == "Yüzdelik") ? " %" : " TL"; ?></td>
                                            <td><?php echo $c["min_total"]; ?> TL</td>
                                            <td><?php echo $c["discount_type"]; ?></td>
                                            <td><input type="checkbox" data-discount_id="<?php echo $c["ID"]; ?>" class="js-switch" <?php echo ($c["is_active"] == "1") ? "checked" : ""; ?>></td>
                                            <td>
                                                <a href="/admin/indirimler/duzenle/<?php echo $c["ID"]; ?>" class="btn btn-warning">Düzenle</a>
                                                <button class="btn btn-danger" data-discount_id="<?php echo $c["ID"]; ?>" id="discount_delete">Sil</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <?php echo view("Admin/Admin/includes/scripts"); ?>
    <script src="/admin_assets/js/discounts/discounts.js"></script>
</body>


</html>