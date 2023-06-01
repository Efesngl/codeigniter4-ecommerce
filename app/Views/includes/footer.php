<footer class="footer__section footer__bg color-scheme-3">
        <div class="container">
            <div class="main__footer">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title d-none d-md-block">Hakkımızda <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <div class="footer__widget--inner">
                                <a class="footer__logo" href="<?php echo base_url();?>"><img src="/<?php echo $site_general["logo"];?>" alt="footer-logo"></a>
                                <p class="footer__widget--desc"><?php echo $site_general["footer_text"]?></p>
                                <div class="footer__social">
                                    <ul class="social__shear d-flex">
                                        <?php if($social_media["facebook"]!="#"):?>
                                        <li class="social__shear--list">
                                            <a class="social__shear--list__icon" style="padding-top: 0.6rem;" target="_blank" href="<?php echo $social_media["facebook"];?>">
                                            <i class="fa-brands fa-facebook-f    fa-xl"></i>
                                                <span class="visually-hidden">Facebook</span>
                                            </a>
                                        </li>
                                        <?php endif;?>
                                        <?php if($social_media["twitter"]!="#"):?>
                                        <li class="social__shear--list">
                                            <a class="social__shear--list__icon" style="padding-top: 0.6rem;" target="_blank" href="<?php echo $social_media["twitter"];?>">
                                            <i class="fa-brands fa-twitter fa-xl"></i>
                                                <span class="visually-hidden">Twitter</span>
                                            </a>
                                        </li>
                                        <?php endif;?>
                                        <?php if($social_media["instagram"]!="#"):?>
                                        <li class="social__shear--list">
                                            <a class="social__shear--list__icon" style="padding-top: 0.6rem;" target="_blank" href="<?php echo $social_media["instagram"];?>">
                                                <i class="fa-brands fa-instagram fa-xl"></i>
                                                <!-- <span class="visually-hidden">Instagram</span> -->
                                            </a>
                                        </li>
                                        <?php endif;?>
                                        <?php if($social_media["youtube"]!="#"):?>
                                        <li class="social__shear--list">
                                            <a class="social__shear--list__icon" style="padding-top: 0.6rem;" target="_blank" href="<?php echo $social_media["youtube"];?>">
                                            <i class="fa-brands fa-youtube fa-xl"></i>
                                                <span class="visually-hidden">Youtube</span>
                                            </a>
                                        </li>
                                        <?php endif;?>
                                        <?php if($social_media["tiktok"]!="#"):?>
                                        <li class="social__shear--list">
                                            <a class="social__shear--list__icon" style="padding-top: 0.6rem;" target="_blank" href="<?php echo $social_media["tiktok"];?>">
                                            <i class="fa-brands fa-tiktok fa-xl"></i>
                                                <span class="visually-hidden">Tiktok</span>
                                            </a>
                                        </li>
                                        <?php endif;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">Hızlı Linkler <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <ul class="footer__widget--menu footer__widget--inner">
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="<?php echo base_url("hakkimizda");?>">Hakkımızda</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="<?php echo base_url("iletisim")?>">İletişim</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="/gizlilik_sozlesmesi">Gizlilik sözleşmesi</a></li>
                            </ul>   
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">Hesap Bilgileri <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <ul class="footer__widget--menu footer__widget--inner">
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="my-account.html">Hesabım</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="<?php echo base_url("/sepet");?>">Sepet</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="<?php echo base_url("/sepet");?>">İstek Listesi</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">Bizimle iletişime geçin <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <div class="footer__contact--info footer__widget--inner">
                                <ul class="footer__contact--info__inner">
                                    <li class="footer__contact--info__text"><strong>Adres:</strong><?php echo $contact_info["address"];?></li>
                                    <li class="footer__contact--info__text"><strong>E-posta:</strong> <a href="mailto:<?php echo $contact_info["email"];?>"><?php echo $contact_info["email"];?></a></li>
                                    <li class="footer__contact--info__text"><strong>Telefon:</strong> <a href="tel:<?php echo $contact_info["phone_number"];?>"><?php echo $contact_info["phone_number"];?></a></li>
                                </ul> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom text-center">
                <p class="copyright__content  m-0"><?php echo $site_general["copyright"];?></p>
            </div>
        </div>
    </footer>


    <!-- Scroll to top bar -->
    <button class="color-scheme-3" aria-label="scroll top btn" id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>
