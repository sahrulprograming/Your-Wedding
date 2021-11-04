<audio loop id="music">
    <source src="<?= base_url('assets'); ?>/demo/audio/Its_You.mp3" type="audio/mpeg">
</audio>
<div class="background" style="background-image: linear-gradient(rgba(46,27,23,0.7),rgba(46,27,23,0.7)), url(<?= base_url('assets'); ?>/demo/image/bg3.jpg);"></div>
<div class="content" id="pembungkus-konten">
    <!-- Music -->
    <div class="music">
        <img src="<?= base_url('assets'); ?>/demo/audio/volume.svg" id="icon-music">
    </div>
    <!-- Hero -->
    <section class="bg-light" id="hero" style="background-image: url(<?= base_url('assets'); ?>/demo/image/template/<?= $tema; ?>); background-repeat: no-repeat;background-size: cover;">
        <div class="hero text-center" data-aos="fade-right" data-aos-duration="1200">
            <div class="judul mb-3">
                <h1>Undangan Pernikahan</h1>
            </div>
            <div class="nama-mempelai mt-2">
                <h2><?= mempelai_pria($IDDU, 'nama_panggilan'); ?></h2>
                <h2>&</h2>
                <h2><?= mempelai_wanita($IDDU, 'nama_panggilan'); ?></h2>
            </div>
            <div class="tanggal">
                <p class="mt-4 mb-0 fs-5">pada hari <br> <?= ambil_hari(data_akad($IDDU, 'tanggal')); ?>, <?= format_tanggal(data_akad($IDDU, 'tanggal')); ?></p>
            </div>
            <div class="akad card-jadwal mt-2 p-2">
                <div class="row pt-1">
                    <div class="col waktu-mundur" id="hitung-mundur">
                        <!-- hitung mudnur dari javascript -->
                    </div>
                </div>
            </div>
            <div class="tamu-undangan">
                <p class="p-0 m-0">Kepada yang kami hormati</p>
                <p class="fs-6 fw-bold mt-1" style="color: var(--color-judul);"><?= $tamu ? $tamu : 'Tamu Undangan'; ?></p>
                <p class="p-0 m-0">di tempat</p>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <!-- Profile Mempelai -->
    <section class="" id="profile-mempelai" style="background-color: #FFF;">
        <div class="profile-mempelai text-center" data-aos="fade-left" data-aos-duration="1200">
            <div class="">
                <div class="salam">
                    <h1 class="fw-normal">Assalamu’alaikum <br>Warahmatullahi Wabarakatuuh</h1>
                </div>
                <div class="row judul d-flex align-items-center justify-content-center">
                    <div class="col-11">
                        <p><?= data_undangan($IDDU, 'kata_pengantar'); ?></p>
                    </div>
                </div>
                <div class="pria p-0 mb-5">
                    <img src="<?= base_url('assets'); ?>/demo/image/Foto Pria.svg" alt="Foto pria" width="100" height="100" class="foto-pria">
                    <h5 class="fs-4"><?= mempelai_pria($IDDU, 'nama_lengkap'); ?></h5>
                    <p class="mb-2" style="font-size: 14;font-weight: bold;">Putra Dari</p>
                    <p style="font-style: italic;"><?= mempelai_pria($IDDU, "ortu"); ?></p>
                </div>
                <div class="wanita p-0">
                    <img src="<?= base_url('assets'); ?>/demo/image/Foto Wanita.svg" alt="Foto Wanita" width="100" height="100" class="foto-wanita">
                    <h5 class="fs-4"><?= mempelai_wanita($IDDU, 'nama_lengkap'); ?></h5>
                    <p class="mb-2 fw-bold" style="font-size: 14;">Putri Dari</p>
                    <p style="font-style: italic;"><?= mempelai_wanita($IDDU, "ortu"); ?></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Profile Mempelai -->

    <!-- Jadwal -->
    <section class="align-items-start" id="jadwal" style="background-color: #FFF;">
        <div class="jadwal text-center d-flex flex-column align-items-center justify-content-start my-4" data-aos="fade-right" data-aos-duration="1200">
            <div class="judul text-center">
                <h1 class="fs-3">Acara</h1>
                <p>Pernikahan Kami</p>
            </div>
            <!-- Akad -->
            <div class="akad card-jadwal">
                <div class="judul">
                    <h1 class="fw-normal">Akad</h1>
                    <img class="" src="<?= base_url('assets'); ?>/demo/element/hiasan-judul.png" alt="hiasan" width="80" height="28.16">
                </div>
                <div class="row justify-content-end mx-3 mb-3">
                    <div class="col tanggal me-3 p-0">
                        <img class="mb-3" src="<?= base_url('assets'); ?>/demo/icon/calendar.svg" alt="calender" width="50" height="50">
                        <p><?= ambil_hari(data_akad($IDDU, 'tanggal')); ?>, <?= format_tanggal(data_akad($IDDU, 'tanggal')); ?></p>
                    </div>
                    <div class="col jam p-0">
                        <img class="mt-2 mb-2" src="<?= base_url('assets'); ?>/demo/icon/clock.svg" alt="calender" width="50" height="50">
                        <p><?= format_jam(data_akad($IDDU, 'jam')); ?> WIB <br> s/d Selesai</p>
                    </div>
                </div>
            </div>
            <div class="lokasi-acara d-flex flex-column align-items-center justify-content-start mt-4" data-aos="fade-left" data-aos-duration="1200">
                <div class="judul text-center">
                    <h1 class="mb-2 fs-3">Lokasi Akad</h1>
                    <img class="mb-2" src="<?= base_url('assets'); ?>/demo/icon/location.svg" alt="lokasi-icon" width="40" height="40">
                </div>
                <div class="alamat">
                    <h4 class="text-dark">
                        <?= data_akad($IDDU, 'lokasi'); ?>
                    </h4>
                </div>
                <div class="gmaps">
                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=300&amp;height=240&amp;hl=en&amp;q=Jalan jawa Tegal Alur&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        </div>
                    </div>
                </div>
                <div class="konfirmasi-kehadiran my-3 p-3">
                    <div class="judul text-center mb-2">
                        <h1>Konfirmasi Kehadiran</h1>
                    </div>
                    <form action="#">
                        <label for="nama-lengkap" class="text-dark fs-7">Nama Lengkap</label>
                        <div class="input-group input-group-sm mb-0">
                            <input type="text" class="form-control py-0" name="nama-lengkap" id="nama-lengkap" value="<?= $tamu ? $tamu : ""; ?>" placeholder="Nama lengkap">
                        </div>
                        <label for="hubungan" class="text-dark fs-7">Hubungan dengan mempelai</label>
                        <div class="input-group input-group-sm mb-0">
                            <input type="text" class="form-control py-0" name="hubungan" id="hubungan" placeholder="teman, tamu, sahabat, saudara">
                        </div>
                        <div class="pilihan d-flex flex-wrap justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kehadiran" id="hadir" value="hadir">
                                <label class="form-check-label text-dark fs-7" for="hadir">
                                    ya, saya hadir
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kehadiran" id="tidak_tentu" value="tidak tentu">
                                <label class="form-check-label text-dark fs-7" for="tidak_tentu">
                                    Bisa hadir, bisa tidak
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kehadiran" id="tidak_hadir" value="tidak hadir">
                                <label class="form-check-label text-dark fs-7" for="tidak_hadir">
                                    Saya tidak bisa hadir
                                </label>
                            </div>
                        </div>
                        <div class="text-center mt-2">
                            <button type="button" class="btn btn-sm btn-primary" id="konfirmasi_kehadiran" style="border-radius: 5px;">Konfirmasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Jadwal -->

    <!-- Lokasi Acara -->
    <section class="align-items-start" id="lokasi-acara" style="background-color: #FFF;">
        <div class="jadwal text-center d-flex flex-column align-items-center justify-content-start my-4" data-aos="fade-right" data-aos-duration="1200">
            <!-- Akad -->
            <div class="akad card-jadwal">
                <div class="judul">
                    <h1 class="fw-normal">Resepsi</h1>
                    <img class="" src="<?= base_url('assets'); ?>/demo/element/hiasan-judul.png" alt="hiasan" width="80" height="28.16">
                </div>
                <div class="row justify-content-end mx-3 mb-3">
                    <div class="col tanggal me-3 p-0">
                        <img class="mb-3" src="<?= base_url('assets'); ?>/demo/icon/calendar.svg" alt="calender" width="50" height="50">
                        <p><?= ambil_hari(data_resepsi($IDDU, 'tanggal')); ?>, <?= format_tanggal(data_resepsi($IDDU, 'tanggal')); ?></p>
                    </div>
                    <div class="col jam p-0">
                        <img class="mt-2 mb-2" src="<?= base_url('assets'); ?>/demo/icon/clock.svg" alt="calender" width="50" height="50">
                        <p><?= format_jam(data_resepsi($IDDU, 'jam')); ?> WIB <br> s/d Selesai</p>
                    </div>
                </div>
            </div>
            <div class="lokasi-acara d-flex flex-column align-items-center justify-content-start mt-4" data-aos="fade-left" data-aos-duration="1200">
                <div class="judul text-center">
                    <h1 class="mb-2 fs-3">Lokasi Resepsi</h1>
                    <img class="mb-2" src="<?= base_url('assets'); ?>/demo/icon/location.svg" alt="lokasi-icon" width="40" height="40">
                </div>
                <div class="alamat">
                    <h4 class="text-dark">
                        <?= data_resepsi($IDDU, 'lokasi'); ?>
                    </h4>
                </div>
                <div class="gmaps">
                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=300&amp;height=240&amp;hl=en&amp;q=Jalan jawa Tegal Alur&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Lokasi Acara -->

    <!-- Galery -->
    <section class="align-items-start" id="gallery" style="background-color: #FFF;">
        <div class="gallery d-flex flex-column align-items-start my-4">
            <div class="video text-center">
                <div class="judul">
                    <h1 class="mb-2 fs-3">Video</h1>
                    <p class="text-dark">
                        terima kasih telah setia melihat undangan kami dan berikut ini adalah video prewedding kami
                    </p>
                </div>
                <iframe width="340" height="199" src="https://www.youtube.com/embed/FgN4ieKQKw8?">
                    <!-- autoplay=1&mute=1 -->
                </iframe>
            </div>
            <div class="foto d-flex flex-column align-items-center mt-3">
                <div class="judul text-center">
                    <h1 class="mb-2 fs-3">Gallery Foto</h1>
                    <p class="text-dark">lalu ini adalah foto foto moment bahagia kami, semoga dengan niat suci ini di rahmati oleh yang maha kuasa</p>
                </div>
                <div class="bungkus-foto mb-3 bg-light">
                    <!-- Swiper -->
                    <div style="--swiper-navigation-color: #000; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                            <?php foreach (foto_prewedd($IDDU) as $foto) : ?>
                                <div class="swiper-slide">
                                    <img src="<?= base_url('assets'); ?>/demo/image/<?= $foto['foto']; ?>" />
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php foreach (foto_prewedd($IDDU) as $foto) : ?>
                                <div class="swiper-slide" style="cursor: pointer;">
                                    <img src="<?= base_url('assets'); ?>/demo/image/<?= $foto['foto']; ?>" />
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kirim Kado -->
    <section class="align-items-start" id="kirim-kado" style="background-color: #FFF;">
        <div class="kirim-kado text-center mt-4">
            <div class="judul mb-2">
                <h1 class="fs-3">Kirim Kado</h1>
            </div>
            <p class="text-dark m-0">jika ingin mengirim kado
                cash bisa isi form di bawah ini </p>
            <div class="text-start px-4">
                <div class="input-group input-group-sm mt-3">
                    <span class="input-group-text" id="basic-addon3">Rp.</span>
                    <input type="text" class="form-control" name="nominal-gift" id="nominal-gift" placeholder=" Masukan Nominal Kado">
                    <script>
                        $('#nominal-gift').mask('#.##0', {
                            reverse: true
                        });
                    </script>
                </div>
                <div class="input-group input-group-sm mt-3">
                    <select class="single-select form-control" name="IDVA" id="IDVA">
                        <option selected value="null">Silahkan pilih virtual account</option>
                        <?php foreach (virtual_account($IDU) as $pay) : ?>
                            <option value="<?= $pay['IDVA']; ?>"><?= $pay['nama_VA']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="text-center my-2">
                    <button class="btn btn-primary text-center" id="kirim">Lanjut</button>
                </div>
                <div id="VA">
                    <!-- data akun virtual dari ajax -->
                </div>
            </div>
            <div class="barang mt-3">
                <p class="text-dark">Kado Berupa Barang Bisa di kririm ke</p>
                <div class="alamat d-flex flex-column align-items-center">
                    <h1 class="m-0">Alamat</h1>
                    <p class="text-dark mb-3 mt-2 mx-2">
                        <?= data_undangan($IDDU, 'alamat_kirim_kado'); ?>
                    </p>
                    <div class="gmaps mb-3">
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=300&amp;height=240&amp;hl=en&amp;q=Jalan jawa Tegal Alur&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Do'a dan Ucapan -->
    <section class="align-items-start" id="doa-ucapan" style="background-color: #FFF;">
        <div class="doa-ucapan">
            <div class="judul text-center my-4">
                <h1 class="fs-3">Do'a & Ucapan</h1>
                <img src="<?= base_url('assets'); ?>/demo/icon/pesan.svg" alt="icon pesan" width="30" height="30">
            </div>
            <div class="kirim-pesan p-3">
                <form action="#">
                    <label for="Nama" class="text-dark fs-6">Nama</label>
                    <div class="input-group input-group-sm mb-0">
                        <input required type="text" class="form-control" name="nama_pengirim" id="nama-pengirim" value="<?= $tamu ? $tamu : ""; ?>" placeholder="Masukan Nama Anda">
                    </div>
                    <label for="pesan" class="text-dark fs-6">pesan</label>
                    <div class="input-group input-group-sm mb-0">
                        <textarea required class="form-control" aria-label="With textarea" name="pesan" id="pesan" cols="30" rows="3" placeholder="Masukan pesan Anda"></textarea>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary mt-2 px-4" id="komentar">
                        Kirim
                    </button>
                </form>
            </div>
            <?php if (semua_komentar($IDU)) : ?>
                <div class="card-pesan text-dark my-2 p-2">
                    <div class="pengirim">
                        <img class="rounded-circle" src="<?= base_url('assets'); ?>/demo/image/avatar1.svg" alt="Avatar" width="25" height="25">
                        <h4 class="ms-2"><?= komentar_terbaru($IDU, 'nama_pengirim'); ?></h4>
                    </div>
                    <div class="waktu-dikirim">
                        <p class="position-relative bottom-0"></p><?= substr(komentar_terbaru($IDU, 'tanggal_dikirim'), 0, 10) === date('Y-m-d') ? jam_komentar(komentar_terbaru($IDU, 'tanggal_dikirim')) : format_tanggal(komentar_terbaru($IDU, 'tanggal_dikirim')); ?></p>
                    </div>
                    <div class="pesan">
                        <hr class="m-0">
                        <p><?= komentar_terbaru($IDU, 'pesan'); ?></p>
                    </div>
                    <div class="respown">

                    </div>
                </div>
                <div class="pesan-slider">
                    <div class="swiper slider">
                        <div class="swiper-wrapper">
                            <?php foreach (semua_komentar($IDU) as $k) : ?>
                                <div class="swiper-slide">
                                    <div class="card-pesan text-dark p-2">
                                        <div class="pengirim">
                                            <img class="rounded-circle" src="<?= base_url('assets'); ?>/demo/image/avatar1.svg" alt="Avatar" width="25" height="25">
                                            <h4 class="ms-2"><?= $k['nama_pengirim']; ?></h4>
                                        </div>
                                        <div class="waktu-dikirim">
                                            <p class="position-relative bottom-0"></p><?= substr($k['tanggal_dikirim'], 0, 10) === date('Y-m-d') ? jam_komentar($k['tanggal_dikirim']) : format_tanggal($k['tanggal_dikirim']); ?></p>
                                        </div>
                                        <div class="pesan">
                                            <hr class="m-0">
                                            <p><?= $k['pesan']; ?></p>
                                        </div>
                                        <div class="respown">

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>

<script src="<?= base_url('assets'); ?>/vendor/sweetalert/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        // konfirmasi kehadiran
        $('#konfirmasi_kehadiran').click(function() {
            const value = {
                IDU: <?= $IDU; ?>,
                nama: $('#nama-lengkap').val(),
                hubungan: $('#hubungan').val(),
                kehadiran: $('input[name="kehadiran"]:checked').val(),
            };
            $.ajax({
                url: "<?= base_url('undangan/kehadiran'); ?>",
                type: "POST",
                data: value,
                success: function(result) {
                    if (result == 'Berhasil') {
                        swal("Selamat!", "Anda berhasil input kehadiran!", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            },
                        });
                    } else if (result == 'Ada') {
                        swal("Gagal input!", "nama sudah terdata di buku tamu!", {
                            icon: "error",
                            buttons: {
                                confirm: {
                                    className: 'btn btn-danger'
                                }
                            },
                        });
                    } else {
                        swal("Gagal input!", "ada yang salah coba cek lagi!", {
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
        })

        // Kirim Hadiah
        $('#kirim').click(function() {
            const nilai = {
                nominal: $('#nominal-gift').val(),
                IDVA: $('#IDVA').val(),
            };
            $.ajax({
                url: "<?= base_url('undangan/gift'); ?>",
                type: "POST",
                data: nilai,
                success: function(result) {
                    $('#VA').html(result);
                }
            })
        })
    })

    // kirim pesan
    $('#komentar').click(function() {
        const komentar = {
            IDU: <?= $IDU; ?>,
            nama_pengirim: $('#nama-pengirim').val(),
            pesan: $('#pesan').val(),
        };
        $.ajax({
            url: "<?= base_url('undangan/komentar'); ?>",
            type: "POST",
            data: komentar,
            success: function(result) {
                if (result == 'Berhasil') {
                    swal("Berhasil!", "Terima Kasih sudah berkomentar!", {
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
    })
</script>