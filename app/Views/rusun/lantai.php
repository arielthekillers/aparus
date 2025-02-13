<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Master Rusun', 'subtitle' => 'Lantai')); ?>

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

                            <div class="h-100">
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
                                                        <a type="button" class="btn btn-soft-secondary" href="<?= site_url('rusun/list/' . $rusun['rusun_id']); ?>">
                                                            <i class="ri-arrow-left-line align-middle me-1"></i> Kembali
                                                        </a>
                                                        <div id="tambahMasterLantai" class="modal fade" tabindex="-1" aria-labelledby="tambahMasterLantaiLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="tambahMasterLantaiLabel">Master Rusun - Tambah Lantai</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" enctype="multipart/form-data" action="<?= site_url('rusun/tambahLantai'); ?>">
                                                                            <div class="row g-3">
                                                                                <div class="col-lg-12">
                                                                                    <div>
                                                                                        <label for="namaLantai" class="form-label">Nama Lantai</label>
                                                                                        <input type="text" name="rusun" value="<?= $rusun['rusun_id']; ?>" class="d-none rusun">
                                                                                        <input type="text" class="form-control namaLantai" name="namaLantai" placeholder="Nama Lantai" required>
                                                                                    </div>
                                                                                </div><!--end col-->
                                                                                <div class="col-lg-12">
                                                                                    <div>
                                                                                        <label for="kodeBlok" class="form-label">Kode Blok</label>
                                                                                        <input type="text" class="kodeRusun d-none" name="kodeRusun" value="<?= $rusun['rusun_kode']; ?>">
                                                                                        <input type=" text" class="form-control kodeBlok1" name="kodeBlok" placeholder="Kode Blok" required>
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
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->

                                            </div>
                                        </div><!-- end card header -->
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->

                                <div class="row">

                                    <div class="col-sm-12 col-xl-4">

                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0"><?= $rusun['rusun_nama']; ?></h4>
                                            </div>
                                            <img class="img-fluid" src="/uploads/rusun/_small/<?= $rusun['rusun_foto']; ?>" alt="Card image cap">
                                            <div class="card-body">
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
                                        </div>
                                    </div>

                                    <div class="col-xl-8">
                                        <div class="card card-height-100">
                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Daftar Lantai</h4>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahMasterLantai">
                                                    <i class="ri-add-line align-middle me-1"></i> Tambah Lantai
                                                </button>
                                            </div><!-- end card header -->

                                            <div class="card-body">
                                                <div class="table-responsive table-card">
                                                    <table class="table table-centered table-hover align-middle table-nowrap mb-0">
                                                        <tbody>
                                                            <?php $no = 1; ?>
                                                            <?php if (!empty($lantai)) : ?>
                                                                <?php foreach ($lantai as $value) : ?>
                                                                    <tr>
                                                                        <td>
                                                                            <h6 class="mb-0 text-center"><?= $no; ?></h6>
                                                                        </td>
                                                                        <td>
                                                                            <h6 class="mb-0"><?= $value['lantai_nama']; ?></h6>
                                                                        </td>
                                                                        <td>
                                                                            <div class="badge bg-primary p-2"><?= $value['lantai_kode']; ?></div>
                                                                        </td>
                                                                        <td>
                                                                            <?= $value['jumlahKamar']; ?> Kamar
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?= site_url('rusun/kamar/' . $rusun['rusun_id'] . '/' . $value['lantai_id']); ?>" class="btn btn-soft-primary"><i class="ri-home-7-line align-bottom"></i> Daftar Kamar</a>
                                                                        </td>
                                                                        <td class="text-end">
                                                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#editMasterLantai" data-id="<?= $value['lantai_id']; ?>">
                                                                                <i class="ri-edit-2-fill"></i>
                                                                            </button>
                                                                            <a href="<?= site_url('rusun/deleteLantai/' . $value['id_rusun'] . '/' . $value['lantai_id']); ?>" onclick="return confirm('Menghapus Data Lantai otomatis juga menghapus data kamar, Anda yakin ingin menghapus data ini?');" class="btn btn-sm btn-danger"><i class="ri-delete-bin-fill"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php $no++; ?>
                                                                <?php endforeach; ?>
                                                            <?php else : ?>
                                                                <p class="text-muted text-center pt-5">Data lantai belum tersedia. Klik Tambah Lantai</p>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div> <!-- .card-->
                                    </div>

                                </div>

                                <div id="editMasterLantai" class="modal fade" tabindex="-1" aria-labelledby="editMasterLantaiLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editMasterLantaiLabel">Master Rusun - Edit Lantai</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data" action="<?= site_url('rusun/updateLantai'); ?>">
                                                    <div class="row g-3">
                                                        <div class="col-lg-12">
                                                            <div>
                                                                <label for="namaLantai" class="form-label">Nama Lantai</label>
                                                                <input type="text" name="rusun" value="<?= $rusun['rusun_id']; ?>" class="d-none rusun">
                                                                <input type="text" name="id_lantai" class="d-none id_lantai">
                                                                <input type="text" class="form-control namaLantai" name="namaLantai" placeholder="Nama Lantai">
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-lg-12">
                                                            <div>
                                                                <label for="kodeBlok" class="form-label">Kode Blok</label>
                                                                <input type="text" class="form-control kodeBlok" name="kodeBlok" placeholder="Kode Blok">
                                                            </div>
                                                            <div id="kodeBlokHelpBlock" class="form-text">
                                                                Kode Blok Tidak Dapat dirubah.
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
                    </div>

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
            $('#editMasterLantai').on('show.bs.modal', function(e) {
                $('.id_lantai').val("");
                $('.namaLantai').val("");
                $('.kodeBlok').val("");
                $('.btnupdate').prop('disabled', false);
                var idx = $(e.relatedTarget).data('id');
                $.ajax({
                    url: "<?php echo base_url('/rusun/lantaiDetail'); ?>",
                    method: "POST",
                    data: {
                        id: idx
                    },
                    async: true,
                    dataType: "JSON",
                    success: function(data) {
                        $('.id_lantai').val(data.lantai_id);
                        $('.namaLantai').val(data.lantai_nama);
                        $('.kodeBlok').val(data.lantai_kode);
                        $('.kodeBlok').prop('readonly', true);
                        $('.btnupdate').removeAttr('disabled');
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tambahMasterLantai').on('show.bs.modal', function(e) {
                $('.namaLantai').val("");
                $('.kodeBlok1').val("");
                $('.btnsimpan').prop('disabled', false);
            });
        });
    </script>


    <!-- App js -->
    <script src="/assets/js/app.js"></script>

</body>

</html>