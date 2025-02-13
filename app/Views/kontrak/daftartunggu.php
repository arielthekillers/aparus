<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Daftar Menunggu')); ?>
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

                        <?php
                        $i = 1;
                        $colors = array("success", "danger", "primary", "secondary", "warning", "info", "dark");
                        shuffle($colors);
                        ?>
                        <?php foreach ($daftarrusun as $s) : ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="card card-animate overflow-hidden">
                                    <div class="position-absolute start-0" style="z-index: 0;">
                                        <svg version="1.2" xmlns="http://www.w3.org/2000/svg" width="175" height="200" viewBox="20 20 200 140">
                                            <style>
                                                .s<?= $i; ?> {
                                                    opacity: .10;
                                                    fill: var(--vz-<?= array_shift($colors); ?>)
                                                }
                                            </style>
                                            <path id="Shape 8" class="s<?= $i; ?>" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                        </svg>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-muted mb-0">Daftar Tunggu</p>
                                                <h4 class="ff-secondary fw-semibold"><a href="<?= site_url('kontrak/daftarTunggu/' . strtolower($s['rusun_id'])); ?>"><?= $s['rusun_nama']; ?></a></h4>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                            <?php $i++; ?>
                        <?php endforeach; ?>
                        <div class="col-lg-12">
                            <div class="card" id="tasksList">
                                <div class="card-header border-0 bg-primary">
                                    <div class="d-flex align-items-center">
                                        <h5 class="card-title mb-0 flex-grow-1 text-white"><i class="mdi mdi-clock-edit-outline"></i> Daftar Menunggu <?= (isset($rusun) ? $rusun['rusun_nama'] : ""); ?></h5>
                                    </div>
                                </div>
                                <!--end card-body-->
                                <div class="card-body">
                                    <div class="table-responsive table-card mb-4">
                                        <table class="table align-middle table-nowrap mb-0" id="tasksTable">
                                            <thead class="table-light text-muted">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nama</th>
                                                    <th>Rusun Tujuan</th>
                                                    <th class="text-center">Telepon</th>
                                                    <th class="text-center">Tanggal Pengajuan</th>
                                                    <th class="text-center">#</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                <?php if (!empty($kontrak)) : ?>
                                                    <?php foreach ($kontrak as $data) : ?>
                                                        <tr>
                                                            <td><a href="<?= site_url('kontrak/detailPemohon/' . $data['kode_penghuni']); ?>" class="fw-medium link-primary">#<?= $data['kode_penghuni']; ?></a></td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm bg-light rounded-circle p-1 me-2">
                                                                        <img src="/uploads/profil/<?= $data['avatar']; ?>" alt="" class="img-fluid d-block rounded-circle">
                                                                    </div>
                                                                    <div>
                                                                        <h5 class="fs-14 my-1"><?= $data['nama']; ?></h5>
                                                                        <span class="text-muted"><?= $data['ktp']; ?></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><span class="badge badge-label bg-primary fs-12"><i class="mdi mdi-circle-medium"></i> <?= $data['rusun_nama']; ?> </span></td>
                                                            <td class="text-center">
                                                                <h5 class="fs-16 my-0 fw-normal"><a href="https://wa.me/<?= fixphonenumber($data['kontak']); ?>" target="_blank" class="text-success"><i class="ri-whatsapp-line"></i></a></h5>
                                                                <span class="text-muted"><?= $data['kontak']; ?></span>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php if (hitungHari($data['waktudaftar'], 'now') == 0) : ?>
                                                                    <p class="mb-0"><span class="badge rounded-pill bg-danger">Baru</span></p>
                                                                <?php else : ?>
                                                                    <p class="mb-0"><span class="badge rounded-pill bg-light text-muted">
                                                                            <?= hitungHari($data['waktudaftar'], 'now') . ' Hari yg lalu'; ?>
                                                                        </span></p>
                                                                <?php endif; ?>
                                                                <span class="text-muted"><?= timestamp($data['waktudaftar']); ?></span>
                                                            </td>
                                                            <td>
                                                                <a href="<?= site_url('kontrak/tambah/' . $data['kode_penghuni']); ?>" class=" btn btn-sm btn-primary">PROSES KONTRAK</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <tr>
                                                        <td colspan="8" class="text-center">
                                                            <script src="https://cdn.lordicon.com/lordicon.js"></script>
                                                            <h5 class="text-center">
                                                                <lord-icon src="https://cdn.lordicon.com/uecgmesg.json" trigger="loop" style="width:100px;height:100px"></lord-icon>
                                                            </h5>
                                                            <p class="text-muted">Data belum ada</p>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                        <!--end table-->
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
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