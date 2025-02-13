<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Master Rusun')); ?>

    <?= $this->include('partials/head-css') ?>

    <style>
        .card-img-top {
            width: 100%;
            height: 10rem;
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
                                                        <button type="button" class="btn btn-soft-secondary" data-bs-toggle="modal" data-bs-target="#tambahMasterRusun">
                                                            <i class="ri-add-circle-line align-middle me-1"></i> Tambah Data
                                                        </button>
                                                        <div id="tambahMasterRusun" class="modal fade" tabindex="-1" aria-labelledby="tambahMasterRusunLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="tambahMasterRusunLabel">Master Rusun - Tambah</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" enctype="multipart/form-data" action="<?= site_url('rusun/save'); ?>">
                                                                            <div class="row g-3">
                                                                                <div class="col-lg-12">
                                                                                    <div>
                                                                                        <label for="namaRusun" class="form-label">Nama Rusun</label>
                                                                                        <input type="text" class="form-control" name="namaRusun" placeholder="Nama Rusun" required>
                                                                                    </div>
                                                                                </div><!--end col-->
                                                                                <div class="col-lg-12">
                                                                                    <div>
                                                                                        <label for="kodeBlok" class="form-label">Kode Blok</label>
                                                                                        <input type="text" class="form-control" name="kodeBlok" placeholder="Kode Blok" required>
                                                                                    </div>
                                                                                </div><!--end col-->
                                                                                <div class="col-lg-12">
                                                                                    <div>
                                                                                        <label for="alamat" class="form-label">Alamat</label>
                                                                                        <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                                                                                    </div>
                                                                                </div><!--end col-->
                                                                                <div class="col-lg-12">
                                                                                    <div>
                                                                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                                                                        <textarea class="form-control" name="deskripsi" cols="30" rows="2" placeholder="Deskripsi"></textarea>
                                                                                    </div>
                                                                                </div><!--end col-->
                                                                                <div class="col-lg-12">
                                                                                    <div>
                                                                                        <label for="foto" class="form-label">Foto</label>
                                                                                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*" onchange="previewImage(this)">
                                                                                        <img id="imagePreview" src="#" alt="" class="img-fluid rounded my-2 imagePreview" width="50%">
                                                                                    </div>
                                                                                </div><!--end col-->
                                                                                <div class="col-lg-12">
                                                                                    <div class="hstack gap-2 justify-content-end">
                                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                                                                        <button type="submit" class="btn btn-primary">Simpan</button>
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


                                    <?php foreach ($rusun as $r) : ?>

                                        <div class="col-xxl-4">
                                            <div class="card card-animate">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <img class="card-img-top rounded-start img-fluid" src="/uploads/rusun/_small/<?= $r['rusun_foto']; ?>" alt="Card image">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-header d-flex">
                                                            <h5 class="card-title flex-grow-1 text-primary mb-0"><?= $r['rusun_nama']; ?></h5>
                                                            <div class="dropdown">
                                                                <a href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-2-fill align-middle"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item edit-item-btn" href="<?= site_url('rusun/lantai/' . $r['rusun_id']); ?>">Daftar Lantai</a></li>
                                                                    <li><a class="dropdown-item regenerate-api-btn" data-bs-toggle="modal" data-bs-target="#editMasterRusun" data-id="<?= $r['rusun_id']; ?>">Edit Rusun</a></li>
                                                                    <li><a class="dropdown-item remove-item-btn" href="<?= site_url('rusun/delete/' . $r['rusun_id']); ?>" onclick="return confirm('Menghapus Data Rusun otomatis juga akan menghapus seluruh data Lantai dan kamar. Anda yakin ingin menghapus Rusun ini?');">Hapus</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="d-flex mini-stats-wid">
                                                                <div class="avatar-sm flex-shrink-0">
                                                                    <span class="avatar-title bg-primary-subtle rounded fs-4 fw-bold text-light mini-stat-icon">
                                                                        <?= $r['rusun_kode']; ?>
                                                                    </span>
                                                                </div>
                                                                <div class="flex-shrink-1 ms-3">
                                                                    <p class="card-text mb-1"><?= $r['rusun_alamat']; ?></p>
                                                                    <p class="card-text">
                                                                        <small class="text-muted"><?= $r['created_at']; ?></small>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card -->
                                        </div><!-- end col -->

                                    <?php endforeach; ?>

                                </div>

                                <div id="editMasterRusun" class="modal fade" tabindex="-1" aria-labelledby="editMasterRusunLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editMasterRusunLabel">Master Rusun - Edit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" enctype="multipart/form-data" action="<?= site_url('rusun/save'); ?>">
                                                    <div class="row g-3">
                                                        <div class="col-lg-12">
                                                            <div>
                                                                <label for="namaRusun" class="form-label">Nama Rusun</label>
                                                                <input type="text" class="id d-none" name="id">
                                                                <input type="text" class="form-control namaRusun" name="namaRusun" placeholder="Nama Rusun">
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
                                                            <div>
                                                                <label for="alamat" class="form-label">Alamat</label>
                                                                <input type="text" class="form-control alamat" name="alamat" placeholder="Alamat">
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-lg-12">
                                                            <div>
                                                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                                                <textarea class="form-control deskripsi" name="deskripsi" cols="30" rows="2" placeholder="Deskripsi"></textarea>
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-lg-12">
                                                            <div>
                                                                <label for="foto" class="form-label">Foto</label>
                                                                <input type="file" class="form-control foto" id="foto" name="foto" accept="image/*" onchange="previewImage(this)">
                                                                <input type="text" class="fotolama d-none" name="fotolama">
                                                                <img id="imagePreview" src="" alt="" class="img-fluid rounded my-2 imagePreview" width="50%">
                                                            </div>
                                                        </div><!--end col-->
                                                        <div class="col-lg-12">
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
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
            $('#editMasterRusun').on('show.bs.modal', function(e) {
                $('.id').attr('value', '');
                $('.namaRusun').attr('value', '');
                $('.kodeBlok').attr('value', '');
                $('.alamat').attr('value', '');
                $('.deskripsi').attr('value', '');
                $('.savebtn').prop('disabled', true);
                var idx = $(e.relatedTarget).data('id');
                $.ajax({
                    url: "<?php echo base_url('/rusun/detail'); ?>",
                    method: "POST",
                    data: {
                        id: idx
                    },
                    async: true,
                    dataType: "JSON",
                    success: function(data) {
                        $('.id').attr('value', data.rusun_id);
                        $('.namaRusun').attr('value', data.rusun_nama);
                        $('.kodeBlok').attr('value', data.rusun_kode);
                        $('.alamat').attr('value', data.rusun_alamat);
                        $('.deskripsi').val(data.rusun_deskripsi);
                        $('.fotolama').val(data.rusun_foto);
                        $('.imagePreview').attr('src', '/uploads/rusun/' + data.rusun_foto);
                        $('.kodeBlok').prop('readonly', true);
                        $('.savebtn').removeAttr('disabled');
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tambahMasterRusun').on('show.bs.modal', function(e) {
                $('.id').attr('value', '');
                $('.namaRusun').attr('value', '');
                $('.kodeBlok').attr('value', '');
                $('.alamat').attr('value', '');
                $('.deskripsi').attr('value', '');
                $('.imagePreview').attr('src', '');
                $('.savebtn').prop('disabled', false);
            });
        });
    </script>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.imagePreview')
                        .attr('src', e.target.result);
                    $('imagePreview').show();
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <!-- App js -->
    <script src="/assets/js/app.js"></script>

</body>

</html>