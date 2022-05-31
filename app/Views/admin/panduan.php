<?= $this->extend('admin_template'); ?>
<?= $this->section('content'); ?>
<style>
    .modal-backdrop.show {
        display: none;
    }

    .img_detail {
        width : 100%;
    }
</style>

<div class="section-header">
    <h1>Panduan Penggunaan Website</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-md">
            <div class="card card-primary card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#" data-toggle="modal" data-target="#modal_halaman_petugas"> 1. Halaman Petugas</a></li>
                    <li class="list-group-item"><a href="#" data-toggle="modal" data-target="#modal_halaman_ruangan"> 2. Halaman Ruangan</a></li>
                    <li class="list-group-item"><a href="#" data-toggle="modal" data-target="#modal_halaman_penanggungjawab"> 3. Halaman Penaggung Jawab</a></li>
                    <li class="list-group-item"><a href="#" data-toggle="modal" data-target="#modal_halaman_jabatan"> 4. Halaman Jabatan</a></li>
                    <li class="list-group-item"><a href="#" data-toggle="modal" data-target="#modal_halaman_kegiatan"> 5. Halaman Kegiatan</a></li>
                    <li class="list-group-item"><a href="#" data-toggle="modal" data-target="#modal_halaman_dashboard"> 6. Halaman Dashboard</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- modal halaman petugas -->
<div class="modal fade" tabindex="1" id="modal_halaman_petugas" aria-labelledby="modal_halaman_petugas" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h4>Halaman Petugas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-md">
                        <img class="img_detail" src="/assets/img/documentation/petugas.png" />
                        <p>Halaman petugas menampilkan data petugas berupa tabel. Admin dapat melakukan tambah data petugas, update data petugas, ubah password, dan menghapus petugas.</p>
                        <div class="row">
                            <div class="col">
                                <div class="row mb-5">
                                    <div class="col-6 text-center">
                                        <img class="img_detail" src="/assets/img/documentation/tambah_petugas.png" />
                                        <span>tambah data petugas</span>
                                    </div>
                                    <div class="col-6 text-center">
                                        <img class="img_detail" src="/assets/img/documentation/edit_petugas.png" />
                                        <span>edit data petugas</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-center">
                                        <img class="img_detail" src="/assets/img/documentation/update_pass_petugas.png" />
                                        <span>update password petugas</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal halaman ruangan -->
<div class="modal fade" tabindex="1" id="modal_halaman_ruangan" aria-labelledby="modal_halaman_ruangan" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h4>Halaman Ruangan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-md">
                        <img class="img_detail" src="/assets/img/documentation/ruang.png" />
                        <p>Halaman Ruangan menampilkan 2 data yaitu data ruangan dan data lantai berupa tabel. Petugas dapat melakukan tambah data ruangan / lantai, update data ruangan / lantai, dan menghapus data ruangan / lantai.</p>
                        <div class="row mb-5">
                            <div class="col text-center">
                                <h5>Data Ruangan</h5>
                                <div class="row">
                                    <div class="col-6 text-center">
                                        <img class="img_detail" src="/assets/img/documentation/tambah_ruang.png" />
                                        <span>tambah data ruangan</span>
                                    </div>
                                    <div class="col-6 text-center">
                                        <img class="img_detail" src="/assets/img/documentation/edit_ruang.png" />
                                        <span>edit data ruangan</span>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col text-center">
                                <h5>Data Lantai</h5>    
                                <div class="row">
                                    <div class="col-6 text-center">
                                        <img class="img_detail" src="/assets/img/documentation/tambah_lantai.png" />
                                        <span>tambah data lantai</span>
                                    </div>
                                    <div class="col-6 text-center">
                                        <img class="img_detail" src="/assets/img/documentation/edit_lantai.png" />
                                        <span>edit data lantai</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal halaman penanggung jawab -->
<div class="modal fade" tabindex="1" id="modal_halaman_penanggungjawab" aria-labelledby="modal_halaman_penanggungjawab" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h4>Halaman Penganggung Jawab</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-md">
                        <img class="img_detail" src="/assets/img/documentation/penanggungjawab.png" />
                        <p>Halaman penanggung jawab menampilkan data penanggung jawab berupa tabel. Petugas dapat melakukan tambah data penanggung jawab, update data penanggung jawab, dan menghapus penanggung jawab.</p>
                        <div class="row">
                            <div class="col-6 text-center">
                                <img class="img_detail" src="/assets/img/documentation/tambah_penanggungjawab.png" />
                                <span>tambah data penanggung jawab</span>
                            </div>
                            <div class="col-6 text-center">
                                <img class="img_detail" src="/assets/img/documentation/edit_penanggungjawab.png" />
                                <span>edit data penanggung jawab</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal halaman jabatan -->
<div class="modal fade" tabindex="1" id="modal_halaman_jabatan" aria-labelledby="modal_halaman_jabatan" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h4>Halaman Jabatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-md">
                        <img class="img_detail" src="/assets/img/documentation/jabatan.png" />
                        <p>Halaman jabatan menampilkan data jabatan berupa tabel. Petugas dapat melakukan tambah data jabatan, update data jabatan, dan menghapus jabatan.</p>
                        <div class="row">
                            <div class="col-6 text-center">
                                <img class="img_detail" src="/assets/img/documentation/edit_jabatan.png" />
                                <span>edit data jabatan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal halaman kegiatan -->
<div class="modal fade" tabindex="1" id="modal_halaman_kegiatan" aria-labelledby="modal_halaman_kegiatan" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h4>Halaman Kegiatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-md">
                        <img class="img_detail" src="/assets/img/documentation/kegiatan.png" />
                        <p>Halaman kegiatan menampilkan data kegiatan berupa tabel. Petugas dapat melakukan tambah data kegiatan, update data kegiatan, update status kegiatan, dan menghapus kegiatan.</p>
                        <div class="row mb-5">
                            <div class="col text-center">
                                <img class="img_detail" src="/assets/img/documentation/opsi_kegiatan.png" />
                                <span>aksi kegiatan</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-center">
                                <img class="img_detail" src="/assets/img/documentation/tambah_kegiatan.png" />
                                <span>tambah data kegiatan</span>
                            </div>
                            <div class="col-6 text-center">
                                <img class="img_detail" src="/assets/img/documentation/edit_kegiatan.png" />
                                <span>edit data kegiatan</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-center">
                                <img class="img_detail" src="/assets/img/documentation/edit_status_kegiatan.png" />
                                <span>edit status kegiatan</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal halaman dashboard -->
<div class="modal fade" tabindex="1" id="modal_halaman_dashboard" aria-labelledby="modal_halaman_dashboard" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h4>Halaman Dasboard</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-md">
                        <img class="img_detail" src="/assets/img/documentation/dashboard.png" />
                        <p>Halaman dashboard menampilkan ringkasan dari keseluruhan data kegiatan berupa tabel secara dinamis. Terdapat informasi : </p>
                        <ul>
                            <li>Data agenda selama 7 hari kedepan</li>
                            <li>Data agenda Hari ini</li>
                            <li>Data agenda 7 hari terakhir</li>
                            <li>Data agenda dalam tabel berdasarkan bulan/minggu/hari</li>
                        </ul>
                        <div class="row mb-5">
                            <div class="col-6 text-center">
                                <img class="img_detail" src="/assets/img/documentation/agenda_perbulan.png" />
                                <span>data agenda dalam satu bulan</span>
                            </div>
                            <div class="col-6 text-center">
                                <img class="img_detail" src="/assets/img/documentation/agenda_perminggu.png" />
                                <span>data agenda dalam satu minggu</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-center">
                                <img class="img_detail" src="/assets/img/documentation/agenda_perhari.png" />
                                <span>data agenda di hari ini</span>
                            </div>
                            <div class="col-6 text-center">
                                <img class="img_detail" src="/assets/img/documentation/agenda_list.png" />
                                <span>data list agenda di bulan ini</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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