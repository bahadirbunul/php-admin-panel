<?php
$pageTitle = "Servisler";
include('includes/header.php'); ?>

<div class="py-5 bg-secondary">
    <div class="container">
        <h4 class="text-white text-center">Servislerimiz</h4>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">

            <?php
            $servisQuery = "SELECT * FROM servisler WHERE status='0'";
            $result = mysqli_query($conn, $servisQuery);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $row) {
            ?>
                        <div class="col-md-3 mb-3">
                            <div class="card shadow-sm">
                                <?php if ($row['resim'] != '') : ?>
                                    <img src="<?= $row['resim']; ?>" class="w-100 rounded" alt="Img" style="min-height: 200px;max-height: 200px;">
                                <?php else: ?>
                                    <img src="assets/images/noimage.jpg" class="w-100 rounded" alt="Img" style="min-height: 200px;max-height: 200px;">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5><?= $row['isim']; ?></h5>
                                    <p>
                                        <?= $row['kisa_aciklama']; ?>
                                    </p>
                                    <div>
                                        <a href="servis.php?slug=<?= $row['slug']; ?>" class="text-primary">Daha fazla...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="col-md-12">
                        <h5>Data bulunamadı</h5>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="col-md-12">
                    <h5>Bir şeyler yanlış gitti.</h5>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>