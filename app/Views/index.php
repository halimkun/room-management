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

        .vh-100 {
            height: 100vh !important;
            overflow-x: auto
        }

        .min-vh-100 {
            min-height: 100vh !important
        }
    </style>
</head>

<body>
    <div class="container-fluid px-0">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner bg-info" role="listbox">
                <?php $a = 1; ?>
                <?php foreach ($today as $t) : ?>
                    <div class="carousel-item <?= $a == 1 ? "active" : '' ?>">
                        <div class="d-flex align-items-center justify-content-center min-vh-100">
                            <h1 class="display-1"><?= $t->agenda ?></h1>
                        </div>
                    </div>
                    <?php $a++ ?>
                <?php endforeach ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <!-- <script src="<?= base_url() ?>/assets/modules/jquery.min.js"></script> -->
    <script src="<?= base_url() ?>/assets/modules/popper.js"></script>
    <script src="<?= base_url() ?>/assets/modules/tooltip.js"></script>
    <script src="<?= base_url() ?>/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/moment.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>/assets/modules/jquery.sparkline.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/chart.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/summernote/summernote-bs4.js"></script>
    <script src="<?= base_url() ?>/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url() ?>/assets/js/page/index.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url() ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/assets/js/custom.js"></script>
</body>

</html>