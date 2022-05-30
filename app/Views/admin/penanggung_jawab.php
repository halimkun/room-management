<?= $this->extend('admin_template'); ?>
<?= $this->section('content'); ?>
<style>
    .modal-backdrop.show {
        display: none;
    }
</style>

<div class="section-header">
    <h1>Data Penanggung Jawab</h1>

    <div class="section-header-breadcrumb">
        <button class="btn btn-primary" id="btn_add_room" data-toggle="modal" data-target="#modal_data_pj"><i class="fa fa-plus mr-2"></i> Tambah Data</button>
    </div>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- get flash data -->
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-primary alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                <?= session()->getFlashdata('success'); ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <?= session()->getFlashdata('error'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table_data_pj">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Keterangan</th>
                                    <th><i class="fa fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($pj as $p) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $p->nama; ?></td>
                                        <td><?= $p->jabatan; ?></td>
                                        <td><?= $p->ket; ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" id="btnmodaledit-<?= $p->id ?>" data-toggle="modal" data-target="#modal_data_pj_<?= str_replace(" ", "_", $p->id) ?>"><i class="far fa-edit"></i></button>
                                            <button class="btn btn-sm btn-danger" data-confirm="Woops...|Apakah anda yakin akan menghapus data <b><?= $p->nama ?></b>" data-confirm-yes="window.location = '/lantai/del/<?= $p->id ?>';"><i class="far fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="1" id="modal_data_pj" aria-labelledby="modal_data_pj" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Tambah data Penanggung Jawab</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/pj/store" id="tambahPJ" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" required name="nama" id="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <select class="custom-select" required name="jabatan" id="jabatan">
                                    <option value="">Pilih Jabatan</option>
                                    <?php foreach ($jabatan as $jab) : ?>
                                        <option value="<?= $jab->jabatan; ?>"><?= $jab->jabatan; ?></option>
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

        <!-- Modal Edit Data -->
        <?php foreach ($pj as $p) : ?>
            <div class="modal fade" tabindex="10" id="modal_data_pj_<?= str_replace(" ", "_", $p->id) ?>" aria-labelledby="modal_data_pj_<?= str_replace(" ", "_", $p->nama) ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Edit data Penaggung Jawab</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/pj/update" id="updatePJ" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" name="kode" value="<?= $p->id ?>">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" id="nama" value="<?= $p->nama ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <select class="custom-select" name="jabatan" id="jabatan">
                                        <option value="">Pilih Jabatan</option>
                                        <?php foreach ($jabatan as $jab) : ?>
                                            <option value="<?= $jab->jabatan; ?>" <?= $p->jabatan == $jab->jabatan ? "selected='selected'" : '' ?>><?= $jab->jabatan; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ket">Keterangan</label>
                                    <textarea class="form-control" name="ket" id="ket"><?= $p->ket ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> SIMPAN</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <script>
        $(document).ready(function() {
            $("#table_data_pj").dataTable();
            
            jQuery.validator.setDefaults({
                errorClass: "is-invalid error",
                validClass: "is-valid",
            });

            $.validator.addMethod("alhanumspacedash", function(value, element) {
                return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
            }, "Username must contain only letters, numbers, or dashes.");

            $("#tambahPJ").validate({
                rules: {
                    nama: {
                        required: true,
                        alhanumspacedash: true
                    },
                    jabatan: {
                        required: true,
                        alhanumspacedash: true
                    },
                    ket: {
                        alhanumspacedash: true
                    }
                },
            });

            $("form#updatePJ").each(function() {
                $(this).validate({
                    rules: {
                        nama: {
                            required: true,
                            alhanumspacedash: true
                        },
                        jabatan: {
                            required: true,
                            alhanumspacedash: true
                        },
                        ket: {
                            alhanumspacedash: true
                        }
                    },
                });
            });
        });
    </script>
    <?= $this->endSection(); ?>