<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Daftar Shortcut')); ?>

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

                    <?php echo view('partials/page-title', array('pagetitle' => 'Shortcut', 'title' => 'Daftar Shortcut')); ?>
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
                                                <h4 class="fs-16 mb-1">Master Shortcut</h4>
                                                <p class="text-muted mb-0"></p>
                                            </div>
                                            <div class="mt-3 mt-lg-0">
                                                <div class="row g-3 mb-0 align-items-center">
                                                    <div class="col-auto">
                                                        <button type="button" class="btn btn-soft-secondary" data-bs-toggle="modal" data-bs-target="#tambahShortcut">
                                                            <i class="ri-add-circle-line align-middle me-1"></i> Tambah Data
                                                        </button>
                                                        <div id="tambahShortcut" class="modal fade" tabindex="-1" aria-labelledby="tambahShortcutLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="tambahShortcutLabel">Shortcut - Tambah</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" enctype="multipart/form-data" action="<?= site_url('shortcut/save'); ?>">
                                                                            <div class="row g-3">
                                                                                <div class="col-lg-12">
                                                                                    <div>
                                                                                        <label for="nama" class="form-label">Nama Shortcut</label>
                                                                                        <input type="text" class="form-control" name="nama" placeholder="Shortcut" required>
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
                                                                                        <label for="link" class="form-label">Link</label>
                                                                                        <input type="text" class="form-control" name="link" placeholder="Link" required>
                                                                                    </div>
                                                                                </div><!--end col-->
                                                                                <div class="col-lg-12">
                                                                                    <div>
                                                                                        <label for="foto" class="form-label">Icon</label>
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


                                    <?php if (count($shortcut) > 0) : ?>
                                        <?php foreach ($shortcut as $r) : ?>
                                            <div class="col-xl-4 col-lg-4 col-md-6">
                                                <div class="card card-animate">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="flex-shink-0">
                                                                <img src="/uploads/shortcut/_small/<?= $r['icon']; ?>" alt="" class="avatar-sm object-cover rounded">
                                                            </div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h5 class="mb-1 card-title"><?= $r['nama']; ?></h5>
                                                                <p class="text-muted mb-0"><?= $r['deskripsi']; ?></p>
                                                                <p class="mb-0 text-primary"><?= $r['link']; ?></p>
                                                            </div>
                                                            <div>
                                                                <div class="dropdown float-end">
                                                                    <button class="btn btn-ghost-primary btn-icon dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-2-fill align-middle fs-16"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li>
                                                                            <a class="dropdown-item edit-item-btn" data-bs-toggle="modal" data-bs-target="#editShortcut" data-id="<?= $r['id_shortcut']; ?>"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item remove-item-btn" href="<?= site_url('short$shortcut/delete/' . $r['id_shortcut']); ?>" onclick="return confirm('Anda yakin ingin menghapus ?');">
                                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </div>

                            </div>

                            <div id="editShortcut" class="modal fade" tabindex="-1" aria-labelledby="editShortcutLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editShortcutLabel">Master Rusun - Edit</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" enctype="multipart/form-data" action="<?= site_url('shortcut/save'); ?>">

                                                <div class="row g-3">
                                                    <div class="col-lg-12">
                                                        <div>
                                                            <label for="nama" class="form-label">Nama Shortcut</label>
                                                            <input type="text" class="id d-none" name="id">
                                                            <input type="text" class="form-control nama" name="nama" placeholder="Shortcut" required>
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
                                                            <label for="link" class="form-label">Link</label>
                                                            <input type="text" class="form-control link" name="link" placeholder="Link" required>
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
            $('#editShortcut').on('show.bs.modal', function(e) {
                $('.id').attr('value', '');
                $('.nama').attr('value', '');

                $('.link').attr('value', '');
                $('.deskripsi').attr('value', '');
                $('.savebtn').prop('disabled', true);
                var idx = $(e.relatedTarget).data('id');
                $.ajax({
                    url: "<?php echo base_url('/shortcut/detail'); ?>",
                    method: "POST",
                    data: {
                        id: idx
                    },
                    async: true,
                    dataType: "JSON",
                    success: function(data) {
                        $('.id').attr('value', data.id_shortcut);
                        $('.nama').attr('value', data.nama);
                        $('.link').val(data.link);
                        $('.deskripsi').val(data.deskripsi);
                        $('.fotolama').val(data.icon);
                        $('.imagePreview').attr('src', '/uploads/shortcut/' + data.icon);

                        $('.savebtn').removeAttr('disabled');
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tambahShortcut').on('show.bs.modal', function(e) {
                $('.id').attr('value', '');
                $('.nama').attr('value', '');
                $('.link').attr('value', '');
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