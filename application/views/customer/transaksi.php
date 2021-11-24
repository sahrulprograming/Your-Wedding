<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <?= $this->session->flashdata('notif'); ?>
            <div class="card">
                <div class="card-header text-center">
                    <h3>PUBLISING UNDANGAN</h3>
                </div>
                <?php if (status_publishing($IDU)) : ?>
                    <?php if (status_publishing($IDU) == 'menunggu') : ?>
                        <h1>menunggu</h1>
                    <?php endif; ?>
                <?php else : ?>
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
                                            <option selected value="null">Silahkan pilih durasi publish</option>
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
                                            <option selected value="null">Silahkan pilih metode pembayaran</option>
                                            <?php foreach ($dompet_admin as $DA) : ?>
                                                <option value="<?= $DA['id_dompet']; ?>"><?= $DA['nama_dompet']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="" id="pembayaran">
                                    <!-- data pembayaran dari ajax -->
                                </div>
                                <div class="bayar text-center my-3 d-none" id='bayar'>
                                    <input type="hidden" name="harga" id="harga">
                                    <input type="hidden" name="IDU" id="harga" value="<?= $IDU; ?>">
                                    <div class="form-group">
                                        <label class="form-label fw-normal fst-italic">Upload Bukti Pembayaran</label>
                                        <input class="form-control" id="bukti_bayar" name="bukti_bayar" type="file">
                                    </div>
                                    <button type="submit" id="btn-bayar" class="btn btn-primary">Bayar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script>
    let dp = $('#durasi_publish');
    let pilih_metode = $('#pilih-metode');
    dp.change(function() {
        $('#durasi_publish :selected').each(function() {
            console.log(dp.val());
            if (dp.val() != "null") {
                $('#metode-pembayaran').removeClass('d-none')
                let data = {
                    IDHP: dp.val(),
                    id_dompet: pilih_metode.val(),
                };
                $.ajax({
                    type: "POST",
                    data: data,
                    url: "<?= base_url('customer/transaksi/metode'); ?>",
                    success: function(result) {
                        let hasil = JSON.parse(result)
                        $('#pembayaran').html(hasil.output);
                        $('#harga').val(hasil.harga);
                        $('#pembayaran').removeClass('d-none');
                        $('#bayar').removeClass('d-none');
                    }
                })
            } else {
                $('#metode-pembayaran').html("");
            }
        });
    });
    pilih_metode.change(function() {
        $('#pilih-metode :selected').each(function() {
            if (pilih_metode.val() != "null") {
                let data = {
                    IDHP: dp.val(),
                    id_dompet: pilih_metode.val(),
                };
                $.ajax({
                    type: "POST",
                    data: data,
                    url: "<?= base_url('customer/transaksi/metode'); ?>",
                    success: function(result) {
                        let hasil = JSON.parse(result)
                        $('#pembayaran').html(hasil.output);
                        $('#harga').val(hasil.harga);
                        $('#pembayaran').removeClass('d-none');
                        $('#bayar').removeClass('d-none');
                        $('#form-bayar').attr('action', '<?= base_url('customer/transaksi/bayar'); ?>');
                    }
                })
            } else {
                $('#pembayaran').html("");
            }
        });
    });
</script>