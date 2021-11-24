<div class="sidebar" data-background-color="dark2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="<?= base_url($this->session->userdata('role')); ?>.'home/dashboard') ?>">
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
                    <a data-toggle="collapse" href="#master">
                        <i class="fas fa-layer-group"></i>
                        <p>Master</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="master">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="components/typography.html">
                                    <span class="sub-item">Customer</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#pesanan">
                        <i class="flaticon-store"></i>
                        <p>Pesanan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="pesanan">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?= base_url('administrator/pesanan/index/menunggu'); ?>">
                                    <span class="sub-item">Menunggu</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('administrator/pesanan/index/selesai'); ?>">
                                    <span class="sub-item">Selesai</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#publishing">
                        <i class="flaticon-internet"></i>
                        <p>Publishing</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="publishing">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="components/typography.html">
                                    <span class="sub-item">Berlangsung</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/typography.html">
                                    <span class="sub-item">Habis</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>