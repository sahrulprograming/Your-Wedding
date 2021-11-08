<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Undangan saya</h4>
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
                        <a href="<?= current_url(); ?>">Undangan saya</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header text-center">
                    <h3>UNDANGAN YANG SAYA MILIKI</h3>
                </div>
                <div class="card-body">
                    <div class="row row-cols-lg-3 justify-content-center">
                        <?php foreach ($template as $t) : ?>
                            <div class="col col-lg-4">
                                <div class="card shadow text-center">
                                    <div class="card-header">
                                        <h5><?= strtoupper(str_replace('_', ' & ', $t['url'])); ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <a href="<?= base_url('undangan/index/' . $t['IDU'] . '/' . $t['url']); ?>">
                                            <img src="<?= base_url('assets'); ?>/img/template/<?= $t['tema'] ?>" alt="" width="180">
                                        </a>
                                    </div>
                                    <div class="card-footer d-flex justify-content-center">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#bagikan<?= $t['IDU']; ?>" class="btn btn-success px-3"><i class="flaticon-back mr-2"></i>Bagikan</button>
                                        <a href="<?= base_url('customer/undangan/semua_data/' . $t['IDU']); ?>" class="btn btn-primary mx-3 px-3"><i class="flaticon-pen mr-2"></i>Rubah</a>
                                        <a href="<?= base_url('customer/undangan/form/' . $t['ID_Template']); ?>" class="btn btn-danger px-3"><i class="flaticon-interface-5 mr-2"></i>Hapus</a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="bagikan<?= $t['IDU']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-dark2">
                                        <div class="modal-body">
                                            <div class="card-title d-flex align-items-center justify-content-center">
                                                <h5 class="mb-0">Bagikan Link Undangan</h5>
                                            </div>
                                            <hr class="bg-light">
                                            <div class="form-group text-light">
                                                <label for="url" id="label">Link Default</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control text-white" id="url" value="<?= base_url('undangan/index/' . $t['IDU'] . '/' . $t['url']); ?>">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="salin" style="cursor: pointer;">salin</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kepada">Nama Tamu</label>
                                                <input type="text" class="form-control" id="kepada" placeholder="Ketikan nama yang kamu undang">
                                            </div>
                                            <div class="generate text-center my-3">
                                                <button type="button" id="generate" class="btn btn-warning">Generate</button>
                                            </div>
                                            <script>
                                                $('#generate').on('click', function() {
                                                    let kepada = $('#kepada').val();
                                                    if (kepada) {
                                                        let newUrl = $('#url').val() + '/' + kepada.replace(' ', '%20');
                                                        console.log(newUrl);
                                                        $('#url').val(newUrl);
                                                        $('#label').html('Link Baru');
                                                    }
                                                })
                                                $('#salin').on('click', function() {
                                                    $('#url').select();
                                                    navigator.clipboard.writeText($('#url').val());
                                                })
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div