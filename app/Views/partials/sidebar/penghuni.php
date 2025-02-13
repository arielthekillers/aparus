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
                    <a class="nav-link menu-link" href="#sidebarPenghuni" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPenghuni">
                        <i class="mdi mdi-account-reactivate"></i> <span data-key="t-Penghuni">Data Penghuni</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPenghuni">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('penghuni/detail/' . session('userid')); ?>" class="nav-link" data-key="t-penghuni-detail"> Detail Penghuni</a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('penghuni/anggotakeluarga/' . session('userid')); ?>" class="nav-link" data-key="t-penghuni-anggotakeluarga"> Anggota Keluarga </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('penghuni/dokumen/' . session('userid')); ?>" class="nav-link" data-key="t-penghuni-dokumen"> Dokumen </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarKontrak" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarKontrak">
                        <i class="mdi mdi-charity"></i> <span data-key="t-Kontrak">Data Kontrak</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarKontrak">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('kontrak/permohonan/'); ?>" class="nav-link" data-key="t-kontrak-permohonan"> Permohonan</a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('penghuni/kontrak/' . session('userid')); ?>" class="nav-link" data-key="t-penghuni-kontrak"> Kontrak </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('penghuni/tagihan/' . session('userid')); ?>" class="nav-link" data-key="t-penghuni-tagihan"> Tagihan </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('penghuni/invoice/' . session('userid')); ?>" class="nav-link" data-key="t-penghuni-invoice"> Invoice </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Aduan</span></li> -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?= site_url('aduan/list'); ?>" data-key="t-aduan-list">
                        <i class="mdi mdi-chat-processing-outline"></i> <span data-key="t-aduan-list">Aduan Saya</span>
                    </a>
                </li>



                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">USER MENU</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarProfile" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProfile">
                        <i class="mdi mdi-account-details-outline"></i> <span data-key="t-Profile">Profile</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarProfile">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('profile'); ?>" class="nav-link" data-key="t-profile"> Profile Saya </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('profile/update'); ?>" class="nav-link" data-key="t-profile-update"> Update Profile </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('profile/updatepassword'); ?>" class="nav-link" data-key="t-profile-updatepassword"> Update Password </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('profile/updatefoto'); ?>" class="nav-link" data-key="t-profile-updatefoto"> Update Foto </a>
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