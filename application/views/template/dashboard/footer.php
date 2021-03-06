<!-- Custom template | don't include it in your project! -->
<div class="custom-template">
	<div class="title">Settings</div>
	<div class="custom-content">
		<div class="switcher">
			<div class="switch-block">
				<h4>Logo Header</h4>
				<div class="btnSwitch">
					<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
					<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
					<br />
					<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
					<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
				</div>
			</div>
			<div class="switch-block">
				<h4>Navbar Header</h4>
				<div class="btnSwitch">
					<button type="button" class="changeTopBarColor" data-color="dark"></button>
					<button type="button" class="changeTopBarColor" data-color="blue"></button>
					<button type="button" class="changeTopBarColor" data-color="purple"></button>
					<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
					<button type="button" class="changeTopBarColor" data-color="green"></button>
					<button type="button" class="changeTopBarColor" data-color="orange"></button>
					<button type="button" class="changeTopBarColor" data-color="red"></button>
					<button type="button" class="changeTopBarColor" data-color="white"></button>
					<br />
					<button type="button" class="changeTopBarColor" data-color="dark2"></button>
					<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
					<button type="button" class="changeTopBarColor" data-color="purple2"></button>
					<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
					<button type="button" class="changeTopBarColor" data-color="green2"></button>
					<button type="button" class="changeTopBarColor" data-color="orange2"></button>
					<button type="button" class="changeTopBarColor" data-color="red2"></button>
				</div>
			</div>
			<div class="switch-block">
				<h4>Sidebar</h4>
				<div class="btnSwitch">
					<button type="button" class="selected changeSideBarColor" data-color="white"></button>
					<button type="button" class="changeSideBarColor" data-color="dark"></button>
					<button type="button" class="changeSideBarColor" data-color="dark2"></button>
				</div>
			</div>
			<div class="switch-block">
				<h4>Background</h4>
				<div class="btnSwitch">
					<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
					<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
					<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
					<button type="button" class="changeBackgroundColor" data-color="dark"></button>
				</div>
			</div>
		</div>
	</div>
	<div class="custom-toggle">
		<i class="flaticon-settings"></i>
	</div>
</div>
<!-- End Custom template -->
</div>
<!--   Core JS Files   -->
<script src="<?= base_url('assets'); ?>/js/dashboard/core/popper.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/dashboard/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="<?= base_url('assets'); ?>/vendor/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?= base_url('assets'); ?>/vendor/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Chart JS -->
<script src="<?= base_url('assets'); ?>/vendor/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="<?= base_url('assets'); ?>/vendor/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="<?= base_url('assets'); ?>/vendor/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="<?= base_url('assets'); ?>/vendor/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="<?= base_url('assets'); ?>/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="<?= base_url('assets'); ?>/vendor/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Sweet Alert -->
<script src="<?= base_url('assets'); ?>/vendor/sweetalert/sweetalert.min.js"></script>

<!-- Atlantis JS -->
<script src="<?= base_url('assets'); ?>/js/dashboard/atlantis.min.js"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="<?= base_url('assets'); ?>/js/dashboard/setting-demo.js"></script>
<script src="<?= base_url('assets'); ?>/js/dashboard/demo.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/Drag-And-Drop/dist/imageuploadify.min.js"></script>
<script>
	$('#lineChart').sparkline([102, 109, 120, 99, 110, 105, 115], {
		type: 'line',
		height: '70',
		width: '100%',
		lineWidth: '2',
		lineColor: '#177dff',
		fillColor: 'rgba(23, 125, 255, 0.14)'
	});

	$('#lineChart2').sparkline([99, 125, 122, 105, 110, 124, 115], {
		type: 'line',
		height: '70',
		width: '100%',
		lineWidth: '2',
		lineColor: '#f3545d',
		fillColor: 'rgba(243, 84, 93, .14)'
	});

	$('#lineChart3').sparkline([105, 103, 123, 100, 95, 105, 115], {
		type: 'line',
		height: '70',
		width: '100%',
		lineWidth: '2',
		lineColor: '#ffa534',
		fillColor: 'rgba(255, 165, 52, .14)'
	});

	function hapus_foto(table, field, id, foto) {
		$.ajax({
			url: '<?= base_url('hapus/foto/'); ?>' + table + '/' + field + '/' + id + '/' + foto,
			dataType: 'JSON',
			success: function(result) {
				console.log(result.status);
				console.log(result.pesan);
				if (result.status == 'berhasil') {
					swal("Berhasil!", result.pesan, {
						icon: "success",
						buttons: {
							confirm: {
								className: 'btn btn-success'
							}
						},
					});
				} else {
					swal("Gagal!", result.pesan, {
						icon: "error",
						buttons: {
							confirm: {
								className: 'btn btn-danger'
							}
						},
					});
				}
				galery()
			}
		})
	}

	function hapus_data(table, field, id) {
		$.ajax({
			url: '<?= base_url('hapus/data/'); ?>' + table + '/' + field + '/' + id,
			dataType: 'JSON',
			success: function(hasil) {
				if (hasil.status) {
					swal(hasil.judul, hasil.pesan, {
						icon: hasil.status,
						buttons: {
							confirm: {
								className: hasil.button
							}
						},
					});
				} else {
					swal('Opss...!', 'ada yang salah!', {
						icon: 'error',
						buttons: {
							confirm: {
								className: 'btn btn-danger',
							}
						},
					});
				}
			}
		})

	}
</script>
</body>

</html>