<?= $this->include('partials/main') ?>

<head>
    <meta http-equiv="refresh" content="5; URL=<?= site_url('aduan/tvmedia'); ?>">
    <?php echo view('partials/title-meta', array('title' => 'Landing')); ?>

    <?= $this->include('partials/head-css') ?>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>

<body>

    <!-- Begin page -->
    <div class="layout-wrapper">




        <!-- start services -->
        <section class="section pt-4" id="services">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="text-right mb-2">
                            <h1 class="mb-1 ff-secondary fw-bold lh-base">Pusat Pengaduan</h1>
                            <p class="text-muted">Pelayanan Rusunawa Bontang</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-left pt-3">
                            <img src="/assets/images/logo-dark.png" class="card-logo card-logo-dark" alt="logo dark">
                            <img src="/assets/images/logo-light.png" class="card-logo card-logo-light" alt="logo light">
                            <p class="text-muted mt-3">UPT Rusunawa Kota Bontang</p>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row g-3 pt-3">
                    <div class="col-lg-9">
                        <?php if (count($aduan) > 0) : ?>
                            <?php foreach ($aduan as $a) : ?>
                                <div class="card mb-3">
                                    <div class="card-body py-0 px-3">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item ps-0">
                                                <div class="row g-2">
                                                    <div class="col-md-4">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm p-1 py-2 me-2 h-auto bg-danger bg-opacity-25  rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0 text-danger"><?= timestamp_generator($a['tgladuan'], 'd'); ?></h5>
                                                                    <div class="text-dark"><?= timestamp_generator($a['tgladuan'], 'bulan'); ?></div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <h5 class="text-muted mt-0 mb-1 fs-13"><?= timestamp_generator($a['tgladuan'], 'hari'); ?> <i class="ri-time-line"></i> <?= timestamp_generator($a['tgladuan'], 'jam'); ?></h5>
                                                                <a href="#" class="text-reset fs-14 mb-0"><?= cutstring($a['judul'], 20); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col pe-4">
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <img src="/assets/images/users/avatar-1.jpg" alt="" class="avatar-sm p-1 py-2 h-auto rounded-circle" />
                                                            </div>
                                                            <div class="ms-2">
                                                                <h5 class="text-muted mt-0 mb-1 fs-13"><?= $a['ktp']; ?></h5>
                                                                <p class="text-reset fs-14 mb-0"><?= $a['nama']; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col align-self-center">
                                                        <div class="d-flex flex-row align-items-center gap-2">
                                                            <div class="">
                                                                <div class="fs-18"><span class="badge rounded-pill bg-primary"><i class="mdi mdi-home-outline"></i> <?= $a['hunian']; ?></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col align-self-center">
                                                        <div class="d-flex flex-row align-items-center gap-2">
                                                            <div class="">
                                                                <div class="fs-18"><span class="badge bg-warning"><?= $a['sstatus']; ?></span></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- end row -->
                                            </li><!-- end -->


                                        </ul><!-- end -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            <?php endforeach; ?>
                        <?php else : ?>
                            <h5>Belum ada aduan hari ini</h5>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-xxl-12 col-sm-12">
                                <div class="card card-animate overflow-hidden mb-2">
                                    <div class="position-absolute start-0" style="z-index: 0;">
                                        <svg version="1.2" xmlns="http://www.w3.org/2000/svg" width="175" height="200" viewBox="20 20 200 140">
                                            <style>
                                                .sx {
                                                    opacity: .10;
                                                    fill: var(--vz-primary)
                                                }
                                            </style>
                                            <path id="Shape 8" class="sx" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                        </svg>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-muted mb-0">Total Hari ini</p>
                                                <h4 class="ff-secondary fw-semibold"><a href="<?= site_url('aduan/list'); ?>"><?= $total; ?> Aduan</a></h4>
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-primary bg-opacity-25 text-primary rounded-circle fs-4">
                                                        <i class="ri-ticket-2-line"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div>
                            <?php $i = 1; ?>
                            <?php foreach ($statistik as $s) : ?>
                                <?php
                                if ($s['status'] == 'Pending') {
                                    $color = 'warning';
                                    $bg = 'yellow';
                                    $icon = 'mdi mdi-timer-sand';
                                } elseif ($s['status'] == 'Selesai') {
                                    $color = 'success';
                                    $bg = 'success';
                                    $icon = 'ri-check-line';
                                } elseif ($s['status'] == 'Dihapus') {
                                    $color = 'danger';
                                    $bg = 'danger';
                                    $icon = 'ri-delete-bin-line';
                                }
                                ?>
                                <div class="col-xxl-12 col-sm-12">
                                    <div class="card card-animate overflow-hidden mb-2">
                                        <div class="position-absolute start-0" style="z-index: 0;">
                                            <svg version="1.2" xmlns="http://www.w3.org/2000/svg" width="175" height="200" viewBox="20 20 200 140">
                                                <style>
                                                    .s<?= $i; ?> {
                                                        opacity: .10;
                                                        fill: var(--vz-<?= $bg; ?>)
                                                    }
                                                </style>
                                                <path id="Shape 8" class="s<?= $i; ?>" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                            </svg>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="fw-medium text-muted mb-0"><?= $s['status']; ?> Hari ini</p>
                                                    <h4 class="ff-secondary fw-semibold"><a href="<?= site_url('aduan/list/' . strtolower($s['status'])); ?>"><?= $s['jumlahperstatus']; ?> Aduan</a></h4>
                                                </div>
                                                <div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-<?= $color; ?> bg-opacity-25 text-<?= $color; ?> rounded-circle fs-4">
                                                            <i class="<?= $icon; ?>"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end container -->
        </section>
        <!-- end services -->



    </div>
    <!-- end layout wrapper -->



    <?= $this->include('partials/vendor-scripts') ?>

</body>

</html>