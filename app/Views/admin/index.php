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
        <div class="col-md-7">
            <div class="card card-primary mb-4 shadow-sm">
                <div class="card-header">
                    <h4>7 Hari Kedepan</h4>
                </div>
                <div class="card-body p-0">
                    <table class="table rounded">
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
                                    <td><?= statusKegiatanIconOnly($item->tanggal) ?></td>
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
                <div class="card-body p-0">
                    <table class="table rounded">
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
                                    <td><?= statusKegiatanIconOnly($item->tanggal) ?></td>
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
        <div class="col-md-5">
            <div class="position-sticky" style="top: 30px;">
                <div class="card card-primary shadow-sm">
                    <div class="card-header">
                        <h4>Hari ini</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive rounded">
                            <table class="table rounded">
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
                                                <?= statusKegiatanIconOnly($today->tanggal) ?>
                                            </td>
                                            <td><?= $today->agenda ?></td>
                                            <td><?= $today->ruang ?></td>
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
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Edit data Kegiatan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agenda">Agenda</label>
                                    <input type="text" class="form-control" value="<?= $k->agenda ?>" id="agenda" readonly name="agenda" placeholder="Agenda">
                                </div>
                                <div class="form-group">
                                    <label for="pj">Penanggung Jawab</label>
                                    <input type="text" name="pj" id="pj" value="<?= $k->pj; ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="ruang">Ruang</label>
                                    <input type="text" name="ruang" id="ruang" value="<?= $k->ruang; ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tgl">Tanggal</label>
                                    <input type="date" class="form-control" value="<?= str_replace(" ", "T", $k->tanggal) ?>" id="tgl" readonly name="tgl" placeholder="Tanggal">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea readonly name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" style="height: 232px !important"><?= $k->keterangan ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="time">Jam</label>
                                    <input type="time" class="form-control" value="<?= $k->time ?>" id="time_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>" readonly name="time" placeholder="Waktu">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" value="true" disabled name="nullTimes" id="checkNullTime_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>" <?= $k->time == null ? "checked" : "" ?>>
                                        <label class="form-check-label" for="resetStatus">
                                            Waktu tidak ditentukan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>



<script>
    $(document).ready(function() {
        $("#kalenderku").fullCalendar({
            header: {
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            editable: true,
            events: [
                <?php foreach ($kegiatan as $item) : ?> {
                        id: "#modal_detail<?= str_replace(" ", "_", $item->agenda) . $item->id ?>",
                        title: "<?= $item->agenda ?>",
                        start: "<?= str_replace(" ", "T", $item->tanggal) ?>",
                        color: "<?= $item->status == "selesai" ? "#fc544b" : "#63ed7a" ?>",
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