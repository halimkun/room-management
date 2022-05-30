<?= $this->extend('admin_template'); ?>
<?= $this->section('content'); ?>
<style>
    .modal-backdrop.show {
        display: none;
    }
</style>

<div class="section-header">
    <h1>Daftar Petugas</h1>
    <div class="section-header-breadcrumb">
        <button class="btn btn-primary" id="btn_add_room" data-toggle="modal" data-target="#modal_tambah_petugas"><i class="fa fa-plus mr-2"></i> Tambah Data</button>
    </div>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <!-- <h3>Daftar Petugas</h3> -->
                </div>
                <div class="card-body">
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
                    
                    <div class="">
                        <table class="table" id="adminTable">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Email</td>
                                    <td>Username</td>
                                    <td>Nama</td>
                                    <td>Bagian</td>
                                    <td><i class="fa fa-cog"></i></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $user->email; ?></td>
                                        <td><?= $user->username; ?></td>
                                        <td><?= $user->nama; ?></td>
                                        <td><?= $user->bagian; ?></td>
                                        <td>
                                            <button title="Edit" data-toggle="modal" data-target="#modal_edit_petugas_<?= $user->username ?>" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></button>
                                            <button title="Edit" data-toggle="modal" data-target="#modal_edit_pass_<?= $user->username ?>" class="btn btn-warning btn-sm"><i class="fa fa-key"></i></button>
                                            <button class="btn btn-sm btn-danger" data-confirm="Woops...|Apakah anda yakin akan menghapus data <b><?= $user->username ?></b>" data-confirm-yes="window.location = '/petugas/del/<?= $user->id ?>';"><i class="far fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_tambah_petugas" tabindex="-1" role="dialog" aria-labelledby="modal_tambah_petugasLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_tambah_petugasLabel">Tambah Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/petugas/store" id="formPetugas" method="POST">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <div class="form-label">Nama</div>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="form-label">username</div>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="form-label">Email</div>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="form-label">Bagian</div>
                        <input type="text" name="bagian" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="form-label">Password (default)</div>
                        <input type="text" name="password" readonly value="#UMPPekalongan01" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ModalUpdatePass -->
<?php foreach ($users as $user) : ?>
    <div class="modal fade" id="modal_edit_pass_<?= $user->username ?>" tabindex="-1" role="dialog" aria-labelledby="modal_edit_pass_<?= $user->username ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_edit_pass_<?= $user->username ?>Label">Update Password User ( <?= $user->username ?> )</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/petugas/update_pass" id="formPetugas" method="POST">
                        <?= csrf_field() ?>
                        <input type="hidden" name="randomEdit" value="<?= $user->id ?>">
                        <div class="form-group">
                            <div class="form-label">Password</div>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Modal Edit Petugas -->
<?php foreach ($users as $user) : ?>
    <div class="modal fade" id="modal_edit_petugas_<?= $user->username ?>" tabindex="-1" role="dialog" aria-labelledby="modal_edit_petugas_<?= $user->username ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_edit_petugas_<?= $user->username ?>Label">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/petugas/update" id="formPetugas" method="POST">
                        <?= csrf_field() ?>
                        <input type="hidden" name="randomEdit" value="<?= $user->id ?>">
                        <div class="form-group">
                            <div class="form-label">Nama</div>
                            <input type="text" name="nama" value="<?= $user->nama ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="form-label">username</div>
                            <input type="text" name="username" value="<?= $user->username ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="form-label">Email</div>
                            <input type="email" name="email" value="<?= $user->email ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="form-label">Bagian</div>
                            <input type="text" name="bagian" value="<?= $user->bagian ?>" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> SIMPAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<script>
    $(document).ready(function() {
        $('#adminTable').DataTable();
    });

    jQuery.validator.setDefaults({
        errorClass: "is-invalid error",
        validClass: "is-valid",
    });

    $.validator.addMethod("myreg", function(value, element) {
        return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
    }, "Username must contain only letters, numbers, or dashes.");


    $("#formPetugas").validate({
        rules: {
            nama: {
                required: true,
                minlength: 5
            },
            username: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true
            },
            bagian: {
                required: true,
                minlength: 5
            }
        }
    });
</script>
<?= $this->endSection(); ?>