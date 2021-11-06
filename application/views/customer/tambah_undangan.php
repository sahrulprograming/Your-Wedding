<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Buat Undangan</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="<?= base_url($this->session->userdata('role') . 'home/dashboard'); ?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= current_url(); ?>">Buat Undangan</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header text-center">
                    <h3>Pilih tema kesukaan anda</h3>
                </div>
                <div class="card-body">
                    <div class="row row-cols-lg-3 justify-content-center">
                        <?php foreach ($template as $t) : ?>
                            <div class="col col-lg-4">
                                <div class="card shadow text-center">
                                    <div class="card-header">
                                        <h5><?= strtoupper(str_replace('-', ' ', $t['nama_template'])); ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <img src="<?= base_url('assets'); ?>/img/template/bg-1.png" alt="" width="180">
                                    </div>
                                    <div class="card-footer">
                                        <a href="<?= base_url('customer/undangan/form/' . $t['ID_Template']); ?>" class="btn btn-primary">Pilih</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>