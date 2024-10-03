<div class="sticky-top">
    <div class="bg-primary py-2">

        <div class="container">
            <div class="row">
                <div class="col-md-6 text-white">
                    Email: <?= webAyarlari('email1') ?? ''; ?>
                    <br>
                    Telefon: <?= webAyarlari('telefon1') ?? ''; ?>
                </div>
                <div class="col-md-6 text-white">
                    Sosyal Medya:
                </div>
            </div>
        </div>

    </div>

    <nav class="navbar navbar-expand-lg bg-white shadow">

        <div class="container">

            <a class="navbar-brand" href="#"><?= webAyarlari('baslik') ?? 'Website'; ?></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Ana Sayfa</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="hakkimizda.php">Hakkımızda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="servisler.php">Servisler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="iletisim.php">İletişim</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>