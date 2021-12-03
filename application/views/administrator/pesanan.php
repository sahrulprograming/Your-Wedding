<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Pesanan</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Pesanan</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $judul; ?></h4>
                </div>
                <div class="card-body">
                    <?php if ($pesanan) : ?>
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
                                    foreach ($pesanan as $p) : ?>
                                        <tr class="text-center">
                                            <td><?= $p['invoice']; ?></td>
                                            <td><?= ambilNamaByID($p['IDC']); ?></td>
                                            <td><?= format_nama_mempelai($p['url']); ?></td>
                                            <td><?= $p['judul_durasi']; ?></td>
                                            <td><span class="badge badge-pill badge-<?= warna_status($p['status_lunas']); ?>"><?= $p['status_lunas']; ?></span></td>
                                            <td><span class="badge badge-pill badge-info" style="cursor: pointer" data-toggle="modal" data-target="#bukti<?= $p['no_pembayaran']; ?>">KONFIRMASI</span></td>
                                        </tr>
                                        <div class="modal fade" id="bukti<?= $p['no_pembayaran']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <img src="<?= base_url('assets'); ?>/img/customer/<?= $p['IDC']; ?>/<?= $p['bukti_bayar']; ?>" alt="bukti bayar">
                                                            </div>
                                                        </div>
                                                        <div class="card-footer text-center">
                                                            <?php if ($p['status_lunas'] === 'menunggu') : ?>
                                                                <button type="button" class="btn btn-info mx-2" id="konfirmasi<?= $p['no_pembayaran']; ?>">Konfirmasi</button>
                                                            <?php endif ?>
                                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                                        </div>
                                                        <script>
                                                            $('#konfirmasi<?= $p['no_pembayaran']; ?>').on('click', function() {
                                                                swal({
                                                                    title: 'Yakin?',
                                                                    text: "bukti pembayaran sudah bennar?",
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
                                                                }).then((yakin) => {
                                                                    if (yakin) {
                                                                        let data = {
                                                                            no_pembayaran: <?= $p['no_pembayaran']; ?>,
                                                                            IDU: <?= $p['IDU']; ?>,
                                                                            durasi: <?= $p['durasi_hari']; ?>,
                                                                        }
                                                                        $.ajax({
                                                                            data: data,
                                                                            dataType: 'JSON',
                                                                            type: 'POST',
                                                                            url: '<?= base_url($this->role . '/ajax/konfirmasi') ?>',
                                                                            success: function(output) {
                                                                                if (output) {
                                                                                    swal(output.judul, output.pesan, {
                                                                                        icon: output.status,
                                                                                        buttons: {
                                                                                            confirm: {
                                                                                                className: output.button
                                                                                            }
                                                                                        },
                                                                                    });
                                                                                    if (output.status == 'success') {
                                                                                        setTimeout(function() {
                                                                                            window.location.replace('<?= base_url('administrator/pesanan/index/lunas'); ?>');
                                                                                        }, 2000);
                                                                                    }
                                                                                } else {
                                                                                    swal('Opss...!', 'ada yang salah!', {
                                                                                        icon: 'error',
                                                                                        buttons: {
                                                                                            confirm: {
                                                                                                className: 'btn btn-danger',
                                                                                            }
                                                                                        }
                                                                                    })
                                                                                }
                                                                            }
                                                                        })
                                                                    } else {
                                                                        swal.close();
                                                                    }
                                                                });
                                                            })
                                                        </script>
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