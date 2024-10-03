<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Sosyal Medya Düzenle
                    <a href="sosyal-medya.php" class="btn btn-danger float-end">Geri</a>
                </h4>
            </div>
            <div class="card-body">

                <?= alertMessage(); ?>

                <form action="code.php" method="POST">

                    <?php
                    $paramResult = checkParamId('id');
                    if (!is_numeric($paramResult)) {
                        echo "<h5>" . $paramResult . "</h5>";
                        return false;
                    }

                    $sosyalMedya = getById('sosyal_medyalar', $paramResult);
                    if ($sosyalMedya) {
                        if ($sosyalMedya['status'] == 200) {
                    ?>
                            <input type="hidden" name="sosyalMedyaId" value="<?= $sosyalMedya['data']['id'] ?>">
                            <div class="mb-3">
                                <label>Sosyal Medya İsmi</label>
                                <input type="text" name="isim" value="<?= $sosyalMedya['data']['isim'] ?>" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Sosyal Medya URL/Link</label>
                                <input type="text" name="url" value="<?= $sosyalMedya['data']['url'] ?>" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Durum</label>
                                <br>
                                <input type="checkbox" name="status" value="<?= $sosyalMedya['data']['status'] == 1 ? 'checked' : ''; ?>"
                                    style="width: 30px;height: 30px;">
                            </div>
                            <div class="mb-3 text-end">
                                <button type="submit" name="sosyalMedyaGuncelle" class="btn btn-primary">Güncelle</button>
                            </div>
                    <?php
                        } else {
                            echo "<h5>" . $sosyalMedya['message'] . "</h5>";
                        }
                    } else {
                        echo "<h5>Bir şeyler yanlış gitti.</h5>";
                    }
                    ?>


                </form>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>