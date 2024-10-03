<?php
$pageTitle = "İletişim";
include('includes/header.php'); ?>


<div class="py-5 bg-secondary">
    <div class="container">
        <h4 class="text-white text-center">İletişim</h4>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?= alertMessage(); ?>
                <div class="card card-body">
                    <form action="sendmail.php" method="POST">
                        <div class="mb-3">
                            <label>İsim</label>
                            <input type="text" name="isim" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Telefon No</label>
                            <input type="text" name="telefon" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Servis</label>
                            <input type="text" name="servis" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Mesaj</label>
                            <textarea name="mesaj" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="iletisimGonder" class="btn w-100 btn-primary">Gönder</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="footer-heading">İletişim Bilgileri</h4>
                <hr>
                <p>Adres: <?= webAyarlari('adres') ?? ''; ?></p>
                <p>Email: <?= webAyarlari('email1') ?? ''; ?>, <?= webAyarlari('email2') ?? ''; ?></p>
                <p>Telefon No: <?= webAyarlari('telefon1') ?? ''; ?>, <?= webAyarlari('telefon2') ?? ''; ?></p>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>