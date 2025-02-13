<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Tagihan')); ?>
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

                            <h4 class="fs-16 mb-1">Detail Penghuni</h4>
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
                                            <h4 class="card-title mb-0 flex-grow-1">Tagihan</h4>
                                        </div><!-- end card header -->
                                        <div class="card-body">
                                            <div class="table-responsive mb-4">
                                                <?php if (empty($tagihan)) : ?>
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
                                                                <th>Bulan</th>
                                                                <th>Tahun</th>
                                                                <th>Type Tagihan</th>
                                                                <th>Harga</th>
                                                                <!-- <th class="text-center">#</th> -->
                                                            </tr>
                                                        </thead>
                                                        <?php $no = 1; ?>
                                                        <tbody class="list">
                                                            <?php foreach ($tagihan as $data) : ?>
                                                                <tr>
                                                                    <td><?= $no; ?></td>
                                                                    <td><?= bulan($data['tagihan_bulan']); ?></td>
                                                                    <td><?= $data['tagihan_tahun']; ?></td>
                                                                    <td><?= $data['tagihan_type']; ?></td>
                                                                    <td><?= rpbasic($data['tagihan_harga']); ?></td>
                                                                    <!-- <td>
                                                                        <div class="hstack gap-3 flex-wrap">
                                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalAnggotakeluargaEdit" data-id="<?= $data['tagihan_id']; ?>">
                                                                                <i class="ri-edit-2-line"></i>
                                                                            </a>
                                                                            <a href="<?= site_url('penghuni/deleteanggotakeluarga/' . $data['tagihan_id'] . '/' . $kode); ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                                                        </div>
                                                                    </td> -->
                                                                </tr>
                                                                <?php $no += 1; ?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                    <!--end table-->
                                                    <div class="modal fade" id="modalAnggotakeluargaEdit" tabindex="-1" aria-labelledby="modalAnggotakeluargaEditLabel" aria-modal="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalAnggotakeluargaEditLabel">Tambah Anggota Keluarga</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="<?= site_url('penghuni/savedatakeluarga'); ?>" method="POST" enctype="multipart/form-data">
                                                                        <input type="text" class="form-control" name="kode_penghuni" value="<?= $kode; ?>" required>
                                                                        <input type="text" class="form-control id_anggotakeluarga" name="id_anggotakeluarga" id="id_anggotakeluarga" required>
                                                                        <div class="row g-3">
                                                                            <div class="col-12">
                                                                                <div>
                                                                                    <label for="nama" class="form-label">Nama</label>
                                                                                    <input type="text" class="form-control nama" placeholder="Nama" id="nama" name="nama" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div>
                                                                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                                                    <input type="date" class="form-control tanggal_lahir" id="tanggal_lahir" name="tanggal_lahir" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                                                <select class="form-select jenis_kelamin" aria-label="Jenis Kelamin" id="jenis_kelamin" name="jenis_kelamin" required>
                                                                                    <option value="" selected>-- Pilih --</option>
                                                                                    <option value="Laki-laki">Laki-laki</option>
                                                                                    <option value="Perempuan">Perempuan</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label for="status" class="form-label">Status</label>
                                                                                <select class="form-select status" aria-label="Status" id="statusKeluarga" name="status" required>
                                                                                    <option value="" default selected>-- Pilih --</option>
                                                                                    <option value="Kepala Keluarga">Kepala Keluarga</option>
                                                                                    <option value="Istri">Istri</option>
                                                                                    <option value="Suami">Suami</option>
                                                                                    <option value="Anak">Anak</option>
                                                                                    <option value="Orang Tua">Orang Tua</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <label for="pendidikan" class="form-label">Pendidikan</label>
                                                                                <select class="form-select pendidikan" aria-label="Pendidikan" id="pendidikan" name="pendidikan">
                                                                                    <option value="" default selected>-- Pilih --</option>
                                                                                    <option value="Belum Sekolah">Belum Sekolah</option>
                                                                                    <option value="Tidak Lulus Sekolah">Tidak Lulus Sekolah</option>
                                                                                    <option value="SD">SD</option>
                                                                                    <option value="SMA">SMA</option>
                                                                                    <option value="SMP">SMP</option>
                                                                                    <option value="S1">S1</option>
                                                                                    <option value="S2">S2</option>
                                                                                    <option value="S3">S3</option>
                                                                                    <option value="Lainnya">Lainnya</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div>
                                                                                    <label for="pendapatan" class="form-label">Pendapatan</label>
                                                                                    <input type="text" class="form-control pendapatan" placeholder="Pendapatan Per Bulan" id="pendapatan" name="pendapatan">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <div class="hstack gap-2 justify-content-end">
                                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                                </div>
                                                                            </div>
                                                                            <!--end col-->
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
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
        var myModal = document.getElementById('modalAngkotakeluarga')
        var myInput = document.getElementById('nama')
        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
        $(document).on('keydown', function(e) {
            // You may replace `m` with whatever key you want
            if ((e.metaKey || e.ctrlKey) && (String.fromCharCode(e.which).toLowerCase() === 'm')) {
                $("#modalAngkotakeluarga").modal('show');
            }
        });
        window.setTimeout(function() {
            $(".alert-message").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
        $(document).ready(function() {
            $('#modalAnggotakeluargaEdit').on('show.bs.modal', function(e) {
                $('.id_anggotakeluarga').attr('value', '');
                $('.nama').attr('value', '');
                $('.tanggal_lahir').attr('value', '');
                $('.jenis_kelamin option:selected').removeAttr('selected');
                $('.status option:selected').removeAttr('selected');
                $('.pendidikan option:selected').removeAttr('selected');
                $('.pendapatan').attr('value', '');
                $('.savebutton').prop('disabled', true);
                var idx = $(e.relatedTarget).data('id');
                $.ajax({
                    url: "<?php echo base_url('/penghuni/detailAnggotakeluarga'); ?>",
                    method: "POST",
                    data: {
                        id: idx
                    },
                    async: true,
                    dataType: "JSON",
                    success: function(data) {
                        //console.log(data);
                        $('.id_anggotakeluarga').attr('value', data.id_anggotakeluarga);
                        $('.nama').attr('value', data.nama);
                        $('.tanggal_lahir').attr('value', data.tanggal_lahir);
                        $('.jenis_kelamin option[value="' + data.jenis_kelamin + '"]').prop('selected', 'selected');
                        $('.status option[value="' + data.status + '"]').prop('selected', 'selected');
                        $('.pendidikan option[value="' + data.pendidikan + '"]').prop('selected', 'selected');
                        $('.pendapatan').attr('value', data.pendapatan);
                        $('.savebutton').removeAttr('disabled');
                    }
                });
            });
        });
    </script>



    <?= $this->include('partials/customizer') ?>

    <?= $this->include('partials/vendor-scripts') ?>

    <script src="/assets/js/rupiah.js"></script>



    <!-- App js -->
    <script src="/assets/js/app.js"></script>

</body>