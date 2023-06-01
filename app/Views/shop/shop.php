<!DOCTYPE html>
<html lang="tr">


<?php echo view("includes/head"); ?>

<body>

    <!-- Start offcanvas filter sidebar -->
    <?php if ($is_mobile == true) { ?>
        <div class="offcanvas__filter--sidebar widget__area">
            <button type="button" class="offcanvas__filter--close">
                <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path>
                </svg> <span class="offcanvas__filter--close__text">Kapat</span>
            </button>
            <div class="offcanvas__filter--sidebar__inner">
                <div class="single__widget widget__bg">
                    <h2 class="widget__title position__relative h3">Ürün Arama</h2>
                    <div class="sp-container">
                        <label>
                            <input class="widget__search--form__input border-0" name="product-search" id="product-search" placeholder="Ürün arayın" type="text">
                        </label>
                        <button class="widget__search--form__btn" id="product-search-button">
                            Ara
                        </button>
                    </div>
                    <?php
                    if (isset($_GET["sp"])) {
                    ?>
                        <h4>Aranan Ürün:</h4>
                        <button id="clear-sp"><i class="fa-solid fa-trash"></i></button> <?php echo $_GET["sp"]; ?>
                    <?php
                    }
                    ?>
                </div>
                <div class="single__widget widget__bg">
                    <label class="product__view--label">Şuna Göre Sırala :</label>
                    <div class="select shop__header--select">
                        <select class="product__view--select sorting">
                            <option <?php if (isset($_GET["sorting"]) && $_GET["sorting"] == "newest") { ?> selected <?php } ?> value="newest">En son çıkan ürünler</option>
                            <option <?php if (isset($_GET["sorting"]) && $_GET["sorting"] == "most_selling") { ?> selected <?php } ?> value="most_selling">En fazla satın alınanlar</option>
                            <option <?php if (isset($_GET["sorting"]) && $_GET["sorting"] == "price_asc") { ?> selected <?php } ?> value="price_asc">Fiyat : ucuzdan pahalıya</option>
                            <option <?php if (isset($_GET["sorting"]) && $_GET["sorting"] == "price_desc") { ?> selected <?php } ?> value="price_desc">Fiyat : Pahalıdan ucuza</option>
                        </select>
                    </div>
                </div>
                <div class="single__widget widget__bg">
                    <h2 class="widget__title position__relative h3">Kategoriler</h2>
                    <ul class="widget__categories--menu mb-15">
                    <?php function makeCategory($cats, $ischild = false)
                                        {
                                            foreach ($cats as $cat) :
                                                if (!$ischild) : ?>
                                                    <li class="widget__categories--menu__list<?php if (isset($cat["child"])) : echo " has_subcat";
                                                                                                else : echo "";
                                                                                                endif; ?>" data-cat="<?php echo $cat["ID"]; ?>">
                                                        <label class="widget__categories--menu__label d-flex align-items-center">
                                                            <img class="widget__categories--menu__img" src="<?php echo base_url("assets/img/product/small-product1.webp"); ?>" alt="categories-img">
                                                            <span class="widget__categories--menu__text"><?php echo $cat["category"]; ?></span>
                                                            <?php if (isset($cat["child"])) { ?>
                                                                <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                                                    <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                                                </svg>
                                                            <?php } ?>
                                                        </label>
                                                        <?php if (isset($cat["child"])) : makeCategory($cat["child"], true);
                                                        endif; ?>
                                                    </li>
                                                <?php else : ?>
                                                    <ul class="widget__categories--sub__menu widget__categories--menu">
                                                        <li class="widget__categories--sub__menu--list <?php if (isset($cat["child"])) : echo " has_subcat";
                                                                                                        endif; ?>" data-cat="<?php echo $cat["ID"]; ?>">
                                                            <div class="widget__categories--sub__menu--link d-flex align-items-center" style="cursor:pointer;">
                                                                <img class="widget__categories--sub__menu--img" src="<?php echo base_url("assets/img/product/small-product2.webp"); ?>" alt="categories-img">
                                                                <span class="widget__categories--sub__menu--text"><?php echo $cat["category"]; ?></span>
                                                            </div>
                                                            <?php if (isset($cat["child"])) { ?>
                                                                <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                                                    <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                                                </svg>
                                                            <?php } ?>
                                                        </li>

                                                        <?php if (isset($cat["child"])) : makeCategory($cat["child"], true);
                                                        endif; ?>
                                                    </ul>
                                                <?php endif; ?>

                                        <?php endforeach;
                                        }
                                        makeCategory($categories); ?>
                    </ul>
                    <button class="cat__filter--btn primary__btn" style="margin-left: 1rem;" id="cat-filter-btn">Filtrele</button>

                </div>
                <div class="single__widget price__filter widget__bg">
                    <h2 class="widget__title position__relative h3">Fiyat Aralığı</h2>
                    <div class="price__filter--form__inner mb-15 d-flex align-items-center">
                        <div class="price__filter--group">
                            <label class="price__filter--label" for="Filter-Price-GTE1">En Düşük</label>
                            <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                <span class="price__filter--currency">TL</span>
                                <input class="price__filter--input__field price_min border-0 price-min" id="Filter-Price-GTE1" name="price_min" type="number" placeholder="0" min="0">
                            </div>
                        </div>
                        <div class="price__divider">
                            <span>-</span>
                        </div>
                        <div class="price__filter--group">
                            <label class="price__filter--label" for="Filter-Price-LTE1">En Yüksek</label>
                            <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                <span class="price__filter--currency">TL</span>
                                <input class="price__filter--input__field price_max border-0 price-max" id="Filter-Price-LTE1" name="price_max" type="number" min="0" placeholder="0">
                            </div>
                        </div>
                    </div>
                    <button class="price__filter--btn primary__btn" id="price-filter-btn">Filtrele</button>

                    <?php if (isset($_GET["price_min"]) && !isset($_GET["price_max"])) { ?>
                        <button class="clearpricefilter" style="background:none;border:none;">
                            <ion-icon name="trash-outline"></ion-icon> &nbsp;
                        </button>Fiyat <?php echo $_GET["price_min"]; ?> TL ve üzeri
                    <?php } elseif (isset($_GET["price_max"]) && isset($_GET["price_min"])) {
                    ?>
                        <button class="clearpricefilter" style="background:none;border:none;">
                            <ion-icon name="trash-outline"></ion-icon> &nbsp;
                        </button>Fiyat <?php echo $_GET["price_min"]; ?>-<?php echo $_GET["price_max"] ?>
                    <?php
                    } elseif (isset($_GET["price_max"]) && !isset($_GET["price_min"])) { ?>
                        <button class="clearpricefilter" style="background:none;border:none;">
                            <ion-icon name="trash-outline"></ion-icon> &nbsp;
                        </button>Fiyat <?php echo $_GET["price_max"]; ?> TL ve altında
                    <?php
                    }
                    ?>
                </div>
                <div class="single__widget widget__bg">
                    <h2 class="widget__title position__relative h3">Markalar</h2>
                    <ul class="widget__tagcloud">
                        <?php for ($i = 0; $i < count($brands); $i++) : ?>
                            <li class="widget__tagcloud--list"><button class="brand-button widget__tagcloud--link" data-brand="<?php echo $brands_id[$i]; ?>"><?php echo $brands[$i]; ?></button></li>
                        <?php endfor; ?>
                    </ul>
                    <button class="primary__btn" id="apply-brand-filter">Filtrele</button>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- End offcanvas filter sidebar -->

    <!-- Start header area -->
    <?php echo view("includes/header"); ?>
    <!-- End header area -->


    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container-fluid">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content">
                            <h1 class="breadcrumb__content--title text-white mb-10">Market</h1>
                            <ul class="breadcrumb__content--menu d-flex">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Ana Sayfa</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Market</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start shop section -->
        <section class="shop__section section--padding">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <?php if ($is_mobile != true) { ?>
                            <div class="shop__sidebar--widget widget__area d-md-none">
                                <div class="single__widget widget__bg">
                                    <h2 class="widget__title position__relative h3">Ürün Arama</h2>
                                    <label>
                                        <input class="widget__search--form__input border-0 mb-15" name="product-search" id="product-search" placeholder="Ürün arayın" type="text">
                                    </label>
                                    <button class="primary__btn" id="product-search-button">
                                        Ara
                                    </button>
                                    <?php
                                    if (isset($_GET["sp"])) {
                                    ?>
                                        <h4>Aranan Ürün:</h4>
                                        <button id="clear-sp"><i class="fa-solid fa-trash"></i></button> <?php echo $_GET["sp"]; ?>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="single__widget widget__bg">
                                    <h2 class="widget__title position__relative h3">Kategoriler</h2>
                                    <ul class="widget__categories--menu mb-15">
                                        <?php function makeCategory($cats, $ischild = false)
                                        {
                                            foreach ($cats as $cat) :
                                                if (!$ischild) : ?>
                                                    <li class="widget__categories--menu__list<?php if (isset($cat["child"])) : echo " has_subcat";
                                                                                                else : echo "";
                                                                                                endif; ?>" data-cat="<?php echo $cat["ID"]; ?>">
                                                        <label class="widget__categories--menu__label d-flex align-items-center">
                                                            <img class="widget__categories--menu__img" src="<?php echo base_url("assets/img/product/small-product1.webp"); ?>" alt="categories-img">
                                                            <span class="widget__categories--menu__text"><?php echo $cat["category"]; ?></span>
                                                            <?php if (isset($cat["child"])) { ?>
                                                                <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                                                    <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                                                </svg>
                                                            <?php } ?>
                                                        </label>
                                                        <?php if (isset($cat["child"])) : makeCategory($cat["child"], true);
                                                        endif; ?>
                                                    </li>
                                                <?php else : ?>
                                                    <ul class="widget__categories--sub__menu widget__categories--menu">
                                                        <li class="widget__categories--sub__menu--list <?php if (isset($cat["child"])) : echo " has_subcat";
                                                                                                        endif; ?>" data-cat="<?php echo $cat["ID"]; ?>">
                                                            <div class="widget__categories--sub__menu--link d-flex align-items-center" style="cursor:pointer;">
                                                                <img class="widget__categories--sub__menu--img" src="<?php echo base_url("assets/img/product/small-product2.webp"); ?>" alt="categories-img">
                                                                <span class="widget__categories--sub__menu--text"><?php echo $cat["category"]; ?></span>
                                                            </div>
                                                            <?php if (isset($cat["child"])) { ?>
                                                                <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                                                    <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                                                </svg>
                                                            <?php } ?>
                                                        </li>

                                                        <?php if (isset($cat["child"])) : makeCategory($cat["child"], true);
                                                        endif; ?>
                                                    </ul>
                                                <?php endif; ?>

                                        <?php endforeach;
                                        }
                                        makeCategory($categories); ?>
                                    </ul>
                                    </ul>
                                    <button class="primary__btn" id="cat-filter-btn" style="margin-left: 1rem;">Filtrele</button>
                                </div>
                                <div class="single__widget price__filter widget__bg">
                                    <h2 class="widget__title position__relative h3">Fiyat Aralığı</h2>
                                    <div class="price__filter--form__inner mb-15 d-flex align-items-center">
                                        <div class="price__filter--group">
                                            <label class="price__filter--label" for="Filter-Price-GTE1">En Düşük</label>
                                            <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                                <span class="price__filter--currency">TL</span>
                                                <input class="price__filter--input__field price_min border-0" id="Filter-Price-GTE1" name="price_min" type="number" placeholder="0" min="0">
                                            </div>
                                        </div>
                                        <div class="price__divider">
                                            <span>-</span>
                                        </div>
                                        <div class="price__filter--group">
                                            <label class="price__filter--label" for="Filter-Price-LTE1">En Yüksek</label>
                                            <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                                <span class="price__filter--currency">TL</span>
                                                <input class="price__filter--input__field price_max border-0" id="Filter-Price-LTE1" name="price_max" type="number" min="0" placeholder="0">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="primary__btn" id="price-filter-btn">Filtrele</button>
                                    <br><br>

                                    <?php if (isset($_GET["price_min"]) && !isset($_GET["price_max"])) { ?>
                                        <button class="clearpricefilter" style="background:none;border:none;">
                                            <ion-icon name="trash-outline"></ion-icon> &nbsp;
                                        </button>Fiyat <?php echo $_GET["price_min"]; ?> TL ve üzeri
                                    <?php } elseif (isset($_GET["price_max"]) && isset($_GET["price_min"])) {
                                    ?>
                                        <button class="clearpricefilter" style="background:none;border:none;">
                                            <ion-icon name="trash-outline"></ion-icon> &nbsp;
                                        </button>Fiyat <?php echo $_GET["price_min"]; ?>-<?php echo $_GET["price_max"] ?>
                                    <?php
                                    } elseif (isset($_GET["price_max"]) && !isset($_GET["price_min"])) { ?>
                                        <button class="clearpricefilter" style="background:none;border:none;">
                                            <ion-icon name="trash-outline"></ion-icon> &nbsp;
                                        </button>Fiyat <?php echo $_GET["price_max"]; ?> TL ve altında
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="single__widget widget__bg">
                                    <h2 class="widget__title position__relative h3">Markalar</h2>
                                    <ul class="widget__tagcloud">
                                        <?php for ($i = 0; $i < count($brands); $i++) : ?>
                                            <li class="widget__tagcloud--list"><button class="brand-button widget__tagcloud--link" data-brand="<?php echo $brands_id[$i]; ?>"><?php echo $brands[$i]; ?></button></li>
                                        <?php endfor; ?>
                                    </ul>
                                    <button class="primary__btn" id="apply-brand-filter">Filtrele</button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="shop__header bg__gray--color d-flex align-items-center justify-content-end mb-30">
                            <?php if ($is_mobile == true) { ?>
                                <button class="widget__filter--btn d-none d-md-flex align-items-center">
                                    <svg class="widget__filter--btn__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" d="M368 128h80M64 128h240M368 384h80M64 384h240M208 256h240M64 256h80" />
                                        <circle cx="336" cy="128" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" />
                                        <circle cx="176" cy="256" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" />
                                        <circle cx="336" cy="384" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" />
                                    </svg>
                                    <span class="widget__filter--btn__text">Filtrele</span>
                                </button>
                            <?php } ?>
                            <div class="product__view--mode d-flex align-items-center">
                                <div class="product__view--mode__list product__short--by align-items-center d-none d-lg-flex">
                                    <label class="product__view--label">Şuna Göre Sırala :</label>
                                    <div class="select shop__header--select">
                                        <select class="product__view--select sorting">
                                            <option <?php if (!isset($_GET["sorting"])) { ?> selected <?php } ?> value="suggested">Önerilen Sıralama</option>
                                            <option <?php if (isset($_GET["sorting"]) && $_GET["sorting"] == "newest") { ?> selected <?php } ?> value="newest">En son çıkan ürünler</option>
                                            <option <?php if (isset($_GET["sorting"]) && $_GET["sorting"] == "most_selled") { ?> selected <?php } ?> value="most_selled">En fazla satın alınanlar</option>
                                            <option <?php if (isset($_GET["sorting"]) && $_GET["sorting"] == "price_asc") { ?> selected <?php } ?> value="price_asc">Fiyat : ucuzdan pahalıya</option>
                                            <option <?php if (isset($_GET["sorting"]) && $_GET["sorting"] == "price_desc") { ?> selected <?php } ?> value="price_desc">Fiyat : Pahalıdan ucuza</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($_GET["sp"])) { ?>
                            <span class="h2 mb-40"> <?php echo $_GET["sp"]; ?></span> ile ilgili ürün aranıyor
                        <?php }
                        ?>
                        <div class="shop__product--wrapper">
                            <div class="tab_content">
                                <div id="product_grid" class="tab_pane active show">
                                    <div class="product__section--inner product__grid--inner">
                                        <div class="row row-cols-xxl-4 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-2 mb--n30">
                                            <?php foreach ($products as $p) : ?>
                                                <div class="col mb-30">
                                                    <div class="product__items ">
                                                        <div class="product__items--thumbnail">
                                                            <a class="product__items--link" href="<?php echo base_url("urun/{$p["product_name"]}"); ?>">
                                                                <img class="product__items--img product__primary--img" style="aspect-ratio: 16/9;" src="<?php echo base_url($p["product_images"]); ?>" alt="product-img">
                                                                <img class="product__items--img product__secondary--img" style="aspect-ratio: 16/9;" src="<?php echo base_url($p["product_images"]); ?>" alt="product-img">
                                                            </a>
                                                            <div class="product__badge">
                                                                <?php if ($p["is_new"] == "1") { ?>
                                                                    <span class="product__badge--items sale">Yeni</span>
                                                                <?php } ?>
                                                            </div>
                                                            <ul class="product__items--action d-flex justify-content-center">
                                                                <li class="product__items--action__list">
                                                                    <button class="product__items--action__btn wishlist-add" data-product_id="<?php echo $p["product_id"]; ?>">
                                                                        <svg class="product__items--action__btn--svg" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" c="" style="margin-bottom: 3px;">
                                                                            <g id="Interface / Heart_01">
                                                                                <path id="Vector" d="M12 7.69431C10 2.99988 3 3.49988 3 9.49991C3 15.4999 12 20.5001 12 20.5001C12 20.5001 21 15.4999 21 9.49991C21 3.49988 14 2.99988 12 7.69431Z" style="<?php if ($p["is_wishlisted"]) : ?>fill:red;stroke:red;<?php endif; ?>" fill="none" stroke="CurrentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            </g>
                                                                        </svg>
                                                                        <span class="visually-hidden">İstek Listesi</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="product__items--content text-center">
                                                            <h3 class="product__items--content__title h4"><a href="<?php echo base_url("urun/" . $p["product_name"]); ?>"><?php echo $p["product_name"]; ?></a></h3>
                                                            <div class="product__items--price">
                                                                <?php if ($p["is_discounted"] == "1") {
                                                                ?>
                                                                    <span class="old__price"><?php echo $p["product_price"]; ?> TL</span>
                                                                    <span class="current__price"><?php echo $p["discounted_price"]; ?> TL</span>

                                                                <?php  } else {
                                                                ?>
                                                                    <span class="current__price"><?php echo $p["product_price"]; ?> TL</span>
                                                                <?php
                                                                } ?>
                                                            </div>
                                                            <button class="product__items--action__cart--btn add-to-cart primary__btn" data-link="<?php echo base_url("sepeteEkle"); ?>" data-product_id="<?php echo $p["product_id"]; ?>">
                                                                <svg class="product__items--action__cart--btn__icon" xmlns="http://www.w3.org/2000/svg" width="13.897" height="14.565" viewBox="0 0 18.897 21.565">
                                                                    <path d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z" transform="translate(-2.667 -1.366)" fill="currentColor"></path>
                                                                </svg>
                                                                <span class="add__to--cart__text"> Sepete Ekle</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination__area bg__gray--color">
                            <?= $pager->links(); ?>
                            <!-- <nav class="pagination">
                                <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
                                    <li class="pagination__list">
                                        <a href="shop.html" class="pagination__item--arrow  link ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
                                            </svg>
                                        </a>
                                    <li>

                                    <li class="pagination__list"><span class="pagination__item pagination__item--current"></span></li>
                                    <li class="pagination__list">
                                        <a href="shop.html" class="pagination__item--arrow  link ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100" />
                                            </svg>
                                        </a>
                                    <li>
                                </ul>
                            </nav> -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- End shop section -->

        <!-- Start Newsletter banner section -->
        <section class="newsletter__banner--section section--padding color-scheme-3">
            <div class="container">
                <div class="newsletter__banner--thumbnail position__relative">
                    <img class="newsletter__banner--thumbnail__img" src="<?php echo base_url("assets/img/banner/banner-bg6.webp"); ?>" alt="newsletter-banner">
                    <div class="newsletter__content newsletter__subscribe">
                        <h5 class="newsletter__content--subtitle text-white">Fırsatlardan haberdar olmak ister misiniz?</h5>
                        <h2 class="newsletter__content--title text-white h3 mb-25">Fırsatlardan haberdar olmak için <br>
                            Haber bültenimize kayıt olun.</h2>
                        <form class="newsletter__subscribe--form position__relative" action="#">
                            <label>
                                <input class="newsletter__subscribe--input" placeholder="E-posta adresinizi girin..." type="email">
                            </label>
                            <button class="newsletter__subscribe--button primary__btn btn__style3" type="submit">Kayıt Ol
                                <svg class="newsletter__subscribe--button__icon" xmlns="http://www.w3.org/2000/svg" width="9.159" height="7.85" viewBox="0 0 9.159 7.85">
                                    <path data-name="Icon material-send" d="M3,12.35l9.154-3.925L3,4.5,3,7.553l6.542.872L3,9.3Z" transform="translate(-3 -4.5)" fill="currentColor" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Newsletter banner section -->


    </main>

    <!-- Start footer section -->
    <!-- Start footer section -->
    <?php echo view("includes/footer"); ?>
    <!-- All Script JS Plugins here  -->
    <!-- <script src="assets/js/vendor/popper.js" defer="defer"></script> -->
    <!-- <script src="assets/js/vendor/bootstrap.min.js" defer="defer"></script> -->

    <?php echo view("includes/scripts"); ?>
    <?php if ($is_mobile == true) { ?>
        <script src="<?php echo base_url("assets/js/shop_mobile.js"); ?>"></script>
    <?php } else { ?>
        <script src="<?php echo base_url("assets/js/shop.js"); ?>"></script>
    <?php } ?>



</body>

</html>