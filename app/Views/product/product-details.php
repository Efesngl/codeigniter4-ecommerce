<!doctype html>
<html lang="tr">


<?php echo view("includes/head"); ?>

<body>

    <!-- Start header area -->
    <?php echo view("includes/header"); ?>
    <!-- End header area -->

    <main class="main__content_wrapper">


        <!-- Start product details section -->
        <section class="product__details--section section--padding">
            <div class="container">
                <div class="row row-cols-lg-2 row-cols-md-2">
                    <div class="col">
                        <div class="product__details--media">
                            <div class="product__media--preview  swiper">
                                <div class="swiper-wrapper">
                                    <?php foreach ($product["images"] as $img) : ?>
                                        <div class="swiper-slide">
                                            <div class="product__media--preview__items">
                                                <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="<?php echo base_url($img["image"]); ?>"><img class="product__media--preview__items--img" src="<?php echo base_url($img["image"]); ?>" alt="product-media-img"></a>
                                                <div class="product__media--view__icon">
                                                    <a class="product__media--view__icon--link glightbox" href="<?php echo base_url($img["image"]); ?>" data-gallery="product-media-preview">
                                                        <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512">
                                                            <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Media Gallery</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="product__media--nav swiper">
                                <div class="swiper-wrapper">
                                    <?php foreach ($product["images"] as $img) : ?>
                                        <div class="swiper-slide">
                                            <div class="product__media--nav__items">
                                                <img class="product__media--nav__items--img" src="<?php echo base_url($img["image"]); ?>" alt="product-nav-img">
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="swiper__nav--btn swiper-button-next"></div>
                                <div class="swiper__nav--btn swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="product__details--info">
                            <h2 class="product__details--info__title mb-15"><span id="product-name"><?php echo $product["product_name"]; ?></span></h2>
                            <div class="product__details--info__price mb-10">
                                <?php if (isset($product["discounted_price"])) : ?>
                                    <span class="current__price"><?php echo $product["discounted_price"] ?> TL</span>
                                    <span class="old__price"><?php echo $product["product_price"] ?> TL</span>
                                <?php else : ?>
                                    <span class="current__price"><?php echo $product["product_price"] ?> TL</span>
                                <?php endif; ?>
                            </div>
                            <div class="product__details--info__rating d-flex align-items-center mb-15">
                                <ul class="rating product__list--rating d-flex">
                                    <li class="rating__list">
                                        <span class="rating__list--icon">
                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__list--icon">
                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__list--icon">
                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__list--icon">
                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__list--icon">
                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list"><span class="rating__list--text">( <?php echo $product["avrage"];?>)</span></li>
                                </ul>
                            </div>
                            <div class="product__variant--list quantity d-flex align-items-center mb-20">
                                <div class="quantity__box">
                                    <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                    <label>
                                        <input type="number" class="quantity__number quickview__value--number" name="quantity" id="quantity" value="1" />
                                    </label>
                                    <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                                </div>
                                <button class="quickview__cart--btn primary__btn" id="add-to-cart">Sepete ekle</button>
                            </div>
                            <div class="product__variant--list mb-15">
                                <button class="variant__wishlist--icon mb-15" id="add-to-wishlist" style="background: none;border:none;" title="Add to wishlist">
                                    <svg class="quickview__variant--wishlist__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path id="wishlist-path" d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" style="transition:0.2s;<?php if(!$product["is_wishlisted"]):?>fill:none;stroke:currentColor;<?php else:?>fill:red;stroke:red;<?php endif;?>" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                    </svg>
                                    İstek listesine ekle
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End product details section -->

        <!-- Start product details tab section -->
        <section class="product__details--tab__section section--padding">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <ul class="product__details--tab d-flex mb-30">
                            <li class="product__details--tab__list active" data-toggle="tab" data-target="#description">Ürün Açıklaması</li>
                            <li class="product__details--tab__list" data-toggle="tab" data-target="#reviews">Yorumlar (<?php echo count($product["comments"]);?>)</li>
                        </ul>   
                        <div class="product__details--tab__inner border-radius-10">
                            <div class="tab_content">
                                <div id="description" class="tab_pane active show">
                                    <div class="product__tab--content">
                                        <?php echo $product["product_desc"];?>
                                    </div>
                                </div>
                                <div id="reviews" class="tab_pane">
                                    <div class="product__reviews">
                                        <div class="product__reviews--header">
                                            <h3 class="product__reviews--header__title mb-20">Müşteri yorumları</h3>
                                            <div class="reviews__ratting d-flex align-items-center">
                                                <ul class="rating d-flex">
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                </ul>
                                                <span class="reviews__summary--caption"><?php echo (count($product["comments"])>0)?"Toplam ".count($product["comments"])." yorum":"Bu ürün için hiç yorum yok." ?></span>
                                            </div>
                                            <?php if(isset($_SESSION["ID"]) && isset($_SESSION["logged"])):?>
                                                <a class="actions__newreviews--btn primary__btn" href="#writereview">Yorum yazın</a>
                                            <?php endif;?>
                                        </div>
                                        <div class="reviews__comment--area">
                                                <?php if(count($product["comments"])>0):
                                                    if(isset($product["user_comment"])):?>
                                                        <div class="reviews__comment--list d-flex">
                                                            <div class="reviews__comment--content">
                                                                <h4 class="reviews__comment--content__title"><?php echo $product["user_comment"]["customer"]?></h4>
                                                                <ul class="rating reviews__comment--rating d-flex mb-5">
                                                                    <?php for($i=1;$i<=5;$i++):?>
                                                                    <li class="rating__list">
                                                                        <span class="rating__list--icon">
                                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)"
                                                                                style="<?php if($i<=$product["user_comment"]["star"]):?>fill:currentColor;<?php else:?>fill:none;stroke:var(--black-color);<?php endif;?>"</path>
                                                                            </svg>
                                                                        </span>
                                                                    </li>
                                                                    <?php endfor;?>
                                                                </ul>
                                                                <p class="reviews__comment--content__desc"><?php echo $product["user_comment"]["comment"];?></p>
                                                                <span class="reviews__comment--content__date"><?php echo $product["user_comment"]["date"];?></span>
                                                                <button class="delete-product-comment"><i class="fa-solid fa-trash-can"></i></button>
                                                            </div>
                                                        </div> 
                                                    <?php endif;?>
                                                    <?php foreach($product["comments"] as $pc):
                                                        if(isset($product["user_comment"])){
                                                            if($pc["comment_id"]==$product["user_comment"]["comment_id"]){
                                                                continue;
                                                            }
                                                        }
                                                    ?>
                                                        <div class="reviews__comment--list d-flex">
                                                            <div class="reviews__comment--content">
                                                                <h4 class="reviews__comment--content__title"><?php echo $pc["customer"]?></h4>
                                                                <ul class="rating reviews__comment--rating d-flex mb-5">
                                                                    <?php for($i=1;$i<=5;$i++):?>
                                                                    <li class="rating__list">
                                                                        <span class="rating__list--icon">
                                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                                                <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)"
                                                                                style="<?php if($i<=$pc["star"]):?>fill:currentColor;<?php else:?>fill:none;stroke:var(--black-color);<?php endif;?>"</path>
                                                                            </svg>
                                                                        </span>
                                                                    </li>
                                                                    <?php endfor;?>
                                                                </ul>
                                                                <p class="reviews__comment--content__desc"><?php echo $pc["comment"];?></p>
                                                                <span class="reviews__comment--content__date"><?php echo $pc["date"];?></span>
                                                                <?php if(isset($product["user_comment"])):if($pc["comment_id"]==$product["user_comment"]["comment_id"]):?>
                                                                    <button class="delete-product-comment"><i class="fa-solid fa-trash-can"></i></button>
                                                                <?php endif;endif;?>
                                                            </div>
                                                        </div>
                                                <?php endforeach;else:?>
                                                    <h3>Bu ürün için hiç yorum yok</h3>
                                                <?php endif;?>

                                        </div>
                                        <div id="writereview" class="reviews__comment--reply__area">
                                            <?php if(isset($_SESSION["ID"]) && isset($_SESSION["logged"])):?>
                                                <form method="post" action="<?php echo url_to("yorumEkle");?>">
                                                <input type="hidden" name="ID" value="<?php echo $product["ID"];?>">
                                                    <h3 class="reviews__comment--reply__title mb-15">Yorum yazın </h3>
                                                    <div class="reviews__ratting d-flex align-items-center mb-20">
                                                        <ul class="rating d-flex">
                                                            <?php for($i=1;$i<=5;$i++):?>
                                                            <li class="rating__list">
                                                                <span class="rating__list--icon">
                                                                    <input type="checkbox" name="star-cb<?php echo $i;?>" <?php if(isset($product["user_comment"])):if($i<=$product["user_comment"]["star"]):?>checked<?php endif;endif;?> class="star-cb" id="star-cb<?php echo $i;?>">
                                                                    <label class="star-cb-label" for="star-cb<?php echo $i;?>">
                                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="13.105" height="13.732" viewBox="0 0 10.105 9.732">
                                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" style="fill:none;stroke:black;"></path>
                                                                        </svg>
                                                                    </label>
                                                                </span>
                                                            </li>
                                                            <?php endfor;?>
                                                        </ul>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 mb-10">
                                                            <textarea class="reviews__comment--reply__textarea" name="comment" id="product-comment" placeholder="Yorumunuz.... (isteğe bağlı)"><?php if(isset($product["user_comment"])):echo $product["user_comment"]["comment"];endif;?></textarea>
                                                        </div>
                                                    </div>
                                                    <button class="text-white primary__btn" data-hover="Submit" type="submit">Yorum ekle</button>
                                                </form>
                                            <?php else:?>
                                                <h3>Yorum yazmak için giriş yapınız...</h3>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End product details tab section -->
    </main>

    <!-- Start footer section -->
    <?php echo view("includes/footer"); ?>
    <!-- End footer section -->


    <?php echo view("includes/scripts"); ?>
    <script src="<?php echo base_url("assets/js/product.js");?>"></script>
</body>

</html>