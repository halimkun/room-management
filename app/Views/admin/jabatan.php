<?= $this->extend('admin_template'); ?>
<?= $this->section('content'); ?>
<style>
    .modal-backdrop.show {
        display: none;
    }
</style>

<div class="section-header">
    <h1>Data Jabatan</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary card-body">

                <!-- Pesan konfirmasi  -->
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('error'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <!-- Table data -->
                <table class="table" id="table_jabatan">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jabatan</th>
                            <th>Keterangan</th>
                            <th class="text-center"><i class="far fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($jabatan as $j) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $j->jabatan ?></td>
                                <td><?= $j->ket ?></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary" id="btnmodaledit-<?= $j->id ?>" data-toggle="modal" data-target="#modal_data_jabatan_<?= str_replace(" ", "_", $j->id) ?>"><i class="far fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger" data-confirm="Woops...|Apakah anda yakin akan menghapus data <b><?= $j->jabatan ?></b>" data-confirm-yes="window.location = '/jabatan/delete/<?= $j->id ?>';"><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Tambah Data Jabatan</h4>
                </div>
                <div class="card-body">
                    <form action="/jabatan/store" id="tambahJabatan" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <textarea name="ket" id="ket" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group float-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($jabatan as $j) : ?>
        <div class="modal fade" tabindex="10" id="modal_data_jabatan_<?= str_replace(" ", "_", $j->id) ?>" aria-labelledby="modal_data_jabatan_<?= str_replace(" ", "_", $j->id) ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Edit data Jabatan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/jabatan/update" id="jabatanUpdate" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $j->id ?>">
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" value="<?= $j->jabatan ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ket">Keterangan</label>
                                <textarea name="ket" id="ket" cols="30" rows="10" class="form-control"><?= $j->ket ?></textarea>
                            </div>
                            <div class="form-group float-right">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<script>
    $(document).ready(function() {
        $("#table_jabatan").dataTable();
        jQuery.validator.setDefaults({
            errorClass: "is-invalid error",
            validClass: "is-valid",
        });

        $.validator.addMethod("alhanumspacedash", function(value, element) {
            return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
        }, "Username must contain only letters, numbers, or dashes.");

        $("#tambahJabatan").validate({
            rules: {
                jabatan: {
                    required: true,
                    alhanumspacedash: true
                },
                ket: {
                    alhanumspacedash: true
                }
            },
        });

        $('form#jabatanUpdate').each(function() {
            $(this).validate({
                rules: {
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