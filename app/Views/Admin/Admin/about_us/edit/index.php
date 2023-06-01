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
                                <h4 class="mb-sm-0 font-size-18">Hakkımızda Düzenle</h4>
                            </div>
                        </div>
                        <div class="col-2 text-end">
                        <a href="<?php echo base_url("admin/hakkimizda"); ?>" class="btn btn-outline-danger">Geri Git</a>
                        </div>
                    </div>
                    <hr>
                    <!-- end page title -->
                    <form action="<?php echo base_url("admin/hakkimizda/edit");?>" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-12">
                                <h3>Hakkımızda resimleri</h3>
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col">
                                <h4>Hakkımızda resimi</h4>
                                <input type="file" name="media" value="resim seç" class="form-control" id="about-us-image-edit" accept="image/*">
                            </div>
                        </div>

                        <div class="row mb-3 mt-5">
                            <div class="col-12">
                                <h3>Hakkımızda içeriği</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h4>1. Başlık</h4>
                                <textarea name="header_1" id="">
                                    <?php echo $header_1;?>
                                </textarea>
                            </div>
                            <div class="col">
                            <h4>2. Başlık</h4>
                                <textarea name="header_2" id="">
                                    <?php echo $header_2;?>
                                </textarea>
                            </div>
                            <div class="col">
                            <h4>İçerik</h4>
                                <textarea name="content" id="">
                                    <?php echo $content;?>
                                </textarea>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12 text-center">
                                <input type="submit" value="Kaydet" class="btn btn-primary">
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <?php echo view("Admin/Admin/includes/scripts"); ?>
    <script src="https://cdn.tiny.cloud/1/fnh4xrw3sn7siw2hoygfahxwpj3un7unzwj1dvvda583d37f/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="/admin_assets/js/about_us/about_us_edit.js"></script>
</body>


</html>
<!DOCTYPE html>