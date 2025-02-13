<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Rusun', 'subtitle' => 'Kamar')); ?>

    <?= $this->include('partials/head-css') ?>

    <style>
        .card-img-top {
            width: 100%;
            height: 18rem;
            object-fit: cover;
        }
    </style>

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

                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <div class="flex-grow-1">
                                                <h4 class="fs-16 mb-1">Master Rusun</h4>
                                                <p class="text-muted mb-0">Pengelolaan Data Master Rusun berikut Lantai dan kamar.</p>
                                            </div>
                                            <div class="mt-3 mt-lg-0">
                                                <div class="row g-3 mb-0 align-items-center">
                                                    <div class="col-auto">
                                                        <a type="button" class="btn btn-soft-secondary" href="<?= site_url('rusun/lantai/' . $rusun['rusun_id']); ?>">
                                                            <i class="ri-arrow-left-line align-middle me-1"></i> Kembali
                                                        </a>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                            </div>
                                        </div><!-- end card header -->
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->

                                <div class="row">

                                    <div class="col-sm-12 col-xl-4">
                                        <!-- Simple card -->
                                        <div class="card">
                                            <img class="card-img-top img-fluid" src="/uploads/rusun/_small/<?= $rusun['rusun_foto']; ?>" alt="Card image cap">
                                            <div class="card-body">
                                                <h4 class="card-title mb-2"><?= $rusun['rusun_nama']; ?></h4>
                                                <h5 class="fs-14 mb-1">Alamat</h5>
                                                <p class="text-muted"><?= $rusun['rusun_alamat']; ?></p>
                                                <h5 class="fs-14 mb-1">Kode Rusun</h5>
                                                <div class="avatar-xs me-2 flex-shrink-0 mb-2">
                                                    <div class="avatar-title bg-secondary-subtle rounded">
                                                        <?= $rusun['rusun_kode']; ?>
                                                    </div>
                                                </div>
                                                <h5 class="fs-14 mb-1">Deskripsi</h5>
                                                <p class="text-muted"><?= $rusun['rusun_deskripsi']; ?></p>
                                            </div>
                                        </div><!-- end card -->
                                    </div>

                                    <div class="col-xl-8">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card card-animate bg-primary">
                                                    <div class="card-body p-0">
                                                        <div class="row g-0 text-center">
                                                            <div class="col-6 col-sm-4">
                                                                <div class="p-3">
                                                                    <p class="text-white-50 mb-1">Lantai</p>
                                                                    <h5 class="mb-0 text-white"><?= $lantai['lantai_nama']; ?></h5>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-6 col-sm-4">
                                                                <div class="p-3">
                                                                    <p class="text-white-50 mb-1">Kode Lantai</p>
                                                                    <div class="badge bg-white text-primary mb-0 fs-12"><?= $lantai['lantai_kode']; ?></div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-6 col-sm-4">
                                                                <div class="p-3">
                                                                    <p class="text-white-50 mb-1">Total Kamar</p>
                                                                    <h5 class="text-white mb-0"><?= count($kamar); ?></h5>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="flex-grow-1">
                                                        <h4 class="fs-16 mb-0">Daftar Kamar</span></h4>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahMasterKamar">
                                                            <i class="ri-add-line align-middle me-1"></i> Tambah Kamar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                        <div class="row">
                                            <?php $no = 1; ?>
                                            <?php if (!empty($lantai)) : ?>
                                                <?php foreach ($kamar as $k) : ?>

                                                    <div class="col-lg 3 col-md-4 col-sm-6">
                                                        <div class="card card-animate overflow-hidden">
                                                            <div class="position-absolute start-0" style="z-index: 0;">
                                                                <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 120" width="200" height="120">
                                                                    <style>
                                                                        .s0 {
                                                                            opacity: .05;
                                                                            fill: var(--vz-primary)
                                                                        }
                                                                    </style>
                                                                    <path id="Shape 8" class="s0" d="m189.5-25.8c0 0 20.1 46.2-26.7 71.4 0 0-60 15.4-62.3 65.3-2.2 49.8-50.6 59.3-57.8 61.5-7.2 2.3-60.8 0-60.8 0l-11.9-199.4z"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="d-flex justify-content-between">
                                                                    <div>
                                                                        <p class="fw-medium text-muted mb-0">Nomor</p>
                                                                        <h3 class="mt-2 ff-secondary fw-semibold"><span class="text-muted"><?= $lantai['lantai_kode']; ?>-</span><?= $k['kamar_nomor']; ?></h3>
                                                                        <p class="mb-1 text-muted"><span class="badge bg-light text-success mb-0 fs-12"> Rp. <?= $k['kamar_harga']; ?> </span> /bln</p>
                                                                    </div>
                                                                    <div>
                                                                        <div class="dropdown">
                                                                            <a href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="ri-more-2-fill align-middle"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editMasterKamar" data-id="<?= $k['kamar_id']; ?>">Edit Kamar</a></li>
                                                                                <li><a class="dropdown-item remove-item-btn" href="<?= site_url('rusun/deleteKamar/' . $rusun['rusun_id'] . '/' . $lantai['lantai_id'] . '/' . $k['kamar_id']); ?>" onclick="return confirm('Anda yakin ingin menghapus Kamar ini?');">Hapus</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card body -->
                                                        </div> <!-- end card-->
                                                    </div>

                                                    <?php $no++; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <p class="text-muted text-center pt-5">Data Kamar belum tersedia. Klik Tambah Lantai</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div id="tambahMasterKamar" class="modal fade" tabindex="-1" aria-labelledby="tambahMasterKamarLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tambahMasterKamarLabel">Master Rusun - Tambah Kamar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data" action="<?= site_url('rusun/tambahKamar'); ?>">
                                                    <div class="row g-3">
                                                        <div class="col-lg-12">
                                                            <div>
                                                                <label for="namaLantai" class="form-label">Nomor Kamar</label>
                                                                <input type="text" name="rusun" value="<?= $rusun['rusun_id']; ?>" class="d-none rusun">
                                                                <input type="text" name="lantai" value="<?= $lantai['lantai_id']; ?>" class="d-none lantai">
                                                                <input type="text" name="kodeLantai" value="<?= $lantai['lantai_kode']; ?>" class="d-none kodeLantai">
                                                                <input type="text" class="form-control namaLantai" name="nomorKamar" placeholder="Nomor Kamar" required>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-lg-12">
                                                            <div>
                                                                <label for="kodeBlok" class="form-label">Harga</label>
                                                                <input type="text" class="form-control harga" name="harga" placeholder="Harga" required>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-lg-12">
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
                                                            </div>
                                                        </div><!--end col-->
                                                    </div><!--end row-->
                                                </form>

                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>

                                <div id="editMasterKamar" class="modal fade" tabindex="-1" aria-labelledby="editMasterKamarLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editMasterKamarLabel">Master Rusun - Edit Kamar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data" action="<?= site_url('rusun/updateKamar'); ?>">
                                                    <div class="row g-3">
                                                        <div class="col-lg-12">
                                                            <div>
                                                                <label for="nomorKamar" class="form-label">Nomor Kamar</label>
                                                                <input type="text" name="rusun" value="<?= $rusun['rusun_id']; ?>" class="d-none">
                                                                <input type="text" name="lantai" value="<?= $lantai['lantai_id']; ?>" class="d-none">
                                                                <input type="text" name="kamar" class="kamar d-none">
                                                                <input type="text" name="nomorKamar" class="form-control nomorKamar" placeholder="Nomor Kamar" required>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-lg-12">
                                                            <div>
                                                                <label for="harga" class="form-label">Harga</label>
                                                                <input type="text" class="form-control harga" name="harga" placeholder="Harga" required>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-lg-12">
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary btnupdate">Simpan</button>
                                                            </div>
                                                        </div><!--end col-->
                                                    </div><!--end row-->
                                                </form>

                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>



                            </div> <!-- end .h-100-->
                        </div> <!-- end col -->
                    </div> <!-- end row -->


                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
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
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#editMasterKamar').on('show.bs.modal', function(e) {
                $('.nomorKamar').val("");
                $('.harga').val("");
                $('.kamar').val("");
                $('.btnupdate').prop('disabled', true);
                var idx = $(e.relatedTarget).data('id');
                $.ajax({
                    url: "<?php echo base_url('/rusun/kamarDetail'); ?>",
                    method: "POST",
                    data: {
                        id: idx
                    },
                    async: true,
                    dataType: "JSON",
                    success: function(data) {
                        $('.nomorKamar').val(data.kamar_kode);
                        $('.kamar').val(data.kamar_id);
                        $('.harga').val(data.kamar_harga);
                        $('.nomorKamar').prop('readonly', true);
                        $('.btnupdate').removeAttr('disabled');
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tambahMasterKamar').on('show.bs.modal', function(e) {
                $('.nomorKamar').val("");
                $('.harga').val("");
                $('.btnsimpan').prop('disabled', false);
            });
        });
    </script>


    <!-- App js -->
    <script src="/assets/js/app.js"></script>

</body>

</html>