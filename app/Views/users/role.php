<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Role Management')); ?>

    <?= $this->include('partials/head-css') ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <style>
        .card-img-top {
            width: 100%;
            height: 15vw;
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
                    <?php echo view('partials/page-title', array('pagetitle' => 'Users', 'title' => 'Role Management')); ?>

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


                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahRole"><i class="ri-add-line align-bottom me-1"></i> Tambah Role</button>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <?php foreach ($role as $r) : ?>
                            <h5 class="fs-16 mb-3 fw-semibold"><?= $r['role_name']; ?></h5>

                            <?php
                            $roledata = array_filter($roleAssign, function ($roleAssign) use ($r) {
                                return strtolower($roleAssign['id_role']) == strtolower($r['role_id']);
                            });
                            ?>

                            <?php if (!empty($roledata)) : ?>
                                <?php foreach ($roledata as $value) : ?>
                                    <div class="col-lg-3">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-shink-0">
                                                        <img src="<?= site_url('uploads/profil/' . $value['avatar']); ?>" alt="" class="avatar-md object-cover rounded">
                                                    </div>
                                                    <div class="ms-3 flex-grow-1">
                                                        <a href="<?= site_url('users/edit/' . $value['user_id']); ?>">
                                                            <h5 class="mb-1 fs-14"><?= $value['user_nick']; ?></h5>
                                                        </a>
                                                        <p class="text-muted mb-0"><?= $value['user_nama']; ?></p>
                                                        <p class="text-muted mb-0"><span class="badge <?= ($value['status'] == 'Aktif' ? 'bg-success' : 'bg-warning'); ?>"><?= $value['status']; ?></span></p>
                                                    </div>
                                                    <div>
                                                        <div class="dropdown float-end">
                                                            <button class="btn btn-ghost-primary btn-icon dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-2-fill align-middle fs-16"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li>
                                                                    <a class="dropdown-item remove-item-btn" href="<?= site_url('role/delete/' . $value['role_assign_id']); ?>" onclick="return confirm('Anda yakin ingin menghapus role user ini?');">
                                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Hapus Role
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
                            <?php else : ?>
                                <p class="text-muted">Belum ada user dalam role ini</p>
                            <?php endif; ?>
                        <?php endforeach; ?>



                    </div>


                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <div class="modal fade lg-12" id="tambahRole" tabindex="-1" aria-labelledby="tambahRoleLabel" aria-modal="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahRoleLabel">Tambah Role</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= site_url('role/save'); ?>" method="POST">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="user" class="form-label">User</label>
                                        <select class="form-select" data-choices data-choices-search-false name="userid" id="user" required>
                                            <option value="" selected>- Pilih User -</option>
                                            <?php foreach ($users as $u) : ?>
                                                <option value="<?= $u['user_id'] ?>"><?= $u['user_nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select class="form-select" data-choices data-choices-search-false id="role" name="role" required>
                                            <option value="" selected>- Pilih Status -</option>
                                            <?php foreach ($role as $r) : ?>
                                                <option value="<?= $r['role_id'] ?>"><?= $r['role_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="mb-3 d-none" id="rusunblok">
                                        <label for="rusun" class="form-label">Rusun</label>
                                        <select class="form-select" data-choices data-choices-search-false name="rusun" id="rusun">
                                            <option value="" selected>- Pilih Rusun -</option>
                                            <?php foreach ($rusun as $rs) : ?>
                                                <option value="<?= $rs['rusun_id'] ?>"><?= $rs['rusun_nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>





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


    <!-- App js -->
    <script src="/assets/js/app.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#assignRolePpk').on('show.bs.modal', function(e) {
                $('.id').attr('value', '');
                var idx = $(e.relatedTarget).data('id');
                var namax = $(e.relatedTarget).data('nama');
                $('.id').attr('value', idx);
                $(".nama").text(namax);
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {

            $('#role').change(function() {
                var pilihan = $('#role').val();
                var rusunblok = document.getElementById("rusunblok");
                console.log(pilihan);
                if (pilihan == '3') {
                    rusunblok.classList.remove('d-none');
                    document.getElementById("rusun").value = "";
                } else {
                    rusunblok.classList.add('d-none');
                    document.getElementById("rusun").value = "";
                }
            });
            $('#tambahRole').on('show.bs.modal', function(e) {
                rusunblok.classList.add('d-none');
                $("#role").val('0');
            });

        });
    </script>

</body>

</html>