<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Update Foto')); ?>

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

                    <?php echo view('partials/page-title', array('pagetitle' => 'Profil', 'title' => 'Update Foto')); ?>

                    <?php if (session()->get('status')) : ?>
                        <div class="row alert-message">
                            <div class="col-lg-4">
                                <!-- Success Alert -->
                                <div class="alert alert-<?= session()->get('color'); ?> alert-border-left alert-dismissible fade shadow show" role="alert">
                                    <i class="<?= session()->get('icon'); ?> me-3 align-middle"></i> <strong><?= session()->get('status'); ?></strong> <?= session()->get('message'); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Update Foto</h4>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div class="live-preview">
                                        <form action="<?= site_url('profil/foto_update'); ?>" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>" required>
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <div class="row ">
                                                        <div class="col-6 text-center">
                                                            <img src="<?= base_url('uploads/profil/' . $user['avatar']); ?>" class="rounded avatar-lg shadow center-block img-responsive">
                                                        </div>
                                                        <div class="col-6 text-center">
                                                            <img src="<?= base_url('uploads/profil/' . $user['avatar']); ?>" class="rounded-circle avatar-lg shadow">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="foto" class="form-label">Foto Baru</label>
                                                        <div class="input-group">
                                                            <input type="file" class="form-control" id="foto" name="foto" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" col-lg-12">
                                                    <p class="text-muted">Pastikan foto yang anda upload berukuran persegi dengan panjang lebar yang sama (rasio 1:1), jika anda kesulitan melakukan crop foto, anda bisa menggunakan tools online pada website <a href="https://croppola.com/" target="_blank">ini</a></p>
                                                </div>
                                                <div class=" col-lg-12">
                                                    <div class="text-end mt-3">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->


                    </div>
                    <!--end row-->

                </div> <!-- container-fluid -->
            </div><!-- End Page-content -->

            <?= $this->include('partials/footer') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- @@include("partials/right-sidebar") -->


    <?= $this->include('partials/customizer') ?>

    <?= $this->include('partials/vendor-scripts') ?>

    <script src="/assets/js/app.js"></script>

    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>

</body>

</html>