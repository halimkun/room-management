<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../../../favicon.ico">

    <title>User Auth</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/components.css">

    <?= $this->renderSection('pageStyles') ?>
</head>

<body>

    <main role="main" class="container">
        <?= $this->renderSection('main') ?>
    </main><!-- /.container -->


    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>/assets/modules/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/popper.js"></script>
    <script src="<?= base_url() ?>/assets/modules/tooltip.js"></script>
    <script src="<?= base_url() ?>/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/moment.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= base_url() ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/assets/js/custom.js"></script>

    <?= $this->renderSection('pageScripts') ?>

    <script type ="text/javascript">
        const tgl = new Date();
        document.getElementById("tahunku").innerHTML = tgl.getFullYear();
    </script>
</body>

</html>