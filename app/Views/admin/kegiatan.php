<?= $this->extend('admin_template'); ?>
<?= $this->section('content'); ?>
<style>
    .modal-backdrop.show {
        display: none;
    }
</style>

<div class="section-header">
    <h1>Data Kegiatan</h1>

    <div class="section-header-breadcrumb">
        <button class="btn btn-primary" id="btn_add_room" data-toggle="modal" data-target="#modal_data_kegiatan"><i class="fa fa-plus mr-2"></i> Tambah Data</button>
    </div>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-3">

                    <!-- get flash data -->
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                <?= session()->getFlashdata('success'); ?>
                            </div>
                        </div>
                    <?php elseif (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                <?= session()->getFlashdata('error'); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-hover" id="tabelKegiatan">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Agenda</th>
                                    <th>Ruang</th>
                                    <th>Tanggal</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Keterangan</th>
                                    <th>status</th>
                                    <th><i class="fas fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kegiatan as $k) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $k->agenda; ?></td>
                                        <td><?= $k->ruang; ?></td>
                                        <td>
                                            <?= $k->tanggal; ?><br>
                                            <code><?= $k->time !== null ? $k->time : "-" ?></code>
                                        </td>
                                        <td><?= $k->pj; ?></td>
                                        <td><?= $k->keterangan; ?></td>
                                        <td class="text-center">
                                            <?php if ($k->status == null) {
                                                echo statusKegiatan($k->tanggal);
                                            } else {
                                                if ($k->status == 0) {
                                                    echo '<small class="bg-danger text-white p-1 rounded" data-toggle="tooltip" title="batal"><i class="mx-1 far fa-times-circle"></i></small>';
                                                } elseif ($k->status == 1) {
                                                    echo '<small class="bg-success text-white p-1 rounded" data-toggle="tooltip" title="selesai"><i class="mx-1 fas fa-check-circle"></i></small>';
                                                } elseif ($k->status == 2) {
                                                    echo '<small class="bg-primary text-white p-1 rounded" data-toggle="tooltip" title="selesai"><i class="mx-1 fas fa-sync-alt"></i></small>';
                                                } else {
                                                    echo '<small class="bg-dark text-white p-1 rounded" data-toggle="tooltip" title="unknown"><i class="mx-1 far fa-ban"></i></small>';
                                                }
                                            } ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="far fa-cog"></i>
                                                </button>
                                                <div class="dropdown-menu shadow">
                                                    <a class="dropdown-item" href="#" id="btnmodaledit-<?= $k->id ?>" data-toggle="modal" data-target="#modal_edit_data_status_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>"><i class="fas fa-badge-check text-info mr-2"></i> Update Status</a>
                                                    <a class="dropdown-item" href="#" id="btnmodaledit-<?= $k->id ?>" data-toggle="modal" data-target="#modal_edit_data_kegiatan_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>"><i class="far fa-edit mr-2 text-primary"></i> Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#" data-confirm="Woops...|Apakah anda yakin akan menghapus data <b><?= $k->agenda ?></b>" data-confirm-yes="window.location = '/kegiatan/delete/<?= $k->id ?>';"><i class="fas fa-trash mr-2 text-danger"></i> Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="1" id="modal_data_kegiatan" aria-labelledby="modal_data_kegiatan" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content shadow-lg">
                <div class="modal-header">
                    <h4>Tambah data Kegiatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- form input data -->
                <form action="/kegiatan/store" id="formKegiatan" method="post">
                    <div class="modal-body">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="agenda">Agenda</label>
                                    <input type="text" class="form-control" id="agenda" name="agenda" placeholder="Agenda" required>
                                </div>
                                <div class="form-group">
                                    <label for="pj">Penanggung Jawab</label>
                                    <select name="pj" id="pj" class="custom-select">
                                        <option value="">Pilih Penanggung Jawab</option>
                                        <?php foreach ($pj as $p) : ?>
                                            <option value="<?= $p->nama; ?>"><?= $p->nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ruang">Ruang</label>
                                    <select name="ruang" id="ruang" class="custom-select">
                                        <option value="">Pilih Ruang</option>
                                        <?php foreach ($ruang as $r) : ?>
                                            <option value="<?= $r->ruang; ?>"><?= $r->ruang; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tgl">Tanggal</label>
                                    <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tanggal" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" style="height: 232px !important;"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="time">Jam</label>
                                    <input type="time" class="form-control" id="time" name="time" placeholder="Waktu" required>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" value="true" name="nullTimes" id="checkNullTime">
                                        <label class="form-check-label" for="resetStatus">
                                            Waktu tidak ditentukan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> SIMPAN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($kegiatan as $k) : ?>
    <!-- Modal update kegiatan -->
    <div class="modal fade" tabindex="1" id="modal_edit_data_kegiatan_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>" aria-labelledby="modal_edit_data_kegiatan_<?= str_replace(" ", "_", $k->agenda) ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Edit data Kegiatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/kegiatan/update" id="formUpdateKegiatan" method="post">
                        <div class="modal-body">
                            <?= csrf_field() ?> <input type="hidden" name="kode" value="<?= $k->id ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="agenda">Agenda</label>
                                        <input type="text" class="form-control" value="<?= $k->agenda ?>" id="agenda" name="agenda" placeholder="Agenda" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pj">Penanggung Jawab</label>
                                        <select name="pj" id="pj" class="custom-select">
                                            <option value="">Pilih Penanggung Jawab</option>
                                            <?php foreach ($pj as $p) : ?>
                                                <option value="<?= $p->nama; ?>" <?= $k->pj == $p->nama ? 'selected' : '' ?>><?= $p->nama; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ruang">Ruang</label>
                                        <select name="ruang" id="ruang" class="custom-select">
                                            <option value="">Pilih Ruang</option>
                                            <?php foreach ($ruang as $r) : ?>
                                                <option value="<?= $r->ruang; ?>" <?= $k->ruang == $r->ruang ? 'selected' : '' ?>><?= $r->ruang; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl">Tanggal</label>
                                        <input type="date" class="form-control" value="<?= str_replace(" ", "T", $k->tanggal) ?>" id="tgl" name="tgl" placeholder="Tanggal" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" style="height: 232px !important"><?= $k->keterangan ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="time">Jam</label>
                                        <input type="time" class="form-control" value="<?= $k->time ?>" id="time_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>" name="time" placeholder="Waktu" required>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" value="true" name="nullTimes" id="checkNullTime_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>" <?= $k->time == null ? "checked" : "" ?>>
                                            <label class="form-check-label" for="resetStatus">
                                                Waktu tidak ditentukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> SIMPAN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            $("#checkNullTime_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>").click(function() {
                if ($("#checkNullTime_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>").is(":checked")) {
                    $("#time_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>").prop('disabled', true);
                    $("#time_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>").prop('required', false);
                } else {
                    $("#time_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>").prop('disabled', false);
                    $("#time_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>").prop('required', true);
                }
            });
        </script>
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
                    <form action="/kegiatan/updateStatus" id="formUpdateStatus" method="post">
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
<?php endforeach; ?>

<script>
    $(document).ready(function() {
        $("#tabelKegiatan").dataTable();

        jQuery.validator.setDefaults({
            errorClass: "is-invalid error",
            validClass: "is-valid",
        });

        $.validator.addMethod("alphanumspacedash", function(value, element) {
            return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
        }, "Username must contain only letters, numbers, or dashes.");

        $("#formKegiatan").validate({
            rules: {
                agenda: {
                    required: true,
                    alphanumspacedash: true,
                    minlength: 5,
                },
                ruang: {
                    required: true
                },
                tgl: {
                    required: true
                },
                pj: {
                    required: true
                },
                keterangan: {
                    alphanumspacedash: true
                }
            },
        });

        $("form#formUpdateKegiatan").each(function() {
            $(this).validate({
                rules: {
                    agenda: {
                        required: true,
                        alphanumspacedash: true,
                        minlength: 5,
                    },
                    ruang: {
                        required: true
                    },
                    tgl: {
                        required: true
                    },
                    pj: {
                        required: true
                    },
                    keterangan: {
                        alphanumspacedash: true
                    }
                },
            });
        });

        $("#checkNullTime").click(function() {
            if ($("#checkNullTime").is(":checked")) {
                $("#time").prop('disabled', true);
                $("#time").prop('required', false);
            } else {
                $("#time").prop('disabled', false);
                $("#time").prop('required', true);
            }
        });
    });
</script>
<?= $this->endSection(); ?>