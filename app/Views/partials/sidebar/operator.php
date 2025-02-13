<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="/assets/images/logo-ck-sm.png" alt="" height="35">
            </span>
            <span class="logo-lg">
                <img src="/assets/images/logo-emonckkaltim.png" alt="" height="35">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="/assets/images/logo-emonckkaltim.png" alt="" height="35">
            </span>
            <span class="logo-lg">
                <img src="/assets/images/logo-emonckkaltim.png" alt="" height="35">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">


                <li class="nav-item mt-4">
                    <a class="nav-link menu-link" href="<?= site_url('dashboard'); ?>" data-key="t-dashboard">
                        <i class="mdi mdi-arch"></i> <span data-key="t-dashboard">Beranda</span>
                    </a>
                </li> <!-- end Dashboard Menu -->



                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">DATA MASTER</span></li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('program_kegiatan'); ?>" data-key="t-Program_kegiatan-program_list">
                        <i class="mdi mdi-sitemap-outline"></i> <span data-key="t-dashboards">Program & Kegiatan</span>
                    </a>
                </li> <!-- end Dashboard Menu -->



                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('paketkegiatan'); ?>" data-key="t-paketkegiatan">
                        <i class="mdi mdi-package-variant"></i> <span data-key="t-paketkegiatan">Tambah Paket</span>
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMaster-Data" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUser">
                        <i class="mdi mdi-database-check-outline"></i> <span data-key="t-Master-Data">Master Data</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMaster-Data">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="<?= site_url('golongan'); ?>" class="nav-link" data-key="t-golongan"> Golongan </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('rekening'); ?>" class="nav-link" data-key="t-rekening"> Rekening </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarUser" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUser">
                        <i class="mdi mdi-account-multiple-outline"></i> <span data-key="t-user">User Manajemen</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarUser">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('users/list'); ?>" class="nav-link" data-key="t-users-list"> Pengguna </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('role'); ?>" class="nav-link" data-key="t-role"> Role Management </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-profil-saya"> Profil Saya </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-ganti-passwordz"> Ganti Password </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Sistem Terhubung</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarWebsite" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarWebsite">
                        <i class="mdi mdi-web-plus"></i> <span data-key="t-Website">Website CK</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarWebsite">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="<?= site_url('berita'); ?>" class="nav-link" data-key="t-berita"> Berita / Artikel </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('kategori'); ?>" class="nav-link" data-key="t-kategori"> Kategori </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('pages'); ?>" class="nav-link" data-key="t-pages"> Halaman </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('album'); ?>" class="nav-link" data-key="t-album"> Galeri </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-ganti-passwordz"> Pengaturan </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSertifikasi" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSertifikasi">
                        <i class="mdi mdi-certificate-outline"></i> <span data-key="t-Sertifikasi">Sertifikasi</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarSertifikasi">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-profil-saya"> Data Permohonan </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-data-pengguna"> Halaman Verifikasi </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-ganti-passwordz"> Data Tersertifikasi </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-key="t-ganti-passwordz"> Pengaturan </a>
                            </li>

                        </ul>
                    </div>
                </li> -->






            </ul>
            <?php
            print_r(session()->get());
            ?>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>