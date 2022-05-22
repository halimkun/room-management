<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <noscript>
        <meta http-equiv="refresh" content="0; url=/errors/noscript">
    </noscript>

    <title><?= $title ?></title>

    <!-- Style -->
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/components.css">

    <!--  -->
    <script src="<?= base_url() ?>/assets/modules/jquery.min.js"></script>
    <style>
        .error {
            color: #dc3545 !important
        }
    </style>
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <!-- Main Content -->
            <div class="main-content container pt-5" >
                <section class="section">
                    <div class="section-body">
                        <?= $this->renderSection('content') ;?>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>/assets/modules/popper.js"></script>
    <script src="<?= base_url() ?>/assets/modules/tooltip.js"></script>
    <script src="<?= base_url() ?>/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/moment.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>/assets/modules/fullcalendar/fullcalendar.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url() ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/assets/js/custom.js"></script>
</body>

</html>