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
    <!-- <script>
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
    </script> -->
    <script>
        const fileSelector = $('#image');
        const fd = new FormData();
        fileSelector.on('change', (event) => {
            const fileList = event.target.files;
            console.log(fileList);
            console.log(fileList[0]);
            console.log(fileList.length);
            if (fileList.length > 1) {
                for (let i = 0; i < fileList.length; i++) {
                    fd.append('image', fileList[i]);
                }
            }
            fd.append('image', fileList[0]);
            console.log(fd.getAll('image'));
            console.log(fd.entries());
        });
    </script>

</body>

</html>