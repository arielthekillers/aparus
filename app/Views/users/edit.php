<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Edit User')); ?>

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

                    <?php echo view('partials/page-title', array('pagetitle' => 'Users', 'title' => 'Edit User')); ?>

                    <?php if (session()->get('status')) : ?>
                        <div class="row alert-message">
                            <div class="col-lg-8">
                                <!-- Success Alert -->
                                <div class="alert alert-<?= session()->get('color'); ?> alert-border-left alert-dismissible fade shadow show" role="alert">
                                    <i class="<?= session()->get('icon'); ?> me-3 align-middle"></i> <strong><?= session()->get('status'); ?></strong> <?= session()->get('message'); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="row">


                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Form Edit</h4>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div class="live-preview">
                                        <form action="<?= site_url('users/update'); ?>" method="POST">
                                            <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>" required>
                                            <div class="row">
                                                <div class="col-6 border-end">
                                                    <div class="row">

                                                        <h5 class="fs-15 text-primary mb-4">Akun</h5>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="username" class="form-label">Username *</label>
                                                                <input autofocus required type="text" class="form-control" placeholder="Masukkan Username" id="username" name="username" value="<?= $user['user_nick']; ?>">
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="row">


                                                        <h5 class="fs-15 text-primary mb-4">Informasi Pendukung</h5>

                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Nama Lengkap</label>
                                                                <input required type="text" class="form-control" placeholder="Masukkan Nama Lengkap" id="nama" name="user_nama" value="<?= $user['user_nama']; ?>">
                                                            </div>
                                                        </div>
                                                        <!--end col-->

                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="nip" class="form-label">NIK</label>
                                                                <input type="number" class="form-control" placeholder="Masukkan NIK" id="nik" name="user_nik" value="<?= $user['user_nik']; ?>">
                                                            </div>
                                                        </div>
                                                        <!--end col-->

                                                        <div class=" col-12">
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input type="email" class="form-control" placeholder="Masukkan Email" id="email" name="user_email" value="<?= $user['user_email']; ?>">
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                </div>

                                                <!--end col-->
                                                <div class="col-lg-12 border-top">
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
    <!-- Autohide alert after 3 second -->
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>

</body>

</html>