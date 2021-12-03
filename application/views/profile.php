<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <?= $this->session->flashdata('notif'); ?>
            <div class="card">
                <div class="card-header text-center">
                    <h3>Profile <?= $profile['nama_lengkap']; ?></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-3 text-center d-flex align-items-center flex-column">
                            <style>
                                .foto-profile {
                                    position: relative;
                                    width: 200px;
                                }

                                #pen {
                                    position: absolute;
                                    font-size: 15px;
                                    color: #fff;
                                    cursor: pointer;
                                    right: 10px;
                                    top: 10px;
                                    background-color: #1572e8 !important;
                                }
                            </style>
                            <div class="foto-profile" width="200">
                                <img src="<?= foto_profile($profile['foto']); ?>" class="rounded-circle" id="foto-profile" alt="foto profile" width="200" height="200" style="object-fit: cover;">
                                <i class="flaticon-pen p-2 rounded-circle" id="pen" data-toggle="modal" data-target="#pen-ubah"></i>
                                <!-- Modal -->
                                <div class="modal fade" id="pen-ubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="color: black !important;">
                                            <div class="modal-header">
                                                <h3 class="modal-title">UBAH FOTO</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="<?= foto_profile($profile['foto']); ?>" class="rounded-circle border border-dark" id="foto-profile" alt="foto profile" width="200" height="200" style="object-fit: cover;">
                                                <input type="hidden" value="<?= $profile['foto']; ?>" id="foto_lama">
                                                <div class="form-group text-left">
                                                    <label for="exampleInputEmail1" style="color: black !important;">Pilih Foto</label>
                                                    <input type="file" class="form-control bg-light text-dark" name="foto" id="data-foto" accept="image/png, image/jpg, image/jpeg">
                                                </div>

                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-dark" data-dismiss="modal">BATAL</button>
                                                <button type="button" class="btn btn-primary" id="ubah-foto">UBAH</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="role mt-3">
                                <h2><?= $this->role; ?></h2>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" value="<?= $profile['email']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_lengkap" value="<?= $profile['nama_lengkap']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_lengkap" class="col-sm-2 col-form-label">Jenis kelamin</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                        <option selected value="<?= $profile['jenis_kelamin']; ?>"><?= format_jenis_kelamin($profile['jenis_kelamin']); ?></option>
                                        <?php if (strtolower($profile['jenis_kelamin']) == 'p') : ?>
                                            <option value="L">Laki - Laki</option>
                                        <?php else : ?>
                                            <option value="P">Perempuan</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_lengkap" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ubah-password">UBAH PASSWORD</button>
                                    <div class="modal fade" id="ubah-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="color: black !important;">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">UBAH PASSWORD</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group text-left">
                                                        <label for="exampleInputEmail1" style="color: black !important;">Password lama</label>
                                                        <input type="password" class="form-control bg-light text-dark" id="password_lama" placeholder="Masukan password lama">
                                                    </div>
                                                    <div class="form-group text-left">
                                                        <label for="exampleInputEmail1" style="color: black !important;">Password baru</label>
                                                        <input type="password" class="form-control bg-light text-dark" id="password_baru" placeholder="Masukan password baru">
                                                    </div>
                                                    <div class="form-group text-left">
                                                        <label for="exampleInputEmail1" style="color: black !important;">Password konfirmasi</label>
                                                        <input type="password" class="form-control bg-light text-dark" id="password_konfirmasi" placeholder="Masukan password konfirmasi">
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-dark" data-dismiss="modal">BATAL</button>
                                                    <button type="button" class="btn btn-primary" id="ubah-pass">SIMPAN</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_lengkap" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 text-right">
                                    <a href="<?= $this->session->userdata('kembali'); ?>" class="btn btn-dark" id="password">KEMBALI</a>
                                    <button type="submit" class="btn btn-primary" id="selesai">SELESAI</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#ubah-foto').click(function(e) {
        swal({
            title: 'Yakin?',
            text: "ingin merubah foto profile?",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Yakin!',
                    className: 'btn btn-success'
                },
                cancel: {
                    text: 'Batal!',
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((ubah) => {
            if (ubah) {
                let foto = $('#data-foto').prop('files')[0];
                let foto_lama = $('#foto_lama').val();
                var form_data = new FormData();
                form_data.append('foto', foto);
                form_data.append('foto_lama', foto_lama);
                $.ajax({
                    url: '<?= base_url('profile/ubah_foto'); ?>',
                    type: 'POST',
                    data: form_data,
                    dataType: 'JSON',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(output) {
                        swal(output.judul, output.pesan, {
                            icon: output.status,
                            buttons: {
                                confirm: {
                                    className: output.button,
                                }
                            }
                        })
                        if (output.status == 'success') {
                            setTimeout(function() {
                                window.location.replace('<?= current_url(); ?>');
                            }, 2000)
                        }
                    }
                })
            } else {
                swal.close();
            }
        });
    });
    $('#ubah-pass').on('click', function() {
        swal({
            title: 'Yakin?',
            text: "ingin merubah password?",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Yakin!',
                    className: 'btn btn-success'
                },
                cancel: {
                    text: 'Batal!',
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((ubah) => {
            if (ubah) {
                if ($('#password_lama').val() && $('#password_baru').val() && $('#password_konfirmasi').val()) {
                    var form_data = new FormData();
                    form_data.append('password_lama', $('#password_lama').val());
                    form_data.append('password_baru', $('#password_baru').val());
                    form_data.append('password_konfirmasi', $('#password_konfirmasi').val());
                    $.ajax({
                        url: '<?= base_url('profile/ubah_password'); ?>',
                        type: 'POST',
                        data: form_data,
                        dataType: 'JSON',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(output) {
                            swal(output.judul, output.pesan, {
                                icon: output.status,
                                buttons: {
                                    confirm: {
                                        className: output.button,
                                    }
                                }
                            })
                            if (output.status == 'success') {
                                setTimeout(function() {
                                    window.location.replace('<?= current_url(); ?>');
                                }, 2000)
                            }
                        }
                    })
                } else {
                    swal('Opss..!', 'Password tidak boleh kosong', {
                        icon: 'error',
                        buttons: {
                            confirm: {
                                className: 'btn btn-danger',
                            }
                        }
                    })
                }
            } else {
                swal.close();
            }
        });
    });
    $('#selesai').on('click', function() {
        swal({
            title: 'Yakin?',
            text: "ingin merubah profile?",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Yakin!',
                    className: 'btn btn-success'
                },
                cancel: {
                    text: 'Batal!',
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((ubah) => {
            if (ubah) {
                if ($('#nama_lengkap').val() && $('#jenis_kelamin').val()) {
                    var form_data = new FormData();
                    form_data.append('nama_lengkap', $('#nama_lengkap').val());
                    form_data.append('jenis_kelamin', $('#jenis_kelamin').val());
                    $.ajax({
                        url: '<?= base_url('profile/ubah'); ?>',
                        type: 'POST',
                        data: form_data,
                        dataType: 'JSON',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(output) {
                            swal(output.judul, output.pesan, {
                                icon: output.status,
                                buttons: {
                                    confirm: {
                                        className: output.button,
                                    }
                                }
                            })
                            if (output.status == 'success') {
                                setTimeout(function() {
                                    window.location.replace('<?= current_url(); ?>');
                                }, 2000)
                            }
                        }
                    })
                } else {
                    swal('Opss..!', 'Password tidak boleh kosong', {
                        icon: 'error',
                        buttons: {
                            confirm: {
                                className: 'btn btn-danger',
                            }
                        }
                    })
                }
            } else {
                swal.close();
            }
        });
    });
</script>