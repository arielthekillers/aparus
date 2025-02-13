<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Edit Penghuni')); ?>
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




                    <?php if (empty($penghuni)) : ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card text-center">
                                    <div class="card-body my-5">
                                        <h5 class="card-title">Kontrak tidak ditemukan</h5>
                                        <p class="card-text">Silahkan Klik Ajukan Kontrak Membuat Kontrak.</p>
                                        <a href="<?= site_url('penghuni/save/') ?>" class="btn btn-primary">AJUKAN
                                            KONTRAK</a>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                        </div>
                    <?php else : ?>

                        <?php if ($penghuni['status'] == 1) : ?>
                            <div class="alert alert-warning" role="alert">
                                <strong> Data Sedang Diverifikasi </strong>

                            </div>
                        <?php elseif ($penghuni['status'] == 2) : ?>

                            <div class="alert alert-success" role="alert">
                                <strong> Data Telah Diverifikasi</strong>
                            </div>

                        <?php else : ?>

                        <?php endif ?>


                        <div class="row">


                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex bg-primary">
                                        <h4 class="card-title mb-0 flex-grow-1 text-white-50">Form Edit Penghuni</h4>
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
                                                                    <input autofocus required type="number" class="form-control" placeholder="Masukkan NIK" id="ktp" name="ktp" value="<?= $penghuni['ktp']; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <label for="nama" class="form-label">Nama</label>
                                                                    <input required type="text" class="form-control" placeholder="Masukkan Nama" id="nama" name="nama" value="<?= $penghuni['nama']; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="mb-3">
                                                                    <label for="tempat_lahir" class="form-label">Tempat
                                                                        Lahir</label>
                                                                    <input type="text" class="form-control" placeholder="Masukkan tempat Lahir" id="tempat_lahir" name="tempat_lahir" value="<?= $penghuni['tempat_lahir']; ?>">
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

                                                    <div class="col-6">
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
                                                                    <input type="text" class="form-control" placeholder="Masukkan Password" id="kontak" name="kontak" value="<?= $penghuni['kontak']; ?>">
                                                                </div>
                                                            </div>


                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Email </label>
                                                                    <input type="text" class="form-control" placeholder="Masukkan Email" id="email" name="email" value="<?= $penghuni['email']; ?>">
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

                                        <div class="col-lg-12 border-bottom border-bottom-dashed mb-2">
                                            <div class="text-start pt-2">
                                                <h5 class="fs-15">Upload Form</h5>
                                            </div>
                                        </div>

                                        <!-- Success Alert -->
                                        <div class="alert alert-borderless shadow alert-primary" role="alert">
                                            File yang <b>boleh</b> diupload adalah file bereksetensi <i>jpg/jpeg, png, pdf,
                                                doc/docx, xls/xlsx, dan zip</i>. Dengan ukuran maksimal <b>5 Mb</b>.
                                        </div>


                                        <?= form_open_multipart('dokumen/upload'); ?>

                                        <input type="hidden" name="id_penghuni" value="<?= $penghuni['id_penghuni']; ?>">
                                        <input type="hidden" name="kode_penghuni" value="<?= $penghuni['kode_penghuni']; ?>">

                                        <div class="row">

                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="file" class="form-label">File Dokumen</label>
                                                    <input type="file" class="form-control" id="file" name="file" required>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="jenis" class="form-label">Jenis</label>
                                                    <select id="jenis" class="form-select" name="namadokumen" required>
                                                        <option value="">Pilih...</option>
                                                        <option value="KTP">KTP</option>
                                                        <option value="Surat Nikah">Surat Nikah</option>
                                                        <option value="Foto Kepala Keluarga">Foto Kepala Keluarga</option>
                                                        <option value="Foto Kartu Keluarga">Kartu Keluarga</option>
                                                        <option value="Berkas Slip Gaji">Berkas Slip Gaji</option>
                                                        <option value="Surat Keterangan Bekerja">Surat Keterangan Bekerja
                                                        </option>
                                                        <option value="Surat Keterangan Belum Punya Rumah">Surat Keterangan
                                                            Belum Punya Rumah</option>
                                                        <option value="Pernytaan Sanggup Bayar">Pernytaan Sanggup Bayar
                                                        </option>
                                                        <option value="Formulir Pendaftaran">Formulir Pendaftaran</option>
                                                        <option value="Data Pemohon dan Kependudukan">Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 border-top border-top-dashed">
                                                <div class="text-start pt-2">
                                                    <button type="submit" class="btn btn-primary">Upload</button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                        </form>
                                    </div>
                                    <!--end row-->

                                </div>
                            </div> <!-- end col -->
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tab-content text-muted">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card text-center">
                                                <div class="card-body my-5">

                                                    <?php $role = 2; ?>
                                                    <?php if ($role == 1) : ?>

                                                        <?php if ($penghuni['status'] == 1) : ?>

                                                            <h5 class="card-title">Data Sedang Diverifikasi</h5>
                                                            <p class="card-text">Petugas Sedang Melakukan Verifikasi Data</p>

                                                        <?php elseif ($penghuni['status'] == 2) : ?>

                                                            <h5 class="card-title">Data Telah Diverifikasi</h5>
                                                            <p class="card-text"></p>

                                                        <?php else : ?>



                                                            <h5 class="card-title">Silahkan Klik Kirim Data</h5>
                                                            <p class="card-text">Apabila Data Telah Dikirim</p>

                                                            <form action="<?= site_url('penghuni/verif'); ?>" method="POST">
                                                                <input type="hidden" name="id_penghuni" value="<?= $penghuni['id_penghuni']; ?>">
                                                                <input type="hidden" name="status" value="1">

                                                                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="">
                                                                    Kirim Data
                                                                </button>

                                                            </form>

                                                        <?php endif ?>




                                                    <?php else : ?>

                                                        <?php if ($penghuni['status'] == 2) : ?>

                                                            <h5 class="card-title">Data Telah Diverifikasi</h5>
                                                            <p class="card-text"></p>

                                                        <?php else : ?>



                                                            <h5 class="card-title">Verifikasi Data</h5>
                                                            <p class="card-text">Silahkan Klik Verifikasi Untuk Mengirim Data</p>

                                                            <form action="<?= site_url('penghuni/verif'); ?>" method="POST">
                                                                <input type="hidden" name="id_penghuni" value="<?= $penghuni['id_penghuni']; ?>">
                                                                <input type="hidden" name="status" value="2">

                                                                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="">
                                                                    Verifikasi Data
                                                                </button>

                                                            <?php endif ?>


                                                        <?php endif ?>




                                                </div>
                                            </div> <!-- end col -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div> <!-- container-fluid -->
            </div><!-- End Page-content -->


        </div>
        <?= $this->include('partials/footer') ?>

        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <script src="/assets/js/rupiah.js"></script>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/jquery-3.6.0.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
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
        });
    </script>



    <?= $this->include('partials/customizer') ?>

    <?= $this->include('partials/vendor-scripts') ?>

    <script src="/assets/js/rupiah.js"></script>



    <!-- App js -->
    <script src="/assets/js/app.js"></script>

</body>