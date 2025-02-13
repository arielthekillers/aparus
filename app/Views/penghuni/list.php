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
                                <div class="card-header border-0">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-sm-auto">
                                            <h5 class="card-title mb-0">Daftar Penghuni</h5>
                                        </div>
                                        <div class="col-sm">
                                            <form action="<?= site_url('penghuni/list'); ?>" class="d-flex justify-content-sm-end gap-2" method="POST">
                                                <div class="">
                                                    <input type="text" placeholder="Cari dengan Nama atau NIK" class="form-control" name="keyword" value="<?= ($keyword ? $keyword : ""); ?>" required>
                                                </div>
                                                <div class="">
                                                    <button type="submit" class="btn btn-primary">Cari</button>
                                                </div>
                                                <div class="">
                                                    <a href="<?= site_url('penghuni/list'); ?>" class="btn btn-secondary">Reset</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                                <div class="card-body">
                                    <div class="table-responsive table-card mb-4">
                                        <table class="table align-middle table-nowrap mb-0 col-sm-12">
                                            <thead class="table-light text-muted">
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">No. KTP</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Rusun Tujuan</th>
                                                    <th scope="col">No Hp</th>
                                                    <th scope="col">Tgl Input</th>
                                                    <th scope="col">Penginput</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                <?php foreach ($penghuni as $data) : ?>
                                                    <tr>
                                                        <td scope="row"><a href="<?= site_url('penghuni/detail/' . $data['kode_penghuni']); ?>" class="fw-medium link-primary">#<?= $data['kode_penghuni']; ?></a></td>
                                                        <td><?= (!empty($data['status_kontrak']) ? "<span class='badge bg-info text-uppercase'>" . $data['status_kontrak'] . "</span>" : "<span class='badge bg-warning text-uppercase'>Proses</span>"); ?></td>
                                                        <td><?= $data['ktp']; ?></td>
                                                        <td><?= $data['nama']; ?></td>
                                                        <td><?= $data['rusun_nama']; ?></td>
                                                        <td><?= $data['kontak']; ?></td>
                                                        <td><?= timestamp($data['tgl_daftar']); ?></td>
                                                        <td><?= (!empty($data['user_nama']) ? "<span class='badge bg-primary text-uppercase'>" . $data['user_nama'] . "</span>" : "<span class='badge bg-success text-uppercase'>Mandiri</span>"); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <!--end table-->
                                        <div class="noresult" style="display: <?= (empty($penghuni) ? '' : 'none'); ?>">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                <p class="text-muted mb-0">We've searched more than 200k+ tasks We did not find any tasks for you search.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-2">
                                        <div class="pagination-wrap hstack gap-2">
                                            <?= $pager->links('penghuni', 'default_full') ?>
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