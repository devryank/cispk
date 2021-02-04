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
    <title><?= $title;?></title>

    <!-- Fontfaces CSS-->
    <link href="<?= base_url();?>/assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>/assets/vendor_/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>/assets/vendor_/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>/assets/vendor_/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url();?>/assets/vendor_/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= base_url();?>/assets/vendor_/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>/assets/vendor_/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>/assets/vendor_/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>/assets/vendor_/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>/assets/vendor_/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>/assets/vendor_/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url();?>/assets/vendor_/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url();?>/assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
<?= $this->renderSection('auth')?>
    <!-- Jquery JS-->
    <script src="<?= base_url();?>/assets/vendor_/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?= base_url();?>/assets/vendor_/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= base_url();?>/assets/vendor_/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?= base_url();?>/assets/vendor_/slick/slick.min.js">
    </script>
    <script src="<?= base_url();?>/assets/vendor_/wow/wow.min.js"></script>
    <script src="<?= base_url();?>/assets/vendor_/animsition/animsition.min.js"></script>
    <script src="<?= base_url();?>/assets/vendor_/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?= base_url();?>/assets/vendor_/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?= base_url();?>/assets/vendor_/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?= base_url();?>/assets/vendor_/circle-progress/circle-progress.min.js"></script>
    <script src="<?= base_url();?>/assets/vendor_/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url();?>/assets/vendor_/chartjs/Chart.bundle.min.js"></script>
    <script src="<?= base_url();?>/assets/vendor_/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?= base_url();?>/assets/js/main.js"></script>

</body>

</html>
<!-- end document-->