<div class="sidebar d-flex flex-column flex-shrink-0 py-4 z-1 bg-white shadow-sm fixed offcanvas show offcanvas-start"
    data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling"
    aria-labelledby="offcanvasScrollingLabel">
    <button type="button" class="btn-close text-reset float-end hide" data-bs-dismiss="offcanvas"
        aria-label="Close"></button>
    <div class="logo d-flex align-items-center fs-4">
        <img src="/icon/gardeny.svg" alt="logo" class="logo">
        <h4 class="color-2 fw-bold m-auto ms-1">Gardeny</h4>
    </div>
    <div class="status-user d-flex bg-color-1 color-4 shadow">
        <img src="/icon/Logo.svg" alt="" class="d-flex">
        <p class="m-auto"><?= $level; ?></p>
    </div>
    <div class="target-menu d-flex align-items-center fw-bold text-black">
        <img src="/icon/target.svg" class="pe-2" alt="">
        <p class="m-auto ms-0">Menu</p>
    </div>

    <!-- Bagian Menu Dashboard -->
    <ul class="nav flex-column mb-auto">
        <li class="nav-item py-1 <?php if($uri=="dashboard"){echo 'active-nav';}?>">
            <a href="/dashboard" class="nav-link text-decoration-none ps-5">
                <img src="/icon/dashboard.svg" alt="dashboard" class="icon-dashboard me-2">
                Dashboard
            </a>
        </li>
        <li class="nav-item py-1 <?php if($uri=="pengelola"){echo 'active-nav';}?>">
            <a href="/pengelola" class="nav-link text-decoration-none ps-5">
                <img src="/icon/pengelola.svg" alt="pengelola" class="icon-dashboard me-2">
                Pengelola
            </a>
        </li>
        <li class="nav-item py-1 <?php if($uri=="tanaman"){echo 'active-nav';}?>">
            <a href="/tanaman" class="nav-link text-decoration-none ps-5">
                <img src="/icon/tanaman.svg" alt="tanaman" class="icon-dashboard me-2">
                Tanaman
            </a>
        </li>
        <li class="nav-item py-1 <?php if($uri=="lokasi"){echo 'active-nav';}?>">
            <a href="/lokasi" class="nav-link text-decoration-none ps-5">
                <img src="/icon/lokasi.svg" alt="lokasi" class="icon-dashboard me-2">
                Lokasi
            </a>
        </li>
        <li class="nav-item py-1 <?php if($uri=="laporan"){echo 'active-nav';}?>">
            <a href="/laporan" class="nav-link text-decoration-none ps-5">
                <img src="/icon/laporan.svg" alt="laporan" class="icon-dashboard me-2">
                Laporan
            </a>
        </li>
        <li class="nav-item py-1 <?php if($uri=="perawatan"){echo 'active-nav';}?>">
            <a href="/perawatan" class="nav-link text-decoration-none ps-5">
                <img src="/icon/perawatan.svg" alt="perawatan" class="icon-dashboard me-2">
                Perawatan
            </a>
        </li>
        <li class="nav-item py-1 <?php if($uri=="klasifikasi"){echo 'active-nav';}?>">
            <a href="/klasifikasi" class="nav-link text-decoration-none ps-5">
                <img src="/icon/klasifikasi.svg" alt="klasifikasi" class="icon-dashboard me-2">
                Klasifikasi
            </a>
        </li>
        <div class="datetime d-flex align-items-center mt-4 px-3 py-4">
            <img src="/icon/bulat.svg" alt="date" class="date-icon">
            <p class="m-auto ms-0 ms-2 color-3"><?= date("l"); ?>/<?= date("Y/m/d"); ?></p>
        </div>
    </ul>
</div>