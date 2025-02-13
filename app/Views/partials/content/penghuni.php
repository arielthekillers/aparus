<?php $uri = service('uri'); ?>
<div class="list-group d-print-none mb-3">
    <a href="<?= site_url('penghuni/detail/' . $kode); ?>" class="list-group-item list-group-item-action <?= ($uri->getSegment(2) == 'detail' ? 'active' : ''); ?>"><i class="ri-apps-fill align-middle me-2 fs-16"></i>Detail Penghuni</a>
    <a href="<?= site_url('penghuni/anggotakeluarga/' . $kode); ?>" class="list-group-item list-group-item-action <?= ($uri->getSegment(2) == 'anggotakeluarga' ? 'active' : ''); ?>"><i class="ri-team-fill align-middle me-2 fs-16"></i>Anggota Keluarga</a>
    <a href="<?= site_url('penghuni/dokumen/' . $kode); ?>" class="list-group-item list-group-item-action <?= ($uri->getSegment(2) == 'dokumen' ? 'active' : ''); ?>"><i class="ri-file-zip-fill align-middle me-2 fs-16"></i>Dokumen</a>
</div>
<?php if (!empty($kontrak)) : ?>
    <div class="list-group d-print-none">
        <a href="<?= site_url('penghuni/kontrak/' . $kode); ?>" class="list-group-item list-group-item-action <?= ($uri->getSegment(2) == 'kontrak' ? 'active' : ''); ?>"><i class="mdi mdi-file-sign align-middle me-2 fs-16"></i>Kontrak</a>
        <a href="<?= site_url('penghuni/tagihan/' . $kode); ?>" class="list-group-item list-group-item-action <?= ($uri->getSegment(2) == 'tagihan' ? 'active' : ''); ?>"><i class="ri-slack-line align-middle me-2 fs-16"></i>Tagihan</a>
        <a href="<?= site_url('penghuni/invoice/' . $kode); ?>" class="list-group-item list-group-item-action <?= ($uri->getSegment(2) == 'invoice' ? 'active' : ''); ?>"><i class="ri-file-list-3-line align-middle me-2 fs-16"></i>Invoice</a>
    </div>
<?php endif; ?>