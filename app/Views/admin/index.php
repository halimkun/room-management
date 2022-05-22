<?= $this->extend('admin_template'); ?>
<?= $this->section('content'); ?>
<style>
    .modal-backdrop.show {
        display: none;
    }
</style>

<div class="section-header">
    <h1>Dashboard</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-calendar-day"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Agenda Hari ini</h4>
                    </div>
                    <div class="card-body">
                        <?= count($today) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-calendar-alt"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Agenda</h4>
                    </div>
                    <div class="card-body">
                        <?= count($kegiatan) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-hospital"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Ruangan</h4>
                    </div>
                    <div class="card-body">
                        <?= count($ruang) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-list"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Lantai</h4>
                    </div>
                    <div class="card-body">
                        <?= count($lantai) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary mb-4 shadow-sm">
                <div class="card-header">
                    <h4>7 Hari Kedepan</h4>
                </div>
                <div class="card-body p-3">
                    <table class="table rounded" id="next7Days">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th></th>
                                <th>Tanggal</th>
                                <th>Agenda</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($next7days as $item) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <?php if ($item->status == null) {
                                            echo statusKegiatanIconOnly($item->tanggal);
                                        } else {
                                            if ($item->status == 0) {
                                                echo '<i class="mx-1 far fa-times-circle text-danger"></i>';
                                            } elseif ($item->status == 1) {
                                                echo '<i class="mx-1 fas fa-check-circle text-success"></i>';
                                            } elseif ($item->status == 2) {
                                                echo '<i class="mx-1 fas fa-sync-alt text-primary"></i>';
                                            } else {
                                                echo '<i class="mx-1 far fa-ban text-dark"></i>';
                                            }
                                        } ?>
                                    </td>
                                    <td>
                                        <?= $item->tanggal ?> <br>
                                        <code><?= $item->time !== null ? $item->time : "-" ?></code>
                                    </td>
                                    <td><?= $item->agenda ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_detail<?= str_replace(" ", "_", $item->agenda) . $item->id ?>"><i class="fal fa-search"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card card-success mb-4 shadow-sm">
                <div class="card-header">
                    <h4>7 Hari Terakhir</h4>
                </div>
                <div class="card-body p-3">
                    <table class="table rounded" id="prev7Days">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th></th>
                                <th>Tanggal & Waktu</th>
                                <th>Agenda</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($prev7days as $item) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <?php if ($item->status == null) {
                                            echo statusKegiatanIconOnly($item->tanggal);
                                        } else {
                                            if ($item->status == 0) {
                                                echo '<i class="mx-1 far fa-times-circle text-danger"></i>';
                                            } elseif ($item->status == 1) {
                                                echo '<i class="mx-1 fas fa-check-circle text-success"></i>';
                                            } elseif ($item->status == 2) {
                                                echo '<i class="mx-1 fas fa-sync-alt text-primary"></i>';
                                            } else {
                                                echo '<i class="mx-1 far fa-ban text-dark"></i>';
                                            }
                                        } ?>
                                    </td>
                                    <td>
                                        <?= $item->tanggal ?> <br>
                                        <code><?= $item->time !== null ? $item->time : "-" ?></code>
                                    </td>
                                    <td><?= $item->agenda ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_detail<?= str_replace(" ", "_", $item->agenda) . $item->id ?>"><i class="fal fa-search"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="position-sticky" style="top: 30px;">
                <div class="card card-primary shadow-sm">
                    <div class="card-header">
                        <h4>Hari ini</h4>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive rounded">
                            <table class="table rounded" id="today">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th></th>
                                        <th>Agenda</th>
                                        <th>ruang</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($today as $today) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>
                                                <?php if ($today->status == null) {
                                                    echo statusKegiatanIconOnly($today->tanggal);
                                                } else {
                                                    if ($today->status == 0) {
                                                        echo '<i class="mx-1 far fa-times-circle text-danger"></i>';
                                                    } elseif ($today->status == 1) {
                                                        echo '<i class="mx-1 fas fa-check-circle text-success"></i>';
                                                    } elseif ($today->status == 2) {
                                                        echo '<i class="mx-1 fas fa-sync-alt text-primary"></i>';
                                                    } else {
                                                        echo '<i class="mx-1 far fa-ban text-dark"></i>';
                                                    }
                                                } ?>
                                            </td>
                                            <td><?= $today->agenda ?></td>
                                            <td><?= $today->ruang ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_detail<?= str_replace(" ", "_", $today->agenda) . $today->id ?>"><i class="fal fa-search"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card card-primary shadow-sm">
                    <div class="card-body">
                        <div class="fc-overflow">
                            <div id="kalenderku"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php foreach ($kegiatan as $k) : ?>
        <div class="modal fade" tabindex="1" id="modal_detail<?= str_replace(" ", "_", $k->agenda) . $k->id ?>" aria-labelledby="modal_detail<?= str_replace(" ", "_", $k->agenda) . $k->id ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Edit data Kegiatan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <h2 class="section-title">Agenda</h2>
                            <p class="section-lead">
                                <?= $k->agenda ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <h2 class="section-title">Ruang</h2>
                            <p class="section-lead">
                                <?= $k->ruang ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <h2 class="section-title">Penanggung Jawab</h2>
                            <p class="section-lead">
                                <?= $k->pj ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <h2 class="section-title">Tanggal & Waktu</h2>
                            <p class="section-lead">
                                <?= $k->tanggal . " " . $k->time ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <h2 class="section-title">Keterangan</h2>
                            <p class="section-lead">
                                <?= $k->keterangan == null || $k->keterangan == "" || empty($k->keterangan) ? "... ... ..." : $k->keterangan ?>
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary btn-shadow" id="btnUpdateStatus" data-toggle="modal" data-target="#modal_edit_data_status_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>"><i class="fa fa-badge-check mr-1"></i> Update Status</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Update Status -->
        <div class="modal fade" tabindex="1" id="modal_edit_data_status_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>" aria-labelledby="modal_edit_data_status_<?= str_replace(" ", "_", $k->agenda) ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Edit data Status</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-secondary text-dark">
                            <i class="fa fa-info-circle mr-2"></i>
                            <strong>Info!</strong>
                            <p>
                                Jika <strong>Reset Status</strong> <u>dicentang</u>, Status kegiatan akan dibuat otomatis berdasarkan tangga.
                            <ul>
                                <li><strong>Terlewat</strong> = Selesai</li>
                                <li><strong>Akan datang</strong> = Akan datang</li>
                                <li><strong>Hari ini</strong> = Hari ini</li>
                            </ul>
                            </p>
                        </div>
                        <form action="/kegiatan/updateStatuDash" id="formUpdateStatus" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="kode" value="<?= $k->id ?>">
                            <div class="form-group">
                                <select name="status" required id="status_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>" class="custom-select">
                                    <option value="">Pilih Status</option>
                                    <option value="1">Selesai</option>
                                    <option value="2">Berlangsung</option>
                                    <option value="0">Batal</option>
                                </select>
                                <div class="invalid-feedback">Status Harus diisi</div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="true" name="resetStatus" id="resetStatus_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>">
                                <label class="form-check-label" for="resetStatus">
                                    Reset Status
                                </label>
                            </div>
                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> SIMPAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $("#resetStatus_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>").click(function() {
                if ($("#resetStatus_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>").is(":checked")) {
                    $("#status_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>").prop('required', false);
                } else {
                    $("#status_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>").prop('required', true);
                }
            });
        </script>
    <?php endforeach ?>
</div>

<script>
    $(document).ready(function() {
        $("#today").dataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50, 75, 100]
        });
        $("#next7Days").dataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50, 75, 100]
        });
        $("#prev7Days").dataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50, 75, 100]
        });

        $("#kalenderku").fullCalendar({
            header: {
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            events: [
                <?php foreach ($kegiatan as $item) : ?> {
                        id: "#modal_detail<?= str_replace(" ", "_", $item->agenda) . $item->id ?>",
                        title: "<?= $item->agenda ?>",
                        start: "<?= $item->tanggal . "T" . $item->time ?>",
                        color: "<?= fullCalendarCustomColor($item->status, $item->tanggal) ?>",
                        textColor: "#fff"
                    },
                <?php endforeach ?>
            ],
            eventClick: function(event) {
                console.log(event.id);
                $(event.id).modal();
            },
        });
    });
</script>

<?= $this->endSection(); ?>