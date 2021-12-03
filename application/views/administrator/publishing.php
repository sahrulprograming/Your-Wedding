<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Publishing</h4>
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
                        <a href="<?= current_url(); ?>">Publishing</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="card-title"><?= $judul; ?></h4>
                </div>
                <div class="card-body">
                    <?php if ($undangan) : ?>
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>NO</th>
                                        <th>UNDANGAN</th>
                                        <th>MULAI PUBLISH</th>
                                        <th>SELESAI PUBLISH</th>
                                        <th>STATUS</th>
                                        <?php if ($status == 'publish') : ?>
                                            <th>PENGUNJUNG</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="text-center">
                                        <th>NO</th>
                                        <th>UNDANGAN</th>
                                        <th>MULAI PUBLISH</th>
                                        <th>SELESAI PUBLISH</th>
                                        <th>STATUS</th>
                                        <?php if ($status == 'publish') : ?>
                                            <th>PENGUNJUNG</th>
                                        <?php endif; ?>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($undangan as $undangan) : ?>
                                        <tr class="text-center">
                                            <td><?= $no; ?></td>
                                            <td><?= format_nama_mempelai($undangan['url']); ?></td>
                                            <td><?= $undangan['mulai_publish']; ?></td>
                                            <td><?= $undangan['selesai_publish']; ?></td>
                                            <td><span class="badge badge-pill badge-<?= warna_status($undangan['status']); ?>"><?= $undangan['status']; ?></span></td>
                                            <?php if ($status == 'publish') : ?>
                                                <td><?= $undangan['dilihat']; ?></td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <div class="text-center">
                            <h3>TIDAK ADA</h3>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>