<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="/assets/images/logo-sm.png" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="/assets/images/logo-dark.png" alt="" width="80%">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="/assets/images/logo-sm.png" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="/assets/images/logo-light.png" alt="" height="80%">
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



                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('dashboard'); ?>" role="button" aria-expanded="false" aria-controls="sidebarDashboards" data-key="t-dashboard">
                        <i class="mdi mdi-arch"></i> <span data-key="t-dashboards">Beranda</span>
                    </a>
                </li> <!-- end Dashboard Menu -->


                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Hunian</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('penghuni/tambah'); ?>" data-key="t-tambahpenghuni">
                        <i class="mdi mdi-account-plus"></i> <span data-key="t-tambahpenghuni">Tambah Penghuni</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('penghuni/daftartunggu'); ?>" data-key="t-penghuni-daftartunggu">
                        <i class="mdi mdi-clock-edit-outline"></i> <span data-key="t-penghuni-daftartunggu">Daftar Menunggu</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('kontrak'); ?>" data-key="t-kontrak">
                        <i class="mdi mdi-file-sign"></i> <span data-key="t-kontrak">Daftar Kontrak</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('penghuni/list'); ?>" data-key="t-penghuni-list">
                        <i class="mdi mdi-account-heart-outline"></i> <span data-key="t-penghuni-list">Daftar Penghuni</span>
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('penghuni/mutasi'); ?>" data-key="t-mutasi">
                        <i class="mdi mdi-arrow-decision"></i> <span data-key="t-mutasi">Mutasi</span>
                    </a>
                </li>



                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Aduan</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('aduan/list'); ?>" data-key="t-aduan-list">
                        <i class="mdi mdi-chat-processing-outline"></i> <span data-key="t-aduan-list">Daftar Aduan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('aduan/tvmedia'); ?>" data-key="t-tvmedia">
                        <i class="mdi mdi-monitor-dashboard"></i> <span data-key="t-tvmedia">TV Media</span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">DATA MASTER</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('rusun'); ?>" data-key="t-rusun">
                        <i class="mdi mdi-sitemap-outline"></i> <span data-key="t-rusun">Rusun</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('pejabat'); ?>" data-key="t-pejabat">
                        <i class="mdi mdi-account-tie-hat"></i> <span data-key="t-pejabat">Pejabat</span>
                    </a>
                </li>




                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Hunian</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('penghuni/daftar'); ?>" data-key="t-kontrak">
                        <i class="mdi mdi-book-edit-outline"></i> <span data-key="t-kontrak">Form Pendaftaran</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('rusun'); ?>" data-key="t-rusun">
                        <i class="mdi mdi-sitemap-outline"></i> <span data-key="t-rusun">Rusun</span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">DATA MASTER</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('rusun'); ?>" data-key="t-rusun">
                        <i class="mdi mdi-sitemap-outline"></i> <span data-key="t-rusun">Rusun</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('pejabat'); ?>" data-key="t-pejabat">
                        <i class="mdi mdi-account-tie-hat"></i> <span data-key="t-pejabat">Pejabat</span>
                    </a>
                </li>


                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">USER MANAGEMENT</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('users'); ?>" data-key="t-users">
                        <i class="mdi mdi-account-group"></i> <span data-key="t-users">Pengguna</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('users/role'); ?>" data-key="t-users-role">
                        <i class="mdi mdi-drama-masks"></i> <span data-key="t-users-role">Role</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarProfile" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile">
                        <i class="mdi mdi-account-details-outline"></i> <span data-key="t-Profile">Profil</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarProfile">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('profil'); ?>" class="nav-link" data-key="t-profil"> Profil Saya </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('profil/update'); ?>" class="nav-link" data-key="t-profil-update"> Update Profil </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('profil/updatepassword'); ?>" class="nav-link" data-key="t-profil-updatepassword"> Update Password </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('profil/updatefoto'); ?>" class="nav-link" data-key="t-profil-updatefoto"> Update Foto </a>
                            </li>

                        </ul>
                    </div>
                </li>




            </ul>

        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>