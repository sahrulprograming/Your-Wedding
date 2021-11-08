<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title; ?></title>
    <!-- Favicon  -->
    <link rel="icon" href="<?= base_url('assets'); ?>/img/logo.ico">
    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/icons.css">
    <!-- CSS -->
    <link href="<?= base_url('assets'); ?>/vendor/bootstrap-5/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets'); ?>/css/form-steps.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/Drag-And-Drop/dist/imageuploadify.min.css">

    <!-- Jquery -->
    <script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets'); ?>/vendor/sweetalert/sweetalert.min.js"></script>
    <style>
        input.tidak_valid {
            background-color: #ffdddd !important;
        }
    </style>
</head>

<body>
    <!-- CONTAINER -->
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="row g-0 justify-content-center" style="height: 85vh;">
            <!-- TITLE -->
            <div class="col-lg-4 offset-lg-1 mx-0 px-0 shadow " style="overflow-y: hidden; height: 100%;">
                <div id="title-container">
                    <img class="template-image" src="<?= base_url('assets'); ?>/img/template/<?= $template['tema']; ?>">
                    <h2 class="mb-2 text-uppercase"><?= str_replace('-', ' ', $template['nama_template']); ?></h2>
                    <h3>Website Undangan Pernikahan</h3>
                </div>
            </div>
            <!-- FORMS -->
            <div class="col-lg-8 mx-0 px-0" style="overflow-y: scroll; height: 100%;">
                <div class="progress">
                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%"></div>
                </div>
                <div id="qbox-container">
                    <form action="<?= current_url(); ?>" class="needs-validation" id="form-wrapper" method="post" name="form-wrapper" enctype="multipart/form-data">
                        <!-- STEPS HERE -->
                        <div id="steps-container">
                            <!-- Mempelai Pria -->
                            <div class="step" style="width: 100%;">
                                <div class="judul text-center">
                                    <h3 class="fw-bold text-uppercase">data mempelai pria</h3>
                                </div>
                                <div class="mt-5">
                                    <label class="form-label fw-normal fst-italic">FOTO PRIA</label>
                                    <input class="form-control" id="foto_pria" name="foto_pria" type="file">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic">NAMA LENGKAP</label>
                                    <input class="form-control" id="nama_lengkap_pria" name="nama_lengkap_pria" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic">NAMA PANGGILAN</label>
                                    <input class="form-control" id="nama_panggilan_pria" name="nama_panggilan_pria" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic">NAMA PANGGILAN AYAH</label>
                                    <input class="form-control" id="ayah_pria" name="ayah_pria" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic">NAMA PANGGILAN IBU</label>
                                    <input class="form-control" id="ibu_pria" name="ibu_pria" type="text">
                                </div>
                            </div>

                            <!-- Mempelai Wanita -->
                            <div class="step" style="width: 100%;">
                                <div class="judul text-center">
                                    <h3 class="fw-bold text-uppercase">data mempelai wanita</h3>
                                </div>
                                <div class="mt-5">
                                    <label class="form-label fw-normal fst-italic text-uppercase">foto wanita</label>
                                    <input class="form-control" id="foto_wanita" name="foto_wanita" type="file">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic">NAMA LENGKAP</label>
                                    <input class="form-control" id="nama_lengkap_wanita" name="nama_lengkap_wanita" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic">NAMA PANGGILAN</label>
                                    <input class="form-control" id="nama_panggilan_wanita" name="nama_panggilan_wanita" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic">NAMA PANGGILAN AYAH</label>
                                    <input class="form-control" id="ayah_wanita" name="ayah_wanita" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic">NAMA PANGGILAN IBU</label>
                                    <input class="form-control" id="ibu_wanita" name="ibu_wanita" type="text">
                                </div>
                            </div>

                            <!-- Jadwal Akad -->
                            <div class="step" style="width: 100%;">
                                <div class="judul text-center">
                                    <h3 class="fw-bold text-uppercase">jadwal akad</h3>
                                </div>
                                <div class="mt-5">
                                    <label class="form-label fw-normal fst-italic">TANGGAL</label>
                                    <input class="form-control" id="datepicker" name="tanggal_akad" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic">JAM</label>
                                    <input class="form-control" id="timepicker" name="jam_akad" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic text-uppercase">lokasi google maps</label>
                                    <input class="form-control" id="lokasi_akad" name="lokasi_akad" type="text" placeholder="paste link google maps lokasi">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic text-uppercase">embed lokasi maps</label>
                                    <input class="form-control" id="lokasi_akad_embed" name="lokasi_akad_embed" type="text" placeholder="paste script embed">
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
                            </div>

                            <!-- Jadwal Resepsi -->
                            <div class="step" style="width: 100%;">
                                <div class="judul text-center">
                                    <h3 class="fw-bold text-uppercase">jadwal resepsi</h3>
                                </div>
                                <div class="mt-5">
                                    <label class="form-label fw-normal fst-italic">TANGGAL</label>
                                    <input class="form-control" id="datepicker2" name="tanggal_resepsi" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic">JAM</label>
                                    <input class="form-control" id="timepicker2" name="jam_resepsi" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic text-uppercase">lokasi google maps</label>
                                    <input class="form-control" id="lokasi_resepsi" name="lokasi_resepsi" type="text" placeholder="paste link google maps lokasi">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic text-uppercase">embed lokasi maps</label>
                                    <input class="form-control" id="lokasi_resepsi_embed" name="lokasi_resepsi_embed" type="text" placeholder="paste script embed">
                                </div>
                            </div>
                            <div class="step" style="width: 100%;">
                                <div class="judul text-center">
                                    <h3 class="fw-bold text-uppercase">Upload Foto - foto prewedd</h3>
                                </div>
                                <div class="card mt-5">
                                    <div class="card-body">
                                        <input id="image-uploadify" type="file" accept="image/*" name="foto[]" multiple>
                                    </div>
                                </div>
                            </div>
                            <div class="step" style="width: 100%;">
                                <div class="judul text-center">
                                    <h3 class="fw-bold text-uppercase">Upload video prewedd</h3>
                                </div>
                                <div class="mt-5">
                                    <label class="form-label fw-normal fst-italic text-uppercase">Video Youtube</label>
                                    <input class="form-control" id="video_youtube" name="video_youtube" type="text" placeholder="paste link video">
                                </div>
                            </div>
                            <div class="step" style="width: 100%;">
                                <div class="judul text-center">
                                    <h3 class="fw-bold text-uppercase">data Kirim Kado</h3>
                                </div>
                                <div class="mt-5">
                                    <label class="form-label fw-normal fst-italic">LINK GOOGLE MAPS</label>
                                    <input class="form-control" id="alamat_kado" name="alamat_kado" type="text" placeholder="paste link maps">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic text-uppercase">embed lokasi maps</label>
                                    <input class="form-control" id="embed_alamat_kado" name="embed_alamat_kado" type="text" placeholder="paste script embed">
                                </div>
                                <div class="judul text-center mt-5">
                                    <h3 class="fw-bold text-uppercase">Virtual akun 1</h3>
                                </div>
                                <div class="mt-5">
                                    <label class="form-label fw-normal fst-italic">NAMA VIRTUAL AKUN</label>
                                    <input class="form-control" id="nama_VA" name="nama_VA_1" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic">NOMER VIRTUAL AKUN</label>
                                    <input class="form-control" id="nomer_VA" name="nomer_VA_1" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic text-uppercase">ATAS NAMA</label>
                                    <input class="form-control" id="atas_nama" name="atas_nama_1" type="text">
                                </div>
                                <div id="VA_berikutnya">
                                </div>
                                <div class="tombol text-end mt-5">
                                    <button type="button" class="btn btn-sm btn-primary" id="tambah">Tambah 1</button>
                                    <button type="button" class="btn btn-sm btn-primary" id="hapus">Hapus 1</button>
                                </div>
                                <input type="hidden" id="total_VA" name="total_VA" value="1">
                            </div>
                            <div class="step" style="width: 100%;">
                                <div class="judul text-center">
                                    <h3 class="fw-bold text-uppercase">Kelengkapan website</h3>
                                </div>
                                <div class="mt-5">
                                    <label class="form-label fw-normal fst-italic">KATA PENGANTAR</label>
                                    <textarea class="form-control" id="kata_pengantar" name="kata_pengantar" type="text" rows="5" placeholder="Ketik atau lihat contekan"></textarea>
                                </div>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-info" id="contek">lihat contekan</button>
                                </div>
                                <div class="mt-2 d-none" id="output-contek">
                                    <select class="form-select" id="contekan">
                                        <option selected>Open this select menu</option>
                                        <?php foreach ($contekan as $contekan) : ?>
                                            <option value="<?= $contekan['kata_pengantar']; ?>" style="word-wrap:break-word !importent"><?= substr($contekan['kata_pengantar'], 0, 35); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="step">
                                <div class="mt-1">
                                    <div class="closing-text text-white">
                                        <h2 style="color: #49FF00 !important">Selamat!</h2>
                                        <p>satu langkah lagi website anda jadi</p>
                                        <p>Click submit untuk melanjutkan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="q-box__buttons">
                            <button id="prev-btn" type="button">Previous</button>
                            <button id="next-btn" type="button">Next</button>
                            <button id="submit-btn" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="preloader-wrapper">
        <div id="preloader"></div>
        <div class="preloader-section section-left"></div>
        <div class="preloader-section section-right"></div>
    </div>


    <script src="<?= base_url('assets'); ?>/vendor/bootstrap-material-datetimepicker/js/moment.min.js"></script>
    <script src="<?= base_url('assets'); ?>/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
    <script src="<?= base_url('assets'); ?>/js/form-steps.js"></script>
    <script src="<?= base_url('assets'); ?>/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets'); ?>/vendor/Drag-And-Drop/dist/imageuploadify.min.js"></script>
    <script>
        $(function() {
            $('#datepicker').bootstrapMaterialDatePicker({
                time: false,
                format: 'DD MMMM YYYY'
            });
            $('#timepicker').bootstrapMaterialDatePicker({
                date: false,
                format: 'HH:mm'
            });
            $('#datepicker2').bootstrapMaterialDatePicker({
                time: false,
                format: 'DD MMMM YYYY'
            });
            $('#timepicker2').bootstrapMaterialDatePicker({
                date: false,
                format: 'HH:mm'
            });
        });
    </script>
    <!-- image upliadify -->
    <script>
        $(document).ready(function() {
            $('#image-uploadify').imageuploadify();
        })
    </script>

    <!-- tambah & hapus input -->
    <script>
        $('#tambah').on('click', tambah);
        $('#hapus').on('click', hapus);

        function tambah() {
            var no_baru = parseInt($('#total_VA').val()) + 1;
            var input_baru = `
            <div class="mt-5" id="VA_` + no_baru + `">
                <div class="judul text-center">
                    <h3 class="fw-bold text-uppercase">Virtual akun ` + no_baru + `</h3>
                </div>
                <div class="mt-5">
                    <label class="form-label fw-normal fst-italic">NAMA VIRTUAL AKUN</label>
                    <input class="form-control" id="nama_VA" name="nama_VA_` + no_baru + `" type="text">
                </div>
                <div class="mt-2">
                    <label class="form-label fw-normal fst-italic">NOMER VIRTUAL AKUN</label>
                    <input class="form-control" id="nomer_VA" name="nomer_VA_` + no_baru + `" type="text">
                </div>
                <div class="mt-2">
                    <label class="form-label fw-normal fst-italic text-uppercase">ATAS NAMA</label>
                    <input class="form-control" id="atas_nama" name="atas_nama_` + no_baru + `" type="text">
                </div>
            </div>
            `;

            $('#VA_berikutnya').append(input_baru);

            $('#total_VA').val(no_baru);
        }

        function hapus() {
            var no_terakhir = $('#total_VA').val();

            if (no_terakhir > 1) {
                $('#VA_' + no_terakhir).remove();
                $('#total_VA').val(no_terakhir - 1);
            }
        }

        // contekan kata pengantar
        $('#contek').on('click', function() {
            $('#output-contek').toggleClass('d-none');
            $('#contekan').change(function() {
                $('#contekan :selected').each(function() {
                    $('#kata_pengantar').val($(this).val())
                })
            });
        })
    </script>

    <!-- on submit -->
    <script>
        form.submit(function(e) {
            let fd = new FormData();
            $.ajax({
                url: e.attr("action"),
                type: e.attr("method"),
                data: fd,
                async: false,
                cache: false,
                contentType: false,
                success: function(result) {
                    console.log(result);
                }
            })

        });
    </script>
</body>

</html>