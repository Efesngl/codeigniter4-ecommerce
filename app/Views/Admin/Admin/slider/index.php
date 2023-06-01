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
                                <h4 class="mb-sm-0 font-size-18">Slider</h4>
                            </div>
                        </div>
                        <div class="col-2 text-end">
                            <a href="<?php echo base_url("admin/slider/ekle"); ?>" class="btn btn-success">Slider ekle</a>
                        </div>
                    </div>
                    <br>

                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-stripped table-hover table-bordered">
                                <thead class="table-secondary">
                                    <tr>
                                        <td style="width:30% ;">Slider Resmi</td>
                                        <td style="width:20% ;">Slider Başlığı</td>
                                        <td style="width:30% ;">Slider Açıklaması</td>
                                        <td class="text-center" style="width:5% ;">Aktif</td>
                                        <td class="text-center" style="width:10% ;">Düzenle</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($sliders as $s) : ?>
                                        <tr>
                                            <td><img style="width: 100%;" src="<?php echo base_url($s["image"]); ?>" alt=""></td>
                                            <td><?php echo $s["header"]; ?></td>
                                            <td><?php echo $s["text"]; ?></td>
                                            <td>
                                                <input type="checkbox" data-slider_id="<?php echo $s["ID"];?>" class="js-switch" name="" id="" <?php echo ($s["is_active"] == "1") ? "checked" : ""; ?>>
                                            </td>
                                            <td class="text-center">
                                                <a href="/admin/slider/duzenle/<?php echo $s["ID"]; ?>" class="btn btn-warning">Düzenle</a>
                                                <button data-slider_id="<?php echo $s["ID"]; ?>"  class="btn btn-danger slider-delete">Sil</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END layout-wrapper -->

                <!-- JAVASCRIPT -->
                <?php echo view("Admin/Admin/includes/scripts"); ?>
                <script src="/admin_assets/js/slider/slider.js"></script>
</body>


</html>
<!DOCTYPE html>