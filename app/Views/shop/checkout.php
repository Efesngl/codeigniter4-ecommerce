<!doctype html>
<html lang="en">


<?php echo view("includes/head");?>
<style>
    #checkout-loading{
        display: none;
    }
</style>
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
                            <h1 class="breadcrumb__content--title text-white mb-10">Ödeme</h1>
                            <ul class="breadcrumb__content--menu d-flex">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="<?php echo base_url();?>">Ana Sayfa</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Ödeme</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start checkout page area -->
        <div class="checkout__page--area section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="main checkout__mian">
                                <!-- <div class="checkout__content--step section__contact--information">
                                    <div class="section__header checkout__section--header d-flex align-items-center justify-content-between mb-25">
                                        <h2 class="section__header--title h3">İletişim Bilgileri</h2>
                                    </div>
                                </div> -->
                                <div class="checkout__content--step section__shipping--address">
                                    <div class="section__header mb-25">
                                        <h2 class="section__header--title h3">Ödeme Bilgileri</h2>
                                    </div>
                                    <div class="section__shipping--address__content">                                        
                                            <?php  if(count($addresses)>0): ?>
                                                <label for="addresses" class="checkout__input--label">Adres :</label>
                                                <select style="margin-bottom: 2rem;" class="checkout__input--select__field" name="addresses" id="addresses">
                                                <?php foreach($addresses as $a):?>
                                                    <option value="<?php echo $a["ID"];?>"><?php echo $a["address_name"];?></option>    
                                                <?php endforeach;?></select>
                                                <?php else:?>
                                                    <h4>Lütfen Devam etmek için adres ekleyin !</h4>
                                                    <button style="width: 100%;" id="add-new-address" class="add-address-checkout primary__btn">Adres Ekle</button>    
                                                <?php endif;?>
                                        <br>
                                    </div>

                                </div>
                                    <!-- <div class="order-notes mb-20">
                                        <label class="checkout__input--label mb-5" for="order">Sipariş Notu <span class="checkout__input--label__star">*</span></label>
                                    <textarea class="checkout__notes--textarea__field border-radius-5" id="order" placeholder="Notes about your order, e.g. special notes for delivery." spellcheck="false"></textarea>
                                    </div> -->
                                <div class="checkout__content--step__footer d-flex align-items-center">
                                    <a class="previous__link--content" href="<?php echo base_url("sepet");?>"><- Sepete geri dön</a>
                                </div>
                        </div>
                    </div>
                    <?php if(count($addresses)>0):?>
                    <div class="col-lg-5 col-md-6 " id="checkout-info">
                        <aside class="checkout__sidebar sidebar border-radius-10">
                            <h2 class="checkout__order--summary__title text-center mb-15">Sipariş Özetiniz</h2>
                            <div class="cart__table checkout__product--table">
                                <table class="cart__table--inner">
                                    <tbody class="cart__table--body">
                                        <?php
                                        foreach($products as $p):
                                        ?>
                                        <tr class="cart__table--body__items" data-product_id="<?php echo $p["ID"];?>">
                                            <td class="cart__table--body__list">
                                                <div class="product__image two  d-flex align-items-center">
                                                    <div class="product__thumbnail border-radius-5">
                                                        <a class="display-block" href="/urun/<?php echo $p["product_name"];?>"><img class="display-block border-radius-5" src="/<?php echo $p["image"];?>" alt="cart-product"></a>
                                                        <span class="product__thumbnail--quantity"><?php echo $p["quantity"];?></span>
                                                    </div>
                                                    <div class="product__description">
                                                        <h4 class="product__description--name"><a href="/urun/<?php echo $p["product_name"];?>"><?php echo $p["product_name"];?></a></h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list" >
                                                <?php
                                                    if(isset($p["discounted_total"])): ?>
                                                       <span class='cart__price' ><span class='cart-product-price'><?php echo number_format($p["discounted_total"],2,".",",");?></span> TL</span>
                                                    <?php else:?>
                                                        <span class='cart__price' ><span class='cart-product-price'><?php echo number_format($p["total"],2,".",",");?></span> TL</span>
                                                    <?php endif;?>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table> 
                            </div>
                            <div class="checkout__discount--code">
                                        <input class="checkout__discount--code__input--field border-radius-5" placeholder="İndirim kodu" id="discount" name="discount"  type="text">
                                        <button id="submit-discount" class="checkout__discount--code__btn primary__btn border-radius-5">Uygula</button>
                            </div>
                            <div id="remove-discount">
                                <button id="remove-discount-button"><i class="fa-solid fa-xmark"></i></button> <span id="discount-code"></span>
                            </div>
                            <div class="checkout__total mb-10">
                                <table class="checkout__total--table">
                                    <tbody class="checkout__total--body">
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">Sepet Toplamı</td>
                                            <td class="checkout__total--amount text-right" id="subtotal" style="text-decoration: line-through;opacity:0.5;"><?php echo number_format($total,2,".",",");?> TL</td>
                                        </tr>
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">Kargo</td>
                                            <td class="checkout__total--calculated__text text-right"><?php echo $shipping_price;?> TL</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="checkout__total--footer">
                                        <tr class="checkout__total--footer__items">
                                            <td class="checkout__total--footer__title checkout__total--footer__list text-left">Toplam</td>
                                            <td class="checkout__total--footer__amount checkout__total--footer__list text-right"><span id="total"><?php echo number_format($subtotal,2,".",",");?></span> TL</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="mb-5" id="payment-credit-card">
                            <h4>Kart üzerindeki isim <span style="color: var(--secondary-color);">*</span></h4>
                                <input type="text" name="card_holder" id="card_holder" placeholder="Kart üzerindeki isim" class="checkout__input--field border-radius-5 mb-25">
                                <h4>Kart Numaranız <span style="color: var(--secondary-color);">*</span><span id="check-card" style="color:var(--secondary-color);display:none;">Lütfen Geçerli Bir kart numarası giriniz !</span></h4>
                                <input type="text" name="card_number" id="card_number" placeholder="Kart numaranız" class="checkout__input--field border-radius-5 mb-25">
                                <h4>Son Kullanma Tarihi <span style="color: var(--secondary-color);">*</span></h4>
                                <label for="last-use-moth">Ay</label>
                                <select name="card_expire_month" class="checkout__input--select__field" id="card_expire_month">
                                    <option value="00">00</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>

                                <label for="last-use-year">Yıl</label>
                                <select name="card_expire_year" class="checkout__input--select__field mb-25" id="card_expire_year">
                                    <option value="00">00</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                </select>
                                <h4>CVV</h4>
                                <input type="text" name="cvv" id="cvv" class="checkout__input--field mb-10" placeholder="CVV">
                            </div>
                            <button class="checkout__now--btn primary__btn disabled-btn" type="submit" ><span id="checkout-text">Sepeti Onayla</span> <span id="checkout-loading"><i class="fa-solid fa-spin fa-spinner"></i></span></button>
                        </aside>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <!-- End checkout page area -->

        <!-- offcanvas add address -->
        <div id="offcanvas-address">
        <div id="offcanvas-content-container">
            <div id="offcanvas-address-close-button">
                <i id="offcanvas-close" class="fa-solid fa-xmark fa-2xl"></i>
            </div>
            <div id="offcanvas-address-main-content">
                <h3>Adres Bilgileri</h3>
                <label>
                    <input class="account__login--input" name="address_id" id="address_id" type="hidden">
                </label>
                <label>
                    <input class="account__login--input" name="picker_firstname" id="picker_firstname" placeholder="Teslim alacak kişinin adı" type="text">
                </label>
                <label>
                    <input class="account__login--input" name="picker_lastname" id="picker_lastname" placeholder="Teslim alacak kişinin soyadı" type="text">
                </label>
                <label>
                    <input class="account__login--input" name="address_name" id="address_name" placeholder="Adres Adı" type="text">
                </label>
                <label>
                    <!-- <input class="account__login--input" name="address-il" id="address-il" placeholder="İl" type="text"> -->
                    <select class="account__login--input " name="address-il" id="address-il">
                        <option value="0">İl seçiniz</option>
                        <option value="1">Adana</option>
                        <option value="2">Adıyaman</option>
                        <option value="3">Afyonkarahisar</option>
                        <option value="4">Ağrı</option>
                        <option value="5">Amasya</option>
                        <option value="6">Ankara</option>
                        <option value="7">Antalya</option>
                        <option value="8">Artvin</option>
                        <option value="9">Aydın</option>
                        <option value="10">Balıkesir</option>
                        <option value="11">Bilecik</option>
                        <option value="12">Bingöl</option>
                        <option value="13">Bitlis</option>
                        <option value="14">Bolu</option>
                        <option value="15">Burdur</option>
                        <option value="16">Bursa</option>
                        <option value="17">Çanakkale</option>
                        <option value="18">Çankırı</option>
                        <option value="19">Çorum</option>
                        <option value="20">Denizli</option>
                        <option value="21">Diyarbakır</option>
                        <option value="22">Edirne</option>
                        <option value="23">Elazığ</option>
                        <option value="24">Erzincan</option>
                        <option value="25">Erzurum</option>
                        <option value="26">Eskişehir</option>
                        <option value="27">Gaziantep</option>
                        <option value="28">Giresun</option>
                        <option value="29">Gümüşhane</option>
                        <option value="30">Hakkâri</option>
                        <option value="31">Hatay</option>
                        <option value="32">Isparta</option>
                        <option value="33">Mersin</option>
                        <option value="34">İstanbul</option>
                        <option value="35">İzmir</option>
                        <option value="36">Kars</option>
                        <option value="37">Kastamonu</option>
                        <option value="38">Kayseri</option>
                        <option value="39">Kırklareli</option>
                        <option value="40">Kırşehir</option>
                        <option value="41">Kocaeli</option>
                        <option value="42">Konya</option>
                        <option value="43">Kütahya</option>
                        <option value="44">Malatya</option>
                        <option value="45">Manisa</option>
                        <option value="46">Kahramanmaraş</option>
                        <option value="47">Mardin</option>
                        <option value="48">Muğla</option>
                        <option value="49">Muş</option>
                        <option value="50">Nevşehir</option>
                        <option value="51">Niğde</option>
                        <option value="52">Ordu</option>
                        <option value="53">Rize</option>
                        <option value="54">Sakarya</option>
                        <option value="55">Samsun</option>
                        <option value="56">Siirt</option>
                        <option value="57">Sinop</option>
                        <option value="58">Sivas</option>
                        <option value="59">Tekirdağ</option>
                        <option value="60">Tokat</option>
                        <option value="61">Trabzon</option>
                        <option value="62">Tunceli</option>
                        <option value="63">Şanlıurfa</option>
                        <option value="64">Uşak</option>
                        <option value="65">Van</option>
                        <option value="66">Yozgat</option>
                        <option value="67">Zonguldak</option>
                        <option value="68">Aksaray</option>
                        <option value="69">Bayburt</option>
                        <option value="70">Karaman</option>
                        <option value="71">Kırıkkale</option>
                        <option value="72">Batman</option>
                        <option value="73">Şırnak</option>
                        <option value="74">Bartın</option>
                        <option value="75">Ardahan</option>
                        <option value="76">Iğdır</option>
                        <option value="77">Yalova</option>
                        <option value="78">Karabük</option>
                        <option value="79">Kilis</option>
                        <option value="80">Osmaniye</option>
                        <option value="81">Düzce</option>
                    </select>
                </label>
                <label>
                    <input class="account__login--input" id="full_address" name="full_address" placeholder="Adres" type="text">
                </label>
                <label>
                    <input class="account__login--input" id="phone_number" name="phone_number" placeholder="Telefon Numarası" type="text">
                </label>
                <label>
                    <button class="account__login--btn primary__btn mb-10" id="address-submit" type="submit"><span id="add-address-text" style="transition:200ms;">Kaydet</span>
                        <span class="add-address-icon" id="add-address-spinner"><i class="fa-solid fa-spin fa-spinner"></i></span>
                        <span class="add-address-icon" id="add-address-success"><i class="fa-regular fa-circle-check"></i></span>
                    </button>
                </label>
            </div>
        </div>
    </div>
        <!-- offcanvas add address end -->
    </main>

    <!-- Start footer section -->
    <?php echo view("includes/footer");?>
    <!-- End footer section -->

    
    <?php echo view("includes/scripts");?>
    <script src="<?php echo base_url("assets/js/checkout.js");?>"></script>


  
</body>

</html>