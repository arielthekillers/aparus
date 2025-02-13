<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Detail Pemohon')); ?>
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
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <h5 class="card-title flex-grow-1 mb-4 text-primary">Detail Penghuni</h5>
                                        <div class="col-md-12 col-lg-3">
                                            <div class="text-center mb-4">
                                                <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                                    <img class="rounded-circle header-profile-user img-thumbnail user-profile-image material-shadow avatar-xl img-thumbnail" src="<?= site_url('uploads/profil/' . $penghuni['avatar']); ?>" alt="user-profile-image">
                                                </div>
                                                <h5 class="fs-16 mb-1"><?= $penghuni['kontak']; ?></h5>
                                                <p class="text-muted mb-0"><?= $penghuni['email']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-3">
                                            <p class="text-muted mb-1">No KTP</p>
                                            <h5 class="fs-14"><?= $penghuni['ktp']; ?></h5>
                                            <p class="text-muted mb-1">Nama</p>
                                            <h5 class="fs-14"><?= $penghuni['nama']; ?></h5>
                                            <p class="text-muted mb-1">Tempat, Tanggal Lahir</p>
                                            <h5 class="fs-14"><?= $penghuni['tempat_lahir']; ?>, <?= tgl_indo($penghuni['tanggal_lahir']); ?></h5>
                                            <p class="text-muted mb-1">Jenis Kelamin</p>
                                            <h5 class="fs-14"><?= $penghuni['jeniskelamin']; ?></h5>
                                        </div>
                                        <div class="col-md-4 col-lg-3">
                                            <p class="text-muted mb-1">Agama</p>
                                            <h5 class="fs-14"><?= $penghuni['agama']; ?></h5>
                                            <p class="text-muted mb-1">Status Menikah</p>
                                            <h5 class="fs-14"><?= $penghuni['statusmenikah']; ?></h5>
                                            <p class="text-muted mb-1">Pekerjaan</p>
                                            <h5 class="fs-14"><?= $penghuni['pekerjaan']; ?></h5>
                                            <p class="text-muted mb-1">Status Difabel</p>
                                            <h5 class="fs-14"><?= $penghuni['statusdifabel']; ?></h5>
                                        </div>
                                        <div class="col-md-4 col-lg-3">
                                            <p class="text-muted mb-1">Alamat</p>
                                            <h5 class="fs-14"><?= $penghuni['alamat']; ?></h5>
                                            <p class="text-muted mb-1">Kelurahan</p>
                                            <h5 class="fs-14"><?= $kelurahan['nama_kelurahan']; ?></h5>
                                            <p class="text-muted mb-1">Kecamatan</p>
                                            <h5 class="fs-14"><?= $kecamatan['nama_kecamatan']; ?></h5>
                                            <p class="text-muted mb-1">Rusun Tujuan</p>
                                            <h5 class="fs-14"><?= $rusun['rusun_nama']; ?></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title flex-grow-1 my-4 text-primary">Anggota Keluarga</h5>
                                            <div class="table-responsive mb-4">
                                                <?php if (empty($anggotakeluarga)) : ?>
                                                    <script src="https://cdn.lordicon.com/lordicon.js"></script>
                                                    <h5 class="text-center">
                                                        <lord-icon src="https://cdn.lordicon.com/uecgmesg.json" trigger="loop" style="width:100px;height:100px"></lord-icon>
                                                    </h5>
                                                    <p class="text-center text-muted">Data Tidak Ditemukan</p>
                                                <?php else : ?>
                                                    <table class="table table-striped align-middle table-nowrap mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>Tgl. Lahir</th>
                                                                <th>JK</th>
                                                                <th>Status</th>
                                                                <th>Pendidikan</th>
                                                                <th>Pendapatan</th>
                                                            </tr>
                                                        </thead>
                                                        <?php $no = 1; ?>
                                                        <tbody class="list">
                                                            <?php foreach ($anggotakeluarga as $data) : ?>
                                                                <tr>
                                                                    <td><?= $no; ?></td>
                                                                    <td><?= $data['nama']; ?></td>
                                                                    <td><?= tgl_indo($data['tanggal_lahir']); ?> <?= umur($data['tanggal_lahir']); ?></td>
                                                                    <td><?= shorten_jenis_kelamin($data['jenis_kelamin']); ?></td>
                                                                    <td><?= $data['status']; ?></td>
                                                                    <td><?= $data['pendidikan']; ?></td>
                                                                    <td><?= rpbasic($data['pendapatan']); ?></td>
                                                                </tr>
                                                                <?php $no += 1; ?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                    <!--end table-->
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title flex-grow-1 my-4 text-primary">Dokumen</h5>
                                            <?php if (empty($dokumen)) : ?>
                                                <script src="https://cdn.lordicon.com/lordicon.js"></script>
                                                <h5 class="text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/uecgmesg.json" trigger="loop" style="width:100px;height:100px"></lord-icon>
                                                </h5>
                                                <p class="text-center text-muted">Dokumen Tidak Ditemukan</p>
                                            <?php else : ?>
                                                <div class="table-responsive mb-4">
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
                                                                            <a class="btn btn-soft-secondary btn-sm btn-icon" href="/uploads/dokumen/<?= $dok['dokumen']; ?>" target="_blank"><i class="ri-eye-fill"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title flex-grow-1 my-4 text-primary">Persetujuan</h5>
                                            <form class="row g-3" method="POST" action="<?= site_url('kontrak/kirimpermohonan'); ?>">
                                                <div class="col-12">
                                                    <input type="hidden" name="kode_penghuni" value="<?= $penghuni['kode_penghuni']; ?>">
                                                    <div class="form-check">
                                                        <input class="form-check-input checkbox" type="checkbox" value="" id="invalidCheck1" checked disabled>
                                                        <label class="form-check-label" for="invalidCheck1">
                                                            Yang bersangkutan menyatakan data yang diisi adalah data yang benar dan dapat dipertanggung jawabkan.
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input checkbox" type="checkbox" value="" id="invalidCheck2" checked disabled>
                                                        <label class="form-check-label" for="invalidCheck2">
                                                            Yang bersangkutan menyatakan telah membaca seluruh ketentuan dan persyaratan yang ada.
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <a href="#" class="btn btn-primary" type="button" onclick="history.go(-1);">Kembali</a>
                                                    <a href="<?= site_url('kontrak/updateToDaftarTunggu/' . $permohonan['kontrak_id'] . '/' . $permohonan['penghuni']); ?>" class="btn btn-primary" type="button">Simpan ke Daftar Tunggu</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- container-fluid -->
            </div><!-- End Page-content -->
        </div>
        <?= $this->include('partials/footer') ?>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
    <?= $this->include('partials/customizer') ?>

    <?= $this->include('partials/vendor-scripts') ?>


    <!-- App js -->
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".checkbox").on("click", function() {
                console.log($(".checkbox:checked").length);
                if ($(".checkbox:checked").length > 1) {
                    $('#btn').prop('disabled', false);
                } else {
                    $('#btn').prop('disabled', true);
                }
            });
        });
    </script>
</body>