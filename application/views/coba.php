<?php
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

</body>

</html>

<!-- <!DOCTYPE html>
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

    print_r($_POST);
    print_r($_FILES);
    ?>

    <form id="data" method="post" enctype="multipart/form-data">
        <input type="text" name="first" value="Bob" />
        <input type="text" name="middle" value="James" />
        <input type="text" name="last" value="Smith" />
        <input name="image" type="file" id="image" multiple />
        <button type="submit">Submit</button>
    </form>
    <script>
        const fileSelector = $('#image');
        const fd = new FormData();
        let ke = 0;
        fileSelector.on('change', (event) => {
            const fileList = event.target.files;
            console.log(fileList);
            console.log(fileList[0]);
            console.log(fileList.length);
            if (fileList.length > 1) {
                for (let i = 0; i < fileList.length; i++) {
                    fd.append('image_' + ke, fileList[i]);
                    ke++
                }
            }
            fd.append('image_' + ke, fileList[0]);
            console.log(fd.get('image_' + ke));
            ke++

        });
    </script>
    <script>
        $("form#data").submit(function(e) {
            $.ajax({
                url: window.location.href,
                data: fd.getAll('image'),
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

</html> -->