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
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-users text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Customer</p>
                                        <h4 class="card-title"><?= $this->db->count_all_results('customer');; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-envelope-3 text-info"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Undangan</p>
                                        <h4 class="card-title"><?= jumlah_record('undangan') - 10; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-coins text-success"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Penghasilan</p>
                                        <h4 class="card-title"><?= format_rupiah($this->M_transaksi->penghasilan()); ?></h4>
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
                                <h3>Pesanan Undangan</h3>
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
                                    <?php if ($transaksi_hari_ini) : ?>
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="display table table-striped table-hover">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>INVOICE</th>
                                                        <th>CUSTOMER</th>
                                                        <th>UNDANGAN</th>
                                                        <th>DURASI PUBLISH</th>
                                                        <th>STATUS</th>
                                                        <th>BUKTI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    foreach ($transaksi_hari_ini as $t_day) : ?>
                                                        <tr class="text-center">
                                                            <td><?= $t_day['invoice']; ?></td>
                                                            <td><?= ambilNamaByID($t_day['IDC']); ?></td>
                                                            <td><?= format_nama_mempelai($t_day['url']); ?></td>
                                                            <td><?= $t_day['judul_durasi']; ?></td>
                                                            <td><span class="badge badge-pill badge-<?= warna_status($t_day['status_lunas']); ?>"><?= $t_day['status_lunas']; ?></span></td>
                                                            <td><span class="badge badge-pill badge-info" style="cursor: pointer" data-toggle="modal" data-target="#bukti<?= $t_day['no_pembayaran']; ?>">LIHAT</span></td>
                                                        </tr>
                                                        <div class="modal fade" id="bukti<?= $t_day['no_pembayaran']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-dark2">
                                                                    <div class="modal-body">
                                                                        <div class="card-title d-flex align-items-center justify-content-center">
                                                                            <h5 class="mb-0">Bukti Pembayaran</h5>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <style>
                                                                                .bukti_pembayaran img {
                                                                                    width: 180px;
                                                                                    height: 360px;
                                                                                    object-fit: cover;
                                                                                }
                                                                            </style>
                                                                            <div class="bukti_pembayaran text-center">
                                                                                <img src="<?= base_url('assets'); ?>/img/customer/<?= $t_day['IDC']; ?>/<?= $t_day['bukti_bayar']; ?>" alt="bukti bayar">
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer text-center">
                                                                            <?php if ($t_day['status_lunas'] === 'menunggu') : ?>
                                                                                <button type="button" class="btn btn-info mx-2">Konfirmasi</button>
                                                                            <?php endif ?>
                                                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php $no++;
                                                    endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php else : ?>
                                        <div class="text-center">
                                            <h2>Tidak ada pesanan</h2>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <div class="tab-pane fade" id="pills-profile-nobd" role="tabpanel" aria-labelledby="pills-profile-tab-nobd">
                                    <?php if ($transaksi_minggu_ini) : ?>
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="display table table-striped table-hover">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>INVOICE</th>
                                                        <th>CUSTOMER</th>
                                                        <th>UNDANGAN</th>
                                                        <th>DURASI PUBLISH</th>
                                                        <th>STATUS</th>
                                                        <th>BUKTI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    foreach ($transaksi_minggu_ini as $t_week) : ?>
                                                        <tr class="text-center">
                                                            <td><?= $t_week['invoice']; ?></td>
                                                            <td><?= ambilNamaByID($t_week['IDC']); ?></td>
                                                            <td><?= format_nama_mempelai($t_week['url']); ?></td>
                                                            <td><?= $t_week['judul_durasi']; ?></td>
                                                            <td><span class="badge badge-pill badge-<?= warna_status($t_week['status_lunas']); ?>"><?= $t_week['status_lunas']; ?></span></td>
                                                            <td><span class="badge badge-pill badge-info" style="cursor: pointer" data-toggle="modal" data-target="#bukti<?= $t_week['no_pembayaran']; ?>">LIHAT</span></td>
                                                        </tr>
                                                        <div class="modal fade" id="bukti<?= $t_week['no_pembayaran']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-dark2">
                                                                    <div class="modal-body">
                                                                        <div class="card-title d-flex align-items-center justify-content-center">
                                                                            <h5 class="mb-0">Bukti Pembayaran</h5>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <style>
                                                                                .bukti_pembayaran img {
                                                                                    width: 180px;
                                                                                    height: 360px;
                                                                                    object-fit: cover;
                                                                                }
                                                                            </style>
                                                                            <style>
                                                                                .bukti_pembayaran img {
                                                                                    width: 18rem;
                                                                                }
                                                                            </style>
                                                                            <div class="bukti_pembayaran text-center">
                                                                                <img src="<?= base_url('assets'); ?>/img/customer/<?= $t_week['IDC']; ?>/<?= $t_week['bukti_bayar']; ?>" alt="bukti bayar">
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer text-center">
                                                                            <?php if ($t_week['status_lunas'] === 'menunggu') : ?>
                                                                                <button type="button" class="btn btn-info mx-2">Konfirmasi</button>
                                                                            <?php endif ?>
                                                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php $no++;
                                                    endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php else : ?>
                                        <div class="text-center">
                                            <h2>Tidak ada pesanan</h2>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <div class="tab-pane fade" id="pills-contact-nobd" role="tabpanel" aria-labelledby="pills-contact-tab-nobd">
                                    <?php if ($transaksi) : ?>
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="display table table-striped table-hover">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>INVOICE</th>
                                                        <th>CUSTOMER</th>
                                                        <th>UNDANGAN</th>
                                                        <th>DURASI PUBLISH</th>
                                                        <th>STATUS</th>
                                                        <th>BUKTI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    foreach ($transaksi as $t) : ?>
                                                        <tr class="text-center">
                                                            <td><?= $t['invoice']; ?></td>
                                                            <td><?= ambilNamaByID($t['IDC']); ?></td>
                                                            <td><?= format_nama_mempelai($t['url']); ?></td>
                                                            <td><?= $t['judul_durasi']; ?></td>
                                                            <td><span class="badge badge-pill badge-<?= warna_status($t['status_lunas']); ?>"><?= $t['status_lunas']; ?></span></td>
                                                            <td><span class="badge badge-pill badge-info" style="cursor: pointer" data-toggle="modal" data-target="#bukti<?= $t['no_pembayaran']; ?>">LIHAT</span></td>
                                                        </tr>
                                                        <div class="modal fade" id="bukti<?= $t['no_pembayaran']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-dark2">
                                                                    <div class="modal-body">
                                                                        <div class="card-title d-flex align-items-center justify-content-center">
                                                                            <h5 class="mb-0">Bukti Pembayaran</h5>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <style>
                                                                                .bukti_pembayaran img {
                                                                                    width: 180px;
                                                                                    height: 360px;
                                                                                    object-fit: cover;
                                                                                }
                                                                            </style>
                                                                            <div class="bukti_pembayaran text-center">
                                                                                <img src="<?= base_url('assets'); ?>/img/customer/<?= $t['IDC']; ?>/<?= $t['bukti_bayar']; ?>" alt="bukti bayar">
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer text-center">
                                                                            <?php if ($t['status_lunas'] === 'menunggu') : ?>
                                                                                <button type="button" class="btn btn-info mx-2">Konfirmasi</button>
                                                                            <?php endif ?>
                                                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php $no++;
                                                    endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php else : ?>
                                        <div class="text-center">
                                            <h2>Tidak ada pesanan</h2>
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