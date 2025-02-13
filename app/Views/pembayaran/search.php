<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Invoice Search')); ?>

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
                    <?php echo view('partials/page-title', array('pagetitle' => 'Pembayaran', 'title' => 'Invoice Search')); ?>


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

                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-6">
                            <div class="text-center mb-4">
                                <h4 class="fw-semibold fs-22">Invoice</h4>
                                <p class="text-muted mb-4 fs-15">Untuk melanjutkan proses pembayaran anda memerlukan nomor invoice.</p>
                            </div>
                            <form action="<?= site_url('kasir/invoice'); ?>" method="GET">
                                <div class="search-box align-middle ">
                                    <input type="text" autofocus class="form-control form-control-lg search" placeholder="Cari berdasarkan Nama, Nik, atau Kode Kamar..." name="keyword" minlength="5">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--end row-->
                    <?php if (!empty($kontrak)) : ?>
                        <div class="row mt-4">
                            <div class="col-12">
                                <h6 class="fs-14 text-muted "><?= count($kontrak); ?> Hasil Ditemukan :</h6>
                            </div>
                        </div>
                        <div class="row row-cols-xl-5 row-cols-lg-3 row-cols-md-2 row-cols-1 mt-2">
                            <?php foreach ($kontrak as $k) : ?>
                                <div class="col">
                                    <div class="card card-body card-animate text-center">
                                        <img src="<?= site_url('uploads/profil/' . $k['avatar']); ?>" alt="" class="avatar-md rounded-circle mx-auto d-block mt-2">
                                        <p class="text-muted mt-3">#<?= $k['kode_penghuni']; ?></p>
                                        <p class="card-title mb-1"><?= $k['nama']; ?></p>
                                        <p class="mb-1"><?= $k['ktp']; ?></p>
                                        <p class="mb-3"><?= $k['kamar_kode']; ?></p>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalInvoice" data-id="<?= $k['kontrak_id']; ?>">Lihat Invoice</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="modal fade" id="modalInvoice" tabindex="-1" aria-labelledby="modalInvoiceLabel" aria-modal="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalInvoiceLabel">Invoie</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div id="tabledata"></div>

                                    <!--end table-->
                                </div>
                            </div>
                        </div>
                    </div>
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
        $(document).ready(function() {
            $('#modalInvoice').on('show.bs.modal', function(e) {
                var idx = $(e.relatedTarget).data('id');
                $.ajax({
                    url: "<?php echo base_url('/invoice/getInvoiceByKontrak'); ?>",
                    method: "POST",
                    data: {
                        id: idx
                    },
                    async: true,
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data);
                        var html = '<table class="table table-striped align-middle table-nowrap mb-0">';
                        html += '<thead>';
                        html += '<tr>';
                        html += '<th> No </th>';
                        html += '<th> Nomor Invoice </th>';
                        html += '<th> Total </th>';
                        html += '<th class="text-center">#</th>';
                        html += '</tr>';
                        html += '</thead>';
                        html += '<tbody>';
                        for (var count = 0; count < data.length; count++) {
                            html += '<tr>';
                            html += '<td>' + (count + 1) + '</td>'
                            html += '<td>' + data[count].inv_nomor + '</td>'
                            html += '<td>' + data[count].inv_total + '</td>'
                            html += '<td class="text-center">' + '<a href ="/kasir/bayar/' + data[count].inv_nomor + '" class="btn btn-sm btn-primary">Bayar</a>' + '</td > '
                            html += '</tr>'
                        }
                        html += '</tbody>';
                        html += '</table>';
                        $('#tabledata').html(html);
                    }
                });
            });
        });
    </script>


    <!-- App js -->
    <script src="/assets/js/app.js"></script>

</body>

</html>