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

                        <div class="col-12 mb-3">

                            <h4 class="fs-16 mb-1">Detail Penghuni</h4>
                            <p class="text-muted mb-0">Pengelolaan Data Penghuni Rusun.</p>

                        </div>
                        <!--end col-->




                        <div class="col">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?= $this->include('partials/content/penghuni') ?>
                                </div>
                                <div class="col-lg-9">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex border-0">
                                            <h4 class="card-title mb-0 flex-grow-1">Invoice</h4>
                                        </div><!-- end card header -->
                                        <div class="card-body">
                                            <div class="table-responsive mb-4">
                                                <?php if (empty($invoice)) : ?>
                                                    <script src="https://cdn.lordicon.com/lordicon.js"></script>
                                                    <h5 class="text-center">
                                                        <lord-icon src="https://cdn.lordicon.com/uecgmesg.json" trigger="loop" style="width:100px;height:100px"></lord-icon>
                                                    </h5>
                                                    <p class="text-center text-muted">Data Tidak Ditemukan</p>
                                                <?php else : ?>
                                                    <table class="table table-striped align-middle table-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nomor Invoice</th>
                                                                <th>Total</th>
                                                                <th>Dibuat Pada</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <?php $no = 1; ?>
                                                        <tbody class="list">
                                                            <?php foreach ($invoice as $data) : ?>
                                                                <tr>
                                                                    <td><?= $no; ?></td>
                                                                    <td><a href="<?= site_url('penghuni/invoiceDetail/' . $data['inv_nomor'] . '/' . $kode); ?>">#<?= $data['inv_nomor']; ?></a></td>
                                                                    <td><?= rpbasic($data['inv_total']); ?></td>
                                                                    <td><?= timestamp($data['inv_created_at']); ?></td>
                                                                    <td><?= invoiceStatus($data['inv_payment']); ?></td>
                                                                </tr>
                                                                <?php $no += 1; ?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                    <!--end table-->
                                                <?php endif; ?>
                                            </div>
                                        </div>
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
        var myModal = document.getElementById('modalAngkotakeluarga')
        var myInput = document.getElementById('nama')
        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
        $(document).on('keydown', function(e) {
            // You may replace `m` with whatever key you want
            if ((e.metaKey || e.ctrlKey) && (String.fromCharCode(e.which).toLowerCase() === 'm')) {
                $("#modalAngkotakeluarga").modal('show');
            }
        });
        window.setTimeout(function() {
            $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
        $(document).ready(function() {
            $('#modalAnggotakeluargaEdit').on('show.bs.modal', function(e) {
                $('.id_anggotakeluarga').attr('value', '');
                $('.nama').attr('value', '');
                $('.tanggal_lahir').attr('value', '');
                $('.jenis_kelamin option:selected').removeAttr('selected');
                $('.status option:selected').removeAttr('selected');
                $('.pendidikan option:selected').removeAttr('selected');
                $('.pendapatan').attr('value', '');
                $('.savebutton').prop('disabled', true);
                var idx = $(e.relatedTarget).data('id');
                $.ajax({
                    url: "<?php echo base_url('/penghuni/detailAnggotakeluarga'); ?>",
                    method: "POST",
                    data: {
                        id: idx
                    },
                    async: true,
                    dataType: "JSON",
                    success: function(data) {
                        //console.log(data);
                        $('.id_anggotakeluarga').attr('value', data.id_anggotakeluarga);
                        $('.nama').attr('value', data.nama);
                        $('.tanggal_lahir').attr('value', data.tanggal_lahir);
                        $('.jenis_kelamin option[value="' + data.jenis_kelamin + '"]').prop('selected', 'selected');
                        $('.status option[value="' + data.status + '"]').prop('selected', 'selected');
                        $('.pendidikan option[value="' + data.pendidikan + '"]').prop('selected', 'selected');
                        $('.pendapatan').attr('value', data.pendapatan);
                        $('.savebutton').removeAttr('disabled');
                    }
                });
            });
        });
    </script>



    <?= $this->include('partials/customizer') ?>

    <?= $this->include('partials/vendor-scripts') ?>

    <script src="/assets/js/rupiah.js"></script>



    <!-- App js -->
    <script src="/assets/js/app.js"></script>

</body>