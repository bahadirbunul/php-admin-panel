<?php
$pageName = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
?>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="index.php">
            <h4>Telefon Tamir</h4>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link  
                <?= $pageName == 'index.php' ? 'active' : ''; ?>
                " href="index.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-home text-dark text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Sorgular</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $pageName == 'sorgular.php' ? 'active' : ''; ?> 
                <?= $pageName == 'sorgular-görüntü.php' ? 'active' : ''; ?>
                 " href="sorgular.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-bullhorn text-dark text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sorgular</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Servisleri Yönet</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link  
                <?= $pageName == 'servisler.php' ? 'active' : ''; ?>
                <?= $pageName == 'servis-olustur.php' ? 'active' : ''; ?>
                <?= $pageName == 'servisler-duzenle.php' ? 'active' : ''; ?>
                 " href="servisler.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-cogs text-dark text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Servisler</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Site Yönetimi</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link 
                <?= $pageName == 'kullanicilar.php' ? 'active' : ''; ?>
                <?= $pageName == 'kullanici-olustur.php' ? 'active' : ''; ?>
                <?= $pageName == 'kullanici-duzenle.php' ? 'active' : ''; ?>
                
                " href="kullanicilar.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user-plus text-dark text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Admin / Kullanıcılar</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= $pageName == 'sosyal-medya.php' ? 'active' : ''; ?>
                <?= $pageName == 'sosyal-medya-olustur.php' ? 'active' : ''; ?>
                <?= $pageName == 'sosyal-medya-duzenle.php' ? 'active' : ''; ?>
                
                " href="sosyal-medya.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-globe text-dark text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sosyal Medya</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $pageName == 'ayarlar.php' ? 'active' : ''; ?>  " href="ayarlar.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-cogs text-dark text-lg"></i>
                    </div>
                    <span class="nav-link-text ms-1">Ayarlar</span>
                </a>
            </li>

        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">

        <a class="btn bg-gradient-primary mt-3 w-100" href="logout.php">Çıkış Yap</a>
    </div>
</aside>