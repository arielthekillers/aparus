<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Permohonan Masuk')); ?>
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
                        <div class="col-12 mb-3">
                            <h4 class="fs-16 mb-1">Permohonan Masuk</h4>
                            <p class="text-muted mb-0">Pengelolaan Daftar Pemohonan yang masuk.</p>
                        </div>
                        <div class="col-12">
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
                        <?php if (!empty($kontrak)) : ?>
                            <?php foreach ($kontrak as $data) : ?>
                                <div class="col-sm-6 col-xl-3">
                                    <div class="card card-animate ribbon-box right ribbon-fill ">
                                        <div class="card-body">
                                            <?php if (strtotime($data['waktudaftar']) > strtotime('-1 day')) : ?>
                                                <div class="ribbon ribbon-danger">Baru</div>
                                            <?php endif; ?>
                                            <div class="d-flex mb-3 align-items-center">
                                                <div class="flex-shrink-0">
                                                    <img src="/uploads/profil/<?= $data['avatar']; ?>" alt="" class="avatar-sm rounded-circle">
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    <h6 class="mb-0"><?= $data['nama']; ?></h6>
                                                    <a href="<?= site_url('kontrak/detailPemohon/' . $data['kode_penghuni']); ?>" class="text-muted">#<?= $data['kode_penghuni']; ?></a>
                                                </div>
                                            </div>
                                            <div class="ribbon-content mt-3 text-muted">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <span class="text-muted fs-24"><i class="ri-bank-card-2-line"></i></span>
                                                    </div>
                                                    <div class="flex-grow-1 ms-2">
                                                        <p class="text-muted mb-0">No. KTP</p>
                                                        <h6 class="mb-2"><?= $data['ktp']; ?></h6>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <span class="text-muted fs-24"><i class="ri-hotel-line"></i></span>
                                                    </div>
                                                    <div class="flex-grow-1 ms-2">
                                                        <p class="text-muted mb-0">Tujuan</p>
                                                        <h6 class="mb-2"><?= $data['rusun_nama']; ?></h6>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="https://wa.me/<?= fixphonenumber($data['kontak']); ?>" class="link-success fs-24" target="_blank"><i class="ri-whatsapp-line"></i></a>
                                                    </div>
                                                    <div class="flex-grow-1 ms-2">
                                                        <p class="text-muted mb-0">Telepon</p>
                                                        <h6 class="mb-2"><?= $data['kontak']; ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex">
                                            <p class="flex-grow-1 text-muted mb-0"><?= timestamp($data['waktudaftar']); ?></p>
                                            <div class="dropdown">
                                                <a href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-2-fill align-middle"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end dropdownmenu-primary">
                                                    <a class="dropdown-item" href="<?= site_url('kontrak/detailPemohon/' . $data['kode_penghuni']); ?>">Detail</a>
                                                    <a class="dropdown-item" href="<?= site_url('kontrak/updateToDaftarTunggu/' . $data['kontrak_id'] . '/' . $data['penghuni']); ?>" onclick="return confirm('Simpan ke daftar tunggu, yakin?');">Simpan ke Daftar Tunggu</a>
                                                    <a class="dropdown-item" href="#" onclick="return confirm('Proses kontrak, yakin?');">Proses Kontrak</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="#" onclick="return confirm('test?');">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <script src="https://cdn.lordicon.com/lordicon.js"></script>
                            <h5 class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/uecgmesg.json" trigger="loop" style="width:100px;height:100px"></lord-icon>
                            </h5>
                            <p class="text-center text-muted">Data Tidak Ditemukan</p>
                        <?php endif; ?>
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