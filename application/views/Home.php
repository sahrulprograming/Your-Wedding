<!-- Header -->
<header id="header" class="header">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-6 mb-5">
				<div class="text-container">
					<h1 class="h1-large">Solusi Template Undangan Online</h1>
					<p class="p-large"><span class="text-primary">Your Wedding</span> penyedia template undangan pernikahan online, juga tersedia custom website sesuai keinginan</p>
					<a class="btn-solid-reg page-scroll" href="<?= base_url('customer/undangan/tambah'); ?>">BUAT</a>
					<a class="btn-outline-reg page-scroll" href="#demo">DEMO</a>
				</div>
			</div>
			<div class="col-lg-4">
				<!-- Text Slider -->
				<div class="slider-container">
					<div class="swiper-container text-slider">
						<div class="swiper-wrapper">
							<!-- Slide -->
							<?php $i = 0;
							foreach ($template as $t) :
								$i++; ?>
								<div class="swiper-slide">
									<div class="row justify-content-center">
										<div class="col">
											<div class="text-center">
												<a href="<?= base_url('demo/index/' . $i . '/john_merlin'); ?>">
													<img class="img-fluid" src="<?= base_url('assets'); ?>/img/template/<?= $t['tema']; ?>" alt="<?= $t['nama_template']; ?>" width="240">
												</a>
											</div> <!-- end of image-container -->
										</div> <!-- end of col -->
									</div> <!-- end of row -->
								</div> <!-- end of swiper-slide -->
							<?php endforeach; ?>
						</div> <!-- end of swiper-wrapper -->

						<!-- Add Arrows -->
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
						<!-- end of add arrows -->

					</div> <!-- end of swiper-container -->
				</div> <!-- end of slider-container -->
				<!-- end of text slider -->

			</div> <!-- end of col -->
		</div> <!-- end of row -->
	</div> <!-- end of container -->
</header> <!-- end of header -->
<!-- end of header -->


<!-- Features -->
<div id="fitur" class="cards-1 bg-dark-blue">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="h2-heading">Fitur Template</h2>
				<p class="p-heading">your wedding menyediakan fitur - fitur menarik untuk menarik para pengunjung dan memuaskan anda. berikut ini adalah fitur yang akan ada dalam undangan anda</p>
			</div> <!-- end of div -->
		</div> <!-- end of row -->
		<div class="row">
			<div class="col-lg-12">
				<!-- Card -->
				<div class="card">
					<div class="card-image">
						<i class="fas fa-camera-retro"></i>
					</div>
					<div class="card-body">
						<h5 class="card-title">PHOTO GALERY & VIDEO</h5>
						<p>anda bisa melakukan upload foto prewedding dan video prewedding kedalam undangan
						</p>
					</div>
				</div>
				<!-- end of card -->
				<!-- Card -->
				<div class="card">
					<div class="card-image">
						<i class="fas fa-music"></i>
					</div>
					<div class="card-body">
						<h5 class="card-title">BACKSOUND</h5>
						<p>Undangan anda akan tersedia music backsound untuk memperindah tampilan</p>
					</div>
				</div>
				<!-- end of card -->
				<!-- Card -->
				<div class="card">
					<div class="card-image">
						<i class="fas fa-gift"></i>
					</div>
					<div class="card-body">
						<h5 class="card-title">KIRIM HADIAH</h5>
						<p>pengunjung bisa mengirim hadiah melalui virtual account anda atau alamat untuk hadiah berupa barang</p>
					</div>
				</div>
				<div class="card">
					<div class="card-image">
						<i class="fas fa-map-marked-alt"></i>
					</div>
					<div class="card-body">
						<h5 class="card-title">ALAMAT MAPS</h5>
						<p>Dengan Alamat berupa maps pengunjung akan lebih mudah mengetahui lokasi acara</p>
					</div>
				</div>
				<div class="card">
					<div class="card-image">
						<i class="fas fa-user-check"></i>
					</div>
					<div class="card-body">
						<h5 class="card-title">KEHADIRAN & BUKU TAMU</h5>
						<p>Pengunjung dapat melakukan kehadiran untuk memastikan diri hadir</p>
					</div>
				</div>
				<div class="card">
					<div class="card-image">
						<i class="fas fa-copy"></i>
					</div>
					<div class="card-body">
						<h5 class="card-title">PROFILE SINGKAT MEMPELAI</h5>
						<p>Anda Juga dapat menceritakan profile singkat tentang diri anda atau pasangan anda didalam undangan</p>
					</div>
				</div>
			</div>
			<!-- end of card -->
		</div> <!-- end of col -->
	</div> <!-- end of row -->
</div> <!-- end of container -->
</div> <!-- end of cards-1 -->
<!-- end of features -->

<div class="slider-1" id="demo">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header mb-5 text-center">
						<h3>Demo Template</h3>
					</div>
					<div class="card-body">
						<div class="slider-container">
							<div class="swiper-container card-slider">
								<div class="swiper-wrapper">
									<!-- Slide -->
									<?php $i = 0;
									foreach ($template as $t) :
										$i++; ?>
										<div class="swiper-slide">
											<div class="row justify-content-center">
												<div class="col">
													<div class="text-center">
														<a href="<?= base_url('demo/index/' . $i . '/john_merlin'); ?>">
															<img class="img-fluid" src="<?= base_url('assets'); ?>/img/template/<?= $t['tema']; ?>" alt="<?= $t['nama_template']; ?>" width="240">
														</a>
													</div> <!-- end of image-container -->
												</div> <!-- end of col -->
											</div> <!-- end of row -->
										</div> <!-- end of swiper-slide -->
									<?php endforeach; ?>
								</div> <!-- end of swiper-wrapper -->

								<!-- Add Arrows -->
								<div class="swiper-button-next"></div>
								<div class="swiper-button-prev"></div>
								<!-- end of add arrows -->

							</div> <!-- end of swiper-container -->
						</div>
					</div>
				</div>
				<!-- Card Slider -->
				<!-- end of slider-container -->
				<!-- end of card slider -->

			</div> <!-- end of col -->
		</div> <!-- end of row -->
	</div> <!-- end of container -->
</div>

<!-- Details 1 -->
<div id="harga" class="basic-1 bg-dark-blue">
	<div class="container">
		<div class="row text-center align-items-end">
			<!-- Pricing Table-->
			<div class="col-lg-4 mb-5 mb-lg-0">
				<div class="bg-white p-5 rounded-lg shadow text-dark">
					<h1 class="h6 text-uppercase font-weight-bold mb-4">Basic Publish</h1>
					<h2 class="h1 font-weight-bold">Rp 100.000<span class="text-small font-weight-normal ml-2">/ Minggu</span></h2>

					<div class="custom-separator my-4 mx-auto bg-primary"></div>

					<ul class="list-unstyled my-5 text-small text-left">
						<li class="mb-3">
							<i class="fa fa-check mr-2 text-primary"></i> Unlimated Pengunjung
						</li>
						<li class="mb-3">
							<i class="fa fa-check mr-2 text-primary"></i> Buku tamu gratis
						</li>
						<li class="mb-3">
							<i class="fa fa-check mr-2 text-primary"></i> backsound music
						</li>
						<li class="mb-3">
							<i class="fa fa-check mr-2 text-primary"></i> kirim hadiah virtual account
						</li>
					</ul>
					<a href="<?= base_url('customer/undangan/tambah'); ?>" class="btn btn-primary btn-block p-2 shadow rounded-pill">Beli</a>
				</div>
			</div>
			<div class="col-lg-4 mb-5 mb-lg-0">
				<div class="bg-white p-5 rounded-lg shadow text-dark">
					<h1 class="h6 text-uppercase font-weight-bold mb-4">Pro Publish</h1>
					<h2 class="h1 font-weight-bold">Rp 200.000<span class="text-small font-weight-normal ml-2">/ bulan</span></h2>

					<div class="custom-separator my-4 mx-auto bg-primary"></div>

					<ul class="list-unstyled my-5 text-small text-left">
						<li class="mb-3">
							<i class="fa fa-check mr-2 text-primary"></i> Unlimated Pengunjung
						</li>
						<li class="mb-3">
							<i class="fa fa-check mr-2 text-primary"></i> Buku tamu gratis
						</li>
						<li class="mb-3">
							<i class="fa fa-check mr-2 text-primary"></i> backsound music
						</li>
						<li class="mb-3">
							<i class="fa fa-check mr-2 text-primary"></i> kirim hadiah virtual account
						</li>
					</ul>
					<a href="<?= base_url('customer/undangan/tambah'); ?>" class="btn btn-primary btn-block p-2 shadow rounded-pill">Beli</a>
				</div>
			</div>
			<div class="col-lg-4 mb-5 mb-lg-0">
				<div class="bg-white p-5 rounded-lg shadow text-dark">
					<h1 class="h6 text-uppercase font-weight-bold mb-4">Enterprise Publish</h1>
					<h2 class="h1 font-weight-bold">Rp 500.000<span class="text-small font-weight-normal ml-2">/ setengah tahun</span></h2>

					<div class="custom-separator my-4 mx-auto bg-primary"></div>

					<ul class="list-unstyled my-5 text-small text-left">
						<li class="mb-3">
							<i class="fa fa-check mr-2 text-primary"></i> Unlimated Pengunjung
						</li>
						<li class="mb-3">
							<i class="fa fa-check mr-2 text-primary"></i> Buku tamu gratis
						</li>
						<li class="mb-3">
							<i class="fa fa-check mr-2 text-primary"></i> backsound music
						</li>
						<li class="mb-3">
							<i class="fa fa-check mr-2 text-primary"></i> kirim hadiah virtual account
						</li>
					</ul>
					<a href="<?= base_url('customer/undangan/tambah'); ?>" class="btn btn-primary btn-block p-2 shadow rounded-pill">Beli</a>
				</div>
			</div>
			<!-- END -->
		</div>
		<div class="row text-center align-items-end justify-content-center my-3">
			<!-- Pricing Table-->
			<div class="col-lg-4 mb-5 mb-lg-0">
				<div class="bg-white p-5 rounded-lg shadow text-dark">
					<h1 class="h6 text-uppercase font-weight-bold mb-4">Custom Website</h1>
					<h2 class="h1 font-weight-bold">Rp 50.000<span class="text-small font-weight-normal ml-2">/ Fitur</span></h2>

					<div class="custom-separator my-4 mx-auto bg-primary"></div>

					<ul class="list-unstyled my-5 text-small text-left">
						<li class="mb-3">
							<i class="fa fa-check mr-2 text-primary"></i> terima jadi
						</li>
						<li class="mb-3">
							<i class="fa fa-check mr-2 text-primary"></i> deign sesuai keinginan
						</li>
						<li class="mb-3">
							<i class="fa fa-check mr-2 text-primary"></i> fitur sesuai permintaan
						</li>
						<li class="mb-3">
							<i class="fa fa-check mr-2 text-primary"></i> backsound music custom
						</li>
						<li class="mb-3">
							<i class="fa fa-check mr-2 text-primary"></i> Semuanya terserah anda
						</li>
					</ul>
					<a href="<?= base_url('customer/undangan/tambah'); ?>" class="btn btn-primary btn-block p-2 shadow rounded-pill">Beli</a>
				</div>
			</div>
			<!-- END -->
		</div>
	</div>
</div>
<!-- end of basic-1 -->
<!-- end of details 1 -->

<!-- Footer -->
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="footer-col first">
					<h6>Tentang Your Wedding</h6>
					<p class="p-small">Your Wedding Merupakan platform penyedia design template undangan pernikahan secara online pembayaran hanya akan di kenakan pada saat publishing</p>
				</div> <!-- end of footer-col -->
				<div class="footer-col second">
					<h6>Note</h6>
					<ul class="list-unstyled li-space-lg p-small">
						<p>design di website ini GRATIS bayar hanya untuk publish</p>
					</ul>
				</div> <!-- end of footer-col -->
				<div class="footer-col third">
					<span class="fa-stack">
						<a href="#your-link">
							<i class="fas fa-circle fa-stack-2x"></i>
							<i class="fab fa-facebook-f fa-stack-1x"></i>
						</a>
					</span>
					<span class="fa-stack">
						<a href="#your-link">
							<i class="fas fa-circle fa-stack-2x"></i>
							<i class="fab fa-twitter fa-stack-1x"></i>
						</a>
					</span>
					<span class="fa-stack">
						<a href="#your-link">
							<i class="fas fa-circle fa-stack-2x"></i>
							<i class="fab fa-pinterest-p fa-stack-1x"></i>
						</a>
					</span>
					<span class="fa-stack">
						<a href="#your-link">
							<i class="fas fa-circle fa-stack-2x"></i>
							<i class="fab fa-instagram fa-stack-1x"></i>
						</a>
					</span>
					<p class="p-small">Follow Social Media Kami<br><a href="customercare@yourwedding.com"><strong>customercare@yourwedding.com</strong></a></p>
				</div> <!-- end of footer-col -->
			</div> <!-- end of col -->
		</div> <!-- end of row -->
	</div> <!-- end of container -->
</div> <!-- end of footer -->
<!-- end of footer -->