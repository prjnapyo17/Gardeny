<?= $this->extend('learning/template') ?>

<?= $this->section('content'); ?>

<?= $this->include('/learning/navbar'); ?>

<!-- Hero -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
                data-aos="fade-right">
                <h1>Bersama Kenali Tanaman</h1>
                <h2>Informasi dan pembelajaran tentang tanaman yang dapat diakses dengan mudah dan cepat</h2>
                <div class="d-flex">
                    <a href="#cta" class="btn-get-started scrollto">Mulai</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img">
                <img src="/img/hero-img.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section>
<!-- End Hero -->

<main id="main">
    <section id="featured-services" class="featured-services mb-5">
        <div class="container">

            <div class="row" data-aos="fade-up">
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-laptop"></i></div>
                        <h4 class="title"><a>Kemudahan Akses</a></h4>
                        <p class="description">Kemudahan dalam mengakses web dimanapun dan kapanpun kamu berada, kamu
                            bisa mengakses website ini secara dekstop maupun mobile.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-card-checklist"></i></div>
                        <h4 class="title"><a>Data Yang Lengkap</a></h4>
                        <p class="description">Setiap data tanaman yang diakses, kami selalu memastikan kelengkapan data
                            yang valid mulai dari data famili, genus, sampai spesies tanaman tersebut</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-clipboard-data"></i></div>
                        <h4 class="title"><a>Data Terupdate</a></h4>
                        <p class="description">Kami selalu memastikan data yang kami tampilkan selalu terupdate, dengan
                            demikian tidak akan terjadi kesalahan data</p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Featured Services Section -->
    <section id="cta" class="cta mt-5">
        <div class="container">

            <div class="text-center" data-aos="fade-up">
                <h3>Selamat Datang Di Gardeny</h3>
                <p>Sebuah website E-Learning yang memperkenalkan siswa dengan berbagai jenis tanaman. Agar siswa dapat
                    memahami berbagai tanaman yang ada. Siswa juga dapat mengetahui famili, spesies, genus dari tanaman
                    tersebut serta cara perawatan, baik yang reguler maupun yang khusus
                </p>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <img src="/img/about.png" class="img-fluid" alt="" data-aos="fade-right">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content mt-5" data-aos="fade-left">
                    <h3>Apa saja yang bisa kami tawarkan ?</h3>
                    <ul class="mt-5">
                        <li><i class="bi bi-check-circle"></i>Pengetahuan Tentang Cara Merawat Tanaman
                        </li>
                        <li><i class="bi bi-check-circle"></i>Pengetahuan Tentang Famili, Genus dan Spesies Tanaman
                        </li>
                        <li><i class="bi bi-check-circle"></i>Website Yang User Friendly dan Interaktif
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <span>Apa Yang Kami Lakukan</span>
                <h2>Apa Yang Kami Lakukan</h2>
            </div>

            <div class="row" data-aos="fade-up">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4><a href="">Penghijauan</a></h4>
                        <p>Mendukung penghijauan dan gerakan penanaman pohon diseluruh dunia.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-slideshow"></i></div>
                        <h4><a href="">Edukasi Digital</a></h4>
                        <p>Mendukung gerakan edukasi digital dan gerakan digitalisasi indonesia.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-arch"></i></div>
                        <h4><a href="">Pembangunan</a></h4>
                        <p>Mendukung pembangunan taman taman kota dan hutan kota untuk masyarakat.</p>
                    </div>
                </div>
            </div>

        </div>

        </div>
    </section><!-- End Services Section -->


</main>

<?= $this->include('/learning/footer'); ?>

<?= $this->endSection(); ?>