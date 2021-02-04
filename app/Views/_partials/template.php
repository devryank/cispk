<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title><?= $title; ?></title>

    <!-- Fontfaces CSS-->
    <link href="<?= base_url(); ?>/assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= base_url(); ?>/assets/vendor_/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url(); ?>/assets/vendor_/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url(); ?>/assets/vendor_/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url(); ?>/assets/vendor_/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    
    <link href="<?= base_url(); ?>/assets/vendor_/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url(); ?>/assets/vendor_/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url(); ?>/assets/vendor_/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= base_url(); ?>/assets/vendor_/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url(); ?>/assets/vendor_/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <!-- Vendor CSS-->
    <link href="<?= base_url(); ?>/assets/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Main CSS-->
    <link href="<?= base_url(); ?>/assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="<?= site_url('dashboard');?>">
                            <img src="<?= base_url(); ?>/assets/images/icon/logo-white.png" alt="CoolAdmin" />
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li>
                                <a href="<?= site_url('dashboard/'); ?>">
                                    <i class="fas fa-tachometer-alt"></i>
                                    <span class="bot-line"></span>Dashboard</a>
                            </li>
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-copy"></i>
                                    <span class="bot-line"></span>Master</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="<?= site_url('dashboard/kasus'); ?>">Kasus</a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('dashboard/user'); ?>">User</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= site_url('dashboard/hasil'); ?>">
                                    <i class="fas fa-database"></i>
                                    <span class="bot-line"></span>Hasil</a>
                            </li>
                        </ul>
                    </div>
                    <div class="header__tool">
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="<?= base_url(); ?>/assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href=""><?= session()->get('full_name'); ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="<?= site_url('profile/index/' . session()->get('username'));?>">
                                                <img src="<?= base_url(); ?>/assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="<?= site_url('profile/index/' . session()->get('username'));?>"><?= session()->get('full_name'); ?></a>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?= site_url('profile/index/' . session()->get('username'));?>">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="<?= site_url('auth/logout'); ?>">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            
        <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a class="js-arrow" href="<?= site_url('dashboard/'); ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Master</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="<?= site_url('dashboard/kasus'); ?>">Kasus</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('dashboard/user'); ?>">User</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="js-arrow" href="<?= site_url('dashboard/hasil'); ?>">
                                <i class="fas fa-database"></i>Hasil</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="<?= base_url(); ?>/assets/images/icon/logo-white.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        <div class="sub-header-mobile-2 d-block d-lg-none">
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="<?= base_url(); ?>/assets/images/icon/avatar-01.jpg" alt="John Doe" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="<?= site_url('profile/index/' . session()->get('username'));?>"><?= session()->get('full_name'); ?></a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="<?= site_url('profile/index/' . session()->get('username'));?>">
                                        <img src="<?= base_url(); ?>/assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="<?= site_url('profile/index/' . session()->get('username'));?>"><?= session()->get('full_name'); ?></a>
                                    </h5>
                                </div>
                            </div>
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="<?= site_url('profile/index/' . session()->get('username'));?>">
                                        <i class="zmdi zmdi-account"></i>Account</a>
                                </div>
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="<?= site_url('auth/logout');?>">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END HEADER MOBILE -->

        <?= $this->renderSection('content') ?>


        <!-- COPYRIGHT-->
        <section class="p-t-60 p-b-20">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END COPYRIGHT-->
    </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?= base_url(); ?>/assets/vendor_/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?= base_url(); ?>/assets/vendor_/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor_/bootstrap-4.1/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?= base_url(); ?>/assets/vendor_/slick/slick.min.js">
    </script>
    <script src="<?= base_url(); ?>/assets/vendor_/wow/wow.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor_/animsition/animsition.min.js"></script>
    </script>
    <script src="<?= base_url(); ?>/assets/vendor_/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor_/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?= base_url(); ?>/assets/vendor_/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor_/chartjs/Chart.bundle.min.js"></script>

    <!-- Main JS-->
    <script src="<?= base_url(); ?>/assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "order": [[1, 'desc']]
            });
        });
    </script>
</body>

</html>