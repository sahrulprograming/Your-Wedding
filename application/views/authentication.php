<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/auth.css">
    <script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
    <!-- Favicon  -->
    <link rel="icon" href="<?= base_url('assets'); ?>/img/logo.ico">
    <title>Authentication</title>

</head>

<body>
    <?= $this->session->flashdata('notif'); ?>

    <div class="form">

        <ul class="tab-group">
            <li class="tab active"><a href="#login">LOGIN</a></li>
            <li class="tab"><a href="#signup">DAFTAR</a></li>
        </ul>

        <div class="tab-content">
            <div id="login">
                <h1>Login <?= nama_web(); ?>!</h1>
                <form action="<?= base_url('authentication/login'); ?>" method="post">
                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input type="email" required autocomplete="off" name="email" value="<?= set_value('email'); ?>" />
                    </div>

                    <div class="field-wrap">
                        <label>
                            Password<span class="req">*</span>
                        </label>
                        <input type="password" required autocomplete="off" name="password" />
                    </div>

                    <button class="button button-block" />Login</button>
                </form>

            </div>
            <div id="signup">
                <h1>Daftar <?= nama_web(); ?>!</h1>

                <form action="<?= base_url('authentication/daftar'); ?>" method="post">

                    <div class="field-wrap">
                        <label>
                            Nama Lengkap<span class="req">*</span>
                        </label>
                        <input type="text" required autocomplete="off" name="nama_lengkap" value="<?= set_value('nama_lengkap'); ?>" />
                        <?= form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Nama Lengkap<span class="req">*</span>
                        </label>
                        <select class="form-select" name="jenis_kelamin" required>
                            <option value="<?= set_value('jenis_kelamin'); ?>" selected><?= set_value('jenis_kelamin') ? (set_value('jenis_kelamin') == "L" ? "Laki - Laki" : "Perempuan") : "Jenis kelamin"; ?></option>
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input type="email" required autocomplete="off" name="email" <?= set_value('email'); ?> />
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Password<span class="req">*</span>
                        </label>
                        <input type="password" required autocomplete="off" name="password" />
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="field-wrap">
                        <label>
                            Konfirmasi Password<span class="req">*</span>
                        </label>
                        <input type="password" required autocomplete="off" name="konfirmasi_password" />
                        <?= form_error('konfirmasi_password', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <button type="submit" class="button button-block">Daftar</button>

                </form>

            </div>

        </div><!-- tab-content -->

    </div> <!-- /form -->
</body>

<script>
    $('.form').find('input, textarea').on('keyup blur focus', function(e) {

        var $this = $(this),
            label = $this.prev('label');

        if (e.type === 'keyup') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.addClass('active highlight');
            }
        } else if (e.type === 'blur') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.removeClass('highlight');
            }
        } else if (e.type === 'focus') {

            if ($this.val() === '') {
                label.removeClass('highlight');
            } else if ($this.val() !== '') {
                label.addClass('highlight');
            }
        }

    });

    $('.tab a').on('click', function(e) {

        e.preventDefault();

        $(this).parent().addClass('active');
        $(this).parent().siblings().removeClass('active');

        target = $(this).attr('href');

        $('.tab-content > div').not(target).hide();

        $(target).fadeIn(600);

    });
</script>

<script src="<?= base_url('assets'); ?>/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>

</html>