<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bootstrap 5: COVID-19 Self Checker Multi-step Form</title>
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
</head>

<body>
    <!-- CONTAINER -->
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="row g-0 justify-content-center border border-white" style="height: 85vh;">
            <!-- TITLE -->
            <div class="col-lg-4 offset-lg-1 mx-0 px-0">
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
                    <form class="needs-validation" id="form-wrapper" method="post" name="form-wrapper">
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
                                    <input class="form-control" id="nama_lengkap" name="nama_lengkap" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic">NAMA PANGGILAN</label>
                                    <input class="form-control" id="nama_panggilan" name="nama_panggilan" type="text">
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
                                    <input class="form-control" id="nama_lengkap" name="nama_lengkap" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic">NAMA PANGGILAN</label>
                                    <input class="form-control" id="nama_panggilan" name="nama_panggilan" type="text">
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
                                    <input class="form-control" id="datepicker" neme="tanggal_akad" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic">JAM</label>
                                    <input class="form-control" id="timepicker" name="jam_akad" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic text-uppercase">lokasi google maps</label>
                                    <input class="form-control" id="lokasi_akad" name="lokasi_akad" type="text" placeholder="paste link google maps lokasi">
                                </div>
                            </div>

                            <!-- Jadwal Resepsi -->
                            <div class="step" style="width: 100%;">
                                <div class="judul text-center">
                                    <h3 class="fw-bold text-uppercase">jadwal resepsi</h3>
                                </div>
                                <div class="mt-5">
                                    <label class="form-label fw-normal fst-italic">TANGGAL</label>
                                    <input class="form-control" id="datepicker" neme="tanggal_resepsi" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic">JAM</label>
                                    <input class="form-control" id="timepicker" name="jam_resepsi" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label fw-normal fst-italic text-uppercase">lokasi google maps</label>
                                    <input class="form-control" id="lokasi_resepsi" name="lokasi_resepsi" type="text" placeholder="paste link google maps lokasi">
                                </div>
                            </div>
                            <div class="step" style="width: 100%;">
                                <div class="judul text-center">
                                    <h3 class="fw-bold text-uppercase">Upload Foto - foto prewedd</h3>
                                </div>
                                <div class="card mt-5">
                                    <div class="card-body">
                                        <input id="image-uploadify" type="file" accept="image/*" multiple>
                                    </div>
                                </div>
                            </div>
                            <div class="step" style="width: 100%;">
                                <div class="judul text-center">
                                    <h3 class="fw-bold text-uppercase">Upload video prewedd</h3>
                                </div>
                                <div class="mt-5">
                                    <label class="form-label fw-normal fst-italic text-uppercase">Video Youtube</label>
                                    <input class="form-control" id="lokasi_akad" name="lokasi_akad" type="text" placeholder="paste link video">
                                </div>
                            </div>
                            <div class="step" style="width: 100%;">
                                <div class="judul text-center">
                                    <h3 class="fw-bold text-uppercase">Virtual akun gift 1</h3>
                                </div>
                                <div class="mt-5">
                                    <label class="form-label fw-normal fst-italic">NAMA VIRTUAL AKUN</label>
                                    <input class="form-control" id="nama_VA" neme="nama_VA_1" type="text">
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
                                <input type="hidden" id="total_VA" value="1">
                            </div>
                            <div class="step" style="width: 100%;">
                                <div class="judul text-center">
                                    <h3 class="fw-bold text-uppercase">Kelengkapan website</h3>
                                </div>
                                <div class="mt-5">
                                    <label class="form-label fw-normal fst-italic">KATA PENGANTAR</label>
                                    <input class="form-control" id="nama_VA" neme="nama_VA_1" type="text">
                                </div>
                            </div>
                            <div class="step">
                                <div class="mt-1">
                                    <div class="closing-text">
                                        <h4>Selamat!</h4>
                                        <p>satu langkah lagi website anda jadi</p>
                                        <p>Click submit untuk melanjutkan.</p>
                                    </div>
                                </div>
                            </div>
                            <div id="success">
                                <div class="mt-5">
                                    <h4>Success! Website anda telah jadi klik di sini untuk melihat!</h4>
                                    <p>Meanwhile, clean your hands often, use soap and water, or an alcohol-based
                                        hand rub, maintain a safe distance from anyone who is coughing or sneezing
                                        and always wear a mask when physical distancing is not possible.</p>
                                    <a class="back-link" href="">Go back from the beginning ➜</a>
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
                    <h3 class="fw-bold text-uppercase">Virtual akun gift ` + no_baru + `</h3>
                </div>
                <div class="mt-5">
                    <label class="form-label fw-normal fst-italic">NAMA VIRTUAL AKUN</label>
                    <input class="form-control" id="nama_VA" neme="nama_VA_` + no_baru + `" type="text">
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
    </script>
</body>

</html>