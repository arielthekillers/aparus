<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Detail Penghuni')); ?>
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
                                        <div class="card-header align-items-center d-flex border-0">
                                            <h4 class="card-title mb-0 flex-grow-1">Detail Penghuni</h4>
                                        </div><!-- end card header -->
                                        <div class="card-body">
                                            <div class="live-preview">
                                                <form action="<?= site_url('penghuni/saveByUser'); ?>" method="POST">
                                                    <input type="hidden" name="id_penghuni" value="<?= $penghuni['id_penghuni']; ?>">

                                                    <div class="row">
                                                        <div class="col-7 border-end">
                                                            <div class="row">

                                                                <h5 class="fs-15 text-primary mb-4">Data Pribadi (KTP)</h5>
                                                                <div class="col-12">
                                                                    <div class="mb-3">
                                                                        <label for="ktp" class="form-label">No KTP</label>
                                                                        <input readonly required type="number" class="form-control" placeholder="Masukkan NIK" id="ktp" name="ktp" value="<?= $penghuni['ktp']; ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="mb-3">
                                                                        <label for="nama" class="form-label">Nama</label>
                                                                        <input readonly required type="text" class="form-control" placeholder="Masukkan Nama" id="nama" name="nama" value="<?= $penghuni['nama']; ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="tempat_lahir" class="form-label">Tempat
                                                                            Lahir</label>
                                                                        <input autofocus type="text" class="form-control" placeholder="Masukkan tempat Lahir" id="tempat_lahir" name="tempat_lahir" value="<?= $penghuni['tempat_lahir']; ?>">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->


                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="tanggal_lahir" class="form-label">Tanggal
                                                                            Lahir</label>
                                                                        <input type="date" class="form-control" placeholder="Tanggal Lahit" id="tanggal_lahir" name="tanggal_lahir" value="<?= $penghuni['tanggal_lahir']; ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="kecamatan" class="form-label">Kecamatan</label>
                                                                        <select class="form-select" aria-label="Default select example" id="kecamatan" name="kecamatan" required>
                                                                            <option value="">-- Pilih --</option>
                                                                            <?php foreach ($kecamatan as $kec) : ?>
                                                                                <option value="<?= $kec['id_kecamatan']; ?>" <?= ($penghuni['kecamatan'] == $kec['id_kecamatan'] ? "selected" : ""); ?>><?= $kec['nama_kecamatan']; ?></option>
                                                                            <?php endforeach  ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="kelurahan" class="form-label">Kelurahan</label>
                                                                        <select class="form-select" aria-label="Default select example" id="kelurahan" name="kelurahan">
                                                                            <?php foreach ($kelurahan as $kel) : ?>
                                                                                <?php if ($kel['id_kecamatan'] == $penghuni['kecamatan']) : ?>
                                                                                    <option value="<?= $kel['id_kelurahan']; ?>" <?= ($penghuni['kelurahan'] == $kel['id_kelurahan'] ? "selected" : ""); ?>><?= $kel['nama_kelurahan']; ?></option>
                                                                                <?php endif;  ?>
                                                                            <?php endforeach;  ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="mb-3">
                                                                        <label for="alamat" class="form-label">Alamat</label>
                                                                        <textarea class="form-control" placeholder="Masukkan Alamat" id="alamat" name="alamat" rows="3" value=""><?= $penghuni['alamat']; ?></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                                                                        <select class="form-select" aria-label="Default select example" id="jeniskelamin" name="jeniskelamin">
                                                                            <option value="" selected>-- Pilih --</option>
                                                                            <option value="Laki-laki" <?= ($penghuni['jeniskelamin'] == 'Laki-laki' ? 'selected' : ''); ?>>Laki-laki</option>
                                                                            <option value="Perempuan" <?= ($penghuni['jeniskelamin'] == 'Perempuan' ? 'selected' : ''); ?>>Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                                                        <input type="text" class="form-control" placeholder="Masukkan Pekerjaan" id="pekerjaan" name="pekerjaan" value="<?= $penghuni['pekerjaan']; ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <label for="agama" class="form-label">Agama</label>
                                                                        <select class="form-select" aria-label="Default select example" id="agama" name="agama">
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
                                                                        <select class="form-select" aria-label="Default select example" id="statusmenikah" name="statusmenikah">
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

                                                        <div class="col-5">
                                                            <div class="row">


                                                                <h5 class="fs-15 text-primary mb-4">Data Pendukung lainnya</h5>
                                                                <div class="col-12">
                                                                    <div class="mb-3">
                                                                        <label for="jumlahanggotakeluarga" class="form-label">Jumlah Anggota Keluarga</label>
                                                                        <input type="text" class="form-control" placeholder="Masukkan Jumlah Anggota Keluarga" id="jumlahanggotakeluarga" name="jumlahanggotakeluarga" value="<?= $penghuni['jumlahanggotakeluarga']; ?>">
                                                                    </div>
                                                                </div>


                                                                <div class="col-12">
                                                                    <div class="mb-3">
                                                                        <label for="statusdifabel" class="form-label">Status
                                                                            Difabel</label>
                                                                        <select class="form-select" aria-label="Default select example" id="statusdifabel" name="statusdifabel">
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
                                                                        <select class="form-select" aria-label="Default select example" id="rusuntujuan" name="rusuntujuan">
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
                                                                <button type="submit" class="btn btn-primary">Update</button>
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
    <script src="/assets/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $('#kecamatan').change(function() {
            var id_kecamatan = $('#kecamatan').val();
            if (id_kecamatan != '') {
                $.ajax({
                    url: "<?php echo base_url('/penghuni/datakelurahan'); ?>",
                    method: "POST",
                    data: {
                        parent: id_kecamatan
                    },
                    async: true,
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data);
                        var html = '<option value="">Pilih...</option>';
                        for (var count = 0; count < data.length; count++) {
                            html += '<option value="' + data[count].id_kelurahan + '">' + data[count].nama_kelurahan + '</option>';
                        }
                        $('#kelurahan').html(html);
                    }
                });
            } else {
                var html = '<option value="">Pilih...</option>';
                $('#kelurahan').html(html);
            }
        });
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