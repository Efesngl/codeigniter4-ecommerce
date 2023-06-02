<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->add('/', 'Home::index');
$routes->group('/',function($routes){
    $routes->add('hakkimizda','Home::about_us');
    $routes->add('iletisim','Home::contact');
    $routes->add('login','Home::login');
    $routes->add('giris','Home::login_view');
    $routes->add('kayit','Home::register_view');
    $routes->add("register","Home::register");
    $routes->add('cikis','Home::logout');
    $routes->add("gizlilik_sozlesmesi","Home::privacy_policy");
});
$routes->add("hesap","Account::index");
$routes->group("hesap",function($routes){
    $routes->add('adresler','Account::adress');
    $routes->add("adresEkle","Account::add_address");
    $routes->add("adresSil","Account::delete_address");
    $routes->add("adresbilgisi","Account::address_info");
    $routes->add("siparisdetayi/(:num)","Account::order_detail/$1");
});
$routes->add("istekListesi","Wishlist::index");
$routes->group("istekListesi",function($routes){
    $routes->add("sepeteEkle","Wishlist::addToChart");
    $routes->add("istekListesindenKaldir",'Wishlist::removeFromWishlist');
});
$routes->add("market","Shop::index");
$routes->group("urun",function($routes){
    
});
$routes->add("urun/(:segment)","Shop::product/$1", ["as"=>"urunGoster"]);
$routes->add("yorumEkle","Shop::addComment", ["as"=>"yorumEkle"]);
$routes->add("yorumSil","Shop::deleteComment", ["as"=>"yorumSil"]);
$routes->group("market",function($routes){
    $routes->add('istekListesineEkle','Shop::addToWishlist');
    $routes->add("sepeteEkle", "Shop::addTocart");
    $routes->add('compare','Home::compare');
});
$routes->add("sepet","Cart::index");
$routes->group("sepet",function($routes){
    $routes->add('sepetOnayla','Home::checkout');
    $routes->add('urunadet/(:any)/(:any)', 'Cart::quantity/$1/$2');
    $routes->add('sepetTemizle', 'Cart::clear_cart');
    $routes->add('urunKaldir/(:num)', 'Cart::delete_item/$1');
    $routes->add("odemeYap","Cart::payment");
    $routes->add("odemeSonuc/(:any)","Cart::status/$1");
    $routes->add("indirimKodu","Cart::set_discount");
    $routes->add("indirimKoduKaldir","Cart::remove_discount");
});
$routes->add("admin","Admin/Admin::giris_yap");
$routes->group("admin",function($routes){
    $routes->add("login","Admin/Admin::login");
    $routes->add("cikisyap","Admin/Admin::logout");
    $routes->add("anasayfa","Admin/Admin::index");
    $routes->add("urunler","Admin/Products::index");
    $routes->group("urunler",function($routes){
        $routes->add("duzenle/(:num)","Admin\Products::product_edit_v/$1");
        $routes->add("productedit","Admin\Products::product_edit");
        $routes->add("sil/","Admin/Products::product_delete");
        $routes->add("ekle","Admin\Products::add_product_v");
        $routes->add("addproduct","Admin\Products::add_product");
        $routes->add("resimler/(:num)","Admin\Products::product_images_v/$1");
        $routes->add("imageswitch","Admin/Products::image_switch");
        $routes->add("urunResimleri/(:num)","Admin\Products::product_images/$1");
        $routes->add("resimSil","Admin/Products::product_image_delete");
        $routes->add("search","Admin/Products::product_search");
        $routes->add("productDescImage","Admin/Products::product_desc_image");
        $routes->add("urunYorumlari/(:num)","Admin\Products::product_comments/$1");
        $routes->add("yorumSil","Admin/Products::delete_product_comment");
    });
    $routes->add("kategoriler","Admin/Categories::index");
    $routes->group("kategoriler",function($routes){
        $routes->add("kategoriDuzenle/(:num)","Admin\Categories::category_update_v/$1");
        $routes->add("categoryEdit/(:num)","Admin\Categories::category_update/$1");
        $routes->add("sil","Admin/Categories::category_delete");
        $routes->add("kategoriEkle","Admin/Categories::category_add_v");
        $routes->add("categoryAdd","Admin/Categories::category_add");
        $routes->add("search","Admin/Categories::category_search");
    });
    $routes->add("markalar","Admin/Brands::index");
    $routes->group("markalar",function($routes){
        $routes->add("markaDuzenle/(:num)","Admin\Brands::brand_edit_v/$1");
        $routes->add("brandEdit/(:num)","Admin\Brands::brand_edit/$1");
        $routes->add("sil","Admin/Brands::brand_delete");
        $routes->add("markaEkle","Admin/Brands::brand_add_v");
        $routes->add("addBrand","Admin/Brands::brand_add");
        $routes->add("search","Admin/Brands::brand_search");
    });
    $routes->add("siparisler","Admin/Orders::index");
    $routes->group("siparisler",function($routes){
        $routes->add("search","Admin/Orders::search");
        $routes->add("detaylar","Admin/Orders::details");
        $routes->add("duzenle","Admin/Orders::edit_order");
        $routes->add("sil","Admin/Orders::delete_order");
    });
    $routes->add("slider","Admin/Slider::index");
    $routes->group("slider",function($routes){
        $routes->add("ekle","Admin/Slider::add_slider_v");
        $routes->add("add","Admin/Slider::add_slider");
        $routes->add("duzenle/(:num)","Admin\Slider::slider_edit_v/$1");
        $routes->add("update/(:num)","Admin\Slider::slider_edit/$1");
        $routes->add("sil","Admin\Slider::slider_delete");
        $routes->add("is_active","Admin/Slider::is_active");
    });
    $routes->add("musteriler","Admin/Customers::index");
    $routes->group("musteriler",function($routes){
        $routes->add("duzenle/(:num)","Admin\Customers::customer_edit_v/$1");
        $routes->add("edit","Admin\Customers::customer_edit");
        $routes->add("address","Admin/Customers::customer_edit_address");
        $routes->add("sil","Admin\Customers::customer_delete");
        $routes->add("search","Admin\Customers::customer_search");
    });
    $routes->add("indirimler","Admin/Discounts::index");
    $routes->group("indirimler",function($routes){
        $routes->add("ekle","Admin/Discounts::discount_add_v");
        $routes->add("add","Admin/Discounts::discount_add");
        $routes->add("sil","Admin/Discounts::discount_delete");
        $routes->add("duzenle/(:num)","Admin\Discounts::discount_edit_v/$1");
        $routes->add("search","Admin/Discounts::discount_search");
        $routes->add("is_active","Admin/Discounts::is_active");
    });
    $routes->add("hakkimizda","Admin/About_us::index");
    $routes->group("hakkimizda",function($routes){
        $routes->add("duzenle","Admin/About_us::about_us_edit_v");
        $routes->add("edit","Admin/About_us::about_us_edit");
    });
    $routes->add("iletisimbilgileri","Admin/Contact::index");
    $routes->group("iletisimbilgileri",function($routes){
        $routes->add("guncelle","Admin/Contact::update");
    });
    $routes->add("sosyalmedya","Admin/Social::index");
    $routes->group("sosyalmedya",function($routes){
        $routes->add("guncelle","Admin/Social::update");
    });
    $routes->add("siteayarlari","Admin/SiteSettings::index");
    $routes->group("siteayarlari",function($routes){
        $routes->add("guncelle","Admin/SiteSettings::update_site_general");
    });
});



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
