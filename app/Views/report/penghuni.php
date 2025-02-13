<?= $this->include('partials/main') ?>

<head>
    <?php echo view('partials/title-meta', array('title' => 'Daftar Penghuni')); ?>
    <?= $this->include('partials/head-css') ?>
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?= $this->include('partials/menu') ?>

        <!-- Start right Content here -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Laporan Penghuni</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">

                            <h4 class="mb-3">Statistik Penghuni per Rusun</h4>
                            <div class="row">
                                <?php foreach ($statistik as $stat): ?>
                                    <div class="col-md-4">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3"><?= $stat->nama_rusun ?></h5>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span class="text-muted">Total KK:</span>
                                                    <span class="fw-medium"><?= $stat->total_kk ?></span>
                                                </div>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span class="text-muted">Total Penghuni:</span>
                                                    <span class="fw-medium"><?= $stat->total_penghuni ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>


                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title mb-0">Daftar Penghuni</h4>
                                    <div class="d-flex gap-2">
                                        <form action="" method="get" class="d-inline-block">
                                            <select name="rusun" class="form-select" onchange="this.form.submit()">
                                                <option value="">Semua Rusun</option>
                                                <?php foreach ($rusun as $r): ?>
                                                    <option value="<?= $r['rusun_id'] ?>" <?= ($selected_rusun == $r['rusun_id']) ? 'selected' : '' ?>>
                                                        <?= $r['nama_rusun'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </form>
                                        <a href="<?= site_url('reportHunian/exportExcel' . ($selected_rusun ? "?rusun=$selected_rusun" : '')) ?>"
                                            class="btn btn-success">
                                            <i class="ri-file-excel-line align-middle me-1"></i> Export Excel
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="penghuni-table" class="table table-bordered table-striped table-nowrap">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>Nama Penghuni</th>
                                                    <th>NIK</th>
                                                    <th>Kontak</th>
                                                    <th>Rusun</th>
                                                    <th>Nomor Kamar</th>
                                                    <th>Tgl Awal Kontrak</th>
                                                    <th>Tgl Akhir Kontrak</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($penghuni as $index => $p): ?>
                                                    <tr>
                                                        <td class="text-center"><?= $index + 1 ?></td>
                                                        <td><?= $p->nama ?></td>
                                                        <td><?= $p->ktp ?></td>
                                                        <td><?= $p->kontak ?></td>
                                                        <td><?= $p->nama_rusun ?></td>
                                                        <td class="text-center"><?= $p->nomor_kamar ?></td>
                                                        <td><?= date('d/m/Y', strtotime($p->tgl_awal_kontrak)) ?></td>
                                                        <td><?= date('d/m/Y', strtotime($p->tgl_akhir_kontrak)) ?></td>
                                                        <td class="text-center">
                                                            <?php if ($p->status_kontrak == 'ACTIVE'): ?>
                                                                <span class="badge bg-success">Aktif</span>
                                                            <?php else: ?>
                                                                <span class="badge bg-danger">Non-aktif</span>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->include('partials/footer') ?>
        </div>
    </div>

    <?= $this->include('partials/customizer') ?>
    <?= $this->include('partials/vendor-scripts') ?>

    <!-- DataTables JS -->
    <script src="/assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/libs/datatables-bs5/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#penghuni-table').DataTable({
                "pageLength": 25,
                "ordering": true,
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data tersedia",
                    "infoFiltered": "(difilter dari _MAX_ total data)",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                }
            });
        });
    </script>

    <!-- App js -->
    <script src="/assets/js/app.js"></script>
</body>

</html>