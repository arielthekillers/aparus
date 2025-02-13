<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Tagihan')); ?>
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

                        <div class="col">
                            <!-- alert -->
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
                        <!-- header -->

                        <div class="col-12 mb-3 d-print-none">

                            <h4 class="fs-16 mb-1">Detail Penghuni</h4>
                            <p class="text-muted mb-0">Pengelolaan Data Penghuni Rusun.</p>

                        </div>
                        <!--end col-->




                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?= $this->include('partials/content/penghuni') ?>
                                </div>
                                <div class="col-lg-9">
                                    <div class="card" id="demo">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card-header border-bottom-dashed p-4">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <img src="/assets/images/logo-dark.png" class="card-logo card-logo-dark" alt="logo dark" height="17">
                                                            <img src="/assets/images/logo-light.png" class="card-logo card-logo-light" alt="logo light" height="17">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end card-header-->
                                            </div><!--end col-->
                                            <div class="col-lg-12">
                                                <div class="card-body p-4 border-top border-top-dashed">
                                                    <div class="row g-3">
                                                        <div class="col-6">
                                                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Invoice Dari :</h6>
                                                            <p class="fw-medium mb-2" id="billing-name">UPT Rusunawa Bontang</p>
                                                            <p class="text-muted mb-1" id="billing-address-line-1">Jl. Patimura RT. 41, Kel. Api-Api</p>
                                                            <p class="text-muted mb-0"><span>Telepon: </span><span id="billing-phone-no">08125510517</span></p>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-6">
                                                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Invoice Kepada :</h6>
                                                            <p class="fw-medium mb-2" id="shipping-name"><?= $penghuni['nama']; ?></p>
                                                            <p class="text-muted mb-1" id="shipping-address-line-1"><?= $penghuni['alamat']; ?></p>
                                                            <p class="text-muted mb-1"><span>Telepon: </span><span id="shipping-phone-no"><?= $penghuni['kontak']; ?></span></p>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                                <!--end card-body-->
                                            </div><!--end col-->
                                            <div class="col-lg-12">
                                                <div class="card-body p-4">
                                                    <div class="row g-3">
                                                        <div class="col-lg-3 col-6">
                                                            <p class="text-muted mb-2 text-uppercase fw-semibold">No Invoice</p>
                                                            <h5 class="fs-14 mb-0">#<span id="invoice-no"><?= $invoice['inv_nomor']; ?></span></h5>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-lg-3 col-6">
                                                            <p class="text-muted mb-2 text-uppercase fw-semibold">Tgl Dibuat</p>
                                                            <h5 class="fs-14 mb-0"><span id="invoice-date"><?= timestamp($invoice['inv_created_at']); ?></span></h5>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-lg-3 col-6">
                                                            <p class="text-muted mb-2 text-uppercase fw-semibold">Status</p>
                                                            <h5 class="fs-14 mb-0"><?= invoiceStatus($invoice['inv_payment']); ?></h5>
                                                            </span>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-lg-3 col-6">
                                                            <p class="text-muted mb-2 text-uppercase fw-semibold">Total Pembayaran</p>
                                                            <h5 class="fs-14 mb-0"><?= rpbasic($invoice['inv_total']); ?></h5>
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
                                                    <!-- <div class="mt-3">
                                                        <h6 class="text-muted text-uppercase fw-semibold mb-3">Detail Pembayaran:</h6>
                                                        <p class="text-muted mb-1">Payment Method: <span class="fw-medium" id="payment-method"></span></p>
                                                        <p class="text-muted mb-1">Card Holder: <span class="fw-medium" id="card-holder-name">David Nichols</span></p>
                                                        <p class="text-muted mb-1">Card Number: <span class="fw-medium" id="card-number">xxx xxxx xxxx 1234</span></p>
                                                        <p class="text-muted">Total Amount: <span class="fw-medium" id="">$ </span><span id="card-total-amount">755.96</span></p>
                                                    </div> -->
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <!-- Primary Alert -->
                                                            <div class="alert alert-info alert-additional fade show material-shadow" role="alert">
                                                                <div class="alert-body">
                                                                    <div class="d-flex">
                                                                        <div class="flex-shrink-0 me-3">
                                                                            <img src="/assets/images/Logo_Bankaltimtara.png" class="card-logo" width="150px">
                                                                        </div>
                                                                        <div class="flex-grow-1">
                                                                            <h5 class="alert-heading">Virtual Account Bank Kaltimtara</h5>
                                                                            <p class="mb-0"><span class="fw-semibold">No. Virtual Account :</span> <?= wordwrap($invoice['inv_payment_va'], 4, ' ', true) ?></p>
                                                                            <p class="mb-0"><span class="fw-semibold">Nominal :</span> <?= rpbasic($invoice['inv_total']); ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="alert-content">
                                                                    <p class="mb-0">Pastikan anda membayar sesuai dengan nominal yang tertera diatas.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="alert alert-info">
                                                                <p class="mb-0"><span class="fw-semibold">CATATAN:</span>
                                                                    <span id="note">Pembayaran bisa dilakukan langsung ke kasir pembayaran UPT Rusunawa Bontang atau melalui Virtual Account Bank Kaltim.
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                                        <a href="javascript:window.print()" class="btn btn-success"><i class="ri-printer-line align-bottom me-1"></i> Print</a>
                                                        <a href="javascript:void(0);" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
                                                    </div>
                                                </div>
                                                <!--end card-body-->
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div>
                                </div>
                            </div>
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
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
        $(document).ready(function() {
            // Function to check payment status
            function checkPaymentStatus() {
                $.ajax({
                    url: "<?php echo base_url('/payment/status/' . $invoice['inv_nomor']); ?>",
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        if (data.status === "2") {
                            window.location.href = "<?php echo base_url('/payment/confirm/' . $invoice['inv_nomor']); ?>";
                        } else {
                            setTimeout(checkPaymentStatus, 5000); // Check again in 5 seconds
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error checking payment status:", status, error);
                        // Handle error case if needed
                    }
                });
            }

            // Initial check when the page loads
            var initialPaymentStatus = "<?php echo $invoice['inv_payment']; ?>";

            if (initialPaymentStatus === "1") {
                checkPaymentStatus(); // Start checking if payment is unpaid (status 1)
            }
        });
    </script>



    <?= $this->include('partials/customizer') ?>

    <?= $this->include('partials/vendor-scripts') ?>

    <script src="/assets/js/rupiah.js"></script>



    <!-- App js -->
    <script src="/assets/js/app.js"></script>

</body>