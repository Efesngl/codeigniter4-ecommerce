<!DOCTYPE html>
<html lang="tr">

    <?php echo view("Admin/Admin/includes/head");?>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

        <?php echo view("Admin/Admin/includes/header");?>

            

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
                                    <h4 class="mb-sm-0 font-size-18">Kategori Düzenle</h4>
                                    <a href="<?php echo base_url("admin/kategoriler");?>" class="btn btn-danger">Geri Git</a>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <form action="<?php echo base_url("admin/kategoriler/categoryEdit/$ID");?>" method="POST">
                                    <input type="hidden" name="ID" value="<?php echo $ID;?>">
                                    <label for="category_name" class="ps-1">Kategori İsmi</label>
                                    <input type="text" name="category_name" class="form-control mb-3" placeholder="Kategori İsmi" value="<?php echo $category_name;?>">
                                    <label for="subcat">Ana Kategori</label>
                                    <select class="form-select" name="subcat" id="subcat">
                                        <option value="0" <?php if($parent==0):?>selected<?php endif;?>>---</option>
                                        <?php foreach($categories as $cat):?>
                                            <option value="<?php echo $cat["ID"];?>" <?php if($parent==$cat["ID"]):?>selected<?php endif;?>><?php echo $cat["name"];?></option>
                                        <?php endforeach;?>
                                    </select> 
                                    <div class="row pt-2">
                                        <div class="col text-center">
                                            <button type="submit" class="btn btn-primary">Kaydet</button>
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
        <?php echo view("Admin/Admin/includes/scripts");?>
    </body>


</html>