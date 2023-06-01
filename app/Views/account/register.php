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
                            <h1 class="breadcrumb__content--title text-white mb-10">Kullanıcı Girişi</h1>
                            <ul class="breadcrumb__content--menu d-flex">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="<?php echo base_url(); ?>">Ana Sayfa</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Kullanıcı kayıt</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start login section  -->
        <div class="login__section section--padding">
            <div class="container">
                <!-- <form action="<?php echo base_url("register"); ?>" id="register-form"> -->
                <div class="login__section--inner">
                    <div class="row row-cols-md-2 row-cols-1">
                        <div class="col">
                            <div class="account__login register">
                                <div class="account__login--header mb-25">
                                    <h3 class="account__login--header__title mb-10">Hesap Oluşturun</h3>
                                    <p class="account__login--header__desc">Yeni müşterimiz iseniz buradan kayıt olunuz</p>
                                </div>
                                <div class="account__login--inner">
                                    <label>
                                        <input class="account__login--input register-name-input" name="first_name" id="register-first-name" placeholder="Ad" type="text">
                                    </label>
                                    <label>
                                        <input class="account__login--input register-name-input" name="last_name" id="register-last-name" placeholder="Soyad" type="text">
                                    </label>
                                    <label>
                                        <input class="account__login--input" name="email" placeholder="E-posta" id="register-email" type="email">
                                    </label>
                                    <label>
                                        <input class="account__login--input password-input" id="password-first" name="password" placeholder="Şifre" type="password">
                                    </label>
                                    <label>
                                        <input class="account__login--input password-input" id="password-check" name="password_again" placeholder="Şİfrenizi tekrar giriniz" type="password">
                                    </label>
                                    <div class="account__login--remember position__relative">
                                        <input class="checkout__checkbox--input" id="check2" name="check" type="checkbox">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <label class="checkout__checkbox--label login__remember--label" for="check2">
                                            <a class="register-privacy-policy" href="<?php echo base_url("gizlilik_sozlesmesi"); ?>">Sözleşmeyi</a> okudum ve kabul ediyorum</label>
                                    </div>
                                    <br>
                                    <label>
                                        <button disabled class="account__login--btn primary__btn mb-10" id="register-submit" type="submit">Onayla ve kayıt ol</button>
                                    </label>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </form> -->
            </div>
        </div>
        <!-- End login section  -->

    </main>

    <!-- Start footer section -->
    <?php echo view("includes/footer"); ?>
    <!-- End footer section -->

    <?php echo view("includes/scripts"); ?>
    <script src="<?php echo base_url("assets/js/register.js");?>"></script>
</body>

</html>