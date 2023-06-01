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
                                <h4 class="mb-sm-0 font-size-18">Ana Sayfa</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card overflow-hidden">
                                <div class="bg-primary bg-soft">
                                    <div class="row">
                                        <div class="col-7">
                                            <div class="text-primary p-3">
                                                <h5 class="text-primary">Hoşgeldiniz !</h5>
                                                <p><?php echo $user["username"];?></p>
                                            </div>
                                        </div>
                                        <div class="col-5 align-self-end">
                                            <img src="<?php echo base_url("admin_assets/images/profile-img.png"); ?>" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium">Toplam Sipariş</p>
                                                    <h4 class="mb-0"><?php echo $total_order; ?></h4>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center">
                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-copy-alt font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="text-muted fw-medium">Toplam Kazanç</p>
                                                    <h4 class="mb-0"><?php echo number_format($total_earning, 2, ".", ","); ?> TL</h4>
                                                </div>

                                                <div class="flex-shrink-0 align-self-center ">
                                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="bx bx-archive-in font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-3">Aylık Kazanç</h4>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="text-muted">Bu Ay</p>
                                                    <h3><?php echo number_format($montly_earning, 2, ".", ","); ?> TL</h3>
                                                    <p class="text-muted">Önceki Aydan <span class="text-<?php if ($diff_from_last_month < 0) {
                                                                                                                echo "danger";
                                                                                                            } else {
                                                                                                                echo "success";
                                                                                                            } ?> me-2">%<?php echo $diff_from_last_month; ?> <i class="mdi mdi-arrow-<?php if ($diff_from_last_month < 0) {
                                                                                                                                                                                            echo "down";
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo "up";
                                                                                                                                                                                        } ?>"></i></span>Daha <?php if ($diff_from_last_month < 0) {
                                                                                                                                                                                                                    echo "Az";
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    echo "Fazla";
                                                                                                                                                                                                                } ?> Kazanç</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex flex-wrap">
                                    <h4 class="card-title mb-4">Satış Yapıldı</h4>
                                    <div class="ms-auto">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item">
                                                <button class="nav-link monthly-sales active" id="monthly-sales">Aylık</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link yearly-sales" id="yearly-sales">Yıllık</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Son işlemler</h4>
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="align-middle">Sipariş Numarası</th>
                                                    <th class="align-middle">Kişi Adı</th>
                                                    <th class="align-middle">Tarih</th>
                                                    <th class="align-middle">Toplam</th>
                                                    <th class="align-middle">Ödeme Durumu</th>
                                                    <th class="align-middle">Detayları Görüntüle</th>
                                                    <th>Seçenekler</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($last_orders as $lo):?>
                                                <tr>
                                                    <td><a href="javascript: void(0);" class="text-body fw-bold"><?php echo $lo["payment_id"];?></a> </td>
                                                    <td><?php echo $lo["full_name"];?></td>
                                                    <td>
                                                        <?php echo $lo["order_date"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo number_format($lo["order_total"],2,".",",");?> TL
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-pill badge-soft-<?php
                                                                                                switch ($lo["order_status_id"]) {
                                                                                                    case '1':
                                                                                                        # code...
                                                                                                        echo "info";
                                                                                                        break;
                                                                                                    case "2":
                                                                                                        echo "warning";
                                                                                                        break;
                                                                                                    case "3":
                                                                                                        echo "primary";
                                                                                                        break;
                                                                                                    case "4":
                                                                                                        echo "success";
                                                                                                        break;
                                                                                                    default:
                                                                                                        echo "danger";
                                                                                                        break;
                                                                                                }
                                                        ?> font-size-11"><?php echo $lo["order_status_txt"];?></span>
                                                    </td>
                                                    <td>
                                                        <!-- Button trigger modal -->
                                                        <button data-order_id=<?php echo $lo["order_id"];?> type="button" id="show-detail" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#order-detail-modal">
                                                            Detayları Görüntüle
                                                        </button>
                                                    </td>
                                                    <td>
                                                            <div class="d-flex gap-3">
                                                                <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                                                                <button data-order_id="<?php echo $lo["order_id"]; ?>" id="edit-order" data-bs-toggle="modal" data-bs-target="#order-edit-modal" style="background: none;border:none;" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                                <button data-order_id="<?php echo $lo["order_id"]; ?>" id="delete-order" style="background: none;border:none;" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></button>
                                                            </div>
                                                        </td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end table-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!-- order detail Modal -->
            <div class="modal fade orderdetailsModal" id="order-detail-modal" tabindex="-1" aria-labelledby="orderdetailsModalLabel" aria-modal="true" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="orderdetailsModalLabel&quot;">Sipariş Detayları</h5>
                                    <button type="button" class="btn-close detail-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-2">Sipariş ID'si: <span class="text-primary" id="detail-order_id"></span> &nbsp; Sipariş Numarsı: <span class="text-primary" id="detail-payment_id"></span></p>
                                    <!-- <p class="mb-2"></p> -->
                                    <p class="mb-2">Müşteri Adı: <span class="text-primary" id="detail-customer_name"></span></p>
                                    <p class="mb-4" style="display:none;" id="detail-discount-code-wrapper">Kullanılan indirim kodu: <span class="text-primary" id="detail-discount_code"></span></p>

                                    <div class="table-responsive">
                                        <table id="detail-product-table" class="table align-middle table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Ürün</th>
                                                </tr>
                                            </thead>
                                            <tbody id="detail-order-tbody">

                                                <tr id="detail-total-tr">
                                                    <td colspan="1">
                                                        <h6 class="m-0 text-right">Toplam :</h6>
                                                    </td>
                                                    <td id="detail-total">

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="detail-close-btn" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- end modal -->


            <!-- order edit modal -->
            <div class="modal fade" id="order-edit-modal" tabindex="-1" aria-labelledby="order-edit-modal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Sipariş Durumu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label for="order_statuses">Sipariş Durumu</label>
                                    <select class="form-select" name="order_statuses" id="order_statuses">
                                        <?php foreach ($order_statuses as $os) : ?>
                                            <option value="<?php echo $os["ID"]; ?>" ?><?php echo $os["status"]; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="order-edit-save">Kaydet</button>
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- end modal -->


        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <?php echo view("Admin/Admin/includes/scripts");?>
    <script src="/admin_assets/js/home.js"></script>
</body>


</html>