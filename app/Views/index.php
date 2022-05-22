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
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/components.css">

    <!--  -->
    <script src="<?= base_url() ?>/assets/modules/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/datatables/datatables.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>

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

        .min-vh-75 {
            min-height: 75vh !important
        }

        .card .card-header h4+.card-header-action,
        .card .card-header h4+.card-header-form,
        .card .card-header h2+.card-header-action,
        .card .card-header h2+.card-header-form {
            margin-left: auto;
        }
    </style>
</head>

<body class="layout-2">

    <div class="container-fluid">
        <div class="table-responsive mt-2">
            <div class="display_table" style="overflow: hidden!important;"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var loaded = false;

            function refresh() {
                $(".display_table").load("<?= base_url() ?>/home/kegiatan");
                loaded = true;
            }
            refresh();

            setInterval(function() {
                refresh();
            }, 300000);

            var elem = document.documentElement;
            function openFullscreen() {
                if (elem.requestFullscreen) {
                    elem.requestFullscreen();
                } else if (elem.webkitRequestFullscreen) {
                    /* Safari */
                    elem.webkitRequestFullscreen();
                } else if (elem.msRequestFullscreen) {
                    /* IE11 */
                    elem.msRequestFullscreen();
                }
            }

            // setInterval(function() {
            //     var info = table.page.info();
            //     var pageNum = (info.page < info.pages) ? info.page + 1 : 1;
            //     table.page(pageNum).draw(false);
            // }, 5000);
        });
    </script>
</body>

</html>