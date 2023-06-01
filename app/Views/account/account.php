<!doctype html>
<html lang="en">


<?php echo view("includes/head");?>

<body>

   <!-- Start header area -->
   <?php echo view("includes/header");?>
    <!-- End header area -->

    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content">
                            <h1 class="breadcrumb__content--title text-white mb-10">Hesabım</h1>
                            <ul class="breadcrumb__content--menu d-flex">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Ana Sayfa</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Hesabım</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->
        
        <!-- my account section start -->
        <section class="my__account--section section--padding">
            <div class="container">
                <p class="account__welcome--text">Hoşgeldin <span><?php echo $user;?></span></p>
                <div class="my__account--section__inner border-radius-10 d-flex">
                    <div class="account__left--sidebar">
                        <h3 class="account__content--title mb-20">Profilim</h3>
                        <ul class="account__menu">
                            <li class="account__menu--list active"><a href="<?php echo base_url("hesap");?>">Siparişler</a></li>
                            <li class="account__menu--list"><a href="<?php echo base_url("hesap/adresler");?>">Adresler</a></li>
                            <li class="account__menu--list"><a href="<?php echo base_url("istekListesi")?>">İstek Listesi</a></li>
                            <li class="account__menu--list"><a href="<?php echo base_url("cikis");?>">Çıkış Yap</a></li>
                        </ul>
                    </div>
                    <div class="account__wrapper">
                        <div class="account__content">
                            <h3 class="account__content--title mb-20">Sipariş Geçmişi</h3>
                            <div class="account__table--area">
                                <table class="account__table">
                                    <thead class="account__table--header">
                                        <tr class="account__table--header__child">
                                            <th class="account__table--header__child--items">Sipariş Numarası</th>
                                            <th class="account__table--header__child--items">Sipariş Tarihi</th>
                                            <th class="account__table--header__child--items">Sipariş Durumu</th>
                                            <th class="account__table--header__child--items">Toplam</th>
                                            <th class="account__table--header__child--items">Sipariş detayı</th>	 	
                                        </tr>
                                    </thead>
                                    <tbody class="account__table--body mobile__none">
                                        <?php
                                        for($i=0;$i<count($orders["payment_id"]);$i++):
                                            ?>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items"><?php echo $orders["payment_id"][$i];?></td>
                                                <td class="account__table--body__child--items"><?php echo $orders["order_date"][$i];?></td>
                                                <td class="account__table--body__child--items"><?php echo $orders["order_status"][$i];?></td>
                                                <td class="account__table--body__child--items"><?php echo $orders["order_total"][$i];?> TL</td>
                                                <td class="account__table--body__child--items"><a class="order-detail-link" href="<?php echo base_url("hesap/siparisdetayi/{$orders["ID"][$i]}");?>">Sipariş detayı</a></td>
                                            </tr>
                                       <?php endfor; ?>
                                    </tbody>
                                    <tbody class="account__table--body mobile__block">
                                        <?php 
                                            for($i=0;$i<count($orders["payment_id"]);$i++):
                                        ?>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">
                                                    <strong>Sipariş Numarası</strong>
                                                    <span><?php echo $orders["payment_id"][$i];?></span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                <strong>Sipariş Tarihi</strong>
                                                <span><?php echo $orders["order_date"][$i];?></span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Sipariş Durumu</strong>
                                                    <span><?php echo $orders["order_status"][$i];?></span>
                                                </td>
                                                <td class="account__table--body__child--items">
                                                    <strong>Toplam</strong>
                                                    <span><?php echo $orders["order_total"][$i];?> TL</span>
                                                </td>
                                        </tr>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- my account section end -->


    </main>

    <!-- Start footer section -->
    <?php echo view("includes/footer");?>
    <!-- End footer section -->

    <?php echo view("includes/scripts");?>
  
</body>

<!-- Mirrored from risingtheme.com/html/demo-furea-v2/furea/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Feb 2022 18:07:51 GMT -->
</html>