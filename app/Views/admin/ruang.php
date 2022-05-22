<?= $this->extend('admin_template'); ?>
<?= $this->section('content'); ?>
<style>
    .modal-backdrop.show {
        display: none;
    }
</style>

<div class="section-header">
    <h1>Data Ruangan</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Data Ruang</h4>
                    <div class="card-header-action">
                        <button class="btn btn-primary" id="btn_add_room" data-toggle="modal" data-target="#modal_data_ruang"><i class="fa fa-plus mr-2"></i> Tambah Data</button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- table ruang -->
                    <table class="table" id="tableRuang">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Ruang</th>
                                <th>Lantai</th>
                                <th>Keterangan</th>
                                <th class="text-center"><i class="far fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($ruang as $r) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $r->ruang ?></td>
                                    <td><?= $r->lantai ?></td>
                                    <td><?= $r->keterangan ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary" id="btnmodaledit-<?= $r->id ?>" data-toggle="modal" data-target="#modal_edit_data_ruang_<?= str_replace(" ", "_", $r->ruang . $r->id) ?>"><i class="far fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger" data-confirm="Woops...|Apakah anda yakin akan menghapus data <b><?= $r->ruang ?></b>" data-confirm-yes="window.location = '/ruang/del/<?= $r->id ?>';"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Data Lantai</h4>
                    <div class="card-header-action">
                        <button class="btn btn-primary" id="btn_add_lantai" data-toggle="modal" data-target="#modal_data_lantai"><i class="fa fa-plus mr-2"></i> Tambah Data</button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- table lantai -->
                    <table class="table" id="tableLantai">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Lantai</th>
                                <th>Keterangan</th>
                                <th class="text-center"><i class="far fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($lantai as $l) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $l->nama_lantai ?></td>
                                    <td><?= $l->keterangan ?></td>
                                    <td class="text-center">
                                        <!-- <button class="btn btn-sm btn-primary" id="btnmodaledit-<?= $l->id ?>" data-toggle="modal" data-target="#modalEditLaintai_<?= $l->id . str_replace(" ", "_", $l->nama_lantai) ?>"><i class="far fa-edit"></i></button> -->
                                        <button class="btn btn-sm btn-primary" id="btnModalEditLantai" data-toggle="modal" data-kode="<?= $l->id ?>" data-target="#modalEditLantai"><i class="far fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger" data-confirm="Woops...|Apakah anda yakin akan menghapus data <b><?= $l->nama_lantai ?></b>" data-confirm-yes="window.location = '/lantai/del/<?= $l->id ?>';"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal tambah data ruang -->
        <div class="modal fade" tabindex="1" id="modal_data_ruang" aria-labelledby="modal_data_ruang" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Tambah data Ruangan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/ruang/store" id="formRuang" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="ruang">Ruang</label>
                                <input type="text" required name="ruang" id="ruang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="lantai">Lantai</label>
                                <select class="custom-select" required name="lantai" id="lantai">
                                    <option value="">Pilih Lantai</option>
                                    <?php foreach ($lantai as $l) : ?>
                                        <option value="<?= $l->nama_lantai; ?>"><?= $l->nama_lantai; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ket">Keterangan</label>
                                <textarea class="form-control" name="ket" id="ket"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal tambah data lantai -->
        <div class="modal fade" tabindex="1" id="modal_data_lantai" aria-labelledby="modal_data_lantai" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content shadow-lg">
                    <div class="modal-header">
                        <h4>Tambah data lantai</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/lantai/store" id="formLantai" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="lantai">Lantai</label>
                                <input type="text" name="lantai" required id="lantai" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ket">Keterangan</label>
                                <textarea class="form-control" name="ket" id="ket"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit data ruang -->
    <?php foreach ($ruang as $r) : ?>
        <div class="modal fade" tabindex="1" id="modal_edit_data_ruang_<?= str_replace(" ", "_", $r->ruang . $r->id) ?>" aria-labelledby="modal_edit_data_ruang_<?= str_replace(" ", "_", $r->ruang) ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Edit data Ruangan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/ruang/edit" id="editRuang" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="kode" value="<?= $r->kode ?>">
                            <div class="form-group">
                                <label for="ruang">Ruang</label>
                                <input type="text" required name="ruang" id="ruang" value="<?= $r->ruang ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="lantai">Lantai</label>
                                <select class="form-control" required name="lantai" id="lantai">
                                    <option value="">Pilih Lantai</option>
                                    <?php foreach ($lantai as $l) : ?>
                                        <option value="<?= $l->nama_lantai; ?>" <?= $r->lantai == $l->nama_lantai ? "selected='selected'" : "" ?>><?= $l->nama_lantai; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ket">Keterangan</label>
                                <textarea class="form-control" name="ket" id="ket"><?= $r->keterangan ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <div class="modal fade" tabindex="1" id="modalEditLantai" aria-labelledby="modalEditLantai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Edit data Lantai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/lantai/edit" id="formModalEditLantai" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="kode" value="">
                        <div class="form-group">
                            <label for="lantai">Lantai</label>
                            <input type="text" name="lantai" id="lantai" required value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <textarea class="form-control" name="ket" id="ket"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#tableRuang").dataTable();
        $("#tableLantai").dataTable();

        jQuery.validator.setDefaults({
            errorClass: "is-invalid error",
            validClass: "is-valid",
        });

        $.validator.addMethod("myreg", function(value, element) {
            return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
        }, "Username must contain only letters, numbers, or dashes.");

        // validasi form tambah lantai
        $("#formLantai").validate({
            rules: {
                lantai: {
                    required: true,
                    myreg: true
                },
                ket: {
                    myreg: true
                }
            }
        });

        // validasi form tambah ruang
        $("#formRuang").validate({
            rules: {
                ruang: {
                    required: true,
                    myreg: true
                },
                lantai: {
                    required: true,
                },
                ket: {
                    myreg: true,
                }
            }
        });

        // validasi form edit ruang 
        $("form#editRuang").each(function() {
            $(this).validate({
                rules: {
                    ruang: {
                        required: true,
                        myreg: true
                    },
                    lantai: {
                        required: true,
                    },
                    ket: {
                        myreg: true,
                    }
                }
            });
        });

        // validasi form edit lantai
        $("form#formModalEditLantai").validate({
            rules: {
                lantai: {
                    required: true,
                    myreg: true
                },
                ket: {
                    myreg: true
                }
            }
        });
    });

    // Parsing Data To Modal Edit Lantai
    var mle = $('#modalEditLantai');
    $(document).on('click', "#btnModalEditLantai", function() {
        var lantai = $(this).data('kode');
        $.ajax({
            url: "/lantai/get/" + lantai,
            type: "GET",
            dataType: "JSON",
        }).done(function(data) {
            $('#formModalEditLantai input[name="kode"]').val(data.id);
            $('#formModalEditLantai input[name="lantai"]').val(data.nama_lantai);
            $('#formModalEditLantai textarea[name="ket"]').val(data.keterangan);
        });
    });
</script>
<?= $this->endSection(); ?>