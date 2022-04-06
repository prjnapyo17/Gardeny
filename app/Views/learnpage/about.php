<?= $this->extend('learning/template') ?>

<?= $this->section('content'); ?>

<?= $this->include('/learning/navbar'); ?>

<section id="team">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8 mx-auto text-center">
                <h1>Tim Kami</h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur nisi necessitatibus
                    repellat distinctio eveniet eaque fuga in cumque optio consectetur
                    harum vitae debitis sapiente praesentium aperiam aut
                </p>
            </div>
        </div>
        <div class="row text-center g-4">
            <div class="col-lg-3 col-sm-6">
                <div class="team-member card-effect">
                    <img src="img/team1.jpg" alt="" />
                    <h5 class="mb-0 mt-4">Sahrul Ramdani</h5>
                    <p>Back-End Developer</p>
                    <div class="social-icons">
                        <a href="#"><i class="bx bxl-facebook"></i></a>
                        <a href="#"><i class="bx bxl-twitter"></i></a>
                        <a href="#"><i class="bx bxl-instagram-alt"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="team-member card-effect">
                    <img src="img/team2.jpg" alt="" />
                    <h5 class="mb-0 mt-4">Prajna Prayogie</h5>
                    <p>Back End Developer</p>
                    <div class="social-icons">
                        <a href="#"><i class="bx bxl-facebook"></i></a>
                        <a href="#"><i class="bx bxl-twitter"></i></a>
                        <a href="#"><i class="bx bxl-instagram-alt"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="team-member card-effect">
                    <img src="img/team3.jpg" alt="" />
                    <h5 class="mb-0 mt-4">M Razan Alfatin</h5>
                    <p>Front-End Developer</p>
                    <div class="social-icons">
                        <a href="#"><i class="bx bxl-facebook"></i></a>
                        <a href="#"><i class="bx bxl-twitter"></i></a>
                        <a href="#"><i class="bx bxl-instagram-alt"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="team-member card-effect">
                    <img src="img/team4.jpg" alt="" />
                    <h5 class="mb-0 mt-4">M Revan Asywal S</h5>
                    <p>Front End Developer</p>
                    <div class="social-icons">
                        <a href="#"><i class="bx bxl-facebook"></i></a>
                        <a href="#"><i class="bx bxl-twitter"></i></a>
                        <a href="#"><i class="bx bxl-instagram-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('/learning/footer'); ?>

<?= $this->endSection(); ?>