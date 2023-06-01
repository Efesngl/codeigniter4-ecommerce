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
                        <div class="col-10">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Müşteriler</h4>
                            </div>
                        </div>
                        <div class="col-2">
                            <input type="text" name="cs" id="customer_search" class="form-control" placeholder="Müşteri Ara">
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row mt-3">
                        <div class="col-12">
                            <table class="table table-hover table-stripped table-bordered" id="customers">
                                <thead class="table-secondary">
                                    <tr>
                                        <td>ID</td>
                                        <td>Müşteri İsmi</td>
                                        <td>E-posta</td>
                                        <td style="width: 10%;" class="text-center">Düzenle</td>
                                    </tr>
                                </thead>
                                <tbody id="customers_table_body">
                                    <?php foreach ($customers as $c) : ?>
                                        <tr>
                                            <td><?php echo $c["ID"] ?></td>
                                            <td><?php echo $c["customer_name"]; ?></td>
                                            <td><?php echo $c["email"]; ?></td>
                                            <td>
                                                <a href="/admin/musteriler/duzenle/<?php echo $c["ID"]; ?>" class="btn btn-warning">Düzenle</a>
                                                <button data-user_id="<?php echo $c["ID"]; ?>" class="btn btn-danger" id="delete-user">Sil</button>
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

    <script src="/admin_assets/js/customers/customers.js"></script>
</body>


</html>