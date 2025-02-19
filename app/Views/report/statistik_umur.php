<?= $this->include('partials/main') ?>

<head>
    <?php echo view('partials/title-meta', array('title' => 'Statistik Berdasarkan Umur')); ?>
    <?= $this->include('partials/head-css') ?>
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?= $this->include('partials/menu') ?>

        <!-- Start right Content here -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4">
                                        <h5 class="card-title flex-grow-1">Statistik Berdasarkan Umur</h5>
                                        <div>
                                            <form action="" method="get" class="d-inline-block">
                                                <select name="rusun" class="form-select" onchange="this.form.submit()">
                                                    <option value="">Semua Rusun</option>
                                                    <?php foreach ($rusun as $r): ?>
                                                        <option value="<?= $r['rusun_id'] ?>" <?= ($selected_rusun == $r['rusun_id']) ? 'selected' : '' ?>>
                                                            <?= $r['rusun_nama'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php foreach ($statistik as $stat): ?>
                                            <div class="col-xl-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title mb-0"><?= $stat->nama_rusun ?></h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered mb-0">
                                                                <thead class="table-light">
                                                                    <tr>
                                                                        <th>Kategori Umur</th>
                                                                        <th class="text-end">Jumlah</th>
                                                                        <th class="text-end">Persentase</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Balita (1-5 tahun)</td>
                                                                        <td class="text-end"><?= $stat->balita ?></td>
                                                                        <td class="text-end"><?= $stat->total > 0 ? number_format(($stat->balita / $stat->total) * 100, 1) : '0.0' ?>%</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Anak-anak (6-11 tahun)</td>
                                                                        <td class="text-end"><?= $stat->anak ?></td>
                                                                        <td class="text-end"><?= $stat->total > 0 ? number_format(($stat->anak / $stat->total) * 100, 1) : '0.0' ?>%</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Remaja (12-16 tahun)</td>
                                                                        <td class="text-end"><?= $stat->remaja ?></td>
                                                                        <td class="text-end"><?= $stat->total > 0 ? number_format(($stat->remaja / $stat->total) * 100, 1) : '0.0' ?>%</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Dewasa (17-59 tahun)</td>
                                                                        <td class="text-end"><?= $stat->dewasa ?></td>
                                                                        <td class="text-end"><?= $stat->total > 0 ? number_format(($stat->dewasa / $stat->total) * 100, 1) : '0.0' ?>%</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Lansia (≥60 tahun)</td>
                                                                        <td class="text-end"><?= $stat->lansia ?></td>
                                                                        <td class="text-end"><?= $stat->total > 0 ? number_format(($stat->lansia / $stat->total) * 100, 1) : '0.0' ?>%</td>
                                                                    </tr>
                                                                    <tr class="table-light">
                                                                        <th>Total</th>
                                                                        <th class="text-end"><?= $stat->total ?></th>
                                                                        <th class="text-end">100%</th>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
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
                </div>
            </div>
        </div>
    </div>

    <?= $this->include('partials/footer') ?>
    <?= $this->include('partials/vendor-scripts') ?>
</body>

</html>