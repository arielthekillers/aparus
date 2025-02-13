<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Update Password')); ?>

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

                    <?php echo view('partials/page-title', array('pagetitle' => 'Profil', 'title' => 'Update Password')); ?>

                    <?php if (session()->get('status')) : ?>
                        <div class="row alert-message">
                            <div class="col-lg-4">
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
                                    <h4 class="card-title mb-0 flex-grow-1">Update Password</h4>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div class="live-preview">
                                        <form action="<?= site_url('profil/password_update'); ?>" method="POST">
                                            <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>" required>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="passwordlama" class="form-label">Password Lama</label>
                                                        <div class="input-group">
                                                            <input required type="password" class="form-control" id="passwordlama" name="passwordlama" required tabindex="1" autofocus>
                                                            <span class="input-group-text" id="basic-addon2">
                                                                <button class="btn btn-link p-0 text-decoration-none text-muted shadow-none" type="button" id="togglePasswordlama"><i class="ri-eye-fill align-middle"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="passwordbaru" class="form-label">Password Baru</label>
                                                        <div class="input-group">
                                                            <input required type="password" class="form-control" id="passwordbaru" name="passwordbaru" required tabindex="2">
                                                            <span class="input-group-text" id="basic-addon2">
                                                                <button class="btn btn-link p-0 text-decoration-none text-muted shadow-none" type="button" id="togglePasswordbaru"><i class="ri-eye-fill align-middle"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" col-lg-12">
                                                    <p class="text-muted">Setelah penggantian password berhasil, anda akan otomatis keluar dari sistem. Silahkan login kembali dengan password baru anda</p>
                                                </div>
                                                <div class=" col-lg-12">
                                                    <div class="text-end mt-3">
                                                        <button type="submit" class="btn btn-primary">Update</button>
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

    <script src="/assets/js/app.js"></script>

    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>

    <script>
        const togglePasswordbaru = document.querySelector('#togglePasswordbaru');
        const passwordbaru = document.querySelector('#passwordbaru');

        togglePasswordbaru.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = passwordbaru.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordbaru.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>

    <script>
        const togglePasswordlama = document.querySelector('#togglePasswordlama');
        const passwordlama = document.querySelector('#passwordlama');

        togglePasswordlama.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = passwordlama.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordlama.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>


    <?php if (empty(session('logged_in'))) : ?>
        <script>
            setTimeout(function() {
                window.location.href = '<?= site_url('auth/logout'); ?>';
            }, 2000); // 5 seconds
        </script>
    <?php endif; ?>

</body>

</html>