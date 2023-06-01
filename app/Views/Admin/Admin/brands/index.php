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
                                <h4 class="mb-sm-0 font-size-18">Markalar</h4>
                                <a href="<?php echo base_url("admin/markalar/markaEkle"); ?>" class="btn btn-success">Marka Ekle</a>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row mb-3">
                        <div class="col text-end">
                            <input type="text" name="brand_search" id="brand_search" class="w-25 d-inline form-control brand-search" placeholder="Marka Ara">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col">
                            <table class="table table-striped table-hover table-bordered">
                                <thead class="table-secondary">
                                    <tr>
                                        <td style="width: 90%;">Marka İsmi</td>
                                        <td class="text-center" style="width: 10%;">Düzenle</td>
                                    </tr>
                                </thead>
                                <tbody id="brands_table_body">
                                    <?php foreach ($brands as $b) :
                                    ?>
                                        <tr>
                                            <td class="brand-name"><?php echo $b["brand"]; ?></td>
                                            <td>
                                                <a href="/<?php echo "admin/markalar/markaDuzenle/{$b["ID"]}"; ?>" class="btn btn-warning">Düzenle</a>
                                                <button data-brand_id="<?php echo $b["ID"];?>" class="btn btn-danger delete-brand">Sil</button>
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
    <script src="/admin_assets/js/brands/brands.js"></script>
</body>


</html>