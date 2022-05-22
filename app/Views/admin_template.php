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
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
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
    <script src="<?= base_url() ?>/assets/modules/datatables/datatables.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>

    <style>
        .error {
            color: #dc3545 !important
        }
    </style>
</head>

<body class="sidebar-mini">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-link nav-link-lg"><a href="/calendar" class="text-white"><i class="far fa-calendar-alt"></i></a></li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url() ?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block"><?= user()->username ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Hi, <?= user()->username ?></div>
                            <!-- <a href="#!" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a> -->
                            <!-- <a href="#!" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a> -->
                            <!-- <a href="#!" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a> -->
                            <div class="dropdown-divider"></div>
                            <a href="/logout" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/admin">UMPP</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="/admin">UMPP</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li><a class="nav-link" href="/admin"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
                        <li class="menu-header">Agenda</li>
                        <li><a class="nav-link" href="/kegiatan"><i class="fas fa-presentation"></i> <span>Kegiatan</span></a></li>
                        <li class="menu-header">Data</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="far fa-users"></i> <span>Penanggung Jawab</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/pj">Penanggung Jawab</a></li>
                                <li><a href="/jabatan">Data Jabatan</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link" href="/ruang"><i class="fas fa-hospital"></i> <span>Ruang & Lantai</span></a></li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <?= $this->renderSection('content'); ?>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2022 <div class="bullet"></div> By <a href="https://www.haliminfo.com/">Faisal Halim</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
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
    <script src="<?= base_url() ?>/assets/modules/fullcalendar/fullcalendar.min.js"></script>
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