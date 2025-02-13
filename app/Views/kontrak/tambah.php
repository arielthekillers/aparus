<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Tambah Kontrak')); ?>

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

                    <?php echo view('partials/page-title', array('pagetitle' => 'Kontak', 'title' => 'Tambah Kontrak')); ?>

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
                    <div class="row justify-content-center">
                        <div class="col-xxl-9">
                            <div class="card" id="demo">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-body p-4">
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <h6 class="text-muted text-uppercase fw-semibold mb-3">Details</h6>
                                                    <p class="fw-medium mb-1 fs-14"><?= $penghuni['nama']; ?></p>
                                                    <p class="text-muted mb-0"><?= $penghuni['ktp']; ?></p>
                                                    <p class="text-muted mb-0"><?= $penghuni['tempat_lahir']; ?>, <?= tgl_indo2($penghuni['tanggal_lahir']); ?></p>

                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </div>
                                        <!--end card-body-->
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="card-body p-4 border-top border-top-dashed">
                                            <div class="row g-3">
                                                <div class="col-lg-3 col-6">
                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Id Penghuni</p>
                                                    <h5 class="fs-14 mb-0"><a href="<?= site_url('penghuni/edit/' . $penghuni['kode_penghuni']); ?>">#<?= strtoupper($penghuni['kode_penghuni']); ?></a></h5>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-3 col-6">
                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Tgl Pengajuan</p>
                                                    <h5 class="fs-14 mb-0"><?= timestamp2($penghuni['created_at']); ?></h5>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-3 col-6">
                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Rusun Tujuan</p>
                                                    <h5 class="fs-14 mb-0"><?= $penghuni['rusun_nama']; ?></h5>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-3 col-6">
                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Kontak</p>
                                                    <p class="text-muted mb-1"><span><i class="ri-phone-line"></i> </span><span id="billing-phone-no"><?= $penghuni['kontak']; ?></span></p>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </div>
                                        <!--end card-body-->
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="card-body p4 border-top border-top-dashed">
                                            <div class="live-preview">
                                                <form action="<?= site_url('kontrak/save'); ?>" method="POST">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <input required type="hidden" name="kontrak_id" value="<?= $permohonan['kontrak_id']; ?>">
                                                                <div class="col-4">
                                                                    <div class="mb-3">
                                                                        <label for="rusun" class="form-label text-muted text-uppercase fw-semibold">Rusun</label>
                                                                        <select class="form-select" id="rusun" name="rusun" required>
                                                                            <option value="" selected>Pilih...</option>
                                                                            <?php foreach ($rusun as $r) : ?>
                                                                                <option value="<?= $r['rusun_id']; ?>"><?= $r['rusun_nama']; ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="mb-3">
                                                                        <label for="lantai" class="form-label text-muted text-uppercase fw-semibold">Lantai</label>
                                                                        <select class="form-select" id="lantai" name="lantai" required>
                                                                            <option value="" selected>Pilih...</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="mb-3">
                                                                        <label for="kamar" class="form-label text-muted text-uppercase fw-semibold">Kamar</label>
                                                                        <select class="form-select" id="kamar" name="kamar" required>
                                                                            <option value="" selected>Pilih...</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="nomor-kontrak" class="form-label text-muted text-uppercase fw-semibold">Nomor Kontrak</label>
                                                                        <input type="text" class="form-control" id="nomor-kontrak" name="nomor_kontrak" value="<?= generateContractNumber('123'); ?>" required readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-3">
                                                                    <div class="mb-3">
                                                                        <label for="tgl_mulai" class="form-label text-muted text-uppercase fw-semibold">Tgl Mulai Kontrak</label>
                                                                        <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" value="<?= date('Y-m-d'); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="col-3">
                                                                    <div class="mb-3">
                                                                        <label for="tgl_akhir" class="form-label text-muted text-uppercase fw-semibold">Tgl Berakhir Kontrak</label>
                                                                        <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" value="<?= date('Y-m-d', strtotime(date("Y-m-d", time()) . " + 365 day")); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-12 mt-3">
                                                            <div class="alert alert-info">
                                                                <p class="mb-0"><span class="fw-semibold">NOTES:</span>
                                                                    <span id="note">Kontrak berlangsung selama 1 tahun dan akan dilakukan perpanjangan kontrak setiap tahunnya. Kontrak ini bersifat mengikat, maka yang bersangkutan dibebani pembayaran setiap bulannya berupa pembayaran sewa hunian dan pembayaran air sesuai dengan ketentuan yang berlaku di masing-masing rusun
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="text-end">
                                                                <button type="submit" class="btn btn-primary">Proses Kontrak</button>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                            </div>
                        </div>
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

    <script src="/assets/js/jquery-3.6.0.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#rusun').change(function() {
                var id_rusun = $('#rusun').val();
                if (id_rusun != '') {
                    $.ajax({
                        url: "<?php echo base_url('/rusun/datalantai'); ?>",
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
                                html += '<option value="' + data[count].lantai_id + '">' + data[count].lantai_kode + ' - ' + data[count].lantai_nama + '</option>';
                            }
                            $('#lantai').html(html);
                        }
                    });
                } else {
                    var html = '<option value="">Pilih...</option>';
                    $('#lantai').html(html);
                    $('#kamar').html(html);
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#lantai').change(function() {
                var id_lantai = $('#lantai').val();
                if (id_lantai != '') {
                    $.ajax({
                        url: "<?php echo base_url('/rusun/datakamar'); ?>",
                        method: "POST",
                        data: {
                            parent: id_lantai
                        },
                        async: true,
                        dataType: "JSON",
                        success: function(data) {
                            console.log(data);
                            var html = '<option value="">Pilih...</option>';
                            for (var count = 0; count < data.length; count++) {
                                html += '<option value="' + data[count].kamar_id + '">' + data[count].kamar_kode + ' - ' + data[count].kamar_nomor + '</option>';
                            }
                            $('#kamar').html(html);
                        }
                    });
                } else {
                    var html = '<option value="">Pilih...</option>';
                    $('#kamar').html(html);
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var startDateInput = document.getElementById('tgl_mulai');
            var endDateInput = document.getElementById('tgl_akhir');

            startDateInput.addEventListener('change', function() {
                var startDate = new Date(this.value);
                var endDate = new Date(startDate);

                endDate.setDate(startDate.getDate() + 365); // Add 365 days

                var dd = endDate.getDate();
                var mm = endDate.getMonth() + 1; // January is 0
                var yyyy = endDate.getFullYear();

                if (dd < 10) {
                    dd = '0' + dd;
                }
                if (mm < 10) {
                    mm = '0' + mm;
                }

                endDateInput.value = yyyy + '-' + mm + '-' + dd;
            });
        });
    </script>

    <!-- Autohide alert after 3 second -->
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>

    <script src="/assets/js/app.js"></script>

</body>

</html>