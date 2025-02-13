<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Daftar Invoice')); ?>
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
                                            <h5 class="card-title mb-0">Daftar Invoice(s)</h5>
                                        </div>
                                        <div class="col-sm d-none">
                                            <form action="<?= site_url('penghuni/list'); ?>" class="d-flex justify-content-sm-end gap-2" method="POST">
                                                <div class="">
                                                    <input type="text" placeholder="Cari dengan Nama atau NIK" class="form-control" name="keyword" value="<?= ($bulan ? $bulan : ""); ?>" required>
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
                                                    <th scope="col">No</th>
                                                    <th scope="col">No. Invoice</th>
                                                    <th scope="col">Nominal (Rp)</th>
                                                    <th scope="col">Tanggal Rilis</th>
                                                    <th scope="col">Penghuni</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                <?php $no = 1; ?>
                                                <?php foreach ($invoice as $data) : ?>
                                                    <tr>
                                                        <td scope="row"><?= $no; ?></td>
                                                        <td><a href="<?= site_url('invoice/detail/' . $data['inv_nomor']) ?>"><?= $data['inv_nomor']; ?></a></td>
                                                        <td><?= rpbasic($data['inv_total']); ?></td>
                                                        <td><?= $data['inv_created_at']; ?></td>
                                                        <td><?= $data['nama']; ?></td>
                                                        <td><?= invoiceStatus($data['inv_payment']); ?></td>
                                                        <td><?= $data['inv_payment_method']; ?></td>
                                                    </tr>
                                                    <?php $no++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <!--end table-->
                                        <div class="noresult" style="display: <?= (empty($invoice) ? '' : 'none'); ?>">
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                <p class="text-muted mb-0">We've searched more than 200k+ tasks We did not find any tasks for you search.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-2">
                                        <div class="pagination-wrap hstack gap-2">
                                            <?= $pager->links('invoice', 'default_full') ?>
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