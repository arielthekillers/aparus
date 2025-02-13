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
                                        <div class="row">
                                            <div class=" col-lg-12">
                                                <div class="text-center">
                                                    <a href="<?= site_url('profile/password_update/' . $user['kode_penghuni']) ?>" class="btn btn-primary">re-Generate Password</a>
                                                </div>
                                            </div>
                                            <div class=" col-lg-12 mt-3">
                                                <p class="text-muted">Pasword akan digenerate ulang dan dikirimkan ke whatsapp anda. Setelah penggantian password berhasil, anda akan otomatis keluar dari sistem. Silahkan login kembali dengan password baru.</p>
                                            </div>
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