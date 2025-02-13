<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Daftar Penghuni')); ?>
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

                        <div class="col-lg-12">
                            <div class="card" id="tasksList">
                                <div class="card-header align-items-center d-flex border-0">
                                    <h4 class="card-title mb-0 flex-grow-1">Pencatatan Air</h4>
                                    <div class="flex-shrink-0">
                                        <button type="button" class="btn btn-soft-info btn-sm material-shadow-none" data-bs-toggle="modal" data-bs-target="#tambahCatatAir">
                                            <i class="ri-add-line align-middle"></i> Tambah
                                        </button>
                                        <div class="modal fade lg-12" id="tambahCatatAir" tabindex="-1" aria-labelledby="tambahCatatAirLabel" aria-modal="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="tambahCatatAirLabel">Tambah Catat Air</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= site_url('waterusage/save'); ?>" method="POST">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="mb-3">
                                                                    <label for="user" class="form-label">Kamar</label>
                                                                    <select class="form-select" data-choices data-choices-search-false name="userid" id="user" required>
                                                                        <option value="" selected>- Pilih Kamar -</option>
                                                                        <?php foreach ($kamar as $k) : ?>
                                                                            <option value="<?= $k['kamar_id'] ?>"><?= $k['kamar_kode'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="role" class="form-label">Role</label>
                                                                    <input type="text" class="form-control" placeholder="Masukkan NIK" id="nik" name="user_nik">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header p-0 border-0 bg-light-subtle">
                                    <div class="row g-0 text-center">
                                        <div class="col-4">
                                            <div class="p-2 border border-dashed border-start-0">
                                                <p class="text-muted mb-0">Rusun</p>
                                                <h5 class="mb-1 fs-14"><?= $rusun['rusun_nama']; ?></h5>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-5">
                                            <div class="p-2 border border-dashed border-start-0">
                                                <p class="text-muted mb-0">Lantai</p>
                                                <h5 class="mb-1 fs-14"><?= $lantai['lantai_nama']; ?></h5>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-3">
                                            <div class="p-2 border border-dashed border-start-0 border-end-0">
                                                <p class="text-muted mb-0"><?= date("Y") ?></p>
                                                <h5 class="mb-1 fs-14"><?= date("M") ?></h5>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                </div>
                                <!--end card-body-->
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                            <thead>
                                                <tr class="table-light text-muted">
                                                    <th>Kamar</th>
                                                    <th>Total</th>
                                                    <th>Bulan ini</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($catatanair as $data) : ?>
                                                    <tr>
                                                        <td>
                                                            <h5 class="fs-14"><?= $data['kamar_kode']; ?></h5>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-normal"><?= $data['kilometer']; ?></h5>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-normal"><?= $data['pemakaian']; ?></h5>
                                                        </td>
                                                        <td>
                                                            <h5 class="fs-14 fw-normal"><span class="badge bg-success">Normal</span></h5>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="align-items-center mt-4 pt-2 justify-content-between row text-center text-sm-start">
                                        <div class="col-sm">
                                            <div class="text-muted">
                                                Menampilkan <span class="fw-semibold"><?= count($catatanair); ?></span> Hasil
                                            </div>
                                        </div>
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