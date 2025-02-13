<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Sign Up')); ?>

    <?= $this->include('partials/head-css') ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>

<body>

    <div class="auth-page-wrapper pt-5">

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <img src="/assets/images/logo-dark.png" alt="" width="187">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5 col-xl-4">
                        <div class="card mt-4">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Sign Up - Aparus 2.0</h5>
                                    <p class="text-muted">Sign Up untuk mendaftar akun ke Aplikasi.</p>
                                </div>
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <div class="alert alert-message alert-danger alert-border-left alert-dismissible fade shadow show" role="alert">
                                        <?php
                                        if (session()->getFlashdata('error') > 1) {
                                            echo implode('<br/>', session()->getFlashdata('error'));
                                        } else {
                                            echo session()->getFlashdata('error')[0];
                                        }
                                        ?>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <div class="mt-2">
                                    <form action="<?= site_url('auth/register') ?>" method="post">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap" autocomplete="off" autofocus required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nik" class="form-label">NIK</label>
                                            <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" autocomplete="off" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">No. Handphone (Aktif WA)</label>
                                            <input type="number" class="form-control" id="phone" name="phone" placeholder="Masukkan No. Handphone" autocomplete="off" required>
                                        </div>
                                        <div class="mt-4">
                                            <button class="btn btn-primary w-100" type="submit">Daftar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                        <div class="mt-4 text-center">
                            <p class="mb-0">Sudah punya akun <a href="<?= site_url('auth/login'); ?>" class="fw-semibold text-primary text-decoration-underline"> Login </a> </p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy; <script>
                                    document.write(new Date().getFullYear())
                                </script> Aparus 2.0 UPT Rusunawa Bontang <i class="mdi mdi-heart text-danger"></i> by Sintesa Corp</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->
    <?= $this->include('partials/vendor-scripts') ?>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password-input');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
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

</body>

</html>