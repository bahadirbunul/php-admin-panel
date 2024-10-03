<?php
$pageTitle = "Teşekkürler";
include('includes/header.php'); ?>

<div class="py-5 bg-secondary">
    <div class="container">
        <h4 class="text-white text-center">Teşekkürler</h4>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body shadow-sm">
                    <h4>Teşekkürler</h4>
                    <div>
                        <?= alertMessage() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>