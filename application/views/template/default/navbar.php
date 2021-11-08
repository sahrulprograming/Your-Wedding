<nav class="navbar navbar-expand-lg fixed-top navbar-dark">
    <div class="container">

        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Revo</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="<?= base_url(); ?>"><img src="<?= base_url('assets'); ?>/img/YourWedding/1.png" alt="logo" style="height: 170px;height: 60px;"></a>

        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?= base_url(); ?>">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#fitur">FITUR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#demo">DEMO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#harga">HARGA</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TENTANG</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item page-scroll" href="">WEBSITE</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <?php if (!$this->session->userdata('id')) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('authentication'); ?>">
                            <button class="btn btn-outline-reg m-2">LOGIN</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('authentication'); ?>">
                            <button class="btn btn-solid-reg">DAFTAR</button>
                        </a>
                    </li>
                <?php else : ?>
                    <li class="nav-item dropdown hidden-caret ml-3">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="avatar-sm">
                                <img src="<?= base_url('assets'); ?>/img/<?= $this->session->userdata('role'); ?>/<?= $this->session->userdata('foto'); ?>" alt="..." class="avatar-img rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img src="<?= base_url('assets'); ?>/img/<?= $this->session->userdata('role'); ?>/<?= $this->session->userdata('foto'); ?>" alt="image profile" class="avatar-img rounded"></div>
                                        <div class="u-text text-white">
                                            <h4><?= $this->session->userdata('nama'); ?></h4>
                                            <p class="text-muted"><?= $this->session->userdata('email'); ?></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">My Profile</a>
                                    <a class="dropdown-item" href="<?= base_url($this->session->userdata('role') . '/home/dashboard'); ?>">Dashboard</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('authentication/logout'); ?>">Logout</a>
                                </li>
                            </div>
                        </ul>
                    </li>
                <?php endif ?>
            </ul>

        </div> <!-- end of navbar-collapse -->
    </div> <!-- end of container -->
</nav>