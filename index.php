<?php
$pageTitle = "Ana Sayfa";
include('includes/header.php'); ?>


<div class="container">
    <?= alertMessage(); ?>
</div>

<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/images/slider1.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="assets/images/slider1.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="assets/images/slider1.png" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center ">
                <h4><?= webAyarlari('baslik'); ?>'ne Hoşgeldiniz</h4>
                <div class="underline mx-auto"></div>

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita at quae mollitia facere dolores repudiandae deserunt illum accusamus aliquam asperiores suscipit dolorem, magnam voluptatum. Nobis id dolorem temporibus veniam commodi.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">

            <div class="col-md-12 mb-4 text-center ">
                <h4>Servislerimiz</h4>
                <div class="underline mx-auto"></div>
                <?php
                $servisQuery = "SELECT * FROM servisler WHERE status='0' LIMIT 6";
                $result = mysqli_query($conn, $servisQuery);

                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        foreach ($result as $row) {
                ?>
                            <div class="col-md-4 mb-3">
                                <div class="card shadow">
                                    <?php if ($row['resim'] != '') : ?>
                                        <img src="<?= $row['resim']; ?>" class="w-100 rounded" alt="Img">
                                    <?php else: ?>
                                        <img src="assets/images/noimage.jpg" class="w-100 rounded" alt="Img">
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