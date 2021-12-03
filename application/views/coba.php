<!-- <?php
        defined('BASEPATH') or exit('No direct script access allowed');
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>

<body>

    <div id="container">
        <h1>Welcome to Upload Pake CodeIgniter and Jquery!</h1>

        <form action="#">
            <input name='gambar' type='file' id='gambar'>
            <button class='btn-sm btn-primary' id='tambahgambar'>Upload</button>
        </form>
    </div>
    <script>
        $(document).on('change', '#gambar', function(e) {
            e.preventDefault();
            var file_data = $('#gambar').prop('files')[0];
            var form_data = new FormData();

            form_data.append('file', file_data);
            $.ajax({
                url: '<?php echo site_url("unit_test/uploadgambar") ?>', // point to server-side PHP script
                dataType: 'json', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(data, status) {
                    console.log(data);
                    //alert(php_script_response); // display response from the PHP script, if any
                    if (data.status != 'error') {
                        $('#gambar').val('');
                        alert(data.msg);
                    } else {
                        alert(data.msg);
                    }
                }
            });
        })
    </script>

</body> -->

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <?php

    var_dump($_POST);
    var_dump($_FILES);
    ?>

    <form id="data" method="post" enctype="multipart/form-data">
        <input name="image" type="file" id="image" accept="image/*" />
        <button type="button" id="submit">Submit</button>
    </form>
    <script>
        console.log($('form#data')[0])
        $("#submit").on("click", function() {
            $.ajax({
                url: '<?= base_url('coba/data_form'); ?>',
                data: new FormData($('form#data')[0]),
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
</body>

</html>