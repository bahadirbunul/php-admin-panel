<?php
$pageTitle = "Servisler";
include('includes/header.php');

if (isset($_GET['slug'])) {
    if ($_GET['slug'] == null) {
        redirect('servisler.php', '');
    }
} else {
    redirect('servisler.php', '');
}

$slug = validate($_GET['slug']);
$servis = "SELECT * FROM servisler WHERE status = '0' AND slug ='$slug' LIMIT 1";
$result = mysqli_query($conn, $servis);
if (!$result) {
    redirect('servisler.php', '');
}


if (mysqli_num_rows($result) == 0) {
    redirect('servisler.php', '');
}
$rowData = mysqli_fetch_assoc($result);

?>




<div class="py-5 bg-secondary">
    <div class="container">
        <h4 class="text-white text-center"><?= $rowData['isim']; ?></h4>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-body shadow-sm">
                    <h4><?= $rowData['isim']; ?></h4>
                    <div class="underline"></div>
                    <p>
                        <?= $rowData['kisa_aciklama']; ?>
                    </p>
                    <div class="mb-3">
                        <?php if ($rowData['resim'] != '') : ?>
                            <img src="<?= $rowData['resim']; ?>" class="w-100 rounded" alt="Img">
                        <?php else: ?>
                            <img src="assets/images/noimage.jpg" class="w-100 rounded" alt="Img">
                        <?php endif; ?>
                    </div>
                    <p>
                        <?= $rowData['uzun_aciklama']; ?>
                    </p>
                </div>
            </div>
            <div class="col-md-4 sticky-top" style="top: 120px;">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h4 class="text-white mb-0">Şimdi Daha Fazlasını Öğrenin</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
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
                                <input type="text" name="servis" readonly value="<?= $rowData['isim']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Mesaj</label>
                                <textarea name="mesaj" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="enquireBtn" class="btn w-100 btn-primary">Gönder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>