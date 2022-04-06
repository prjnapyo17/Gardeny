<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="klasifikasi container mt-2 w-100">
    <div class="title">
        <img src="/icon/dartboard.svg" alt="">
        <h4><?= $title1; ?></h4>
    </div>

    <div class="klasifikasi-box">
        <a class="box shadow" href="/lokasi/lokasi">
            <h1>L</h1>
            <p>Lokasi</p>
        </a>
        <a class="box shadow" href="/lokasi/sublokasi">
            <h1>SL</h1>
            <p>SubLokasi</p>
        </a>
    </div>
</div>

<?= $this->endSection(); ?>