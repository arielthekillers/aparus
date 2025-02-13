<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Kebijakan Privasi')); ?>

    <?= $this->include('partials/head-css') ?>
    <style>
        .shape {
            position: absolute;
            bottom: 0;
            right: 0;
            left: 0;
            z-index: 1;
            pointer-events: none;
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

                    <?php echo view('partials/page-title', array('pagetitle' => 'About', 'title' => 'Kebijakan Privasi')); ?>


                    <div class="row">


                        <div class="col-xxl-12">
                            <div class="d-flex flex-column h-100">
                                <div class="row justify-content-center">
                                    <div class="col-lg-10">
                                        <div class="card">
                                            <div class="card-header bg-primary p-4">
                                                <div class="text-center">
                                                    <h3 class="text-light">Kebijakan Privasi</h3>
                                                    <p class="mb-0 text-white-75">Last update: 16 April 2024</p>
                                                </div>
                                            </div>
                                            <div class="card-body p-4">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-success icon-dual-success icon-xs">
                                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5>Kebijakan Privasi untuk Aparus 2.0</h5>
                                                        <p class="text-muted">Ini merupakan komitmen kami untuk menghargai dan melindungi setiap Data Pribadi Pengguna Aparus 2.0 (atau selanjutnya disebut sebagai "Aplikasi Aparus 2.0").</p>
                                                        <p class="text-muted">Kebijakan Privasi ini menetapkan tindakan atas data atau informasi yang Pengguna berikan kepada UPT Rusunawa Bontang melalui Aplikasi (selanjutnya disebut sebagai "Data Pribadi").</p>
                                                        <p class="text-muted">Dengan mengakses dan menggunakan Aplikasi Aparus 2.0, Pengguna dianggap telah membaca, memahami, dan memberikan persetujuannya terhadap pengumpulan dan penggunaan Data Pribadi Pengguna sebagaimana dijelaskan dalam Kebijakan Privasi ini.</p>
                                                    </div>
                                                </div>

                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-success icon-dual-success icon-xs">
                                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5>Data Pribadi yang dikumpulkan</h5>
                                                        <p class="text-muted">Dalam memberikan layanan publik, Aplikasi Aparus 2.0 mengumpulkan informasi/data berupa data Kependudukan, Nomor Seluler, Email dan informasi dasar keluarga.</p>
                                                    </div>
                                                </div>

                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-success icon-dual-success icon-xs">
                                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5>Kapan Data Pribadi dikumpulkan</h5>
                                                        <p class="text-muted">Data Pribadi dikumpulkan dari Pengguna pada saat pengguna melakukan registrasi akun dan pendaftaran penghuni di Aplikasi Aparus 2.0.</p>
                                                    </div>
                                                </div>

                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-success icon-dual-success icon-xs">
                                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5>Pemakaian Data Pribadi Pengguna</h5>
                                                        <p class="text-muted">Data Pribadi Pengguna akan digunakan sebagai data dasar untuk melakukan verifikasi identitas, pendaftaran penghuni, proses pembayaran dan pemberian layanan lainnya oleh UPT Rusunawa Kota Bontang di Aplikasi Aparus 2.0.</p>
                                                    </div>
                                                </div>

                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-success icon-dual-success icon-xs">
                                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5>Keamanan Kerahasiaan Data Pribadi Pengguna</h5>
                                                        <p class="text-muted">UPT Rusunawa Kota Bontang selalu berusaha melindungi Data Pribadi Pengguna di Aplikasi Aparus 2.0 dengan menerapkan keamanan sesuai dengan peraturan perundang-undangan yang berlaku.</p>
                                                    </div>
                                                </div>

                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-success icon-dual-success icon-xs">
                                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                        </svg>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5>Pemutakhiran Kebijakan Privasi</h5>
                                                        <p class="text-muted">Pemutakhiran Kebijakan Privasi ini akan dilakukan dari waktu ke waktu tanpa pemberitahuan sebelumnya. UPT Rusunawa Kota Bontang mengharapkan agar Pengguna membaca secara seksama dan memeriksa halaman Kebijakan Privasi ini dari waktu ke waktu untuk mengetahui perubahan apa pun. Dengan tetap mengakses dan menggunakan Aplikasi, maka Pengguna dianggap menyetujui perubahan dalam Kebijakan Privasi ini.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->



                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?= $this->include('partials/footer') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <?= $this->include('partials/customizer') ?>

    <?= $this->include('partials/vendor-scripts') ?>

    <!-- App js -->
    <script src="/assets/js/app.js"></script>
</body>

</html>