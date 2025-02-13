<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Aduan')); ?>

    <?= $this->include('partials/head-css') ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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

                        <div class="col-12 mb-4">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    <h4 class="fs-16 mb-1">Aduan</h4>
                                    <p class="text-muted mb-0">Pengelolaan Data aduan dari penghuni rusun.</p>
                                </div>
                                <div class="mt-3 mt-lg-0">
                                    <div class="row g-3 mb-0 align-items-center">
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-soft-secondary" data-bs-toggle="modal" data-bs-target="#tambahAduan">
                                                <i class="ri-add-circle-line align-middle me-1"></i> Tambah Aduan
                                            </button>
                                            <div id="tambahAduan" class="modal fade" tabindex="-1" aria-labelledby="tambahAduanLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-primary" id="tambahAduanLabel">Aduan :: Tambah</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- form input aduan -->
                                                            <form method="POST" action="<?= site_url('aduan/save'); ?>">
                                                                <div class="row g-3">
                                                                    <div class="col-lg-12">
                                                                        <div>
                                                                            <label for="judul" class="form-label">Judul Aduan</label>
                                                                            <input type="text" class="form-control judul" id="judul" name="judul" placeholder="Judul Aduan">
                                                                        </div>
                                                                    </div><!--end col-->
                                                                    <div class="col-lg-12">
                                                                        <div>
                                                                            <label for="deskripsi" class="form-label">Deskripsi</label>
                                                                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Jelaskan Permasalah dengan detail"></textarea>
                                                                        </div>
                                                                    </div><!--end col-->
                                                                    <div class="col-lg-12">
                                                                        <div>
                                                                            <label for="pengadu" class="form-label">Pengadu</label>
                                                                            <input type="text" class="form-control" readonly value="<?= session('nama'); ?>">
                                                                            <input type="text" id="pengadu" name="pengadu" hidden value="<?= session('userid'); ?>">
                                                                        </div>
                                                                    </div><!--end col-->
                                                                    <div class="col-lg-12">
                                                                        <div class="hstack gap-2 justify-content-end">
                                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                                        </div>
                                                                    </div><!--end col-->
                                                                </div><!--end row-->
                                                            </form>

                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->

                                </div>
                            </div><!-- end card header -->
                        </div>
                        <!--end col-->

                        <div class="col-xxl-3 col-sm-3">
                            <div class="card card-animate overflow-hidden">
                                <div class="position-absolute start-0" style="z-index: 0;">
                                    <svg version="1.2" xmlns="http://www.w3.org/2000/svg" width="175" height="200" viewBox="20 20 200 140">
                                        <style>
                                            .sx {
                                                opacity: .10;
                                                fill: var(--vz-primary)
                                            }
                                        </style>
                                        <path id="Shape 8" class="sx" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                    </svg>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Semua</p>
                                            <h4 class="ff-secondary fw-semibold"><a href="<?= site_url('aduan/list'); ?>"><span class="counter-value" data-target="<?= $total; ?>">0</span> Aduan</a></h4>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-primary bg-opacity-25 text-primary rounded-circle fs-4">
                                                    <i class="ri-ticket-2-line"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div> <!-- end card-->
                        </div>
                        <?php $i = 1; ?>
                        <?php foreach ($statistik as $s) : ?>
                            <?php
                            if ($s['status'] == 'Pending') {
                                $color = 'warning';
                                $bg = 'yellow';
                                $icon = 'mdi mdi-timer-sand';
                            } elseif ($s['status'] == 'Selesai') {
                                $color = 'success';
                                $bg = 'success';
                                $icon = 'ri-check-line';
                            } elseif ($s['status'] == 'Dihapus') {
                                $color = 'danger';
                                $bg = 'danger';
                                $icon = 'ri-delete-bin-line';
                            }
                            ?>
                            <div class="col-sm-3">
                                <div class="card card-animate overflow-hidden">
                                    <div class="position-absolute start-0" style="z-index: 0;">
                                        <svg version="1.2" xmlns="http://www.w3.org/2000/svg" width="175" height="200" viewBox="20 20 200 140">
                                            <style>
                                                .s<?= $i; ?> {
                                                    opacity: .10;
                                                    fill: var(--vz-<?= $bg; ?>)
                                                }
                                            </style>
                                            <path id="Shape 8" class="s<?= $i; ?>" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z" />
                                        </svg>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p class="fw-medium text-muted mb-0"><?= $s['status']; ?></p>
                                                <h4 class="ff-secondary fw-semibold"><a href="<?= site_url('aduan/list/' . strtolower($s['status'])); ?>"><span class="counter-value" data-target="<?= $s['jumlahperstatus']; ?>">0</span> Aduan</a></h4>
                                            </div>
                                            <div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-<?= $color; ?> bg-opacity-25 text-<?= $color; ?> rounded-circle fs-4">
                                                        <i class="<?= $icon; ?>"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </div>
                    <!--end row-->


                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Daftar Aduan <?= ucfirst($status); ?></h4>
                                </div><!-- end card header -->
                                <div class="card-body pt-0">
                                    <?php if(!empty($aduan)): ?>
                                    <ul class="list-group list-group-flush border-dashed">
                                        <?php foreach ($aduan as $a) : ?>
                                            <li class="list-group-item ps-0">
                                                <div class="row g-3">
                                                    <div class="col-md-5">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm p-1 py-2 me-3 h-auto bg-danger bg-opacity-25  rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0 text-danger"><?= timestamp_generator($a['tgladuan'], 'd'); ?></h5>
                                                                    <div class="text-dark"><?= timestamp_generator($a['tgladuan'], 'bulan'); ?></div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <h5 class="text-muted mt-0 mb-1 fs-13"><?= timestamp_generator($a['tgladuan'], 'hari'); ?> <i class="ri-time-line"></i> <?= timestamp_generator($a['tgladuan'], 'jam'); ?></h5>
                                                                <a href="#" class="text-reset fs-14 mb-0"><?= cutstring($a['judul'], 50); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="d-flex align-items-center">
                                                            <div class="">
                                                                <img src="/uploads/profil/<?= session('avatar'); ?>" alt="" class="avatar-sm p-1 py-2 h-auto rounded-circle" />
                                                            </div>
                                                            <div class="ms-2">
                                                                <h5 class="text-muted mt-0 mb-1 fs-13"><?= $a['ktp']; ?></h5>
                                                                <p class="text-reset fs-14 mb-0"><?= $a['nama']; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto align-self-center">
                                                        <div class="d-flex align-items-center gap-4">
                                                            <div class="flex-shrink-0">
                                                                <div class="fs-18"><span class="badge rounded-pill bg-primary"><i class="mdi mdi-home-outline"></i> <?= $a['hunian']; ?></span></div>
                                                            </div>
                                                            <div>
                                                                <i class="ri-phone-line text-success"></i> <span class="fs-14 ms-1"><?= $a['kontak']; ?></span>
                                                            </div>
                                                            <div class="dropdown card-header-dropdown">
                                                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="text-muted fs-18"><i class="mdi mdi-dots-vertical"></i></span>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <a class="dropdown-item" href="#">Edit</a>
                                                                    <a class="dropdown-item" href="#">Remove</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->
                                            </li><!-- end -->
                                        <?php endforeach; ?>
                                    </ul><!-- end -->
                                    <?php else: ?>
                                    <div class="noresult">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0">Data yang ditampilkan belum tersedia.</p>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->


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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tambahAduan').on('hidden.bs.modal', function() {
                $(this).find('form').trigger('reset');
            })
        });
    </script>
</body>

</html>