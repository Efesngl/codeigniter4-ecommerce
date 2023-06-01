<!doctype html>
<html lang="tr">


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
                            <h1 class="breadcrumb__content--title text-white mb-10">Hakkımızda</h1>
                            <ul class="breadcrumb__content--menu d-flex">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Ana Sayfa</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Hakkımızda</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start about section -->
        <section class="about__section section--padding mb-95">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about__thumbnail d-flex">
                            <div class="about__thumbnail--items">
                                <img class="about__thumbnail--img border-radius-5 display-block" style="aspect-ratio:8 / 5;" src="<?php echo $media_1;?>" alt="about-thumbnail">
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content">
                            <span class="about__content--subtitle text__secondary mb-20"><?php echo $header_1;?></span>
                            <h2 class="about__content--maintitle mb-25"><?php echo $header_2;?></h2>
                            <?php echo $content;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End about section -->
        
        <!-- Start counterup banner section -->
        <div class="counterup__banner--section counterup__banner__bg2" id="funfactId">
            <div class="container">
                <div class="row row-cols-1 align-items-center">
                    <div class="col">
                        <div class="counterup__banner--inner position__relative d-flex align-items-center justify-content-between">
                            <div class="counterup__banner--items text-center">
                                <p class="counterup__banner--items__text text-white">Yıllık<br>Tecrübe</p>
                                <span class="counterup__banner--items__number js-counter text-white" data-count="50">0</span>
                            </div>
                            <div class="counterup__banner--items text-center">
                                <p class="counterup__banner--items__text text-white">YETENEKLİ <br>
                                    TAKIM ÜYELERİ </p>
                                <span class="counterup__banner--items__number js-counter text-white" data-count="100">0</span>
                            </div>
                            <div class="counterup__banner--items text-center">
                                <p class="counterup__banner--items__text text-white">MUTLU <br>
                                    MÜŞTERİLER</p>
                                <span class="counterup__banner--items__number js-counter text-white" data-count="80000000">0</span>
                            </div>
                            <div class="counterup__banner--items text-center">
                                <p class="counterup__banner--items__text text-white">AYLIK <br>
                                    SİPARİŞLER</p>
                                <span class="counterup__banner--items__number js-counter text-white" data-count="133133">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End counterup banner section -->

        <!-- Start team members section -->
        <!-- <section class="team__section section--padding">
            <div class="container">
                <div class="section__heading text-center mb-30">
                    <h2 class="section__heading--maintitle">Our Team</h2>
                </div>
                <div class="team__container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6 custom-col">
                            <div class="team__items text-center">
                                <div class="team__thumbnail">
                                    <img class="team__thumbnail--img border-radius-50 display-block" src="assets/img/other/team1.webp" alt="team-thumb">
                                </div>
                                <div class="team__content ">
                                    <h3 class="team__content--title">Sarrison Samuel</h3>
                                    <span class="team__content--subtitle">CEO - Founder</span>
                                    <ul class="team__social d-flex justify-content-center align-items-center">
                                        <li class="team__social--list">
                                            <a class="team__social--icon" target="_blank" href="https://www.facebook.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                                                    <path  data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Facebook</span>
                                            </a>
                                        </li>
                                        <li class="team__social--list">
                                            <a class="team__social--icon" target="_blank" href="https://twitter.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                                                    <path  data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z" transform="translate(-951.23 -1140.849)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Twitter</span>
                                            </a>
                                        </li>
                                        <li class="team__social--list">
                                            <a class="team__social--icon" target="_blank" href="https://www.skype.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.482" height="16.481" viewBox="0 0 16.482 16.481">
                                                    <path  data-name="Path 284" d="M879,926.615a4.479,4.479,0,0,1,.622-2.317,4.666,4.666,0,0,1,1.676-1.677,4.482,4.482,0,0,1,2.317-.622,4.577,4.577,0,0,1,2.43.678,7.58,7.58,0,0,1,5.048.961,7.561,7.561,0,0,1,3.786,6.593,8,8,0,0,1-.094,1.206,4.676,4.676,0,0,1,.7,2.411,4.53,4.53,0,0,1-.622,2.326,4.62,4.62,0,0,1-1.686,1.686,4.626,4.626,0,0,1-4.756-.075,7.7,7.7,0,0,1-1.187.094,7.623,7.623,0,0,1-7.647-7.647,7.46,7.46,0,0,1,.094-1.187A4.424,4.424,0,0,1,879,926.615Zm4.107,1.714a2.473,2.473,0,0,0,.282,1.234,2.41,2.41,0,0,0,.782.829,5.091,5.091,0,0,0,1.215.565,15.981,15.981,0,0,0,1.582.424q.678.151.979.235a3.091,3.091,0,0,1,.593.235,1.388,1.388,0,0,1,.452.348.738.738,0,0,1,.16.481.91.91,0,0,1-.48.753,2.254,2.254,0,0,1-1.271.321,2.105,2.105,0,0,1-1.253-.292,2.262,2.262,0,0,1-.65-.838,2.42,2.42,0,0,0-.414-.546.853.853,0,0,0-.584-.17.893.893,0,0,0-.669.283.919.919,0,0,0-.273.659,1.654,1.654,0,0,0,.217.782,2.456,2.456,0,0,0,.678.763,3.64,3.64,0,0,0,1.158.574,5.931,5.931,0,0,0,1.639.235,5.767,5.767,0,0,0,2.072-.339,2.982,2.982,0,0,0,1.356-.961,2.306,2.306,0,0,0,.471-1.431,2.161,2.161,0,0,0-.443-1.375,3.009,3.009,0,0,0-1.2-.894,10.118,10.118,0,0,0-1.865-.575,11.2,11.2,0,0,1-1.309-.311,2.011,2.011,0,0,1-.8-.452.992.992,0,0,1-.3-.744,1.143,1.143,0,0,1,.565-.97,2.59,2.59,0,0,1,1.488-.386,2.538,2.538,0,0,1,1.074.188,1.634,1.634,0,0,1,.622.49,3.477,3.477,0,0,1,.414.753,1.568,1.568,0,0,0,.4.594.866.866,0,0,0,.574.2,1,1,0,0,0,.706-.254.828.828,0,0,0,.273-.631,2.234,2.234,0,0,0-.443-1.253,3.321,3.321,0,0,0-1.158-1.046,5.375,5.375,0,0,0-2.524-.527,5.764,5.764,0,0,0-2.213.386,3.161,3.161,0,0,0-1.422,1.083A2.738,2.738,0,0,0,883.106,928.329Z" transform="translate(-878.999 -922)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Skype</span>
                                            </a>
                                        </li>
                                        <li class="team__social--list">
                                            <a class="team__social--icon" target="_blank" href="https://www.youtube.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582" viewBox="0 0 16.49 11.582">
                                                    <path  data-name="Path 321" d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z" transform="translate(-951.269 -1359.8)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Youtube</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6 custom-col">
                            <div class="team__items text-center">
                                <div class="team__thumbnail">
                                    <img class="team__thumbnail--img border-radius-50 display-block" src="assets/img/other/team2.webp" alt="team-thumb">
                                </div>
                                <div class="team__content">
                                    <h3 class="team__content--title">Warrison Samuel</h3>
                                    <span class="team__content--subtitle">Spa Manager</span>
                                    <ul class="team__social d-flex justify-content-center align-items-center">
                                        <li class="team__social--list">
                                            <a class="team__social--icon" target="_blank" href="https://www.facebook.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                                                    <path  data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Facebook</span>
                                            </a>
                                        </li>
                                        <li class="team__social--list">
                                            <a class="team__social--icon" target="_blank" href="https://twitter.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                                                    <path  data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z" transform="translate(-951.23 -1140.849)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Twitter</span>
                                            </a>
                                        </li>
                                        <li class="team__social--list">
                                            <a class="team__social--icon" target="_blank" href="https://www.skype.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.482" height="16.481" viewBox="0 0 16.482 16.481">
                                                    <path  data-name="Path 284" d="M879,926.615a4.479,4.479,0,0,1,.622-2.317,4.666,4.666,0,0,1,1.676-1.677,4.482,4.482,0,0,1,2.317-.622,4.577,4.577,0,0,1,2.43.678,7.58,7.58,0,0,1,5.048.961,7.561,7.561,0,0,1,3.786,6.593,8,8,0,0,1-.094,1.206,4.676,4.676,0,0,1,.7,2.411,4.53,4.53,0,0,1-.622,2.326,4.62,4.62,0,0,1-1.686,1.686,4.626,4.626,0,0,1-4.756-.075,7.7,7.7,0,0,1-1.187.094,7.623,7.623,0,0,1-7.647-7.647,7.46,7.46,0,0,1,.094-1.187A4.424,4.424,0,0,1,879,926.615Zm4.107,1.714a2.473,2.473,0,0,0,.282,1.234,2.41,2.41,0,0,0,.782.829,5.091,5.091,0,0,0,1.215.565,15.981,15.981,0,0,0,1.582.424q.678.151.979.235a3.091,3.091,0,0,1,.593.235,1.388,1.388,0,0,1,.452.348.738.738,0,0,1,.16.481.91.91,0,0,1-.48.753,2.254,2.254,0,0,1-1.271.321,2.105,2.105,0,0,1-1.253-.292,2.262,2.262,0,0,1-.65-.838,2.42,2.42,0,0,0-.414-.546.853.853,0,0,0-.584-.17.893.893,0,0,0-.669.283.919.919,0,0,0-.273.659,1.654,1.654,0,0,0,.217.782,2.456,2.456,0,0,0,.678.763,3.64,3.64,0,0,0,1.158.574,5.931,5.931,0,0,0,1.639.235,5.767,5.767,0,0,0,2.072-.339,2.982,2.982,0,0,0,1.356-.961,2.306,2.306,0,0,0,.471-1.431,2.161,2.161,0,0,0-.443-1.375,3.009,3.009,0,0,0-1.2-.894,10.118,10.118,0,0,0-1.865-.575,11.2,11.2,0,0,1-1.309-.311,2.011,2.011,0,0,1-.8-.452.992.992,0,0,1-.3-.744,1.143,1.143,0,0,1,.565-.97,2.59,2.59,0,0,1,1.488-.386,2.538,2.538,0,0,1,1.074.188,1.634,1.634,0,0,1,.622.49,3.477,3.477,0,0,1,.414.753,1.568,1.568,0,0,0,.4.594.866.866,0,0,0,.574.2,1,1,0,0,0,.706-.254.828.828,0,0,0,.273-.631,2.234,2.234,0,0,0-.443-1.253,3.321,3.321,0,0,0-1.158-1.046,5.375,5.375,0,0,0-2.524-.527,5.764,5.764,0,0,0-2.213.386,3.161,3.161,0,0,0-1.422,1.083A2.738,2.738,0,0,0,883.106,928.329Z" transform="translate(-878.999 -922)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Skype</span>
                                            </a>
                                        </li>
                                        <li class="team__social--list">
                                            <a class="team__social--icon" target="_blank" href="https://www.youtube.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582" viewBox="0 0 16.49 11.582">
                                                    <path  data-name="Path 321" d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z" transform="translate(-951.269 -1359.8)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Youtube</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6 custom-col">
                            <div class="team__items text-center">
                                <div class="team__thumbnail">
                                    <img class="team__thumbnail--img border-radius-50 display-block" src="assets/img/other/team3.webp" alt="team-thumb">
                                </div>
                                <div class="team__content">
                                    <h3 class="team__content--title">Harrison Samuel</h3>
                                    <span class="team__content--subtitle">Products Manager</span>
                                    <ul class="team__social d-flex justify-content-center align-items-center">
                                        <li class="team__social--list">
                                            <a class="team__social--icon" target="_blank" href="https://www.facebook.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                                                    <path  data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Facebook</span>
                                            </a>
                                        </li>
                                        <li class="team__social--list">
                                            <a class="team__social--icon" target="_blank" href="https://twitter.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                                                    <path  data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z" transform="translate(-951.23 -1140.849)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Twitter</span>
                                            </a>
                                        </li>
                                        <li class="team__social--list">
                                            <a class="team__social--icon" target="_blank" href="https://www.skype.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.482" height="16.481" viewBox="0 0 16.482 16.481">
                                                    <path  data-name="Path 284" d="M879,926.615a4.479,4.479,0,0,1,.622-2.317,4.666,4.666,0,0,1,1.676-1.677,4.482,4.482,0,0,1,2.317-.622,4.577,4.577,0,0,1,2.43.678,7.58,7.58,0,0,1,5.048.961,7.561,7.561,0,0,1,3.786,6.593,8,8,0,0,1-.094,1.206,4.676,4.676,0,0,1,.7,2.411,4.53,4.53,0,0,1-.622,2.326,4.62,4.62,0,0,1-1.686,1.686,4.626,4.626,0,0,1-4.756-.075,7.7,7.7,0,0,1-1.187.094,7.623,7.623,0,0,1-7.647-7.647,7.46,7.46,0,0,1,.094-1.187A4.424,4.424,0,0,1,879,926.615Zm4.107,1.714a2.473,2.473,0,0,0,.282,1.234,2.41,2.41,0,0,0,.782.829,5.091,5.091,0,0,0,1.215.565,15.981,15.981,0,0,0,1.582.424q.678.151.979.235a3.091,3.091,0,0,1,.593.235,1.388,1.388,0,0,1,.452.348.738.738,0,0,1,.16.481.91.91,0,0,1-.48.753,2.254,2.254,0,0,1-1.271.321,2.105,2.105,0,0,1-1.253-.292,2.262,2.262,0,0,1-.65-.838,2.42,2.42,0,0,0-.414-.546.853.853,0,0,0-.584-.17.893.893,0,0,0-.669.283.919.919,0,0,0-.273.659,1.654,1.654,0,0,0,.217.782,2.456,2.456,0,0,0,.678.763,3.64,3.64,0,0,0,1.158.574,5.931,5.931,0,0,0,1.639.235,5.767,5.767,0,0,0,2.072-.339,2.982,2.982,0,0,0,1.356-.961,2.306,2.306,0,0,0,.471-1.431,2.161,2.161,0,0,0-.443-1.375,3.009,3.009,0,0,0-1.2-.894,10.118,10.118,0,0,0-1.865-.575,11.2,11.2,0,0,1-1.309-.311,2.011,2.011,0,0,1-.8-.452.992.992,0,0,1-.3-.744,1.143,1.143,0,0,1,.565-.97,2.59,2.59,0,0,1,1.488-.386,2.538,2.538,0,0,1,1.074.188,1.634,1.634,0,0,1,.622.49,3.477,3.477,0,0,1,.414.753,1.568,1.568,0,0,0,.4.594.866.866,0,0,0,.574.2,1,1,0,0,0,.706-.254.828.828,0,0,0,.273-.631,2.234,2.234,0,0,0-.443-1.253,3.321,3.321,0,0,0-1.158-1.046,5.375,5.375,0,0,0-2.524-.527,5.764,5.764,0,0,0-2.213.386,3.161,3.161,0,0,0-1.422,1.083A2.738,2.738,0,0,0,883.106,928.329Z" transform="translate(-878.999 -922)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Skype</span>
                                            </a>
                                        </li>
                                        <li class="team__social--list">
                                            <a class="team__social--icon" target="_blank" href="https://www.youtube.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582" viewBox="0 0 16.49 11.582">
                                                    <path  data-name="Path 321" d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z" transform="translate(-951.269 -1359.8)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Youtube</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6 custom-col">
                            <div class="team__items text-center">
                                <div class="team__thumbnail">
                                    <img class="team__thumbnail--img border-radius-50 display-block" src="assets/img/other/team1.webp" alt="team-thumb">
                                </div>
                                <div class="team__content">
                                    <h3 class="team__content--title">Milton Marsh</h3>
                                    <span class="team__content--subtitle">Products Manager</span>
                                    <ul class="team__social d-flex justify-content-center align-items-center">
                                        <li class="team__social--list">
                                            <a class="team__social--icon" target="_blank" href="https://www.facebook.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                                                    <path  data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Facebook</span>
                                            </a>
                                        </li>
                                        <li class="team__social--list">
                                            <a class="team__social--icon" target="_blank" href="https://twitter.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                                                    <path  data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z" transform="translate(-951.23 -1140.849)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Twitter</span>
                                            </a>
                                        </li>
                                        <li class="team__social--list">
                                            <a class="team__social--icon" target="_blank" href="https://www.skype.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.482" height="16.481" viewBox="0 0 16.482 16.481">
                                                    <path  data-name="Path 284" d="M879,926.615a4.479,4.479,0,0,1,.622-2.317,4.666,4.666,0,0,1,1.676-1.677,4.482,4.482,0,0,1,2.317-.622,4.577,4.577,0,0,1,2.43.678,7.58,7.58,0,0,1,5.048.961,7.561,7.561,0,0,1,3.786,6.593,8,8,0,0,1-.094,1.206,4.676,4.676,0,0,1,.7,2.411,4.53,4.53,0,0,1-.622,2.326,4.62,4.62,0,0,1-1.686,1.686,4.626,4.626,0,0,1-4.756-.075,7.7,7.7,0,0,1-1.187.094,7.623,7.623,0,0,1-7.647-7.647,7.46,7.46,0,0,1,.094-1.187A4.424,4.424,0,0,1,879,926.615Zm4.107,1.714a2.473,2.473,0,0,0,.282,1.234,2.41,2.41,0,0,0,.782.829,5.091,5.091,0,0,0,1.215.565,15.981,15.981,0,0,0,1.582.424q.678.151.979.235a3.091,3.091,0,0,1,.593.235,1.388,1.388,0,0,1,.452.348.738.738,0,0,1,.16.481.91.91,0,0,1-.48.753,2.254,2.254,0,0,1-1.271.321,2.105,2.105,0,0,1-1.253-.292,2.262,2.262,0,0,1-.65-.838,2.42,2.42,0,0,0-.414-.546.853.853,0,0,0-.584-.17.893.893,0,0,0-.669.283.919.919,0,0,0-.273.659,1.654,1.654,0,0,0,.217.782,2.456,2.456,0,0,0,.678.763,3.64,3.64,0,0,0,1.158.574,5.931,5.931,0,0,0,1.639.235,5.767,5.767,0,0,0,2.072-.339,2.982,2.982,0,0,0,1.356-.961,2.306,2.306,0,0,0,.471-1.431,2.161,2.161,0,0,0-.443-1.375,3.009,3.009,0,0,0-1.2-.894,10.118,10.118,0,0,0-1.865-.575,11.2,11.2,0,0,1-1.309-.311,2.011,2.011,0,0,1-.8-.452.992.992,0,0,1-.3-.744,1.143,1.143,0,0,1,.565-.97,2.59,2.59,0,0,1,1.488-.386,2.538,2.538,0,0,1,1.074.188,1.634,1.634,0,0,1,.622.49,3.477,3.477,0,0,1,.414.753,1.568,1.568,0,0,0,.4.594.866.866,0,0,0,.574.2,1,1,0,0,0,.706-.254.828.828,0,0,0,.273-.631,2.234,2.234,0,0,0-.443-1.253,3.321,3.321,0,0,0-1.158-1.046,5.375,5.375,0,0,0-2.524-.527,5.764,5.764,0,0,0-2.213.386,3.161,3.161,0,0,0-1.422,1.083A2.738,2.738,0,0,0,883.106,928.329Z" transform="translate(-878.999 -922)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Skype</span>
                                            </a>
                                        </li>
                                        <li class="team__social--list">
                                            <a class="team__social--icon" target="_blank" href="https://www.youtube.com/">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582" viewBox="0 0 16.49 11.582">
                                                    <path  data-name="Path 321" d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z" transform="translate(-951.269 -1359.8)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Youtube</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- End team members section -->

        <!-- Start testimonial section -->
        <!-- <section class="testimonial__section position__relative testimonial__bg--two section--padding">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="testimonial__section--inner">
                            <div class="section__heading text-center mb-40">
                                <h2 class="section__heading--maintitle">What Say Our Top Clints</h2>
                            </div>
                            <div class=" testimonial__swiper--column3 testimonial__padding swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="testimonial__items--style2 position__relative border-radius-5 d-flex align-items-center">
                                            <div class="testimonial__thumbnail--style2">
                                                <img class="testimonial__items--thumbnail__img display-block" src="assets/img/other/testimonial-thumb1.webp" alt="testimonial-img">
                                            </div>
                                            <div class="testimonial__content--style2">
                                                <h3 class="testimonial__items--author__title h4">Abdur Razzak</h3>
                                                <h4 class="testimonial__items--author__subtitle h5">Ui Ux Designer</h4> 
                                                <p class="testimonial__items--desc style2"><svg xmlns="http://www.w3.org/2000/svg" width="8.101" height="6.481" viewBox="0 0 8.101 6.481">
                                                    <path  data-name="Icon metro-quote" d="M5.57,9.667v3.24H8.81V9.667H7.19a1.587,1.587,0,0,1,1.62-1.62V6.427A3.174,3.174,0,0,0,5.57,9.667Zm8.1-1.62V6.427a3.174,3.174,0,0,0-3.24,3.24v3.24h3.24V9.667h-1.62A1.587,1.587,0,0,1,13.671,8.047Z" transform="translate(-5.57 -6.427)" fill="currentColor"/>
                                                  </svg>
                                                    Mum ut perspiciatis unde omnis 
                                                    iste natus error sit voluptatem
                                                    accusan tium doloremque. <svg xmlns="http://www.w3.org/2000/svg" width="7.774" height="6.803" viewBox="0 0 7.774 6.803">
                                                        <path  data-name="Icon awesome-quote-right" d="M7.046,1.5H5.1a.729.729,0,0,0-.729.729V4.172A.729.729,0,0,0,5.1,4.9H6.317v.972a.973.973,0,0,1-.972.972H5.223a.364.364,0,0,0-.364.364v.729a.364.364,0,0,0,.364.364h.121a2.429,2.429,0,0,0,2.43-2.43V2.229A.729.729,0,0,0,7.046,1.5Zm-4.373,0H.729A.729.729,0,0,0,0,2.229V4.172A.729.729,0,0,0,.729,4.9H1.944v.972a.973.973,0,0,1-.972.972H.85a.364.364,0,0,0-.364.364v.729A.364.364,0,0,0,.85,8.3H.972A2.429,2.429,0,0,0,3.4,5.873V2.229A.729.729,0,0,0,2.672,1.5Z" transform="translate(0 -1.5)" fill="currentColor"/>
                                                      </svg>
                                                </p>
                                                <ul class="rating testimonial__rating d-flex">
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                </ul>   
                                            </div>
                                            <div class="testimonial__quote--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25.599" height="22.572" viewBox="0 0 25.599 22.572">
                                                    <g  data-name="Group 382" transform="translate(-164 -5399)">
                                                      <path  data-name="Path 131" d="M10.284,11.81a1.231,1.231,0,0,0,.62-1.652L9.892,8.031a1.235,1.235,0,0,0-1.611-.6A14.227,14.227,0,0,0,3.82,10.324,10.79,10.79,0,0,0,.826,15.052,25.936,25.936,0,0,0,0,22.321v6.34A1.243,1.243,0,0,0,1.239,29.9H9.355a1.243,1.243,0,0,0,1.239-1.239V20.545a1.243,1.243,0,0,0-1.239-1.239H5.472a8.707,8.707,0,0,1,1.446-5.018A7.849,7.849,0,0,1,10.284,11.81Z" transform="translate(164 5391.672)" fill="#f1f1f1"/>
                                                      <path  data-name="Path 132" d="M80.963,11.89a1.231,1.231,0,0,0,.62-1.652L80.571,8.132a1.235,1.235,0,0,0-1.611-.6,14.959,14.959,0,0,0-4.44,2.87,11.021,11.021,0,0,0-3.015,4.75A25.587,25.587,0,0,0,70.7,22.4v6.34a1.243,1.243,0,0,0,1.239,1.239h8.116a1.243,1.243,0,0,0,1.239-1.239V20.625a1.243,1.243,0,0,0-1.239-1.239h-3.9A8.709,8.709,0,0,1,77.6,14.368,7.848,7.848,0,0,1,80.963,11.89Z" transform="translate(107.9 5391.592)" fill="#f1f1f1"/>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testimonial__items--style2 position__relative border-radius-5 d-flex align-items-center">
                                            <div class="testimonial__thumbnail--style2">
                                                <img class="testimonial__items--thumbnail__img display-block" src="assets/img/other/testimonial-thumb2.webp" alt="testimonial-img">
                                            </div>
                                            <div class="testimonial__content--style2">
                                                <h3 class="testimonial__items--author__title h4">Hamid Khalid</h3>
                                                <h4 class="testimonial__items--author__subtitle h5">Web Designer</h4> 
                                                <p class="testimonial__items--desc style2"><svg xmlns="http://www.w3.org/2000/svg" width="8.101" height="6.481" viewBox="0 0 8.101 6.481">
                                                    <path  data-name="Icon metro-quote" d="M5.57,9.667v3.24H8.81V9.667H7.19a1.587,1.587,0,0,1,1.62-1.62V6.427A3.174,3.174,0,0,0,5.57,9.667Zm8.1-1.62V6.427a3.174,3.174,0,0,0-3.24,3.24v3.24h3.24V9.667h-1.62A1.587,1.587,0,0,1,13.671,8.047Z" transform="translate(-5.57 -6.427)" fill="currentColor"/>
                                                  </svg>
                                                    Mum ut perspiciatis unde omnis 
                                                    iste natus error sit voluptatem
                                                    accusan tium doloremque. <svg xmlns="http://www.w3.org/2000/svg" width="7.774" height="6.803" viewBox="0 0 7.774 6.803">
                                                        <path  data-name="Icon awesome-quote-right" d="M7.046,1.5H5.1a.729.729,0,0,0-.729.729V4.172A.729.729,0,0,0,5.1,4.9H6.317v.972a.973.973,0,0,1-.972.972H5.223a.364.364,0,0,0-.364.364v.729a.364.364,0,0,0,.364.364h.121a2.429,2.429,0,0,0,2.43-2.43V2.229A.729.729,0,0,0,7.046,1.5Zm-4.373,0H.729A.729.729,0,0,0,0,2.229V4.172A.729.729,0,0,0,.729,4.9H1.944v.972a.973.973,0,0,1-.972.972H.85a.364.364,0,0,0-.364.364v.729A.364.364,0,0,0,.85,8.3H.972A2.429,2.429,0,0,0,3.4,5.873V2.229A.729.729,0,0,0,2.672,1.5Z" transform="translate(0 -1.5)" fill="currentColor"/>
                                                      </svg>
                                                </p>
                                                <ul class="rating testimonial__rating d-flex">
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                </ul>   
                                            </div>
                                            <div class="testimonial__quote--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25.599" height="22.572" viewBox="0 0 25.599 22.572">
                                                    <g  data-name="Group 382" transform="translate(-164 -5399)">
                                                      <path  data-name="Path 131" d="M10.284,11.81a1.231,1.231,0,0,0,.62-1.652L9.892,8.031a1.235,1.235,0,0,0-1.611-.6A14.227,14.227,0,0,0,3.82,10.324,10.79,10.79,0,0,0,.826,15.052,25.936,25.936,0,0,0,0,22.321v6.34A1.243,1.243,0,0,0,1.239,29.9H9.355a1.243,1.243,0,0,0,1.239-1.239V20.545a1.243,1.243,0,0,0-1.239-1.239H5.472a8.707,8.707,0,0,1,1.446-5.018A7.849,7.849,0,0,1,10.284,11.81Z" transform="translate(164 5391.672)" fill="#f1f1f1"/>
                                                      <path  data-name="Path 132" d="M80.963,11.89a1.231,1.231,0,0,0,.62-1.652L80.571,8.132a1.235,1.235,0,0,0-1.611-.6,14.959,14.959,0,0,0-4.44,2.87,11.021,11.021,0,0,0-3.015,4.75A25.587,25.587,0,0,0,70.7,22.4v6.34a1.243,1.243,0,0,0,1.239,1.239h8.116a1.243,1.243,0,0,0,1.239-1.239V20.625a1.243,1.243,0,0,0-1.239-1.239h-3.9A8.709,8.709,0,0,1,77.6,14.368,7.848,7.848,0,0,1,80.963,11.89Z" transform="translate(107.9 5391.592)" fill="#f1f1f1"/>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testimonial__items--style2 position__relative border-radius-5 d-flex align-items-center">
                                            <div class="testimonial__thumbnail--style2">
                                                <img class="testimonial__items--thumbnail__img display-block" src="assets/img/other/testimonial-thumb3.webp" alt="testimonial-img">
                                            </div>
                                            <div class="testimonial__content--style2">
                                                <h3 class="testimonial__items--author__title h4">Sohidul Alam</h3>
                                                <h4 class="testimonial__items--author__subtitle h5">CEO Peque Theme</h4> 
                                                <p class="testimonial__items--desc style2"><svg xmlns="http://www.w3.org/2000/svg" width="8.101" height="6.481" viewBox="0 0 8.101 6.481">
                                                    <path  data-name="Icon metro-quote" d="M5.57,9.667v3.24H8.81V9.667H7.19a1.587,1.587,0,0,1,1.62-1.62V6.427A3.174,3.174,0,0,0,5.57,9.667Zm8.1-1.62V6.427a3.174,3.174,0,0,0-3.24,3.24v3.24h3.24V9.667h-1.62A1.587,1.587,0,0,1,13.671,8.047Z" transform="translate(-5.57 -6.427)" fill="currentColor"/>
                                                  </svg>
                                                    Mum ut perspiciatis unde omnis 
                                                    iste natus error sit voluptatem
                                                    accusan tium doloremque. <svg xmlns="http://www.w3.org/2000/svg" width="7.774" height="6.803" viewBox="0 0 7.774 6.803">
                                                        <path  data-name="Icon awesome-quote-right" d="M7.046,1.5H5.1a.729.729,0,0,0-.729.729V4.172A.729.729,0,0,0,5.1,4.9H6.317v.972a.973.973,0,0,1-.972.972H5.223a.364.364,0,0,0-.364.364v.729a.364.364,0,0,0,.364.364h.121a2.429,2.429,0,0,0,2.43-2.43V2.229A.729.729,0,0,0,7.046,1.5Zm-4.373,0H.729A.729.729,0,0,0,0,2.229V4.172A.729.729,0,0,0,.729,4.9H1.944v.972a.973.973,0,0,1-.972.972H.85a.364.364,0,0,0-.364.364v.729A.364.364,0,0,0,.85,8.3H.972A2.429,2.429,0,0,0,3.4,5.873V2.229A.729.729,0,0,0,2.672,1.5Z" transform="translate(0 -1.5)" fill="currentColor"/>
                                                      </svg>
                                                </p>
                                                <ul class="rating testimonial__rating d-flex">
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                </ul>   
                                            </div>
                                            <div class="testimonial__quote--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25.599" height="22.572" viewBox="0 0 25.599 22.572">
                                                    <g  data-name="Group 382" transform="translate(-164 -5399)">
                                                      <path  data-name="Path 131" d="M10.284,11.81a1.231,1.231,0,0,0,.62-1.652L9.892,8.031a1.235,1.235,0,0,0-1.611-.6A14.227,14.227,0,0,0,3.82,10.324,10.79,10.79,0,0,0,.826,15.052,25.936,25.936,0,0,0,0,22.321v6.34A1.243,1.243,0,0,0,1.239,29.9H9.355a1.243,1.243,0,0,0,1.239-1.239V20.545a1.243,1.243,0,0,0-1.239-1.239H5.472a8.707,8.707,0,0,1,1.446-5.018A7.849,7.849,0,0,1,10.284,11.81Z" transform="translate(164 5391.672)" fill="#f1f1f1"/>
                                                      <path  data-name="Path 132" d="M80.963,11.89a1.231,1.231,0,0,0,.62-1.652L80.571,8.132a1.235,1.235,0,0,0-1.611-.6,14.959,14.959,0,0,0-4.44,2.87,11.021,11.021,0,0,0-3.015,4.75A25.587,25.587,0,0,0,70.7,22.4v6.34a1.243,1.243,0,0,0,1.239,1.239h8.116a1.243,1.243,0,0,0,1.239-1.239V20.625a1.243,1.243,0,0,0-1.239-1.239h-3.9A8.709,8.709,0,0,1,77.6,14.368,7.848,7.848,0,0,1,80.963,11.89Z" transform="translate(107.9 5391.592)" fill="#f1f1f1"/>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testimonial__items--style2 position__relative border-radius-5 d-flex align-items-center">
                                            <div class="testimonial__thumbnail--style2">
                                                <img class="testimonial__items--thumbnail__img display-block" src="assets/img/other/testimonial-thumb1.webp" alt="testimonial-img">
                                            </div>
                                            <div class="testimonial__content--style2">
                                                <h3 class="testimonial__items--author__title h4">Abdur Razzak</h3>
                                                <h4 class="testimonial__items--author__subtitle h5">Ui Ux Designer</h4> 
                                                <p class="testimonial__items--desc style2"><svg xmlns="http://www.w3.org/2000/svg" width="8.101" height="6.481" viewBox="0 0 8.101 6.481">
                                                    <path  data-name="Icon metro-quote" d="M5.57,9.667v3.24H8.81V9.667H7.19a1.587,1.587,0,0,1,1.62-1.62V6.427A3.174,3.174,0,0,0,5.57,9.667Zm8.1-1.62V6.427a3.174,3.174,0,0,0-3.24,3.24v3.24h3.24V9.667h-1.62A1.587,1.587,0,0,1,13.671,8.047Z" transform="translate(-5.57 -6.427)" fill="currentColor"/>
                                                  </svg>
                                                    Mum ut perspiciatis unde omnis 
                                                    iste natus error sit voluptatem
                                                    accusan tium doloremque. <svg xmlns="http://www.w3.org/2000/svg" width="7.774" height="6.803" viewBox="0 0 7.774 6.803">
                                                        <path  data-name="Icon awesome-quote-right" d="M7.046,1.5H5.1a.729.729,0,0,0-.729.729V4.172A.729.729,0,0,0,5.1,4.9H6.317v.972a.973.973,0,0,1-.972.972H5.223a.364.364,0,0,0-.364.364v.729a.364.364,0,0,0,.364.364h.121a2.429,2.429,0,0,0,2.43-2.43V2.229A.729.729,0,0,0,7.046,1.5Zm-4.373,0H.729A.729.729,0,0,0,0,2.229V4.172A.729.729,0,0,0,.729,4.9H1.944v.972a.973.973,0,0,1-.972.972H.85a.364.364,0,0,0-.364.364v.729A.364.364,0,0,0,.85,8.3H.972A2.429,2.429,0,0,0,3.4,5.873V2.229A.729.729,0,0,0,2.672,1.5Z" transform="translate(0 -1.5)" fill="currentColor"/>
                                                      </svg>
                                                </p>
                                                <ul class="rating testimonial__rating d-flex">
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                </ul>   
                                            </div>
                                            <div class="testimonial__quote--icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25.599" height="22.572" viewBox="0 0 25.599 22.572">
                                                    <g  data-name="Group 382" transform="translate(-164 -5399)">
                                                      <path  data-name="Path 131" d="M10.284,11.81a1.231,1.231,0,0,0,.62-1.652L9.892,8.031a1.235,1.235,0,0,0-1.611-.6A14.227,14.227,0,0,0,3.82,10.324,10.79,10.79,0,0,0,.826,15.052,25.936,25.936,0,0,0,0,22.321v6.34A1.243,1.243,0,0,0,1.239,29.9H9.355a1.243,1.243,0,0,0,1.239-1.239V20.545a1.243,1.243,0,0,0-1.239-1.239H5.472a8.707,8.707,0,0,1,1.446-5.018A7.849,7.849,0,0,1,10.284,11.81Z" transform="translate(164 5391.672)" fill="#f1f1f1"/>
                                                      <path  data-name="Path 132" d="M80.963,11.89a1.231,1.231,0,0,0,.62-1.652L80.571,8.132a1.235,1.235,0,0,0-1.611-.6,14.959,14.959,0,0,0-4.44,2.87,11.021,11.021,0,0,0-3.015,4.75A25.587,25.587,0,0,0,70.7,22.4v6.34a1.243,1.243,0,0,0,1.239,1.239h8.116a1.243,1.243,0,0,0,1.239-1.239V20.625a1.243,1.243,0,0,0-1.239-1.239h-3.9A8.709,8.709,0,0,1,77.6,14.368,7.848,7.848,0,0,1,80.963,11.89Z" transform="translate(107.9 5391.592)" fill="#f1f1f1"/>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial__pagination swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img class="testimonial__bg--shape1" src="assets/img/other/testimonial-shape.webp" alt="">
            <img class="testimonial__bg--shape2" src="assets/img/other/testimonial-shape2.webp" alt="">
        </section> -->
        <!-- End testimonial section -->

        <!-- Start Newsletter banner section -->
        <section class="newsletter__banner--section section--padding color-scheme-3">
            <div class="container">
                <div class="newsletter__banner--thumbnail position__relative">
                    <img class="newsletter__banner--thumbnail__img" src="assets/img/banner/banner-bg6.webp" alt="newsletter-banner">
                    <div class="newsletter__content newsletter__subscribe">
                        <h5 class="newsletter__content--subtitle text-white">Fırsatlardan haberdar olmak ister misiniz?</h5>
                        <h2 class="newsletter__content--title text-white h3 mb-25">Fırsatlardan haberdar olmak için  <br>
                            Haber bültenimize kayıt olun.</h2>
                        <form class="newsletter__subscribe--form position__relative" action="#">
                            <label>
                                <input class="newsletter__subscribe--input" placeholder="E-posta adresinizi girin..." type="email">
                            </label>
                            <button class="newsletter__subscribe--button primary__btn btn__style3" type="submit">Kayıt Ol
                                <svg class="newsletter__subscribe--button__icon" xmlns="http://www.w3.org/2000/svg" width="9.159" height="7.85" viewBox="0 0 9.159 7.85">
                                    <path  data-name="Icon material-send" d="M3,12.35l9.154-3.925L3,4.5,3,7.553l6.542.872L3,9.3Z" transform="translate(-3 -4.5)" fill="currentColor"/>
                                </svg>
                            </button>
                        </form>   
                    </div>
                </div>
            </div>
           </section>
        <!-- End Newsletter banner section -->

        <!-- Start brand logo section -->
        <!-- <div class="brand__logo--section bg__secondary section--padding">
            <div class="container-fluid">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="brand__logo--section__inner d-flex justify-content-center align-items-center">
                            <div class="brand__logo--items">
                                <img class="brand__logo--items__thumbnail--img" src="assets/img/logo/brand-logo1.webp" alt="brand logo">
                            </div>
                            <div class="brand__logo--items">
                                <img class="brand__logo--items__thumbnail--img" src="assets/img/logo/brand-logo2.webp" alt="brand logo">
                            </div>
                            <div class="brand__logo--items">
                                <img class="brand__logo--items__thumbnail--img" src="assets/img/logo/brand-logo3.webp" alt="brand logo">
                            </div>
                            <div class="brand__logo--items">
                                <img class="brand__logo--items__thumbnail--img" src="assets/img/logo/brand-logo4.webp" alt="brand logo">
                            </div>
                            <div class="brand__logo--items">
                                <img class="brand__logo--items__thumbnail--img" src="assets/img/logo/brand-logo5.webp" alt="brand logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- End brand logo section -->
    </main>

    <!-- Start footer section -->
    <?php echo view("includes/footer");?>
    <!-- End footer section -->

    
     <?php echo view("includes/scripts");?>
  
</body>

</html>