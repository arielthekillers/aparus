<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Pejabat')); ?>

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
                    <?php echo view('partials/page-title', array('pagetitle' => 'Pejabat', 'title' => 'Daftar Pejabat')); ?>

                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                <a href="<?= site_url('pejabat/tambah'); ?>" class="btn btn-primary"><i class="ri-add-line align-bottom me-1"></i> Tambah Pejabat</a>
                            </div>
                        </div>
                    </div>

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

                    <div class="row">
                        <?php if (count($pejabat) > 0) : ?>
                            <?php foreach ($pejabat as $value) : ?>
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="card card-animate">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="flex-shink-0">
                                                    <img src="<?= site_url('uploads/profil/blank.jpg'); ?>" alt="" class="avatar-sm object-cover rounded">
                                                </div>
                                                <div class="ms-3 flex-grow-1">
                                                    <h5 class="mb-1 card-title"><?= $value['nama']; ?></h5>
                                                    <p class="text-muted mb-0"><?= $value['nip']; ?></p>
                                                    <p class="mb-0 text-primary"><?= $value['jabatan']; ?></p>
                                                </div>
                                                <div>
                                                    <div class="dropdown float-end">
                                                        <button class="btn btn-ghost-primary btn-icon dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill align-middle fs-16"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li>
                                                                <a class="dropdown-item edit-item-btn" href="<?= site_url('pejabat/edit/' . $value['id_pejabat']); ?>"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item remove-item-btn" href="<?= site_url('pejabat/delete/' . $value['id_pejabat']); ?>" onclick="return confirm('Anda yakin ingin menghapus pajabat ini?');">
                                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                    <!--end row-->
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

    <!-- Autohide alert after 3 second -->
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>


    <!-- App js -->
    <script src="/assets/js/app.js"></script>

</body>

</html>