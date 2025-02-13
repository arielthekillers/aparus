<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Kasir')); ?>

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

                    <?php echo view('partials/page-title', array('pagetitle' => 'Pembayaran', 'title' => 'Kasir')); ?>


                    <div class="row">


                        <div class="col-xxl-12">
                            <div class="d-flex flex-column h-100">

                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-sm-12">
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
                                                    <div class="card-body p-4">
                                                        <div class="row g-3">
                                                            <div class="col-lg-3 col-6">
                                                                <h6 class="text-muted mb-2 text-uppercase fw-semibold">Penghuni</h6>
                                                                <p class="fw-medium mb-2"><?= $penghuni['nama']; ?></p>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-3 col-6">
                                                                <h6 class="text-muted mb-2 text-uppercase fw-semibold">Tgl Tagihan</h6>
                                                                <p class="fw-medium mb-2"><?= timestamp($invoice['inv_created_at']); ?></p>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-3 col-6">
                                                                <h6 class="text-muted mb-2 text-uppercase fw-semibold">Status</h6>
                                                                <p class="fw-medium mb-2"><?= invoiceStatus($invoice['inv_payment']); ?></p>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-3 col-6">
                                                                <span class="d-flex align-items-center">
                                                                    <img class="rounded-circle header-profile-user" src="<?= site_url('uploads/profil/' . session('avatar')); ?>"" alt=" Header Avatar">
                                                                    <span class="text-start ms-xl-2">
                                                                        <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Petugas </span>
                                                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?= session('nama'); ?></span>
                                                                    </span>
                                                                </span>
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
                                                        <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                                            <a href="#" class="btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#bayar"><i class="ri-money-dollar-circle-line align-bottom me-1"></i> Bayar</a>
                                                            <div id="bayar" class="modal fade" id="bayar" tabindex="-1" aria-labelledby="bayarLabel" aria-hidden="true" style="display: none;">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title text-primary" id="bayarLabel">Kasir :: Bayar</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <!-- form input aduan -->
                                                                            <form method="POST" action="<?= site_url('kasir/prosesbayar/' . $invoice['inv_nomor']); ?>">
                                                                                <div class="row g-3">
                                                                                    <div class="col-lg-12">
                                                                                        <div>
                                                                                            <label for="judul" class="form-label">Total Tagihan (Rp)</label>
                                                                                            <input type="hidden" value="<?= $invoice['inv_id']; ?>" name="invoice_id">
                                                                                            <input type="hidden" value="<?= $invoice['inv_nomor']; ?>" name="invoice_nomor">
                                                                                            <input type="hidden" value="<?= $invoice['inv_kontrak']; ?>" name="invoice_kontrak">
                                                                                            <input type="text" class="form-control form-control-lg" id="total" name="total" readonly value="<?= rpbasic($invoice['inv_total']); ?>">
                                                                                        </div>
                                                                                    </div><!--end col-->
                                                                                    <div class="col-lg-12">
                                                                                        <div>
                                                                                            <label for="judul" class="form-label">Diterima (Rp)</label>
                                                                                            <input type="text" class="form-control form-control-lg rupiah" id="nominal" name="nominal" placeholder="0.00" value="">
                                                                                        </div>
                                                                                    </div><!--end col-->
                                                                                    <div class="col-lg-12">
                                                                                        <div>
                                                                                            <label for="judul" class="form-label">Kembalian (Rp)</label>
                                                                                            <input type="text" class="form-control form-control-lg rupiah" id="kembalian" name="kembalian" placeholder="0.00" readonly>
                                                                                        </div>
                                                                                    </div><!--end col-->
                                                                                    <div class="col-lg-12">
                                                                                        <label for="deskripsi" class="form-label">Petugas</label>
                                                                                        <span class="d-flex align-items-center">
                                                                                            <img class="rounded-circle header-profile-user" src="<?= site_url('uploads/profil/' . session('avatar')); ?>" alt=" Header Avatar">
                                                                                            <span class="text-start ms-xl-2">
                                                                                                <input type="hidden" value="<?= session('userid'); ?>" name="petugas">
                                                                                                <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"><?= session('username'); ?> </span>
                                                                                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?= session('nama'); ?></span>
                                                                                            </span>
                                                                                        </span>
                                                                                    </div><!--end col-->
                                                                                    <div class="col-lg-12">
                                                                                        <div class="hstack gap-2 justify-content-end">
                                                                                            <button type="button" class="btn btn-light btn-lg" data-bs-dismiss="modal">Batal</button>
                                                                                            <button type="submit" class="btn btn-primary btn-lg" id="proses" disabled>Proses</button>
                                                                                        </div>
                                                                                    </div><!--end col-->
                                                                                </div><!--end row-->
                                                                            </form>

                                                                        </div><!-- /.modal-content -->
                                                                    </div><!-- /.modal-dialog -->
                                                                </div><!-- /.modal -->
                                                            </div>
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
    <script type="text/javascript">
        var myModal = document.getElementById('bayar')
        var myInput = document.getElementById('nominal')
        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>
    <script>
        // Function to parse and normalize the input value
        function normalizeValue(value) {
            return parseFloat(value.replace(/[^\d.-]/g, ''));
        }

        // Function to calculate kembalian
        function calculateKembalian() {
            // Get the total and nominal input values
            var totalInput = document.getElementById("total").value;
            var nominalInput = document.getElementById("nominal").value;
            // Normalize the total input value
            var total = normalizeValue(totalInput.replace("Rp. ", "").replace(".", "").replace(",", "."));
            // Normalize the nominal input value
            var nominal = parseFloat(nominalInput.replace(/\D/g, ''));
            // Calculate the kembalian
            var kembalian = nominal - total;
            // Update the kembalian input field
            document.getElementById("kembalian").value = ~~kembalian.toFixed(2);
            console.log(kembalian);
            if (kembalian >= 0) {
                document.getElementById("proses").disabled = false;
            } else {
                document.getElementById("proses").disabled = true;
            }
        }

        // Attach onchange event listener to the nominal input field
        document.getElementById("nominal").onkeyup = calculateKembalian;

        // Call the function initially to set the initial kembalian value
        calculateKembalian();
    </script>

    <?= $this->include('partials/customizer') ?>

    <?= $this->include('partials/vendor-scripts') ?>
    <script src="/assets/js/rupiah.js"></script>
    <!-- App js -->
    <script src="/assets/js/app.js"></script>
</body>

</html>