<div class="main-panel">
    <div class="content">
        <?= $this->session->flashdata('notif'); ?>
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title"><?= strtoupper($judul); ?></h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="<?= base_url($this->role . '/home/dashboard'); ?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?= current_url(); ?>"><?= ucwords($judul); ?></a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="card-title"><?= strtoupper($judul); ?></h4>
                </div>
                <div class="card-body">
                    <?php if ($table != 'customer') : ?>
                        <div class="tambah">
                            <button type="button" class="btn btn-sm btn-success mb-4" data-toggle="modal" data-target="#tambah">TAMBAH</button>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <?php foreach ($field as $f) : ?>
                                        <th><?= strtoupper(str_replace('_', ' ', $f->name)); ?></th>
                                    <?php endforeach; ?>
                                    <th class="text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data as $data) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <?php $i = 0;
                                        foreach ($field as $f) : ?>
                                            <?php if ($f == 'foto') : ?>
                                                <td><img src="<?= foto_profile($data[$f->name], $data[$id], $table); ?>" class="rounded-circle " width="50" height="50" style="object-fit: cover;"></td>
                                            <?php elseif ($f == 'harga') : ?>
                                                <td class="<?= isset($text_align) ? $text_align[$i] : ''; ?>" style="width: 15%;"><?= format_rupiah($data[$f->name]); ?></td>
                                            <?php else : ?>
                                                <td class="<?= isset($text_align) ? $text_align[$i] : ''; ?>"><?= $data[$f->name]; ?></td>
                                            <?php endif; ?>
                                        <?php $i++;
                                        endforeach; ?>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <button type="button" class="btn btn-sm btn-primary mx-2" data-toggle="modal" data-target="#ubah<?= $data[$id]; ?>">UBAH</button>
                                            <button type="button" class="btn btn-sm btn-danger mx-2" id="hapus<?= $data[$id]; ?>">HAPUS</button>
                                        </td>
                                    </tr>
                                    <script>
                                        // Hapus menggunkan sweet alert & ajax
                                        $('#hapus<?= $data[$id] ?>').on('click', function() {
                                            swal({
                                                title: 'Yakin?',
                                                text: "ingin menghapus <?= $judul; ?> ?",
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
                                                    hapus_data('<?= $table; ?>', '<?= $id; ?>', '<?= $data[$id] ?>');
                                                    setTimeout(function() {
                                                        window.location.reload();
                                                    }, 2000);
                                                } else {
                                                    swal.close();
                                                }
                                            });
                                        })
                                    </script>
                                    <div class="modal fade" id="ubah<?= $data[$id]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="color: black !important;">
                                                <form action="<?= current_url() . "/$data[$id]"; ?>" method="POST">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">UBAH <?= strtoupper($judul); ?></h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php $i = 0;
                                                        foreach ($field as $f) : ?>
                                                            <?php if (isset($input_type) && $input_type[$i] == 'textarea') : ?>
                                                                <div class="form-group text-left">
                                                                    <label for="exampleInputEmail1" style="color: black !important;"><?= ucwords(str_replace('_', ' ', $f->name)); ?></label>
                                                                    <textarea cols="30" rows="5" class="form-control bg-light text-dark" name="<?= $f->name; ?>" id="<?= $f->name; ?>" placeholder="Tulis <?= strtolower(str_replace('_', ' ', $f->name)); ?>"><?= $data[$f->name]; ?></textarea>
                                                                </div>
                                                            <?php else : ?>
                                                                <?php if ($f->name == 'foto') : ?>
                                                                    <div class="foto text-center">
                                                                        <img src="<?= foto_profile($data[$f->name], $data[$id], $table); ?>" class="rounded-circle border border-dark" id="foto-profile" alt="foto profile" width="200" height="200" style="object-fit: cover;">
                                                                        <input type="hidden" value="<?= $data[$f->name]; ?>" id="foto_lama">
                                                                        <div class="form-group text-left">
                                                                            <label for="exampleInputEmail1" style="color: black !important;">Pilih Foto</label>
                                                                            <input type="file" class="form-control bg-light text-dark" name="<?= $f->name; ?>" id="<?= $f->name; ?>" accept="image/png, image/jpg, image/jpeg">
                                                                        </div>
                                                                    </div>
                                                                <?php else : ?>
                                                                    <div class="form-group text-left">
                                                                        <label for="exampleInputEmail1" style="color: black !important;"><?= ucwords(str_replace('_', ' ', $f->name)); ?></label>
                                                                        <input type="<?= $f->type == 'int' || $f->type == 'double' ? 'number' : 'text'; ?>" class="form-control bg-light text-dark" name="<?= $f->name; ?>" id="<?= $f->name; ?>" value="<?= $data[$f->name]; ?>" placeholder="Masukan <?= strtolower(str_replace('_', ' ', $f->name)); ?>">
                                                                    </div>
                                                                <?php endif ?>
                                                            <?php endif ?>
                                                        <?php $i++;
                                                        endforeach; ?>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-dark" data-dismiss="modal">BATAL</button>
                                                        <button type="submit" class="btn btn-primary" id="ubah-pass">SIMPAN</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php $no++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="color: black !important;">
                                <div class="modal-header">
                                    <h3 class="modal-title">TAMBAH <?= strtoupper($judul); ?></h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="data-form">
                                        <?php $i = 0;
                                        foreach ($field as $f) : ?>
                                            <?php if (isset($input_type) && $input_type[$i] == 'textarea') : ?>
                                                <div class="form-group text-left">
                                                    <label for="exampleInputEmail1" style="color: black !important;"><?= ucwords(str_replace('_', ' ', $f->name)); ?></label>
                                                    <textarea name="<?= $f->name; ?>" cols="30" rows="5" class="form-control bg-light text-dark" id="<?= $f->name; ?>" placeholder="Tulis <?= strtolower(str_replace('_', ' ', $f->name)); ?>"></textarea>
                                                </div>
                                            <?php else : ?>
                                                <div class="form-group text-left">
                                                    <label for="exampleInputEmail1" style="color: black !important;"><?= ucwords(str_replace('_', ' ', $f->name)); ?></label>
                                                    <input type="<?= $f->type == 'int' || $f->type == 'double' ? 'number' : 'text'; ?>" class="form-control bg-light text-dark" id="<?= $f->name; ?>" placeholder="Masukan <?= strtolower(str_replace('_', ' ', $f->name)); ?>">
                                                </div>
                                            <?php endif ?>
                                        <?php $i++;
                                        endforeach; ?>
                                    </form>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">BATAL</button>
                                    <button type="button" class="btn btn-success" id="tambah-data">TAMBAH</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#tambah-data').on('click', function() {
        let form_data = new FormData($('form#data-form')[0]);
        <?php foreach ($field as $f) : ?>
            form_data.append('<?= $f->name; ?>', $('form#data-form #<?= $f->name; ?>').val());
        <?php endforeach ?>
        $.ajax({
            url: '<?= base_url('administrator/ajax/tambah_data/' . $table) ?>',
            data: form_data,
            dataType: 'JSON',
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(output) {
                swal(output.judul, output.pesan, {
                    icon: output.status,
                    buttons: {
                        confirm: {
                            className: output.button,
                        }
                    }
                })
                if (output.status == 'success') {
                    setTimeout(function() {
                        window.location.replace('<?= current_url(); ?>');
                    }, 2000)
                }
            }
        })
    })
</script>