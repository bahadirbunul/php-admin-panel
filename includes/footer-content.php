<div class="py-5 bg-light border-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4 class="footer-heading"><?= webAyarlari('baslik') ?? 'Aciklama'; ?></h4>
                <hr>
                <p>
                    <?= webAyarlari('kisa_aciklama') ?? 'Aciklama'; ?>
                </p>
            </div>
            <div class="col-md-4">
                <h4 class="footer-heading">Takip Edin</h4>
                <hr>
                <ul>
                    <?php
                    $sosyalMedya = getAll('sosyal_medyalar');
                    if ($sosyalMedya) {
                        if (mysqli_num_rows($sosyalMedya) > 0) {
                            foreach ($sosyalMedya as $sosyalItem) {
                    ?>
                                <li>
                                    <a href="<?= $sosyalItem['url'] ?>">
                                        <?= $sosyalItem['isim'] ?>
                                    </a>
                                </li>
                    <?php
                            }
                        } else {
                            echo "<li>Sosyal Medya eklenmedi</li>";
                        }
                    } else {
                        echo "<li>Bir şeyler yanlış geldi.</li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-4">
                <h4 class="footer-heading">İletişim Bilgileri</h4>
                <hr>
                <p>Adres: <?= webAyarlari('adres') ?? ''; ?></p>
                <p>Email: <?= webAyarlari('email1') ?? ''; ?>, <?= webAyarlari('email2') ?? ''; ?></p>
                <p>Telefon No: <?= webAyarlari('telefon1') ?? ''; ?>, <?= webAyarlari('telefon2') ?? ''; ?></p>
            </div>
        </div>
    </div>
</div>