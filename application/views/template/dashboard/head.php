<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?= $title; ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url('assets'); ?>/img/logo.ico" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="<?= base_url('assets'); ?>/vendor/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['<?= base_url('assets'); ?>/css/dashboard/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/css/dashboard/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/css/dashboard/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/css/dashboard/demo.css">
</head>

<body data-background-color="dark">
	<div class="wrapper sidebar_minimize">