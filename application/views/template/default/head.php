<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- SEO Meta Tags -->
	<meta name="description" content="Description">
	<meta name="author" content="Author">

	<!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

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
	<!-- Webpage Title -->
	<title><?= $title; ?></title>

	<!-- Styles -->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/css/default/bootstrap.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/css/default/fontawesome-all.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/css/default/swiper.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/css/default/magnific-popup.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/css/default/styles.css" rel="stylesheet">
	<link href="<?= base_url('assets'); ?>/css/default/app.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets'); ?>/css/mycss.css">

	<!-- Favicon  -->
	<link rel="icon" href="<?= base_url('assets'); ?>/img/logo.ico">
</head>

<body data-spy="scroll" data-target=".fixed-top">