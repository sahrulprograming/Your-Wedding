<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/vendor/bootstrap-5/css/bootstrap.min.css">
    <script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
    <title>Document</title>

</head>

<style>
    @import "compass/css3";

    *,
    *:before,
    *:after {
        box-sizing: border-box;
    }

    html {
        overflow-y: scroll;
    }

    body {
        background: #c1bdba;
        font-family: 'Titillium Web', sans-serif;
        background-color: #0b0433;
    }

    a {
        text-decoration: none;
        color: #1ab188;
        transition: 0.5s ease;
    }

    a:hover {
        color: #179b77;
    }

    .form {
        background: rgba(19, 35, 47, 0.9);
        padding: 40px;
        max-width: 600px;
        margin: 40px auto;
        border-radius: 4px;
        box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
    }

    .tab-group {
        list-style: none;
        padding: 0;
        margin: 0 0 40px 0;
    }

    .tab-group:after {
        content: "";
        display: table;
        clear: both;
    }

    .tab-group li a {
        display: block;
        text-decoration: none;
        padding: 15px;
        background: rgba(160, 179, 176, 0.25);
        color: #a0b3b0;
        font-size: 20px;
        float: left;
        width: 50%;
        text-align: center;
        cursor: pointer;
        transition: 0.5s ease;
    }

    .tab-group li a:hover {
        background: #179b77;
        color: #ffffff;
    }

    .tab-group .active a {
        background: #1ab188;
        color: #ffffff;
    }

    .tab-content>div:last-child {
        display: none;
    }

    h1 {
        text-align: center;
        color: #ffffff;
        font-weight: 300;
        margin: 0 0 40px;
    }

    label {
        position: absolute;
        transform: translateY(6px);
        left: 13px;
        color: rgba(255, 255, 255, 0.5);
        transition: all 0.25s ease;
        -webkit-backface-visibility: hidden;
        pointer-events: none;
        font-size: 22px;
    }

    label .req {
        margin: 2px;
        color: #1ab188;
    }

    label.active {
        transform: translateY(50px);
        left: 2px;
        font-size: 14px;
    }

    label.active .req {
        opacity: 0;
    }

    label.highlight {
        color: #ffffff;
    }

    input,
    textarea {
        font-size: 22px;
        display: block;
        width: 100%;
        height: 100%;
        padding: 5px 10px;
        background: none;
        background-image: none;
        border: 1px solid #a0b3b0;
        color: #ffffff;
        border-radius: 0;
        transition: border-color 0.25s ease, box-shadow 0.25s ease;
    }

    input:focus,
    textarea:focus {
        outline: 0;
        border-color: #1ab188;
    }

    textarea {
        border: 2px solid #a0b3b0;
        resize: vertical;
    }

    .field-wrap {
        position: relative;
        margin-bottom: 40px;
    }

    .top-row:after {
        content: "";
        display: table;
        clear: both;
    }

    .top-row>div {
        float: left;
        width: 48%;
        margin-right: 4%;
    }

    .top-row>div:last-child {
        margin: 0;
    }

    .button {
        border: 0;
        outline: none;
        border-radius: 0;
        padding: 15px 0;
        font-size: 2rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        background: #1ab188;
        color: #ffffff;
        transition: all 0.5s ease;
        -webkit-appearance: none;
    }

    .button:hover,
    .button:focus {
        background: #179b77;
    }

    .button-block {
        display: block;
        width: 100%;
    }

    .forgot {
        margin-top: -20px;
        text-align: right;
    }
</style>

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