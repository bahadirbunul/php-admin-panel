<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Servisleri Düzenle
                    <a href="servisler.php" class="btn btn-danger float-end">Geri</a>
                </h4>
            </div>
            <div class="card-body">

                <?= alertMessage(); ?>

                <form action="code.php" method="POST" enctype="multipart/form-data">

                    <?php
                    $paramResult = checkParamId('id');
                    if (!is_numeric($paramResult)) {
                        echo "<h5>" . $paramResult . "</h5>";
                        return false;
                    }

                    $servis = getById('servisler', $paramResult);
                    if ($servis) {

                        if ($servis['status'] == 200) {
                    ?>
                            <input type="hidden" name="servisId" value="<?= $servis['data']['id'] ?>">

                            <div class="mb-3">
                                <label>Servis Adı</label>
                                <input type="text" name="isim" value="<?= $servis['data']['isim']; ?>" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Kısa Açıklama</label>
                                <textarea name="kisa_aciklama" required class="form-control" rows="3"><?= $servis['data']['kisa_aciklama']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Açıklama</label>
                                <textarea name="uzun_aciklama" class="form-control mySummernote" rows="3"><?= $servis['data']['uzun_aciklama']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Resim Yükle</label>
                                <input type="file" name="resim" class="form-control">
                                <img src="<?= '../' . $servis['data']['resim'] ?>" style="width: 70px;height: 70px;" alt="Img">
                            </div>

                            <h5>SEO Etiketleri</h5>
                            <div class="mb-3">
                                <label>Meta Başlığı</label>
                                <input type="text" name="meta_baslik" value="<?= $servis['data']['meta_baslik']; ?>" required class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Meta Açıklamaları</label>
                                <textarea name="aciklama" value="<?= $servis['data']['aciklama']; ?>" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Anahtar Kelimeler</label>
                                <textarea name="anahtar_kelimeler" value="<?= $servis['data']['anahtar_kelimeler']; ?>" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Durum (Checked = Pasif, Un-Checked = Aktif)</label>
                                <br>
                                <input type="checkbox" name="status" <?= $servis['data']['status'] == 1 ? 'checked' : ''; ?> style="width: 30px; height: 30px;">
                            </div>

                            <div class="mb-3 text-end">
                                <button type="submit" name="servisGuncelle" class="btn btn-primary">Servisi Güncelle</button>
                            </div>
                    <?php
                        } else {
                            echo "<h5>Data bulunamadı.</h5>";
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