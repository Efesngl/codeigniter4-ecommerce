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
                                <h4 class="mb-sm-0 font-size-18">Müşteri Düzenle</h4>
                            </div>
                        </div>
                        <div class="col-2 text-end">
                            <a href="<?php echo base_url("admin/musteriler");?>" class="btn btn-danger">Geri git</a>
                        </div>
                    </div>
                    <!-- end page title -->

                        <div class="row">
                        <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label" for="firstname">Ad</label>
                                        <input type="text" class="form-control" placeholder="Ad" id="first-name" name="firstname" value="<?php echo $firstname; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label" for="lastname">Soyad</label>
                                        <input type="text" class="form-control" placeholder="Soyad" id="last-name" name="lastname" value="<?php echo $lastname; ?>">
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-4">
                                        <label class="form-label" for="email">E-posta</label>
                                        <input type="text" class="form-control" placeholder="Eposta" id="email" name="email" value="<?php echo $email; ?>">
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label" for="password">Şifre</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" placeholder="Şifre" name="password" id="password" value="<?php echo $password; ?>">
                                            <button type="button" class="btn btn-secondary" id="show-password"><i class="fa-solid fa-eye"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 text-center">
                                        <button type="submit" data-customer_id="<?php echo $ID;?>" id="edit-customer" class="btn btn-primary">Kaydet</button>
                                    </div>
                                </div>
                            <?php if(count($addresses)>0){?>
                            <div class="row mt-5">
                                    <div class="col-12">
                                        <h5>Adresler</h5>
                                        <div class="accordion">
                                            <?php $i=0; foreach($addresses as $a):$i++;?>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading<?php echo $i;?>">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i;?>" aria-expanded="true" aria-controls="collapse<?php echo $i;?>">
                                                        <?php echo $a["address_name"];?>
                                                    </button>
                                                </h2>
                                                <div id="collapse<?php echo $i;?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $i;?>" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="address_name">Adres İsmi</label>
                                                                <input type="text" id="address-name" name="address_name" class="form-control" value="<?php echo $a["address_name"];?>">
                                                            </div>
                                                            <div class="col">
                                                                <label for="il<?php echo $i;?>">İl</label>
                                                                <input type="text" class="form-control" id="city" name="city" value="<?php echo $a["city"];?>">
                                                            </div>
                                                            <div class="col">
                                                                <label for="mahalle<?php echo $i;?>">Telefon numarası</label>
                                                                <input type="text" class="form-control" id="phone-number" name="phone_number" value="<?php echo $a["phone_number"];?>">  
                                                            </div>
                                                            <div class="col">
                                                                <label for="phone<?php echo $i;?>">Teslim alan kişi adı</label>
                                                                <input type="text" class="form-control" id="picker_first_name" name="picker_first_name" value="<?php echo $a["picker_first_name"];?>">  
                                                            </div>
                                                            <div class="col">
                                                                <label for="zip_code<?php echo $i;?>">Teslim alan kişi soyadı</label>
                                                                <input type="text" class="form-control" id="picker_last_name" name="picker_last_name" value="<?php echo $a["picker_last_name"];?>">  
                                                            </div>
                                                        </div>
                                                        <div class="row mt-1">
                                                        <div class="col">
                                                                <label for="ilce<?php echo $i;?>">Tam adres</label>
                                                                <input type="text" class="form-control" id="full-address" name="full_address" value="<?php echo $a["full_address"];?>">  
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-12 text-center">
                                                                <button type="submit" data-i="<?php echo $i;?>" data-address_id="<?php $a["ID"];?>" id="edit-address" class="btn btn-primary">Kaydet</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach;?>
                                        </div>
                                    </div>
                            </div>                            
                        </div>
                    </div>
                    <?php } else{?>
                        <div class="row mt-5">
                            <h5>Adres bilgisi yok !</h5>
                        </div>
                    <?php } ?>    

                </div>

            </div>
        </div>
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <?php echo view("Admin/Admin/includes/scripts"); ?>
    <script src="/admin_assets/js/customers/customer_edit.js"></script>
</body>


</html>