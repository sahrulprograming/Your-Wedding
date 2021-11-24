<div class="main-panel">
    <div class="content">
        <?= $this->session->flashdata('notif'); ?>
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold"><?= $title; ?></h2>
                        <h5 class="text-white op-7 mb-2">Selamat Datang <?= $this->session->userdata('nama'); ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd mt--2">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-interface-6 text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Undangan Saya</p>
                                        <h4 class="card-title"><?= jumlah_data('undangan'); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-interface text-success"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Pengunjung</p>
                                        <h4 class="card-title"><?= dilihat() ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-users text-info"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Tamu</p>
                                        <h4 class="card-title"><?= jumlah_data('v_total_tamu'); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-chat-2 text-primary"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Total Komentar</p>
                                        <h4 class="card-title"><?= jumlah_data('v_semua_komentar'); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools d-flex justify-content-between">
                                <h3>Komentar Undangan Anda</h3>
                                <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm justify-content-end" id="pills-tab-without-border" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-home-nobd" role="tab" aria-controls="pills-home-nobd" aria-selected="true">Hari ini</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab-nobd" data-toggle="pill" href="#pills-profile-nobd" role="tab" aria-controls="pills-profile-nobd" aria-selected="false">Minggu Ini</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#pills-contact-nobd" role="tab" aria-controls="pills-contact-nobd" aria-selected="false">Semua</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                                <div class="tab-pane fade show active" id="pills-home-nobd" role="tabpanel" aria-labelledby="pills-home-tab-nobd">

                                    <?php if ($komentar_hari_ini) : ?>
                                        <?php foreach ($komentar_hari_ini as $k_day) : ?>
                                            <div class="d-flex">
                                                <div class="avatar">
                                                    <span class="avatar-title rounded-circle border border-white bg-info"><?= substr($k_day['nama_pengirim'], 0, 1); ?></span>
                                                </div>
                                                <div class="flex-1 ml-3 pt-1">
                                                    <h6 class="text-uppercase fw-bold mb-1"><?= $k_day['nama_pengirim']; ?> <span class="text-success pl-3">undangan <?= str_replace('_', ' & ', $k_day['url']); ?></span></h6>
                                                    <span class="text-muted"><?= $k_day['pesan']; ?> </span>
                                                </div>
                                                <div class="float-right pt-1">
                                                    <small class="text-muted"><?= $k_day['tanggal_dikirim']; ?></small>
                                                </div>
                                            </div>
                                            <div class="separator-dashed"></div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <div class="text-center">
                                            <h2>Tidak ada komentar</h2>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <div class="tab-pane fade" id="pills-profile-nobd" role="tabpanel" aria-labelledby="pills-profile-tab-nobd">
                                    <?php if ($komentar_minggu_ini) : ?>
                                        <?php foreach ($komentar_minggu_ini as $k_week) : ?>
                                            <div class="d-flex">
                                                <div class="avatar">
                                                    <span class="avatar-title rounded-circle border border-white bg-info"><?= substr($k_week['nama_pengirim'], 0, 1); ?></span>
                                                </div>
                                                <div class="flex-1 ml-3 pt-1">
                                                    <h6 class="text-uppercase fw-bold mb-1"><?= $k_week['nama_pengirim']; ?> <span class="text-success pl-3">undangan <?= str_replace('_', ' & ', $k_week['url']); ?></span></h6>
                                                    <span class="text-muted"><?= $k_week['pesan']; ?> </span>
                                                </div>
                                                <div class="float-right pt-1">
                                                    <small class="text-muted"><?= $k_week['tanggal_dikirim']; ?></small>
                                                </div>
                                            </div>
                                            <div class="separator-dashed"></div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <div class="text-center">
                                            <h2>Tidak ada komentar</h2>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <div class="tab-pane fade" id="pills-contact-nobd" role="tabpanel" aria-labelledby="pills-contact-tab-nobd">
                                    <?php if ($semua_komentar) : ?>
                                        <?php foreach ($semua_komentar as $k_all) : ?>
                                            <div class="d-flex">
                                                <div class="avatar">
                                                    <span class="avatar-title rounded-circle border border-white bg-info"><?= substr($k_all['nama_pengirim'], 0, 1); ?></span>
                                                </div>
                                                <div class="flex-1 ml-3 pt-1">
                                                    <h6 class="text-uppercase fw-bold mb-1"><?= $k_all['nama_pengirim']; ?> <span class="text-success pl-3">undangan <?= str_replace('_', ' & ', $k_all['url']); ?></span></h6>
                                                    <span class="text-muted"><?= $k_all['pesan']; ?> </span>
                                                </div>
                                                <div class="float-right pt-1">
                                                    <small class="text-muted"><?= $k_all['tanggal_dikirim']; ?></small>
                                                </div>
                                            </div>
                                            <div class="separator-dashed"></div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <div class="text-center">
                                            <h2>Tidak ada komentar</h2>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>