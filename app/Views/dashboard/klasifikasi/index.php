<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="klasifikasi container mt-2 w-100">
    <div class="title">
        <img src="/icon/dartboard.svg" alt="">
        <h4><?= $title1; ?></h4>
    </div>

    <div class="klasifikasi-box">
        <a class="box shadow" href="/klasifikasi/genus">
            <h1>G</h1>
            <p>Genus</p>
        </a>
        <a class="box shadow" href="/klasifikasi/spesies">
            <h1>S</h1>
            <p>Spesies</p>
        </a>
        <a class="box shadow" href="/klasifikasi/famili">
            <h1>F</h1>
            <p>Famili</p>
        </a>
    </div>
</div>

<?= $this->endSection(); ?>