<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <?= $this->session->flashdata('notif'); ?>
            <div class="card">
                <div class="card-header text-center">
                    <h3>UNDANGAN YANG SAYA MILIKI</h3>
                </div>
                <div class="card-body">
                    <div class="row row-cols-lg-3 justify-content-center">
                        <?php if ($undangan_saya) : ?>
                            <?php foreach ($undangan_saya as $us) : ?>
                                <div class="col col-lg-4">
                                    <div class="card shadow text-center">
                                        <div class="card-header">
                                            <h5><?= strtoupper(str_replace('_', ' & ', $us['url'])); ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <a href="<?= base_url('customer/undangan/index/' . $us['IDU'] . '/' . $us['url']); ?>">
                                                <img src="<?= base_url('assets'); ?>/img/template/<?= $us['tema'] ?>" alt="" width="180" height="360">
                                            </a>
                                        </div>
                                        <div class="card-footer d-flex justify-content-center">
                                            <?php if (status_publishing($us['IDU']) == 'publish') : ?>
                                                <button type="button" data-toggle="modal" data-target="#bagikan-<?= $us['IDU']; ?>" class="btn btn-success btn-sm px-1"><i class="flaticon-back mr-2"></i>Bagikan</button>
                                            <?php elseif (status_publishing($us['IDU']) == 'menunggu') : ?>
                                                <button type="button" data-toggle="modal" data-target="#menunggu-<?= $us['IDU']; ?>" class="btn btn-warning btn-sm px-1"><i class="flaticon-file mr-2"></i>Menunggu</button>
                                            <?php else : ?>
                                                <a href="<?= base_url('customer/transaksi/publish/' . $us['IDU']); ?>" class="btn btn-info btn-sm px-1"><i class="flaticon-arrows mr-2"></i>Publish</a>
                                            <?php endif ?>
                                            <a href="<?= base_url('customer/undangan/semua_data/' . $us['IDU']); ?>" class="btn btn-primary mx-3 btn-sm px-1"><i class="flaticon-pen mr-2"></i>Rubah</a>
                                            <button type="button" id="hapus<?= $us['IDU']; ?>" class="btn btn-danger btn-sm px-1"><i class="flaticon-interface-5 mr-2"></i>Hapus</button>
                                        </div>
                                        <script>
                                            $('#hapus<?= $us['IDU']; ?>').on('click', function() {
                                                swal({
                                                    title: 'Yakin?',
                                                    text: "ingin menghapus Undangan <?= strtoupper(str_replace('_', ' & ', $us['url'])); ?> ?",
                                                    type: 'warning',
                                                    buttons: {
                                                        confirm: {
                                                            text: 'Yakin!',
                                                            className: 'btn btn-success'
                                                        },
                                                        cancel: {
                                                            text: 'Batal!',
                                                            visible: true,
                                                            className: 'btn btn-danger'
                                                        }
                                                    }
                                                }).then((Delete) => {
                                                    if (Delete) {
                                                        hapus_data('undangan', 'IDU', <?= $us['IDU']; ?>);
                                                        setTimeout(function() {
                                                            window.location.reload();
                                                        }, 2000);
                                                    } else {
                                                        swal.close();
                                                    }
                                                });
                                            })
                                        </script>
                                    </div>
                                </div>
                                <!-- Publish -->
                                <div class="modal fade" id="menunggu-<?= $us['IDU']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <img src="<?= base_url('assets'); ?>/img/<?= $this->role; ?>/<?= $this->ID; ?>/<?= pembayaran_menunggu($us['IDU'], 'bukti_bayar'); ?>" alt="bukti bayar">
                                                    </div>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <a href="<?= base_url('customer/transaksi/publish/' . $us['IDU']); ?>/<?= pembayaran_menunggu($us['IDU'], 'no_pembayaran'); ?>" class="btn btn-primary">UBAH</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Publish -->
                                <!-- Bagikan -->
                                <div class="modal fade" id="bagikan-<?= $us['IDU']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-dark2">
                                            <div class="modal-body">
                                                <div class="card-title d-flex align-items-center justify-content-center">
                                                    <h5 class="mb-0">Bagikan Link Undangan</h5>
                                                </div>
                                                <hr class="bg-light">
                                                <div class="form-group text-light">
                                                    <label for="url" id="label-<?= $us['IDU']; ?>">Link Default</label>
                                                    <div class="input-group">
                                                        <input type="hidden" id="url_undangan-<?= $us['IDU']; ?>" value="<?= base_url('undangan/index/' . $us['IDU'] . '/' . $us['url']); ?>">
                                                        <input type="text" class="form-control text-white" id="url-<?= $us['IDU']; ?>" value="<?= base_url('undangan/index/' . $us['IDU'] . '/' . $us['url']); ?>">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text btn btn-secondary" id="salin-<?= $us['IDU']; ?>" style="cursor: pointer;">salin</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kepada">Nama Tamu</label>
                                                    <input type="text" class="form-control" id="kepada-<?= $us['IDU']; ?>" placeholder="Ketikan nama yang kamu undang">
                                                </div>
                                                <div class="generate text-center my-3">
                                                    <button type="button" id="generate-<?= $us['IDU']; ?>" class="btn btn-warning">Generate</button>
                                                </div>
                                                <script>
                                                    $('#generate-<?= $us['IDU']; ?>').on('click', function() {
                                                        let kepada = $('#kepada-<?= $us['IDU']; ?>').val();
                                                        if (kepada) {
                                                            let newUrl = $('#url_undangan-<?= $us['IDU']; ?>').val() + '/' + kepada.replace(' ', '%20');
                                                            $('#url-<?= $us['IDU']; ?>').val(newUrl);
                                                            $('#label-<?= $us['IDU']; ?>').html('Link Baru');
                                                            swal("Berhasil!", "silahkan salin link baru dan bagikan!", {
                                                                icon: "success",
                                                                buttons: {
                                                                    confirm: {
                                                                        className: 'btn btn-success'
                                                                    }
                                                                },
                                                            });
                                                        }
                                                    })
                                                    $('#salin-<?= $us['IDU']; ?>').on('click', function() {
                                                        $('#url-<?= $us['IDU']; ?>').select();
                                                        navigator.clipboard.writeText($('#url-<?= $us['IDU']; ?>').val());
                                                    })
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="text-center">
                                <p>Anda tidak memiliki undangan</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div