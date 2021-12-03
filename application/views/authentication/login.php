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
                <div class="login100-pic js-tilt p-t-60" data-tilt>
                    <img src="<?= base_url('assets'); ?>/img/img-01.png" alt="IMG">
                </div>
                <form class="login100-form validate-form" action="<?= base_url('authentication/login'); ?>" metode="POST">
                    <div class="text-center mb-3">
                        <img src="<?= base_url('assets'); ?>/img/logo.png" alt="">
                    </div>
                    <span class="login100-form-title">
                        Login Your Wedding
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="email tidak valid">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password wajib di isi">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" id="login" type="button">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="#">
                            Password?
                        </a>
                    </div>

                    <div class="text-center p-t-45">
                        <a class="txt2" href="<?= base_url('authentication/daftar'); ?>">
                            Buat akun
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
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
    <script src="<?= base_url('assets'); ?>/js/auth.js"></script>
    <script>
        $('#login').on('click', function() {
            data = {
                email: $('input[name="email"]').val(),
                password: $('input[name="password"]').val(),
            }
            $.ajax({
                url: '<?= base_url('authentication/loginAct') ?>',
                data: data,
                type: 'POST',
                dataType: 'JSON',
                success: function(output) {
                    swal(output.judul, output.pesan, {
                        icon: output.status,
                        buttons: {
                            confirm: {
                                className: output.button
                            }
                        }
                    })
                    if (output.status == "success") {
                        let dashboard = '<?= base_url(); ?>' + output.link;
                        setTimeout(function() {
                            window.location.replace(dashboard)
                        }, 2000);


                    }
                }
            })
        })
    </script>

</body>

</html>