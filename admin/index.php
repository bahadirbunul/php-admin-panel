<?php include('includes/header.php'); ?>

<div class="row">

    <div class="col-md-12">
        <?= alertMessage(); ?>
    </div>

    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Tüm Kullanıcılar</p>
            <h5 class="font-weight-bolder mb-0">
                <?= getCount('kullanicilar') ?>
            </h5>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Tüm Servisler</p>
            <h5 class="font-weight-bolder mb-0">
                <?= getCount('servisler') ?>
            </h5>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Tüm Sosyal Medyalar</p>
            <h5 class="font-weight-bolder mb-0">
                <?= getCount('sosyal_medyalar') ?>
            </h5>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card card-body p-3">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Tüm Sorgular</p>
            <h5 class="font-weight-bolder mb-0">
                <?= getCount('enquires') ?>
            </h5>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>