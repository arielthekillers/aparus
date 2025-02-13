<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Dokumen')); ?>
    <!-- glightbox css -->
    <link rel="stylesheet" href="/assets/libs/glightbox/css/glightbox.min.css">

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

                    <div class="row">

                        <div class="col">
                            <!-- alert -->
                            <?php if (session()->get('status')) : ?>
                                <div class="row alert-message">
                                    <div class="col-lg-12">
                                        <!-- Success Alert -->
                                        <div class="alert alert-<?= session()->get('color'); ?> alert-border-left alert-dismissible fade shadow show" role="alert">
                                            <i class="<?= session()->get('icon'); ?> me-3 align-middle"></i> <strong><?= session()->get('status'); ?></strong> <?= session()->get('message'); ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- header -->

                        <div class="col-12 mb-3">

                            <h4 class="fs-16 mb-1">Data Penghuni</h4>
                            <p class="text-muted mb-0">Pengelolaan Data Penghuni Rusun.</p>
                        </div>
                        <!--end col-->




                        <div class="col">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?= $this->include('partials/content/penghuni') ?>
                                </div>
                                <div class="col-lg-9">
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <div class="d-flex align-items-center">
                                                <h5 class="card-title mb-0 flex-grow-1">Dokumen</h5>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex flex-wrap gap-2">
                                                        <button class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#tamahDokumen"><i class="ri-add-line align-bottom me-1"></i> Tambah Dokumen</button>
                                                        <div id="tamahDokumen" class="modal fade" tabindex="-1" aria-labelledby="tamahDokumenLabel" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="tamahDokumenLabel">Dokumen - Tambah</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" enctype="multipart/form-data" action="<?= site_url('penghuni/uploadDokumen'); ?>">
                                                                            <div class="alert alert-borderless shadow alert-primary" role="alert">
                                                                                File yang boleh diupload adalah file bereksetensi <i>jpg/jpeg, png, dan pdf</i>. Dengan ukuran maksimal <b>5 Mb</b>.
                                                                            </div>
                                                                            <div class="row g-3">
                                                                                <div class="col-lg-12">
                                                                                    <div>
                                                                                        <label for="file" class="form-label">File Dokumen</label>
                                                                                        <input type="file" class="form-control" id="dokumen" name="dokumen" required>
                                                                                        <input type="hidden" name="kode_penghuni" value="<?= $kode; ?>">
                                                                                    </div>
                                                                                </div><!--end col-->
                                                                                <div class="col-lg-12">
                                                                                    <div>
                                                                                        <label for="jenis" class="form-label">Jenis</label>
                                                                                        <select id="jenis" class="form-select" name="namadokumen" required>
                                                                                            <option value="">Pilih...</option>
                                                                                            <option value="KTP">KTP</option>
                                                                                            <option value="Surat Nikah">Surat Nikah</option>
                                                                                            <option value="Foto Kepala Keluarga">Foto Kepala Keluarga</option>
                                                                                            <option value="Foto Kartu Keluarga">Kartu Keluarga</option>
                                                                                            <option value="Berkas Slip Gaji">Berkas Slip Gaji</option>
                                                                                            <option value="Surat Keterangan Bekerja">Surat Keterangan Bekerja</option>
                                                                                            <option value="Surat Keterangan Belum Punya Rumah">Surat Keterangan Belum Punya Rumah</option>
                                                                                            <option value="Pernytaan Sanggup Bayar">Pernyataan Sanggup Bayar</option>
                                                                                            <option value="Formulir Pendaftaran">Formulir Pendaftaran</option>
                                                                                            <option value="Persetujuan Tata Tertib">Persetujuan Tata Tertib</option>
                                                                                            <option value="Data Pemohon dan Kependudukan">Data Pemohon dan Kependudukan</option>
                                                                                            <option value="Lainnya">Lainnya</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div><!--end col-->
                                                                                <div class="col-lg-12">
                                                                                    <div class="hstack gap-2 justify-content-end">
                                                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                                                    </div>
                                                                                </div><!--end col-->
                                                                            </div><!--end row-->
                                                                        </form>

                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <?php if (empty($dokumen)) : ?>
                                                <script src="https://cdn.lordicon.com/lordicon.js"></script>
                                                <h5 class="text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/uecgmesg.json" trigger="loop" style="width:100px;height:100px"></lord-icon>
                                                </h5>
                                                <p class="text-center text-muted">Dokumen Tidak Ditemukan</p>
                                            <?php else : ?>
                                                <div class="mb-4">
                                                    <table class="table align-middle table-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">File Name</th>
                                                                <th scope="col">Type</th>
                                                                <th scope="col">Size</th>
                                                                <th scope="col">Upload Date</th>
                                                                <th scope="col" style="width: 120px;" class="text-center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($dokumen as $dok) : ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-xs">
                                                                                <div class="avatar-title bg-light text-<?= iconcolor($dok['dokumen']); ?> rounded fs-24">
                                                                                    <i class="<?= iconset($dok['dokumen']); ?>"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="ms-3 flex-grow-1">
                                                                                <h5 class="fs-13 mb-0"><a href="javascript:void(0)" class="text-body"><?= $dok['namadokumen']; ?></a></h5>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><?= ekstensi($dok['dokumen']); ?></td>
                                                                    <td><?= fsize($dok['dokumen']); ?></td>
                                                                    <td><?= timestamp($dok['time']); ?></td>
                                                                    <td class="text-center">
                                                                        <div class="dropdown">
                                                                            <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                                <i class="ri-more-fill"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                                <li><a class="dropdown-item" href="/uploads/dokumen/<?= $dok['dokumen']; ?>" target="_blank"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>Buka</a></li>
                                                                                <li><a class="dropdown-item" href="/uploads/dokumen/<?= $dok['dokumen']; ?>" download="<?= $kode . '_' . toLowercaseUnderscore($dok['namadokumen']); ?>"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                                <li class="dropdown-divider"></li>
                                                                                <li><a class="dropdown-item" href="<?= site_url('penghuni/deleteDokumen/' . $dok['id_dokumen']); ?>" onclick="return confirm('Anda yakin ingin menghapus dokumen ini?');"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Hapus</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php endif; ?>
                                            <h5 class="mt-5">Unduhan</h5>
                                            <ul class="text-primary">
                                                <li class="text-primary"><a href="<?= site_url('export/tatatertib/' . $kode) ?>" target="_blank">Persetujuan Tata Tertib</a></li>
                                                <li class="text-primary"><a href="<?= site_url('export/dpk/' . $kode) ?>" target="_blank">Data Pemohon dan Kependudukan</a></li>
                                            </ul>
                                        </div>
                                        <!--end cardbody-->
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!--end row-->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

        </div>
        <?= $this->include('partials/footer') ?>

        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>


    <?= $this->include('partials/customizer') ?>

    <?= $this->include('partials/vendor-scripts') ?>

    <script src="/assets/js/rupiah.js"></script>



    <!-- App js -->
    <script src="/assets/js/app.js"></script>

</body>