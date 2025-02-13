<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Detail')); ?>
    <!-- glightbox css -->
    <link rel="stylesheet" href="/assets/libs/glightbox/css/glightbox.min.css">

    <?= $this->include('partials/head-css') ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include('partials/menu') ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">

                        <div class="col">
                            <!-- alert -->
                            <?php if (session()->get('status')) : ?>
                                <div class="row alert-message">
                                    <div class="col-lg-12">
                                        <!-- Success Alert -->
                                        <div class="alert alert-<?= session()->get('color'); ?> alert-border-left alert-dismissible fade shadow show" role="alert">
                                            <i class="<?= session()->get('icon'); ?> me-3 align-middle"></i> <strong><?= session()->get('status'); ?></strong> <?= session()->get('message'); ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- header -->

                        <div class="col-12 mb-3">

                            <h4 class="fs-16 mb-1">Detail Penghuni</h4>
                            <p class="text-muted mb-0">Pengelolaan Data Penghuni Rusun.</p>

                        </div>
                        <!--end col-->




                        <div class="col">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?= $this->include('partials/content/penghuni') ?>
                                </div>
                                <div class="col-lg-9">
                                    <div class="card card-animate">
                                        <div class="card-header align-items-center d-flex border-0">
                                            <h4 class="card-title mb-0 flex-grow-1">Kontrak</h4>
                                        </div><!-- end card header -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 border border-dashed border-start-0 border-end-0 mb-2">
                                                    <h5 class="fs-15 text-primary my-2">Kontrak Aktif</h5>
                                                </div>
                                                <div class="col-lg-3 col-6 my-2">
                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Nomor Kontak</p>
                                                    <p class="fs-12 mb-1"><a href="" class="link-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Download Kontrak"><?= $kontrak['nomor_kontrak']; ?> <i class="ri-file-download-line"></i></a> </p>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-3 col-6 my-2">
                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Tgl Kontrak</p>
                                                    <h5 class="fs-12 mb-0"><?= tgl_indo($kontrak['tgl_awal_kontrak']); ?> - <?= tgl_indo($kontrak['tgl_akhir_kontrak']); ?></h5>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-3 col-6 my-2">
                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Tersisa</p>
                                                    <span class="badge bg-success fs-11 mb-0"><?= hitunghari(date('Y-m-d'), $kontrak['tgl_akhir_kontrak']); ?> Hari Lagi</span>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-3 col-6 my-2">
                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Kamar</p>
                                                    <h5 class="fs-12 mb-0"><?= $kamar['kamar_kode']; ?></h5>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-4 col-12 my-2">
                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Action</p>
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item"><a href="#" class="link-primary">Download Kontrak</a></li>
                                                        <li class="list-group-item"><a href="#" class="link-primary">Permohonan Perpanjangan Kontrak</a></li>
                                                        <li class="list-group-item"><a href="#" class="link-primary">Permohonan Mutasi</a></li>
                                                    </ul>


                                                </div>
                                                <!--end col-->
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!--end row-->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

        </div>
        <?= $this->include('partials/footer') ?>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>


    <?= $this->include('partials/customizer') ?>

    <?= $this->include('partials/vendor-scripts') ?>

    <script src="/assets/js/rupiah.js"></script>
    <!-- App js -->
    <script src="/assets/js/app.js"></script>

</body>