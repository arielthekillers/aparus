<?= $this->include('partials/main') ?>

<head>
    <?php echo view('partials/title-meta', array('title' => 'Laporan Penerimaan')); ?>
    <?= $this->include('partials/head-css') ?>
</head>

<body>
    <div id="layout-wrapper">
        <?= $this->include('partials/menu') ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?php echo view('partials/page-title', array('pagetitle' => 'Pembayaran', 'title' => 'Laporan Penerimaan')); ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-bottom-dashed">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-sm">
                                            <div>
                                                <h5 class="card-title mb-0">Daftar Transaksi</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-auto">
                                            <form action="<?= site_url('penerimaan') ?>" method="GET" class="d-flex align-items-center gap-2">
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="tanggal" value="<?= $tanggal ?>">
                                                    <button class="btn btn-primary" type="submit">Tampilkan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-nowrap align-middle mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Waktu</th>
                                                    <th scope="col">No. Invoice</th>
                                                    <th scope="col">Metode</th>
                                                    <th scope="col">No. Virtual Account</th>
                                                    <th scope="col" class="text-end">Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $total = 0;
                                                foreach ($transaksi as $t):
                                                    $total += $t['inv_total'];
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= date('d/m/Y', strtotime($t['inv_payment_at'])) ?></td>
                                                        <td><?= date('H:i:s', strtotime($t['inv_payment_at'])) ?></td>
                                                        <td>
                                                            <a href="<?= site_url('invoice/detail/' . $t['inv_nomor']) ?>" class="fw-medium link-primary">
                                                                <?= $t['inv_nomor'] ?>
                                                            </a>
                                                        </td>
                                                        <td><?= $t['inv_payment_method'] ?></td>
                                                        <td><?= ($t['inv_payment_method'] == 'Virtual Account') ? $t['inv_payment_va'] : '-' ?></td>
                                                        <td class="text-end"><?= rpbasic($t['inv_total']) ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <?php if (empty($transaksi)): ?>
                                                    <tr>
                                                        <td colspan="7" class="text-center">Tidak ada transaksi</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr class="table-active">
                                                    <th colspan="6" class="text-end">Total Penerimaan</th>
                                                    <th class="text-end"><?= rpbasic($total) ?></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->include('partials/footer') ?>
        </div>
    </div>

    <?= $this->include('partials/customizer') ?>
    <?= $this->include('partials/vendor-scripts') ?>
    <script src="/assets/js/app.js"></script>
</body>

</html>