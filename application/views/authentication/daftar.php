<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon  -->
    <link rel="icon" href="<?= base_url('assets'); ?>/img/logo.ico">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets'); ?>/css/default/bootstrap.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets'); ?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets'); ?>/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets'); ?>/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets'); ?>/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets'); ?>/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets'); ?>/css/auth.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="<?= base_url('authentication/login'); ?>" metode="POST">
                    <div class="text-center mb-3">
                        <img src="<?= base_url('assets'); ?>/img/logo.png" alt="">
                    </div>
                    <span class="login100-form-title">
                        Daftar Your Wedding
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Nama lengkap wajib di isi">
                        <input class="input100" type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama lengkap">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Jenis kelamin wajib di isi">
                        <select class="input100" name="jenis_kelamin" id="jenis_kelamin">
                            <option selected value="">Pilih jenis kelamin</option>
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fas fa-venus-mars" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="isi email dengan format email@gmail.com">
                        <input class="input100" type="text" name="email" id="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password wajib di isi">
                        <input class="input100" type="password" name="password" id="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password konfirm wajib di isi">
                        <input class="input100" type="password" name="password_konfirmasi" id="password_konfirmasi" placeholder="Password konfirmasi">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="button" id="daftar">
                            Daftar
                        </button>
                    </div>
                    <div class="text-center p-t-45">
                        <a class="txt2" href="<?= base_url('authentication/login'); ?>">
                            <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
                            Login akun
                        </a>
                    </div>
                </form>
                <div class="login100-pic js-tilt p-t-130" data-tilt>
                    <img src="<?= base_url('assets'); ?>/img/img-01.png" alt="IMG">
                </div>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets'); ?>/js/popper.min.js"></script>
    <script src="<?= base_url('assets'); ?>/js/default/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets'); ?>/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets'); ?>/vendor/tilt/tilt.jquery.min.js"></script>
    <script src="<?= base_url('assets'); ?>/vendor/sweetalert/sweetalert.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script>
        var input = $('.validate-input .input100');

        $('#daftar').on('click', function() {
            var check = true;

            for (var i = 0; i < input.length; i++) {
                if (validate(input[i]) == false) {
                    showValidate(input[i]);
                    check = false;
                }
            }

            if (check) {
                if ($('#password').val() === $('#password_konfirmasi').val()) {
                    let data = {
                        nama_lengkap: $('#nama_lengkap').val(),
                        jenis_kelamin: $('#jenis_kelamin').val(),
                        email: $('#email').val(),
                        password: $('#password').val(),
                    }
                    $.ajax({
                        url: '<?= base_url('authentication/daftarAct'); ?>',
                        type: 'POST',
                        data: data,
                        dataType: 'JSON',
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
                                    window.location.replace(output.link);
                                }, 2000)
                            }
                        }
                    })
                } else {
                    swal('Opss..!', 'Password konfirmasi harus sama', {
                        icon: 'error',
                        buttons: {
                            confirm: {
                                className: 'btn btn-danger',
                            }
                        }
                    })
                }
            }
        });
        $('.validate-form .input100').each(function() {
            $(this).focus(function() {
                hideValidate(this);
            });
        });

        function validate(input) {
            if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
                if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                    return false;
                }
            } else {
                if ($(input).val().trim() == '') {
                    return false;
                }
            }
        }

        function showValidate(input) {
            var thisAlert = $(input).parent();

            $(thisAlert).addClass('alert-validate');
        }

        function hideValidate(input) {
            var thisAlert = $(input).parent();

            $(thisAlert).removeClass('alert-validate');
        }
    </script>

</body>

</html>