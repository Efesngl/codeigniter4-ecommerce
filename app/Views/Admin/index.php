<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Yönetim Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/<?php echo $site_settings["favicon"];?>">

    <!-- Bootstrap Css -->
    <link href="<?php echo base_url("admin_assets/css/bootstrap.min.css"); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url("admin_assets/css/icons.min.css"); ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url("admin_assets/css/app.min.css"); ?>" id="app-style" rel="stylesheet" type="text/css" />
    <!-- custom css -->
    <link href="<?php echo base_url("admin_assets/css/custom.css"); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Hoşgeldiniz !</h5>
                                        <p>Yönetim paneline gitmek için giriş yapınız.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="<?php echo base_url("admin_assets/images/profile-img.png"); ?>" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="index.html" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="<?php echo base_url("admin_assets/images/logo-light.svg"); ?>" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="index.html" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="<?php echo base_url("admin_assets/images/logo.svg"); ?>" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form class="form-horizontal" method="POST" action="<?php echo base_url("admin/login");?>">

                                    <div class="mb-3">
                                        <label for="username" class="form-label">E-posta</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="E-posta giriniz">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Şifre</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Şifre giriniz" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember-check" id="remember-check">
                                        <label class="form-check-label" for="remember-check">
                                            Beni Hatırla
                                        </label>
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Giriş Yap</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url("admin_assets/libs/jquery/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("admin_assets/libs/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
    <script src="<?php echo base_url("admin_assets/libs/metismenu/metisMenu.min.js"); ?>"></script>
    <script src="<?php echo base_url("admin_assets/libs/simplebar/simplebar.min.js"); ?>"></script>
    <script src="<?php echo base_url("admin_assets/libs/node-waves/waves.min.js"); ?>"></script>

    <!-- App js -->
    <script src="<?php echo base_url("admin_assets/js/app.js"); ?>"></script>
    <script src="<?php echo base_url("admin_assets/js/custom.js"); ?>"></script>
</body>

<!-- Mirrored from themesbrand.com/skote/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Jan 2022 11:22:38 GMT -->

</html>