<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <?= $this->session->flashdata('notif'); ?>
            <div class="page-header">
                <h4 class="page-title">Ubah Undangan</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="<?= base_url($this->session->userdata('role') . 'home/dashboard'); ?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= current_url(); ?>">Ubah Undangan</a>
                    </li>
                </ul>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Undangan Anda</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 col-md-3">
                            <div class="nav flex-column nav-pills nav-secondary nav-pills-no-bd nav-pills-icons" id="v-pills-tab-with-icon" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-home-tab-icons" data-toggle="pill" href="#v-pills-kata-pengantar" role="tab" aria-controls="v-pills-kata-pengantar" aria-selected="true">
                                    <i class="flaticon-file"></i>
                                    Kata Pengantar
                                </a>
                                <a class="nav-link" id="v-pills-home-tab-icons" data-toggle="pill" href="#v-pills-mempeai-pria" role="tab" aria-controls="v-pills-mempeai-pria" aria-selected="true">
                                    <i class="icon-user"></i>
                                    Mempelai Pria
                                </a>
                                <a class="nav-link" id="v-pills-profile-tab-icons" data-toggle="pill" href="#v-pills-mempelai-wanita" role="tab" aria-controls="v-pills-mempelai-wanita" aria-selected="false">
                                    <i class="icon-user-female"></i>
                                    Mempelai Wanita
                                </a>
                                <a class="nav-link" id="v-pills-profile-tab-icons" data-toggle="pill" href="#v-pills-jadwal-akad" role="tab" aria-controls="v-pills-jadwal-akad" aria-selected="false">
                                    <i class="flaticon-calendar"></i>
                                    Jadwal Akad
                                </a>
                                <a class="nav-link" id="v-pills-profile-tab-icons" data-toggle="pill" href="#v-pills-jadwal-resepsi" role="tab" aria-controls="v-pills-jadwal-akad" aria-selected="false">
                                    <i class="flaticon-calendar"></i>
                                    Jadwal Resepsi
                                </a>
                                <a class="nav-link" id="v-pills-profile-tab-icons" data-toggle="pill" href="#v-pills-foto-foto" role="tab" aria-controls="v-pills-jadwal-akad" aria-selected="false">
                                    <i class="flaticon-picture"></i>
                                    Foto - Foto Prewedd
                                </a>
                                <a class="nav-link" id="v-pills-profile-tab-icons" data-toggle="pill" href="#v-pills-video" role="tab" aria-controls="v-pills-jadwal-akad" aria-selected="false">
                                    <i class="icon-film"></i>
                                    Video Prewedd
                                </a>
                                <a class="nav-link" id="v-pills-profile-tab-icons" data-toggle="pill" href="#v-pills-kirim-kado" role="tab" aria-controls="v-pills-jadwal-akad" aria-selected="false">
                                    <i class="flaticon-present"></i>
                                    Kirim Kado
                                </a>
                            </div>
                        </div>
                        <div class="col-8 col-md-9">
                            <div class="tab-content" id="v-pills-with-icon-tabContent">
                                <!-- Kata Pengantar -->
                                <div class="tab-pane fade show active" id="v-pills-kata-pengantar" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">
                                    <form action="">
                                        <div class="form-group">
                                            <label class="form-label fw-normal fst-italic">KATA PENGANTAR</label>
                                            <textarea class="form-control" id="kata_pengantar" name="kata_pengantar" type="text" rows="5" placeholder="Ketik atau lihat contekan"><?= data_undangan($IDDU, 'kata_pengantar'); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-info" id="contek">lihat contekan</button>
                                        </div>
                                        <div class="form-group d-none" id="output-contek">
                                            <select class="form-control" id="contekan">
                                                <option selected>Pilih Contekan</option>
                                                <?php foreach ($contekan as $contekan) : ?>
                                                    <option value="<?= $contekan['kata_pengantar']; ?>" style="word-wrap:break-word !importent"><?= substr($contekan['kata_pengantar'], 0, 60); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="submit text-center">
                                            <button type="button" class="btn btn-primary" id="submit-1">ubah</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- Mempelai Pria -->
                                <div class="tab-pane fade" id="v-pills-mempeai-pria" role="tabpanel" aria-labelledby="v-pills-home-tab-icons">
                                    <?= form_open_multipart(base_url('customer/undangan/edit/mempelai_pria/' . $IDDU)); ?>
                                    <input type="hidden" name="foto_lama" value="<?= mempelai_pria($IDDU, 'foto'); ?>">
                                    <div class="form-group">
                                        <label class="form-label fw-normal fst-italic">FOTO PRIA</label>
                                        <img src="<?= base_url('assets'); ?>/img/customer/<?= $this->IDC; ?>/<?= mempelai_pria($IDDU, 'foto'); ?>" alt="..." class="img-thumbnail d-block mb-2" width="200">
                                        <input class="form-control" id="foto" name="foto" type="file">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label fw-normal fst-italic">NAMA LENGKAP</label>
                                        <input class="form-control" id="nama_lengkap" name="nama_lengkap" type="text" value="<?= mempelai_pria($IDDU, 'nama_lengkap'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label fw-normal fst-italic">NAMA PANGGILAN</label>
                                        <input class="form-control" id="nama_panggilan" name="nama_panggilan" type="text" value="<?= mempelai_pria($IDDU, 'nama_panggilan'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label fw-normal fst-italic">KEDUA ORANG TUA</label>
                                        <input class="form-control" id="ortu" name="ortu" type="text" value="<?= mempelai_pria($IDDU, 'ortu'); ?>">
                                    </div>
                                    <div class="submit text-center">
                                        <button type="submit" class="btn btn-primary" id="submit-2">ubah</button>
                                    </div>
                                    </form>
                                </div>
                                <!-- mempelai wanita -->
                                <div class="tab-pane fade" id="v-pills-mempelai-wanita" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">
                                    <?= form_open_multipart(base_url('customer/undangan/edit/mempelai_wanita/' . $IDDU)); ?>
                                    <input type="hidden" name="foto_lama" value="<?= mempelai_wanita($IDDU, 'foto'); ?>">
                                    <div class="form-group">
                                        <label class="form-label fw-normal fst-italic">FOTO WANITA</label>
                                        <img src="<?= base_url('assets'); ?>/img/customer/<?= $this->IDC; ?>/<?= mempelai_wanita($IDDU, 'foto'); ?>" alt="..." class="img-thumbnail d-block mb-2" width="200">
                                        <input class="form-control" id="foto" name="foto" type="file">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label fw-normal fst-italic">NAMA LENGKAP</label>
                                        <input class="form-control" id="nama_lengkap" name="nama_lengkap" type="text" value="<?= mempelai_wanita($IDDU, 'nama_lengkap'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label fw-normal fst-italic">NAMA PANGGILAN</label>
                                        <input class="form-control" id="nama_panggilan" name="nama_panggilan" type="text" value="<?= mempelai_wanita($IDDU, 'nama_panggilan'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label fw-normal fst-italic">KEDUA ORANG TUA</label>
                                        <input class="form-control" id="ortu" name="ortu" type="text" value="<?= mempelai_wanita($IDDU, 'ortu'); ?>">
                                    </div>
                                    <div class="submit text-center">
                                        <button type="submit" class="btn btn-primary" id="submit-2">Ubah</button>
                                    </div>
                                    </form>
                                </div>
                                <!-- Jadwal akad -->
                                <div class="tab-pane fade" id="v-pills-jadwal-akad" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">
                                    <form action="<?= base_url('customer/undangan/edit/j_akad/', $IDDU); ?>" method="POST">
                                        <div class="mt-5">
                                            <label class="form-label fw-normal fst-italic">TANGGAL</label>
                                            <input class="form-control" id="datepicker" name="tanggal" type="date" value="<?= data_akad($IDDU, 'tanggal'); ?>">
                                        </div>
                                        <div class="mt-2">
                                            <label class="form-label fw-normal fst-italic">JAM</label>
                                            <input class="form-control" id="timepicker" name="jam" type="time">
                                        </div>
                                        <div class="mt-2">
                                            <label class="form-label fw-normal fst-italic text-uppercase">lokasi google maps</label>
                                            <input class="form-control" id="lokasi" name="lokasi" type="text" placeholder="paste link google maps lokasi">
                                        </div>
                                        <div class="mt-2">
                                            <label class="form-label fw-normal fst-italic text-uppercase">embed lokasi maps</label>
                                            <input class="form-control" id="lokasi_embed" name="lokasi_embed" type="text" placeholder="paste script embed">
                                        </div>
                                        <div class="mt-2">
                                            <div class="image-container">
                                                <div class="video-wrapper text-end">
                                                    <a class="popup-youtube btn btn-warning" target="_blank" href="https://www.youtube.com/watch?v=fLCjQJCekTs" data-effect="fadeIn">
                                                        Lihat cara embed
                                                    </a>
                                                </div> <!-- end of video-wrapper -->
                                            </div>
                                        </div>
                                        <div class="submit text-center">
                                            <button type="button" class="btn btn-primary" id="submit-4">ubah</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- Jadwal resepsi -->
                                <div class="tab-pane fade" id="v-pills-jadwal-resepsi" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">
                                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                    <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.
                                    </p>
                                </div>
                                <!-- Foto - Foto Prewedd -->
                                <div class="tab-pane fade" id="v-pills-foto-foto" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">
                                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                    <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.
                                    </p>
                                </div>
                                <!-- Video Prewedd -->
                                <div class="tab-pane fade" id="v-pills-video" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">
                                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                    <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.
                                    </p>
                                </div>
                                <!-- Kirim kado -->
                                <div class="tab-pane fade" id="v-pills-kirim-kado" role="tabpanel" aria-labelledby="v-pills-profile-tab-icons">
                                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                    <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</script>

<script>
    $('#contek').on('click', function() {
        $('#output-contek').toggleClass('d-none');
        $('#contekan').change(function() {
            $('#contekan :selected').each(function() {
                $('#kata_pengantar').val($(this).val())
            })
        });
    })
</script>

<!-- Edit Ajax -->
<script>
    $(document).ready(function() {
        //ubah Kata pengantar
        $('#submit-1').click(function() {
            if ($('#kata_pengantar').val() != 'Pilih Contekan' && $('#kata_pengantar').val() != '') {
                let data = {
                    kata_pengantar: $('#kata_pengantar').val()
                }
                $.ajax({
                    url: "<?= base_url('customer/undangan/edit/data_undangan/' . $IDDU); ?>",
                    type: "POST",
                    data: data,
                    success: function(result) {
                        console.log(result);
                        if (result == 'Berhasil') {
                            swal("Berhasil!", "Kata pengantar berhasil dirubah!", {
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-success'
                                    }
                                },
                            });
                        } else {
                            swal("Gagal!", "ada yang salah coba di cek!", {
                                icon: "error",
                                buttons: {
                                    confirm: {
                                        className: 'btn btn-danger'
                                    }
                                },
                            });
                        }
                    }
                })
            } else {
                swal("Gagal!", "anda belum mengisi kata pengantar!", {
                    icon: "error",
                    buttons: {
                        confirm: {
                            className: 'btn btn-danger'
                        }
                    },
                });
            }
        })
    })
</script>