<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Role Switcher')); ?>

    <?= $this->include('partials/head-css') ?>

</head>

<body>

    <div class="auth-page-wrapper pt-5">

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">


                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5 col-xl-4">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Role Switcher</h5>
                                    <?php if (!session('role')) : ?><p class="text-muted">Tentukan role anda sebelum masuk ke aplikasi</p><?php endif; ?>
                                    <?php if (session('role')) : ?><p class="text-muted">Silahkan pilih role untuk melanjutkan ke aplikasi</p><?php endif; ?>
                                </div>
                                <div class="user-thumb text-center">
                                    <img src="<?= site_url('uploads/profil/' . session('avatar')); ?>" class="rounded-circle img-thumbnail avatar-lg shadow" alt="thumbnail">
                                    <h5 class="font-size-15 mt-3"><?= session('username'); ?></h5>
                                    <p class="font-size-13 text-muted"><?= session('nama'); ?></p>
                                </div>
                                <div class="d-flex justify-content-around mt-5">
                                    <?php foreach ($role as $r) : ?>
                                        <a href="<?= site_url('auth/switchto/' . $r['type']); ?>" type="button" class="btn btn-primary btn-label waves-effect waves-light"><i class="ri-map-pin-user-fill label-icon align-middle fs-16 me-2"></i> <?= $r['type']; ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy; <script>
                                    document.write(new Date().getFullYear())
                                </script> EMonitoring Cipta Karya <i class="mdi mdi-heart text-danger"></i> by Sintesa Corp</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->
    <?= $this->include('partials/vendor-scripts') ?>

</body>

</html>