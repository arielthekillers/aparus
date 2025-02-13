<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Status Pembayaran')); ?>

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

                    <?php echo view('partials/page-title', array('pagetitle' => 'Pembayaran', 'title' => 'Status Pembayaran')); ?>


                    <div class="row">


                        <div class="col-xxl-12">
                            <div class="d-flex flex-column h-100">

                                <div class="row justify-content-center">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="card" id="demo">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card-header border-bottom-dashed p-4">
                                                        <div class="d-flex">
                                                            <div class="flex-grow-1">
                                                                <img src="/assets/images/logo-dark.png" class="card-logo card-logo-dark" alt="logo dark" height="17">
                                                                <img src="/assets/images/logo-light.png" class="card-logo card-logo-light" alt="logo light" height="17">
                                                            </div>
                                                            <div class="flex-shrink-0 mb-0">
                                                                <h5 class="fs-14 mb-0">INVOICE : #<span class="fw-bold"><?= $invoice['inv_nomor']; ?></span></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end card-header-->
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <?php if ($invoice['inv_payment'] == '2') : ?>
                                                            <div class="mb-4">
                                                                <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>
                                                            </div>
                                                            <h5>Sukses !</h5>
                                                            <p class="text-muted">Pembayaran Berhasil Dilakukan</p>
                                                        <?php else : ?>
                                                            <div class="mb-4">
                                                                <lord-icon src="https://cdn.lordicon.com/rwiwjhim.json" trigger="loop" colors="primary:#104891,secondary:#08a88a" style="width:120px;height:120px"></lord-icon>
                                                            </div>
                                                            <h5>Waiting !</h5>
                                                            <p class="text-muted">Menunggu Pembayaran</p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <div class="row g-3 mb-4">
                                                            <div class="col-lg-4 col-6">
                                                                <h6 class="text-muted mb-2 text-uppercase fw-semibold">Penghuni</h6>
                                                                <p class="fw-medium mb-2"><?= $penghuni['nama']; ?></p>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col-6">
                                                                <h6 class="text-muted mb-2 text-uppercase fw-semibold">Tgl Tagihan</h6>
                                                                <p class="fw-medium mb-2"><?= timestamp($invoice['inv_created_at']); ?></p>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col-6">
                                                                <h6 class="text-muted mb-2 text-uppercase fw-semibold">Status</h6>
                                                                <p class="fw-medium mb-2"><?= invoiceStatus($invoice['inv_payment']); ?></p>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col-6">
                                                                <h6 class="text-muted mb-2 text-uppercase fw-semibold">Metode Pembayaran</h6>
                                                                <p class="fw-medium mb-2"><?= $invoice['inv_payment_method']; ?></p>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col-6">
                                                                <h6 class="text-muted mb-2 text-uppercase fw-semibold">Tgl Bayar</h6>
                                                                <p class="fw-medium mb-2"><?= timestamp($invoice['inv_payment_at']); ?></p>
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                        <!--end row-->
                                                    </div>
                                                    <!--end card-body-->
                                                </div><!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="card-body p-4">
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                                                <thead>
                                                                    <tr class="table-active">
                                                                        <th scope="col" style="width: 50px;">#</th>
                                                                        <th scope="col">Item</th>
                                                                        <th scope="col">Bulan</th>
                                                                        <th scope="col">Tahun</th>
                                                                        <th scope="col" class="text-end">Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="products-list">

                                                                    <?php $no = 1; ?>
                                                                    <?php foreach ($invoiceDetail as $id) : ?>
                                                                        <tr>
                                                                            <th scope="row">0<?= $no; ?></th>
                                                                            <td class="text-start">
                                                                                <span class="fw-medium">Tagihan <?= $id['tagihan_type']; ?></span>
                                                                            </td>
                                                                            <td><?= bulan($id['tagihan_bulan']); ?></td>
                                                                            <td><?= $id['tagihan_tahun']; ?></td>
                                                                            <td class="text-end"><?= rpbasic($id['tagihan_harga']); ?></td>
                                                                        </tr>
                                                                        <?php $no++; ?>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table><!--end table-->
                                                        </div>
                                                        <div class="border-top border-top-dashed mt-2">
                                                            <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Sub Total</td>
                                                                        <td class="text-end"><?= rpbasic($invoice['inv_total']); ?></td>
                                                                    </tr>
                                                                    <tr class="border-top border-top-dashed fs-15">
                                                                        <th scope="row">Total</th>
                                                                        <th class="text-end"><?= rpbasic($invoice['inv_total']); ?></th>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <!--end table-->
                                                        </div>
                                                    </div>
                                                    <!--end card-body-->
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->



                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?= $this->include('partials/footer') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
    <script src="/assets/js/jquery-3.6.0.min.js"></script>

    <?= $this->include('partials/customizer') ?>

    <?= $this->include('partials/vendor-scripts') ?>
    <script src="/assets/js/rupiah.js"></script>
    <!-- App js -->
    <script src="/assets/js/app.js"></script>
</body>

</html>