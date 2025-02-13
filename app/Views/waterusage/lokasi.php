<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Pencatatan Air')); ?>

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

                    <?php echo view('partials/page-title', array('pagetitle' => 'Data Air', 'title' => 'Pencatatan Air')); ?>

                    <?php if (session()->get('status')) : ?>
                        <div class="row alert-message">
                            <div class="col-lg-8">
                                <!-- Success Alert -->
                                <div class="alert alert-<?= session()->get('color'); ?> alert-border-left alert-dismissible fade shadow show" role="alert">
                                    <i class="<?= session()->get('icon'); ?> me-3 align-middle"></i> <strong><?= session()->get('status'); ?></strong> <?= session()->get('message'); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Lokasi Pendataan</h4>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div class="live-preview">
                                        <form action="<?= site_url('waterusage/catatair'); ?>" method="POST">

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="rusun" class="form-label">Rusun</label>
                                                        <select class="form-select" aria-label="Default select example" id="rusun" name="rusun">
                                                            <option value="">-- Pilih --</option>
                                                            <?php foreach ($rusun as $r) : ?>
                                                                <?php if ($r['rusun_id'] == session('rusun_pencatanair')) : ?>
                                                                    <option value="<?= $r['rusun_id']; ?>" selected><?= $r['rusun_nama']; ?></option>
                                                                <?php else : ?>
                                                                    <option value="<?= $r['rusun_id']; ?>"><?= $r['rusun_nama']; ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach  ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="lantai" class="form-label">Lantai</label>
                                                        <select class="form-select" aria-label="Default select example" id="lantai" name="lantai">
                                                            <option selected>-- Pilih --</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 border-top">
                                                    <div class="text-end mt-3">
                                                        <button type="submit" class="btn btn-primary">Lanjutkan</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                </div> <!-- container-fluid -->
            </div><!-- End Page-content -->

            <?= $this->include('partials/footer') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- @@include("partials/right-sidebar") -->


    <?= $this->include('partials/customizer') ?>

    <?= $this->include('partials/vendor-scripts') ?>

    <!-- Autohide alert after 3 second -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#rusun').change(function() {
                var id_rusun = $('#rusun').val();
                if (id_rusun != '') {
                    $.ajax({
                        url: "<?php echo base_url('/waterusage/datalantai'); ?>",
                        method: "POST",
                        data: {
                            parent: id_rusun
                        },
                        async: true,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data);
                            var html = '<option value="">Pilih...</option>';
                            for (var count = 0; count < data.length; count++) {
                                html += '<option value="' + data[count].lantai_id + '">' + data[count].lantai_nama + '</option>';
                            }
                            $('#lantai').html(html);
                        }
                    });
                } else {
                    $('#lantai').val('');
                }
            });
            window.setTimeout(function() {
                $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 3000);
        });
    </script>

    <script src="/assets/js/app.js"></script>

</body>

</html>