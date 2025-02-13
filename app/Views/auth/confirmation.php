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
                                    <h5 class="text-primary">Aparus 2.0</h5>
                                    <p class="text-muted">Confirmation.</p>
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
                                <div class="mt-2 text-center">
                                <lord-icon src="https://cdn.lordicon.com/oqdmuxru.json" trigger="loop" colors="primary:#4b38b3" class="avatar-lg"></lord-icon>
                                </div>
                                <div class="text-center mt-2">
                                    <?php
                                        if (session()->getFlashdata('success')) {
                                            echo session()->getFlashdata('message');
                                        }
                                        ?>
                                        <!-- Base Buttons -->
                                        <p>
                                        <a href="<?= site_url('auth/login'); ?>" type="button" class="btn btn-success waves-effect waves-light mt-3 ">Login</a>
                                        </p>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
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