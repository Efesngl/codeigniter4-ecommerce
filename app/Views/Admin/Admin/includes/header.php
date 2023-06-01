<header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="<?php echo base_url("admin/anasayfa");?>" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="/<?php echo $site_settings["logo"];?>" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="/<?php echo $site_settings["logo"];?>" alt="" height="17">
                                </span>
                            </a>

                            <a href="<?php echo base_url("admin/anasayfa");?>" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="/<?php echo $site_settings["logo"];?>" alt="" height="22">
                                </span>
                                <span class="logo-lg" style="width:100px;height:100px;display:inline-block;">
                                    <img src="/<?php echo $site_settings["logo"];?>" alt="" height="100">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
        
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-regular fa-circle-user fa-2xl"></i>
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?php echo $user["username"]?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item text-danger" href="/admin/cikisyap"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Çıkış</span></a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="">
                                <a href="<?php echo base_url("admin/anasayfa");?>" class="waves-effect" aria-expanded="false">
                                    <i class="fa-solid fa-house fa-xl"></i>
                                    <span key="t-dashboards" style="margin-left:10px;">Ana Sayfa</span>
                                </a>
                            </li>
                            <li class="menu-title" key="t-menu">Market</li>
                            <li class="">
                                <a href="<?php echo base_url("admin/urunler");?>" class="waves-effect" aria-expanded="false">
                                    <i class="fa-solid fa-store fa-xl"></i>
                                    <span key="t-dashboards" style="margin-left: 10px;">Ürünler</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url("admin/kategoriler");?>" class="waves-effect" aria-expanded="false">
                                    <i class="fa-solid fa-tags fa-xl"></i>
                                    <span key="t-dashboards" style="margin-left: 10px;">Kategoriler</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url("admin/markalar");?>" class="waves-effect" aria-expanded="false">
                                    <i class="fa-solid fa-barcode fa-xl"></i>
                                    <span key="t-dashboards" style="margin-left: 10px;">Markalar</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url("admin/siparisler");?>" class="waves-effect" aria-expanded="false">
                                    <i class="fa-solid fa-money-bill fa-xl"></i>
                                    <span key="t-dashboards" style="margin-left: 10px;">Siparişler</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url("admin/musteriler");?>" class="waves-effect" aria-expanded="false">
                                    <i class="fa-solid fa-user-group"></i>
                                    <span key="t-dashboards" style="margin-left: 10px;">Müşteriler</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url("admin/indirimler");?>" class="waves-effect" aria-expanded="false">
                                    <i class="fa-solid fa-percent"></i>
                                    <span key="t-dashboards" style="margin-left: 10px;">İndirim kodları</span>
                                </a>
                            </li>
                            <li class="menu-title" key="t-menu">Genel</li>
                            <li class="">
                                <a href="<?php echo base_url("admin/slider");?>" class="waves-effect" aria-expanded="false">
                                    <i class="fa-solid fa-border-all fa-xl"></i>
                                    <span key="t-dashboards" style="margin-left: 10px;">Slider</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url("admin/hakkimizda");?>" class="waves-effect" aria-expanded="false">
                                    <i class="fa-solid fa-address-card fa-xl"></i>
                                    <span key="t-dashboards" style="margin-left: 10px;">Hakkımızda</span>
                                </a>
                            </li>
                            <li class="menu-title" key="t-menu">İletişim ve sosyal medya</li>
                            <li class="">
                                <a href="<?php echo base_url("admin/iletisimbilgileri");?>" class="waves-effect" aria-expanded="false">
                                <i class="fa-solid fa-address-book fa-xl"></i>
                                    <span key="t-dashboards" style="margin-left: 10px;">İletşim bilgileri</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url("admin/sosyalmedya");?>" class="waves-effect" aria-expanded="false">
                                    <i class="fa-solid fa-share-nodes fa-xl"></i>
                                    <span key="t-dashboards" style="margin-left: 10px;">Sosyal medya</span>
                                </a>
                            </li>
                            <li class="menu-title" key="t-menu">Site ayarları</li>
                            <li class="">
                                <a href="<?php echo base_url("admin/siteayarlari");?>" class="waves-effect" aria-expanded="false">
                                    <i class="fa-solid fa-gear fa-xl"></i>
                                    <span key="t-dashboards" style="margin-left: 10px;">Site ayarları</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->