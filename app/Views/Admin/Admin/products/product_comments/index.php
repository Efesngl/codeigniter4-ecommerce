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
                                <h4 class="mb-sm-0 font-size-18"><?php echo $product_name;?> adlı Ürün yorumları</h4>
                                <a href="/admin/urunler" class="btn btn-danger">Geri Git</a>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row mb-3">
                        <div class="col text-end">
                            <input type="text" name="comment-search" id="comment-search" class="w-25 d-inline form-control comment-search" placeholder="Yorum Ara">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col">
                            <table class="table table-striped table-hover table-bordered">
                                <thead class="table-secondary">
                                    <tr>
                                        <td style="width: 20%;">Müşteri ismi</td>
                                        <td>Yorum</td>
                                        <td style="width: 5%;">Yıldız</td>
                                        <td class="text-center" style="width: 5%;">Sil</td>
                                    </tr>
                                </thead>
                                <tbody id="brands_table_body">
                                    <?php foreach ($comments as $c) :
                                    ?>
                                        <tr>
                                            <td class="customer-name"><?php echo $c["customer_name"]; ?></td>
                                            <td class="comment"><?php echo $c["comment"]; ?></td>
                                            <td class="star text-center"><?php echo $c["star"]; ?></td>
                                            <td>
                                                <button data-comment_id="<?php echo $c["ID"];?>" class="btn btn-danger delete-comment">Sil</button>
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
    <script src="/admin_assets/js/products/product_comments.js"></script>
</body>


</html>