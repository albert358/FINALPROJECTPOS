<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= (isset($page_title) ? esc($page_title) : 'Kaiadmin - Dashboard') ?></title>
    <meta
        content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
        name="viewport"
    />
    <link
        rel="icon"
        href="<?= base_url('assets/img/kaiadmin/favicon.ico') ?>"
        type="image/x-icon"
    />
    <link rel="stylesheet" href="<?= base_url('assets/css/sidebar-style.css') ?>">
    <script src="<?= base_url('assets/js/sidebar.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugin/webfont/webfont.min.js') ?>"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["<?= base_url('assets/css/fonts.min.css') ?>"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/plugins.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/kaiadmin.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/demo.css') ?>" />

    <?= $this->renderSection('head') ?>
</head>
<body>
<div class="wrapper">
    <?= $this->include('partials/cashier_sidebar') ?>

    <div class="main-panel">
        <?= $this->include('partials/nav_header') ?>

        <div class="container">
            <div class="page-inner">
                <?= $this->renderSection('content') ?>
            </div>
        </div>

        <?= $this->include('partials/footer') ?>
    </div>

    <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
            <div class="switcher">
                <div class="switch-block">
                    <h4>Background</h4>
                    <div class="btnSwitchBg">
                        <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                        <button type="button" class="changeBackgroundColor" data-color="bg1"></button>
                        <button type="button" class="changeBackgroundColor selected" data-color="bg3"></button>
                        <button type="button" class="changeBackgroundColor" data-color="dark"></button>
                    </div>
                </div>
                <div class="switch-block">
                    <h4>Logo Header</h4>
                    <div class="btnSwitchLogoHeader">
                        <button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="white2"></button>
                        <br />
                        <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                        <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                    </div>
                </div>
                <div class="switch-block">
                    <h4>Navbar Header</h4>
                    <div class="btnSwitchNavHeader">
                        <button type="button" class="changeNavHeaderColor" data-color="dark"></button>
                        <button type="button" class="changeNavHeaderColor" data-color="blue2"></button>
                        <button type="button" class="changeNavHeaderColor" data-color="purple2"></button>
                        <button type="button" class="changeNavHeaderColor" data-color="light-blue2"></button>
                        <button type="button" class="changeNavHeaderColor" data-color="green2"></button>
                        <button type="button" class="changeNavHeaderColor" data-color="orange2"></button>
                        <button type="button" class="changeNavHeaderColor" data-color="red2"></button>
                        <button type="button" class="changeNavHeaderColor" data-color="white2"></button>
                        <br />
                        <button type="button" class="changeNavHeaderColor" data-color="dark2"></button>
                        <button type="button" class="changeNavHeaderColor" data-color="blue"></button>
                        <button type="button" class="changeNavHeaderColor" data-color="purple"></button>
                        <button type="button" class="changeNavHeaderColor" data-color="light-blue"></button>
                        <button type="button" class="changeNavHeaderColor" data-color="green"></button>
                        <button type="button" class="changeNavHeaderColor" data-color="orange"></button>
                        <button type="button" class="changeNavHeaderColor" data-color="red"></button>
                        <button type="button" class="changeNavHeaderColor" data-color="white"></button>
                    </div>
                </div>
                <div class="switch-block">
                    <h4>Sidebar</h4>
                    <div class="btnSwitchSidebar">
                        <button type="button" class="changeSideBarColor" data-color="white"></button>
                        <button type="button" class="changeSideBarColor" data-color="dark"></button>
                        <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                    </div>
                </div>
                <div class="switch-block">
                    <h4>Background Image</h4>
                    <div class="btnSwitchBgImage">
                        <button type="button" class="changeBgImage" data-img="<?= base_url('assets/img/sidebar-bg/01.jpg') ?>"></button>
                        <button type="button" class="changeBgImage" data-img="<?= base_url('assets/img/sidebar-bg/02.jpg') ?>"></button>
                        <button type="button" class="changeBgImage" data-img="<?= base_url('assets/img/sidebar-bg/03.jpg') ?>"></button>
                        <button type="button" class="changeBgImage" data-img="<?= base_url('assets/img/sidebar-bg/04.jpg') ?>"></button>
                        <button type="button" class="changeBgImage" data-img="<?= base_url('assets/img/sidebar-bg/05.jpg') ?>"></button>
                        <button type="button" class="changeBgImage" data-img="<?= base_url('assets/img/sidebar-bg/06.jpg') ?>"></button>
                        <button type="button" class="changeBgImage" data-img="<?= base_url('assets/img/sidebar-bg/07.jpg') ?>"></button>
                        <button type="button" class="changeBgImage" data-img="<?= base_url('assets/img/sidebar-bg/08.jpg') ?>"></button>
                        <button type="button" class="changeBgImage" data-img="<?= base_url('assets/img/sidebar-bg/09.jpg') ?>"></button>
                        <button type="button" class="changeBgImage" data-img="<?= base_url('assets/img/sidebar-bg/10.jpg') ?>"></button>
                    </div>
                </div>
                <div class="switch-block">
                    <h4>Layout</h4>
                    <div class="btn-group toggle-layout">
                        <a href="#" class="btn btn-sm btn-primary">Fluid</a>
                        <a href="layout-boxed.html" class="btn btn-sm btn-default">Boxed</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-2 pb-2">
            <a href="https://1.envato.market/JQpeq" class="btn btn-danger w-100 fw-bold">Buy Now</a>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/core/jquery-3.7.1.min.js') ?>"></script>
<script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>

<script src="<?= base_url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugin/chart.js/chart.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugin/chart-circle/circles.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugin/datatables/datatables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugin/jsvectormap/jsvectormap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugin/jsvectormap/maps/jquery.vmap.world.js') ?>"></script>
<script src="<?= base_url('assets/js/plugin/sweetalert/sweetalert.min.js') ?>"></script>

<script src="<?= base_url('assets/js/kaiadmin.min.js') ?>"></script>
<script src="<?= base_url('assets/js/setting-demo.js') ?>"></script>
<script src="<?= base_url('assets/js/demo.js') ?>"></script>

<?= $this->renderSection('scripts') ?>
</body>
</html>