<?php
$pageTitle = "Giriş Yap";
include('includes/header.php');

if (isset($_SESSION['auth'])) {
    redirect('index.php', 'Giriş yaptınız.');
}

?>

<div class="py-4 bg-secondary text-center">
    <h4 class="text-white">Giriş Yap</h4>
</div>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4>Giriş Yap</h4>
                    </div>
                    <div class="card-body">

                        <?= alertMessage(); ?>
                        <form action="login-code.php" method="POST">
                            <div class="mb-3">
                                <label>Email Adres</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Şifre</label>
                                <input type="password" name="sifre" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="girisBtn" class="btn btn-primary w-100">Giriş Yap</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>