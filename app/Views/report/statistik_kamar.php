<?= $this->include('partials/main') ?>

<head>
    <?php echo view('partials/title-meta', array('title' => 'Statistik Kamar')); ?>
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
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Statistik Kamar</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-4">
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
                            <div class="col-xl-4">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3"><?= $stat->nama_rusun ?></h5>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">Total Kamar:</span>
                                            <span class="fw-medium"><?= $stat->total_kamar ?></span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">Kamar Terisi:</span>
                                            <span class="fw-medium text-success"><?= $stat->kamar_terisi ?></span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-muted">Kamar Kosong:</span>
                                            <span class="fw-medium text-danger"><?= $stat->kamar_kosong ?></span>
                                        </div>
                                        <div class="mt-3 pt-2">
                                            <div class="progress">
                                                <?php
                                                $occupancy_rate = ($stat->total_kamar > 0) ? 
                                                    ($stat->kamar_terisi / $stat->total_kamar) * 100 : 0;
                                                ?>
                                                <div class="progress-bar bg-success" role="progressbar" 
                                                    style="width: <?= number_format($occupancy_rate, 1) ?>%" 
                                                    aria-valuenow="<?= number_format($occupancy_rate, 1) ?>" 
                                                    aria-valuemin="0" 
                                                    aria-valuemax="100">
                                                    <?= number_format($occupancy_rate, 1) ?>%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?= $this->include('partials/footer') ?>
        </div>
    </div>

    <?= $this->include('partials/vendor-scripts') ?>
</body>

</html>