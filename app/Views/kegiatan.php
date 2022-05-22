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

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/components.css">

    <!--  -->
    <script src="<?= base_url() ?>/assets/modules/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/datatables/datatables.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
</head>

<body>
    <nav class="navbar fixed-bottom navbar-expand-sm navbar-light bg-secondary">
        <button class="btn btn-light navbar-brand text-dark"><i class="fa fa-info text-info"></i></button>
        <marquee class="rounded h5 text-dark pt-2">
            Agenda hari ini : <strong class="mr-4"><?= count($today) ?></strong> Universitar Muhammadiyah Pekajangan Pekalongan
        </marquee>
    </nav>
    
    <table class="table table-bordered tableKegiatanHariIni">
        <thead class="bg-primary">
            <tr>
                <th class="text-white text-center">
                    <h3>No</h3>
                </th>
                <th class="text-white">
                    <h3>Agenda</h3>
                </th>
                <th class="text-white">
                    <h3>Waktu</h3>
                </th>
                <th class="text-white">
                    <h3>Ruang</h3>
                </th>
                <th class="text-white text-center">
                    <h3>Status</h3>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php foreach ($today as $item) : ?>
                <tr>
                    <td class="h3 text-center"><?= $no++ ?></td>
                    <td class="h3"><?= $item->agenda ?></td>
                    <td class="h3"><?= $item->time !== null ? $item->time : '-' ?></td>
                    <td class="h3"><?= $item->ruang ?></td>
                    <td class="text-center">
                        <?php if ($item->status == null) {
                            echo statusKegiatanLive($item->tanggal);
                        } else {
                            if ($item->status == 0) {
                                echo '<i class="mx-1 far fa-times-circle text-danger" style="font-size:30px;"></i>';
                            } elseif ($item->status == 1) {
                                echo '<i class="mx-1 fas fa-check-circle text-success" style="font-size:30px;"></i>';
                            } elseif ($item->status == 2) {
                                echo '<i class="mx-1 fas fa-sync-alt text-primary" style="font-size:30px;"></i>';
                            } else {
                                echo '<i class="mx-1 far fa-ban text-dark" style="font-size:30px;"></i>';
                            }
                        } ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>


    <script>
        $(document).ready(function() {
            var table = $('.tableKegiatanHariIni').DataTable({
                pageLength: 5,
                searching: false,
                ordering: false,
                info: false,
                lengthChange: false
            });

            setInterval(function() {
                var info = table.page.info();
                var pageNum = (info.page < info.pages) ? info.page + 1 : 1;
                table.page(pageNum).draw(false);
            }, 10000);
        });
    </script>
</body>

</html>