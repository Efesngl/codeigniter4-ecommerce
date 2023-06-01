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
                                <h4 class="mb-sm-0 font-size-18">Kategoriler</h4>
                                <a href="<?php echo base_url("admin/kategoriler/kategoriEkle"); ?>" class="btn btn-success">Kategori Ekle</a>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row mb-3">
                        <div class="col text-end">
                            <input type="text" class="w-25 d-inline form-control cat-search" id="category_search" placeholder="Kategori Ara">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col">
                            <table class="table table-striped table-hover table-bordered">
                                <thead class="table-secondary">
                                    <tr>
                                        <td style="width: 90%;">Kategori İsmi</td>
                                        <td class="text-center" style="width: 10%;">Düzenle</td>
                                    </tr>
                                </thead>
                                <tbody id="categories_table_body">
                                    <?php function MakeCategory($cats,$ischild=false,$index=0)
                                    {
                                        foreach ($cats as $cat) : ?>
                                            <tr <?php if($ischild!=false):echo "class='table-primary'";endif;?>>
                                                <td class="cat-name">
                                                    <?php 
                                                        $dash="";for ($i=0; $i < $index; $i++) { 
                                                            # code...
                                                            $dash.="-";
                                                        }
                                                        echo $dash.$cat["category"];
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo "/admin/kategoriler/kategoriDuzenle/{$cat["ID"]}"; ?>" class="btn btn-warning">Düzenle</a>
                                                    <button id="delete-category" data-category_id="<?php echo $cat["ID"]; ?>" class="btn btn-danger">Sil</button>
                                                </td>
                                            </tr>
                                            <?php if(isset($cat["child"])):MakeCategory($cat["child"],true,++$index);--$index;endif;  ?>
                                    <?php endforeach;
                                    } MakeCategory($categories);?>
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
    <script src="/admin_assets/js/categories/categories.js"></script>
</body>


</html>