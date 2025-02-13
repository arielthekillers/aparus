<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Verifikasi Penghuni')); ?>
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

                    <?php if (session()->get('status')) : ?>
                        <div class="row alert-message">
                            <div class="col-lg-12">
                                <!-- Success Alert -->
                                <div class="alert alert-<?= session()->get('color'); ?> alert-border-left alert-dismissible fade shadow show" role="alert">
                                    <i class="<?= session()->get('icon'); ?> me-3 align-middle"></i>
                                    <strong><?= session()->get('status'); ?></strong> <?= session()->get('message'); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex bg-primary">
                                    <h4 class="card-title mb-0 flex-grow-1 text-white-50">Data Penghuni</h4>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div class="live-preview">
                                        <form action="<?= site_url('penghuni/save'); ?>" method="POST">
                                            <input type="hidden" name="id_penghuni" value="<?= $penghuni['id_penghuni']; ?>">
                                            <input type="hidden" name="user_id" value="<?= session('userid'); ?>">
                                            <input type="hidden" name="kode_penghuni" value="<?= $penghuni['kode_penghuni']; ?>">

                                            <div class="row">
                                                <div class="col-6 border-end">
                                                    <div class="row">

                                                        <h5 class="fs-15 text-primary mb-4">Data Pribadi (KTP)</h5>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="ktp" class="form-label">No KTP</label>
                                                                <input autofocus required type="number" class="form-control" placeholder="Masukkan NIK" id="ktp" name="ktp" value="<?= $penghuni['ktp']; ?>" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Nama</label>
                                                                <input required type="text" class="form-control" placeholder="Masukkan Nama" id="nama" name="nama" value="<?= $penghuni['nama']; ?>" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="tempat_lahir" class="form-label">Tempat
                                                                    Lahir</label>
                                                                <input type="text" class="form-control" placeholder="Masukkan tempat Lahir" id="tempat_lahir" name="tempat_lahir" value="<?= $penghuni['tempat_lahir']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <!--end col-->


                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="tanggal_lahir" class="form-label">Tanggal
                                                                    Lahir</label>
                                                                <input type="date" class="form-control" placeholder="Tanggal Lahit" id="tanggal_lahir" name="tanggal_lahir" value="<?= $penghuni['tanggal_lahir']; ?>" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="alamat" class="form-label">Alamat</label>
                                                                <textarea class="form-control" placeholder="Masukkan Alamat" id="alamat" name="alamat" rows="3" value="" readonly><?= $penghuni['alamat']; ?></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                                                                <select class="form-select" aria-label="Default select example" id="jeniskelamin" name="jeniskelamin" readonly disabled>
                                                                    <option value="" selected>-- Pilih --</option>
                                                                    <option value="Laki-laki" <?= ($penghuni['jeniskelamin'] == 'Laki-laki' ? 'selected' : ''); ?>>Laki-laki</option>
                                                                    <option value="Perempuan" <?= ($penghuni['jeniskelamin'] == 'Perempuan' ? 'selected' : ''); ?>>Perempuan</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                                                <input type="text" class="form-control" placeholder="Masukkan Pekerjaan" id="pekerjaan" name="pekerjaan" value="<?= $penghuni['pekerjaan']; ?>" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="agama" class="form-label">Agama</label>
                                                                <select class="form-select" aria-label="Default select example" id="agama" name="agama" disabled>
                                                                    <option value="" selected>-- Pilih --</option>
                                                                    <option value="Islam" <?= ($penghuni['agama'] == 'Islam' ? 'selected' : ''); ?>>Islam</option>
                                                                    <option value="Katholik" <?= ($penghuni['agama'] == 'Katholik' ? 'selected' : ''); ?>>Katholik</option>
                                                                    <option value="Protestan" <?= ($penghuni['agama'] == 'Protestan' ? 'selected' : ''); ?>>Protestan</option>Hindu</option>
                                                                    <option value="Budha" <?= ($penghuni['agama'] == 'Budha' ? 'selected' : ''); ?>>Budha</option>
                                                                    <option value="Konghucu" <?= ($penghuni['agama'] == 'Konghucu' ? 'selected' : ''); ?>>Konghucu</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="statusmenikah" class="form-label">Status
                                                                    Menikah</label>
                                                                <select class="form-select" aria-label="Default select example" id="statusmenikah" name="statusmenikah" disabled>
                                                                    <option value="" selected>-- Pilih --</option>
                                                                    <option value="Kawin" <?= ($penghuni['statusmenikah'] == 'Kawin' ? 'selected' : ''); ?>>
                                                                        Kawin</option>
                                                                    <option value="Belum Kawin" <?= ($penghuni['statusmenikah'] == 'Belum Kawin' ? 'selected' : ''); ?>>
                                                                        Belum Kawin</option>
                                                                    <option value="Cerai Hidup" <?= ($penghuni['statusmenikah'] == 'Cerai Hidup' ? 'selected' : ''); ?>>
                                                                        Cerai Hidup</option>
                                                                    <option value="Cerai Mati" <?= ($penghuni['statusmenikah'] == 'Cerai Mati' ? 'selected' : ''); ?>>
                                                                        Cerai Mati</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="row">


                                                        <h5 class="fs-15 text-primary mb-4">Data Pendukung lainnya</h5>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="jumlahanggotakeluarga" class="form-label">Jumlah Anggota Keluarga</label>
                                                                <input type="text" class="form-control" placeholder="Masukkan Jumlah Anggota Keluarga" id="jumlahanggotakeluarga" name="jumlahanggotakeluarga" value="<?= $penghuni['jumlahanggotakeluarga']; ?>" readonly>
                                                            </div>
                                                        </div>


                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="statusdifabel" class="form-label">Status
                                                                    Difabel</label>
                                                                <select class="form-select" aria-label="Default select example" id="statusdifabel" name="statusdifabel" disabled>
                                                                    <option value="" selected>-- Pilih --</option>
                                                                    <option value="Difabel" <?= ($penghuni['statusdifabel'] == 'Difabel' ? 'selected' : ''); ?>>Difabel</option>
                                                                    <option value="Non Difabel" <?= ($penghuni['statusdifabel'] == 'Non Difabel' ? 'selected' : ''); ?>>Non Difabel</option>
                                                                </select>
                                                            </div>
                                                        </div>



                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="kontak" class="form-label">Kontak </label>
                                                                <input type="text" class="form-control" placeholder="Masukkan Password" id="kontak" name="kontak" value="<?= $penghuni['kontak']; ?>" readonly>
                                                            </div>
                                                        </div>


                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email </label>
                                                                <input type="text" class="form-control" placeholder="Masukkan Email" id="email" name="email" value="<?= $penghuni['email']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <!--end col-->

                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label for="rusuntujuan" class="form-label">Rusun Tujuan</label>
                                                                <select class="form-select" aria-label="Default select example" id="rusuntujuan" name="rusuntujuan" disabled>
                                                                    <option value="" selected>-- Pilih --</option>
                                                                    <?php foreach ($rusun as $r) : ?>
                                                                        <option value="<?= $r['rusun_id']; ?>" <?= ($r['rusun_id'] == $penghuni['rusuntujuan'] ? 'selected' : ''); ?>><?= $r['rusun_nama']; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>




                                                <!--end col-->
                                                <div class="col-lg-12 border-top">
                                                    <div class="text-end mt-3">
                                                        <!-- <button type="submit" class="btn btn-primary">Update</button> -->
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>

                                            <!--end row-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!--end col-->
                    </div>
                    <!--end row-->


                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Dokumen Kontrak</h4>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <?php if (empty($dokumen)) : ?>
                                        <div class="alert alert-borderless shadow alert-dark mb-2" role="alert">
                                            Belum ada <strong> Dokumen </strong> terupload
                                        </div>
                                    <?php else : ?>
                                        <div class="table-responsive mb-4">
                                            <table class="table table-bordered table-centered align-middle mb-0">
                                                <thead class="table-light">
                                                    <tr class="text-center text-muted">
                                                        <th>Tipe Dokumen</th>
                                                        <th>File</th>
                                                        <th>Tanggal Upload</th>
                                                        <th class="text-muted">#</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($dokumen as $dok) : ?>
                                                        <tr class="text-center text-muted">
                                                            <td class="fw-medium fs-12">
                                                                <?= $dok['namadokumen']; ?>
                                                            </td>
                                                            <td class="text-center fw-medium fs-12">
                                                                <a href="/uploads/dokumen/<?= $dok['dokumen']; ?>" target="_blank">
                                                                    <?= $dok['dokumen']; ?>
                                                                </a>
                                                                <?php
                                                                $fsize = filesize(FCPATH . '/uploads/dokumen/' . $dok['dokumen']);
                                                                if ($fsize >= 1048576) {
                                                                    $fsize = number_format($fsize / 1048576, 2) . ' MB';
                                                                } elseif ($fsize >= 1024) {
                                                                    $fsize = number_format($fsize / 1024, 2) . ' KB';
                                                                }
                                                                ?>
                                                                <span class="badge rounded-pill bg-primary ms-2"><?= $fsize; ?></span>
                                                            </td>
                                                            <td class="text-center fw-medium fs-12">
                                                                <?= timestamp($dok['time']); ?>
                                                            </td>
                                                            <td class="text-center fw-medium fs-12">
                                                                <a href="<?= site_url('dokumen/delete/' . $dok['dokumen'] . '/' . $dok['id_dokumen'] . '/' . $dok['id_penghuni']); ?>" onclick="return confirm('Anda yakin ingin menghapus dokumen ini?');"><i class="ri-delete-bin-fill align-bottom me-2 text-danger "></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!--end row-->

                            </div>
                        </div> <!-- end col -->
                    </div>
                    <!--end row-->

                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-header align-items-center d-flex bg-primary">
                                    <h4 class="card-title mb-0 flex-grow-1 text-white">Form Verifikasi</h4>
                                </div><!-- end card header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8 border-end">
                                            <form action="" class="row">
                                                <div class="col-12">
                                                    <h5>Penolakan</h5>
                                                    <label for="alasan" class="form-label text-muted">Jika data dan dokumen yang dikirim belum lengkap, anda bisa menolak dokumen tersebut dan dikembalikan ke pendaftar untuk dilakukan pearbaikan.</label>
                                                    <textarea class="form-control" placeholder="Masukkan Alasan Pengembalikan Dokumen" id="alasan" name="alasan" rows="2" required></textarea>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="text-end mt-3 d-grid">
                                                        <button type="submit" class="btn btn-danger">Kembalikan untuk diperbaiki</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5>Persetujuan</h5>
                                                    <p class="text-muted">Jika data dan dokumen yang dikirim telah lengkap dan benar. Klik tombol verifikasi dan setujui untuk masuk ke proses kontrak</p>
                                                    <a href="#" class="btn btn-success d-grid">Verifikasi dan Setujui</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->

                        </div>
                    </div> <!-- end col -->
                </div>
                <!--end row-->

            </div> <!-- container-fluid -->
        </div><!-- End Page-content -->


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