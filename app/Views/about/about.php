<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'About')); ?>

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

                    <?php echo view('partials/page-title', array('pagetitle' => 'Aparus', 'title' => 'About')); ?>


                    <div class="row">


                        <div class="col-xxl-12">
                            <div class="d-flex flex-column h-100">

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="card overflow-hidden">
                                            <div class="card-body bg-marketplace d-flex">
                                                <div class="flex-grow-1">
                                                    <h4 class="fs-18 lh-base mb-0"><span class="text-primary">Aparus 2.0</span></h4>
                                                    <h4 class="fs-14 lh-base mb-0">v.1.10 (Web Based Application) | <a href="#">Lihat Pembaharuan</a></h4>
                                                    <p class="mb-0 mt-2 pt-1 text-muted">Dibuat oleh Divisi Pengembangan Teknologi Informasi <a href="#">Sintesa Corp</a></p>
                                                    <p class="mb-0 mt-2 pt-1 text-muted">Aparus 2.0 diinisiasi oleh UPT Rusunawa - Dinas Perumahan, Kawasan Permukiman Dan Pertanahan Kota Bontang pada tahun 2024 sebagai pengembangan dari Aparus 1.0</p>
                                                    <div class="d-flex gap-3 mt-4">
                                                        <a href="#" class="btn btn-primary">Apa yang baru ?</a>
                                                        <a href="<?= site_url('about/privacy') ?>" class="btn btn-success">Kebijakan Privacy </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->



                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?= $this->include('partials/footer') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <?= $this->include('partials/customizer') ?>

    <?= $this->include('partials/vendor-scripts') ?>

    <!-- App js -->
    <script src="/assets/js/app.js"></script>
</body>

</html>