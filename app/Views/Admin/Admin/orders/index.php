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
                                <h4 class="mb-sm-0 font-size-18">Siparişler</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2 d-flex justify-content-between">
                                        <div class="col-sm-4">
                                            <div class="search-box me-2 mb-2 d-inline-block">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" id="order_search" name="order_search" placeholder="Sipariş Numarası...">
                                                    <i class="bx bx-search-alt search-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 text-end">
                                            <div class="me-2 mb-2 d-inline-block">
                                                <div class="position-relative">
                                                    <p class="d-inline-block">Gösterilecek sipariş adeti : &nbsp;</p>
                                                    <select name="order-limit" id="order-limit">
                                                        <option <?php echo ($_GET["limit"] == 25) ? "selected" : ""; ?> value="25">25</option>
                                                        <option <?php echo ($_GET["limit"] == 50) ? "selected" : ""; ?> value="50">50</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-check">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="align-middle">Sipariş Numarası</th>
                                                    <th class="align-middle">Müşteri Adı (ID)</th>
                                                    <th class="align-middle">Sipariş Tarihi</th>
                                                    <th class="align-middle">Toplam</th>
                                                    <th class="align-middle">Sipariş Durumu</th>
                                                    <th class="align-middle">Detayları Görüntüle</th>
                                                    <th class="align-middle">Seçenekler</th>
                                                </tr>
                                            </thead>
                                            <tbody id="orders_table_tbody">
                                                <?php
                                                foreach ($orders as $o) :
                                                ?>
                                                    <tr>
                                                        <td><b><?php echo $o["payment_id"]; ?></b></td>
                                                        <td><?php echo $o["customer_name"] . " "; ?>(<?php echo $o["customer_id"] ?>)</td>
                                                        <td>
                                                            <?php echo $o["order_date"]; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $o["order_total"]; ?> TL
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-pill badge-soft-<?php
                                                                                                        switch ($o["order_status"]) {
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
                                                                                                        ?> font-size-12"><?php echo $o["order_status_txt"]; ?></span>
                                                        </td>
                                                        <td>
                                                            <!-- Button trigger modal -->
                                                            <button data-order_id="<?php echo $o["order_id"]; ?>" id="show-detail" data-bs-toggle="modal" data-bs-target="#order-detail-modal" class="btn btn-primary btn-sm btn-rounded">
                                                                Detayları Görüntüle
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <!-- data-bs-toggle="modal" data-bs-target="#exampleModal" -->
                                                                <button data-order_id="<?php echo $o["order_id"]; ?>" id="edit-order" data-bs-toggle="modal" data-bs-target="#order-edit-modal" style="background: none;border:none;" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                                    <button data-order_id="<?php echo $o["order_id"]; ?>" id="delete-order" style="background: none;border:none;" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if ($page_number > 1) { ?>
                                        <ul class="pagination pagination-rounded justify-content-end mb-2">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                                    <i class="mdi mdi-chevron-left"></i>
                                                </a>
                                            </li>
                                            <?php for ($i = 1; $i <= $page_number; $i++) : ?>
                                                <li class="page-item <?php echo ($_GET["page"] == $i) ? "active" : ""; ?>"><a class="page-link" href="<?php echo base_url("admin/siparisler/?page={$i}&limit={$_GET["limit"]}"); ?>"><?php echo $i; ?></a></li>
                                            <?php endfor; ?>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                                    <i class="mdi mdi-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    <?php } else { ?>
                                        <ul class="pagination pagination-rounded justify-content-end mb-2">
                                            <li class="page-item active"><a class="page-link" href="<?php echo base_url("admin/siparisler/?page=1"); ?>">1</a></li>
                                        </ul>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- order details modal -->
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
                                    <p class="mb-2" style="display:none;" id="detail-discount-code-wrapper">Kullanılan indirim kodu: <span class="text-primary" id="detail-discount_code"></span></p>
                                    <p class="mb-2" id="detail-picker-wrapper">Sipariş Teslim alıcak kişi: <span class="text-primary" id="detail-picker_name"></span></p>
                                    <p class="mb-4" id="detail-address-wrapper">Sipariş Adresi: <span class="text-primary" id="detail-order-address"></span></p>
                                    
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
                </div>

            </div>
        </div>
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <?php echo view("Admin/Admin/includes/scripts"); ?>
    <script src="/admin_assets/js/orders/orders.js"></script>
</body>


</html>