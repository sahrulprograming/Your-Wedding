<div class="sidebar" data-background-color="dark2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="<?= base_url($this->session->userdata('role') . '/home/dashboard'); ?>">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('customer/undangan/tambah'); ?>">
                        <i class="flaticon-circle"></i>
                        <p>Tambah Undangan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('customer/undangan/saya/' . $this->session->userdata('id')); ?>">
                        <i class="far fa-file-alt"></i>
                        <p>Undangan Saya</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#buku-tamu">
                        <i class="flaticon-agenda-1"></i>
                        <p>Buku Tamu</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="buku-tamu">
                        <ul class="nav nav-collapse">
                            <?php foreach (undangan_user($this->IDC) as $undangan) : ?>
                                <li>
                                    <a href="<?= base_url('customer/buku_tamu/index/' . $undangan['IDU']); ?>">
                                        <span class="sub-item"><?= str_replace('_', ' & ', $undangan['url']); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="flaticon-internet"></i>
                        <p>Publishing</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="components/avatars.html">
                                    <span class="sub-item">Menunggu</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/avatars.html">
                                    <span class="sub-item">Berlangsung</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/avatars.html">
                                    <span class="sub-item">Selesai</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>