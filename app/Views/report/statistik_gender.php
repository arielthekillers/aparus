<?= $this->include('partials/main') ?>

<head>
    <?php echo view('partials/title-meta', array('title' => 'Statistik Per Jenis Kelamin')); ?>
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
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Statistik Per Jenis Kelamin</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

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

                    <h4 class="mb-3">Statistik Penghuni Berdasarkan Jenis Kelamin</h4>
                    <div class="row">
                        <?php foreach ($statistik as $stat): ?>
                            <div class="col-md-4 mb-3">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3"><?= $stat->nama_rusun ?></h5>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">Laki-laki:</span>
                                            <span class="fw-medium"><?= $stat->laki_laki ?></span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-muted">Perempuan:</span>
                                            <span class="fw-medium"><?= $stat->perempuan ?></span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-muted">Total:</span>
                                            <span class="fw-medium"><?= $stat->total ?></span>
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

    <?= $this->include('partials/footer') ?>
    <?= $this->include('partials/vendor-scripts') ?>
</body>

</html>