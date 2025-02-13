<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Beranda')); ?>

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

                    <?php echo view('partials/page-title', array('pagetitle' => 'Pages', 'title' => 'Beranda')); ?>


                    <div class="row">


                        <div class="col-xxl-12">
                            <div class="d-flex flex-column h-100">

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card overflow-hidden">
                                            <div class="card-body bg-marketplace d-flex">
                                                <div class="flex-grow-1">
                                                    <h4 class="fs-18 lh-base mb-0">Hi, <?= session('nama'); ?><br> Selamat Datang di Aplikasi <span class="text-primary">Aparus 2.0</span> UPT Rusunawa Kota Bontang</h4>
                                                    <p class="mb-0 mt-2 pt-1 text-muted">Aplikasi ini digunakan untuk manajement pengelolan Rusunawa di Kota Bontang</p>
                                                    <div class="d-flex gap-3 mt-4">
                                                        <a href="#" class="btn btn-primary">Buka Panduan Penggunaan <?= $title; ?></a>
                                                        <a href="#" class="btn btn-success">Buka Pengaturan </a>
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