<nav class="navbar navbar-dark bg-white p-none shadow-sm d-flex z-0 sticky-top">
    <div class="d-flex navbar-main">
        <button class="toggler btn-success" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-icon h-1 d-flex align-items-center">
            <div class="navbar-button d-inline bl br">
                <a href="">
                    <img src="/icon/account.svg" alt="notification" class="icon-profil mx-auto d-block ">
                </a>
            </div>
            <div class="navbar-button d-inline br">
                <a href="login/logout" onclick="return confirm('Logout?')">
                    <img src=" /icon/logout.svg" alt="logout" class="icon-profil mx-auto d-block">
                </a>
            </div>
        </div>
        <div class="navbar-profil px-3 d-flex align-items-center">
            <div class="profil w-100">
                <p><?= $user_login; ?></p>
                <img src="/upload/<?= $foto; ?>" alt="profil" class="foto-profil">
            </div>
        </div>
    </div>
</nav>