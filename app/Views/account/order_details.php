<!doctype html>
<html lang="en">


<?php echo view("includes/head"); ?>

<body>

    <!-- Start header area -->
    <?php echo view("includes/header"); ?>
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
                <p class="account__welcome--text"><span><?php echo $order["payment_id"];?></span> Numaralı sipariş</p>
                <div class="my__account--section__inner border-radius-10 d-flex">
                    <div class="account__left--sidebar">
                        <h3 class="account__content--title mb-20">Profilim</h3>
                        <ul class="account__menu">
                            <li class="account__menu--list active"><a href="<?php echo base_url("hesap"); ?>">Siparişler</a></li>
                            <li class="account__menu--list"><a href="<?php echo base_url("hesap/adresler"); ?>">Adresler</a></li>
                            <li class="account__menu--list"><a href="<?php echo base_url("istekListesi") ?>">İstek Listesi</a></li>
                            <li class="account__menu--list"><a href="<?php echo base_url("cikis"); ?>">Çıkış Yap</a></li>
                        </ul>
                    </div>
                    <div class="account__wrapper">
                        <div class="account__content">
                            <a href="<?php echo base_url("hesap"); ?>"><- Tüm siparişlere geri dön</a>
                            <h3 class="account__content--title mb-20"><?php echo $order["payment_id"]; ?>'no lu sipariş detayı</h3>
                            <h4 style="display:inline-block;">Sipariş Durumu: &nbsp;</h4><span><?php echo $order["status"];?></span><br>
                            <div style="display:flex;justify-content:space-between">
                                <div><h4 style="display:inline-block;">Sipariş Teslim Alıcak Kişi: &nbsp;</h4><span><?php echo $order["picker_name"];?></span></div>
                                <div><h4 style="display:inline-block;">Sipariş Adresi: &nbsp;</h4><span><?php echo $order["address"];?></span></div>
                            </div>
                            <div style="display: flex;justify-content:space-between">
                                <div><h4 style="display:inline-block;">Sipariş Toplamı: &nbsp;</h4><span><?php echo number_format($order["order_total"],2,".",",");?> TL</span></div>
                            <?php if(isset($order["used_discount_code"])):?>
                                <div><h4 style="display:inline-block;">İndirim kodu: &nbsp;</h4><span><?php echo $order["used_discount_code"];?></span></div>
                            <?php endif;?>
                            </div>
                            <div class="account__table--area">
                                <table class="account__table">
                                    <thead class="account__table--header">
                                        <tr class="account__table--header__child">
                                            <th class="account__table--header__child--items">Ürün adı</th>
                                            <th class="account__table--header__child--items">Ürün adedi</th>
                                            <th class="account__table--header__child--items">Ürün fiyatı</th>
                                            <th class="account__table--header__child--items">Toplam Fiyat</th>
                                        </tr>
                                    </thead>
                                    <tbody class="account__table--body mobile__none">
                                        <?php
                                        foreach ($products as $p) :
                                        ?>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items"><a href="<?php echo base_url("urun/{$p["product_name"]}");?>"><?php echo $p["product_name"]; ?></a></td>
                                                <td class="account__table--body__child--items"><?php echo $p["quantity"]; ?></td>
                                                <td class="account__table--body__child--items"><?php echo number_format($p["order_product_price"],2,".",","); ?> TL</td>
                                                <td class="account__table--body__child--items"><?php echo number_format($p["product_total"],2,".",","); ?> TL</td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tbody class="account__table--body mobile__block">
                                    <?php
                                        foreach ($products as $p) :
                                        ?>
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items"><a href="<?php echo base_url("urun/{$p["product_name"]}");?>"><?php echo $p["product_name"]; ?></a></td>
                                                <td class="account__table--body__child--items"><?php echo $p["product_price"]; ?> TL</td>
                                            </tr>
                                        <?php endforeach; ?>
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
    <?php echo view("includes/footer"); ?>
    <!-- End footer section -->

    <?php echo view("includes/scripts"); ?>

</body>

<!-- Mirrored from risingtheme.com/html/demo-furea-v2/furea/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Feb 2022 18:07:51 GMT -->

</html>