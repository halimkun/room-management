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
                        <table class="table table-hover" id="table-1">
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
                                    <th width="150"><i class="fa fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kegiatan as $k) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $k->agenda; ?></td>
                                        <td><?= $k->ruang; ?></td>
                                        <td><?= $k->tanggal; ?></td>
                                        <td><?= $k->pj; ?></td>
                                        <td><?= $k->keterangan; ?></td>
                                        <td>
                                            <?php
                                            if ($k->status == "selesai") {
                                                echo '<span class="badge badge-primary"><i class="far fa-check"></i></span>';
                                            } elseif ($k->status == "berlangsung") {
                                                echo '<span class="badge badge-warning"><i class="far fa-sync"></i></span>';
                                            } elseif ($k->status == "akan datang") {
                                                echo '<span class="badge badge-primary"><i class="far fa-calendar-day"></i></span>';
                                            } elseif ($k->status == "batal") {
                                                echo '<span class="badge badge-danger"><i class="far fa-times-circle"></i></span>';
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary" id="btnmodaledit-<?= $k->id ?>" data-toggle="modal" data-target="#modal_edit_data_kegiatan_<?= str_replace(" ", "_", $k->agenda) . $k->id ?>"><i class="far fa-edit"></i></button>
                                            <button class="btn btn-sm btn-danger" data-confirm="Woops...|Apakah anda yakin akan menghapus data <b><?= $k->agenda ?></b>" data-confirm-yes="window.location = '/kegiatan/delete/<?= $k->id ?>';"><i class="far fa-trash"></i></button>
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
                                    <input type="datetime-local" class="form-control" id="tgl" name="tgl" placeholder="Tanggal" required>
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
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" style="height: 137px !important"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="custom-select">
                                        <option value="">Pilih Status</option>
                                        <option value="akan datang">Akan Datang</option>
                                        <option value="berlangsung">Berlangsung</option>
                                        <option value="selesai">Selesai</option>
                                        <option value="batal">Batal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group text-right">
                            <button type="reset" class="btn btn-secondary text-dark">
                                <span aria-hidden="true">&times; Cler Form</span>
                            </button>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> SIMPAN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal update kegiatan -->
<?php foreach ($kegiatan as $k) : ?>
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
                                        <input type="datetime-local" class="form-control" value="<?= str_replace(" ", "T", $k->tanggal) ?>" id="tgl" name="tgl" placeholder="Tanggal" required>
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
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" style="height: 137px !important"><?= $k->keterangan ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="custom-select">
                                            <option <?= $k->status == "" ? 'selected' : '' ?> value="">Pilih Status</option>
                                            <option <?= $k->status == "akan datang" ? 'selected' : '' ?> value="akan datang">Akan Datang</option>
                                            <option <?= $k->status == "berlangsung" ? 'selected' : '' ?> value="berlangsung">Berlangsung</option>
                                            <option <?= $k->status == "selesai" ? 'selected' : '' ?> value="selesai">Selesai</option>
                                            <option <?= $k->status == "batal" ? 'selected' : '' ?> value="batal">Batal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group text-right">
                                <button type="reset" class="btn btn-secondary text-dark">
                                    <span aria-hidden="true">&times; Cler Form</span>
                                </button>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> SIMPAN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script>
    $(document).ready(function() {
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
                    minlength: 10,
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
                },
                status: {
                    required: true
                }
            },
        });

        $("form#formUpdateKegiatan").each(function() {
            $(this).validate({
                rules: {
                    agenda: {
                        required: true,
                        alphanumspacedash: true,
                        minlength: 10,
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
                    },
                    status: {
                        required: true
                    }
                },
            });
        });
    });
</script>
<?= $this->endSection(); ?>