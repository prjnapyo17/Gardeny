<?= $this->extend('learning/template') ?>

<?= $this->section('content'); ?>

<?= $this->include('/learning/navbar'); ?>

<section class="row w-100 py-5 bg-light" id="features">
    <div class="col-lg-6 col-img"></div>
    <div class="col-lg-6 py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h6 class="text-primary">Detail Tanaman</h6>
                    <h1>Nama : "Isi pake Backend"</h1>
                    <p>Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet eaque
                        fuga
                        in cumque optio consectetur harum vitae debitis sapiente praesentium aperiam aut</p>

                    <div class="feature d-flex mt-5">

                        <div>
                            <h5>Spesies : "Isi pake Backend"</h5>
                            <p>Penjelasan Spesies secara singkat </p>
                        </div>
                    </div>
                    <div class="feature d-flex">

                        <div>
                            <h5>Genus : "Backend"</h5>
                            <p>isi singkat </p>
                        </div>
                    </div>
                    <div class="feature d-flex">

                        <div>
                            <h5 class="">Famili : "Backend"</h5>
                            <p>ngantuk cookkkk </p>
                        </div>
                    </div>
                    <div class="feature d-flex">

                        <div>

                            <h5 class="">Ciri Ciri : "Backend"</h5>
                            <p>ngantuk cookkkk </p>
                        </div>
                    </div>
                    <div class="feature d-flex">

                        <div>
                            <h5 class="">Perawatan Khusus : "Backend"</h5>
                            <p>ngantuk cookkkk </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('/learning/footer'); ?>

<?= $this->endSection(); ?>