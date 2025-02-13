<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Profil')); ?>

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

                    <?php echo view('partials/page-title', array('pagetitle' => 'User', 'title' => 'Profil')); ?>

                    <?php if (session()->get('status')) : ?>
                        <div class="row alert-message">
                            <div class="col-lg-6">
                                <!-- Success Alert -->
                                <div class="alert alert-<?= session()->get('color'); ?> alert-border-left alert-dismissible fade shadow show" role="alert">
                                    <i class="<?= session()->get('icon'); ?> me-3 align-middle"></i> <strong><?= session()->get('status'); ?></strong> <?= session()->get('message'); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="text-center">
                                                <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                                    <img src="<?= site_url('uploads/profil/' . session('avatar')); ?>" class="rounded-circle avatar-xl img-thumbnail user-profile-image  shadow" alt="user-profile-image">
                                                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                        <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                                        <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                            <span class="avatar-title rounded-circle bg-light text-body shadow">
                                                                <i class="ri-camera-fill"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <span class="text-muted">Username </span>
                                                        <p class="fs-16 fw-medium pt-0"><?= $user['user_nick']; ?></p>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <span class="text-muted">Nama Lengkap </span>
                                                        <p class="fs-16 fw-medium pt-0"><?= $user['user_nama']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <span class="text-muted">NIK </span>
                                                        <p class="fs-16 fw-medium pt-0"><?= ($user['user_nik'] ? $user['user_nik'] : '-'); ?></p>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <span class="text-muted">Email </span>
                                                        <p class="fs-16 fw-medium pt-0"><?= (!empty($user['user_email']) ? $user['user_email'] : '-'); ?></p>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                        </div>
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

</body>

</html>