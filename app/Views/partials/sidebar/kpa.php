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



                <li class="nav-item  mt-4">
                    <a class="nav-link menu-link" href="<?= site_url('dashboard'); ?>" role="button" aria-expanded="false" aria-controls="sidebarDashboards" data-key="t-dashboard">
                        <i class="mdi mdi-arch"></i> <span data-key="t-dashboard">Beranda</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                <li class="menu-title"><span data-key="t-menu">Laporan</span></li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarProgres" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProgres">
                        <i class="mdi mdi-file-document"></i> <span data-key="t-Progres">Laporan Progres</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarProgres">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('report/general'); ?>" class="nav-link" data-key="t-report-general"> Per Paket Pekerjaan </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('report/rencanakeuangan'); ?>" class="nav-link" data-key="t-report-rencanakeuangan"> Rencana Keuangan </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('report/rencanafisik'); ?>" class="nav-link" data-key="t-report-rencanafisik"> Rencana Fisik </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('report/realisasikeuangan'); ?>" class="nav-link" data-key="t-report-realisasikeuangan"> Realisasi Keuangan </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('report/realisasifisik'); ?>" class="nav-link" data-key="t-report-realisasifisik"> Realisasi Fisik </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('report/kontraktual'); ?>" class="nav-link" data-key="t-report-kontraktual"> Kontraktual </a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarOutput" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUser">
                        <i class="mdi mdi-exit-to-app"></i> <span data-key="t-Output">Output Paket</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarOutput">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('report/dokumentasi'); ?>" class="nav-link" data-key="t-report-dokumentasi"> Dokumentasi </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('report/general'); ?>" class="nav-link" data-key="t-report-general"> Lelang </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= site_url('report/general'); ?>" class="nav-link" data-key="t-profil-saya"> Kurva-S </a>
                            </li>
                        </ul>
                    </div>
                </li>




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