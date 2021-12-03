<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <?= $this->session->flashdata('notif'); ?>
            <div class="card">
                <div class="card-header text-center">
                    <h3><?= $judul; ?></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col d-flex flex-column align-items-center">
                            <!-- gambar template -->
                            <h2><?= ucwords(str_replace('_', ' & ', $undangan['url'])); ?></h2>
                            <h5><?= ucwords(str_replace('-', ' ', $undangan['nama_template'])); ?></h5>
                            <img src="<?= base_url('assets'); ?>/img/template/<?= $undangan['tema']; ?>" alt="" width="240">
                        </div>
                        <div class="col">
                            <div class="card-title d-flex align-items-center justify-content-center">
                                <h5 class="mb-0">Publish Undangan</h5>
                            </div>
                            <hr class="bg-light">
                            <?= form_open_multipart(base_url('customer/transaksi/bayar'), 'id="form-bayar"'); ?>
                            <div class="form-group text-light">
                                <label for="durasi_publish" id="label-">Pilih Durasi Publish</label>
                                <div class="input-group input-group-sm">
                                    <select class="single-select form-control" name="IDHP" id="durasi_publish">
                                        <option selected value="<?= isset($pembayaran) ? $pembayaran['IDHP'] : 'null'; ?>"><?= isset($pembayaran) ? $pembayaran['judul_durasi'] : 'Silahkan pilih durasi publish'; ?></option>
                                        <?php foreach ($pilih_publish as $PP) : ?>
                                            <option value="<?= $PP['IDHP']; ?>"><?= $PP['judul_durasi']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-light d-none" id="metode-pembayaran">
                                <label for="durasi_publish" id="label-">Pilih Metode Pembayaran</label>
                                <div class="input-group input-group-sm">
                                    <select class="single-select form-control" name="id_dompet" id="pilih-metode">
                                        <option selected value="<?= isset($pembayaran) ? $pembayaran['id_dompet'] : 'null'; ?>"><?= isset($pembayaran) ? $pembayaran['nama_dompet'] : 'Silahkan pilih metode pembayaran'; ?></option>
                                        <?php foreach ($dompet_admin as $DA) : ?>
                                            <option value="<?= $DA['id_dompet']; ?>"><?= $DA['nama_dompet']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div id="detail-bayar">
                                <!-- data pembayaran dari ajax -->
                            </div>
                            <div class="bayar text-center my-3 d-none" id='bayar'>
                                <?php if (isset($pembayaran)) : ?>
                                    <input type="hidden" name="invoice" value="<?= $pembayaran['invoice']; ?>">
                                <?php endif; ?>
                                <input type="hidden" name="harga" id="harga">
                                <input type="hidden" name="IDU" id="harga" value="<?= $IDU; ?>">
                                <div class="form-group">
                                    <label class="form-label fw-normal fst-italic">Upload Bukti Pembayaran</label>
                                    <input class="form-control" id="bukti_bayar" name="bukti_bayar" type="file" accept="image/jpg, image/png, image/jpeg">
                                </div>
                                <button type="submit" id="btn-bayar" class="btn btn-primary">Bayar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function metode(data) {
        $.ajax({
            type: "POST",
            data: data,
            dataType: 'JSON',
            url: "<?= base_url('customer/transaksi/metode'); ?>",
            success: function(hasil) {
                $('#detail-bayar').html(hasil.output);
                $('#harga').val(hasil.harga);
                $('#bayar').removeClass('d-none');
            }
        })
    }
    let dp = $('#durasi_publish');
    let pilih_metode = $('#pilih-metode');
    let pembayaran = '<?= isset($pembayaran) ? 'ada' : null; ?>';
    if (pembayaran) {
        let data = {
            IDHP: dp.val(),
            id_dompet: pilih_metode.val(),
        };
        metode(data)
        $('#metode-pembayaran').removeClass('d-none')
        $('#bayar').removeClass('d-none');
    }
    dp.change(function() {
        $('#durasi_publish :selected').each(function() {
            console.log(dp.val());
            if (dp.val() != 'null') {
                $('#metode-pembayaran').removeClass('d-none')
                let data = {
                    IDHP: dp.val(),
                    id_dompet: pilih_metode.val(),
                };
                metode(data);
            } else {
                $('#metode-pembayaran').addClass('d-none');
                $('#detail-bayar').html("");
            }
        });
    });
    pilih_metode.change(function() {
        $('#pilih-metode :selected').each(function() {
            if (dp.val() != 'null' && pilih_metode.val() != 'null') {
                let data = {
                    IDHP: dp.val(),
                    id_dompet: pilih_metode.val(),
                };
                metode(data);
            } else {
                $('#detail-bayar').html("");
                $('#bayar').addClass('d-none');
            }
        });
    });
</script>