<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Buku Tamu</h4>
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
                        <a href="#">Buku Tamu</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Buku Tamu</h4>
                </div>
                <div class="card-body">
                    <?php if ($tamu) : ?>
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>HUBUNGAN</th>
                                        <th>KEHADIRAN</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>HUBUNGAN</th>
                                        <th>KEHADIRAN</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($tamu as $tamu) : ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $tamu['nama']; ?></td>
                                            <td><?= $tamu['hubungan']; ?></td>
                                            <td><?= $tamu['kehadiran']; ?></td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <div class="text-center">
                            <h4>BELUM ADA TAMU</h4>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>