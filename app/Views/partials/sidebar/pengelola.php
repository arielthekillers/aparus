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
                        <i class="mdi mdi-account-group"></i> <span data-key="t-Penghuni">Penghuni</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPenghuni">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('penghuni/list'); ?>" class="nav-link" data-key="t-penghuni-list"> Daftar Penghuni </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('penghuni/baru'); ?>" class="nav-link" data-key="t-penghuni-baru"> Tambah Penghuni </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarKontrak" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarKontrak">
                        <i class="mdi mdi-charity"></i> <span data-key="t-Kontrak">Kontrak</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarKontrak">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('kontrak/permohonanMasuk'); ?>" class="nav-link" data-key="t-kontrak-permohonanMasuk"> Permohonan Masuk </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('kontrak/daftarTunggu'); ?>" class="nav-link" data-key="t-kontrak-daftarTunggu"> Daftar Tunggu </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('kontrak/list'); ?>" class="nav-link" data-key="t-kontrak-list"> Terkontrak </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('kontrak/mutasi'); ?>" class="nav-link" data-key="t-profile-updatefoto"> Mutasi </a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAduan" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAduan">
                        <i class="mdi mdi-chat-processing"></i> <span data-key="t-Aduan">Aduan</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAduan">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('aduan/list'); ?>" class="nav-link" data-key="t-aduan-list"> Aduan Masuk </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('aduan/tvmedia'); ?>" class="nav-link" data-key="t-tvmedia"> TV Media </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPembayaran" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPembayaran">
                        <i class="mdi mdi-cash-register"></i> <span data-key="t-Pembayaran">Pembayaran</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPembayaran">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('penerimaan'); ?>" class="nav-link" data-key="t-penerimaan"> Laporan Penerimaan </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('kasir/invoice'); ?>" class="nav-link" data-key="t-kasir-invoice"> Kasir Pembayaran </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('invoice/list'); ?>" class="nav-link" data-key="t-invoice"> Invoice(s) </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMaster" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMaster">
                        <i class="mdi mdi-database-lock"></i> <span data-key="t-Master">Master</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMaster">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('rusun'); ?>" class="nav-link" data-key="t-rusun"> Data Rusun</a>
                            </li>
                        </ul>
                        <!-- Removed Data Lantai and Data Kamar submenus -->
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('pejabat'); ?>" class="nav-link" data-key="t-pejabat"> Data Pejabat </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('waterusage/hargaAir'); ?>" class="nav-link" data-key="t-waterusage-hargaAir"> Harga Air Baku </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('waterusage/catatAir'); ?>" class="nav-link" data-key="t-waterusage-catatAir"> Catat Air Baku </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-report">REPORTS</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLaporanHunian" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMaster">
                        <i class="mdi mdi-folder-home"></i> <span data-key="t-LaporanHunian">Laporan Hunian</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLaporanHunian">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('reportHunian/penghuni'); ?>" class="nav-link" data-key="t-rusun"> Daftar Penghuni</a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('reportHunian/statistikGender'); ?>" class="nav-link" data-key="t-gender"> Statistik Per Jenis Kelamin</a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('reportHunian/statistikUmur'); ?>" class="nav-link" data-key="t-umur"> Statistik Per Umur</a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('reportHunian/statistikKamar'); ?>" class="nav-link" data-key="t-kamar"> Statistik Kamar</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">MANAGEMENT</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarUserManagement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUserManagement">
                        <i class="mdi mdi-account-reactivate"></i> <span data-key="t-UserManagement">User Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarUserManagement">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('users'); ?>" class="nav-link" data-key="t-users"> Data Pengguna </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('users/role'); ?>" class="nav-link" data-key="t-users-role"> Role Access </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarProfil" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="sidebarProfil" data-key="t-profil">Profil</a>
                                <div class="menu-dropdown" id="sidebarProfil">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?= site_url('profil'); ?>" class="nav-link" data-key="t-profil"> Profil Saya </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= site_url('profil/update'); ?>" class="nav-link" data-key="t-profil-update"> Update Profil </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= site_url('profil/updatepassword'); ?>" class="nav-link" data-key="t-profil-updatepassword"> Update Password </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= site_url('profil/updatefoto'); ?>" class="nav-link" data-key="t-profil-updatefoto"> Update Foto </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAparus" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAparus">
                        <i class="mdi mdi-application-braces"></i> <span data-key="t-UserManagement">Aparus</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAparus">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('settings'); ?>" class="nav-link" data-key="t-settings"> Pengaturan </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('update'); ?>" class="nav-link" data-key="t-update"> Update </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('about'); ?>" class="nav-link" data-key="t-about"> Tentang </a>
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