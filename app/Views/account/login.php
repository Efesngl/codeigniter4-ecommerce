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
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Account Page</span></li>
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
                <form action="<?php echo base_url("login"); ?>" method="post">
                    <div class="login__section--inner">
                        <div class="row row-cols-md-2 row-cols-1">
                            <div class="col">
                                <div class="account__login">
                                    <div class="account__login--header mb-25">
                                        <h3 class="account__login--header__title mb-10">Giriş Yap</h3>
                                    </div>
                                    <div class="account__login--inner">

                                        <?php if (session()->has("incorrect")) {
                                            echo "<h4 style=color:var(--secondary-color);>Kullanıcı adı veya şifre hatalı*</h4>";
                                        } ?>
                                        <label>
                                            <input class="account__login--input" name="email" placeholder="Eposta adresi" type="email">
                                        </label>
                                        <label>
                                            <input class="account__login--input" name="password" placeholder="Şifre" type="password">
                                        </label>
                                        <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                            <div class="account__login--remember position__relative">
                                                <input class="checkout__checkbox--input" name="remember_me" id="check1" type="checkbox">
                                                <span class="checkout__checkbox--checkmark"></span>
                                                <label class="checkout__checkbox--label login__remember--label" for="check1">
                                                    Beni Hatırla</label>
                                            </div>
                                            <button class="account__login--forgot" type="submit">Şifrenmi unuttum?</button>
                                        </div>
                                        <button class="account__login--btn primary__btn" type="submit">Giriş Yap</button>
                                        <div class="account__login--divide">
                                            <span class="account__login--divide__text">Ya da</span>
                                        </div>
                                        <div class="account__social d-flex justify-content-center mb-15">
                                            <button class="account__social--link google" id="google-login" target="_blank" href="#">Google</button>
                                        </div>
                                        <p class="account__login--signup__text">Hesabınız yok mu? Hemen <a href="<?php echo base_url("kayit"); ?>" type="submit" class="account__login--forgot">kayıt olun.</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End login section  -->

    </main>

    <!-- Start footer section -->
    <?php echo view("includes/footer"); ?>
    <!-- End footer section -->

    <?php echo view("includes/scripts"); ?>
    <script type="module">
        // Import the functions you need from the SDKs you need
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-app.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyBcVEmnXpldH0s5YV9KUE5J_kumyhpCqyY",
            authDomain: "ecommerce2-a27ce.firebaseapp.com",
            projectId: "ecommerce2-a27ce",
            storageBucket: "ecommerce2-a27ce.appspot.com",
            messagingSenderId: "790529221741",
            appId: "1:790529221741:web:f0a8da50b55336aad5cb64"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
    </script>
</body>

</html>