<?php include('includes/header.php'); ?>

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Site Ayarları</h4>
            </div>
            <div class="card-body">
                <?= alertMessage(); ?>
                <form action="code.php" method="POST">

                    <?php

                    $ayarlar = getById('ayarlar', 1);

                    ?>
                    <input type="hidden" name="ayarlarId" value="<?= $ayarlar['data']['id'] ?? 'insert' ?>" />

                    <div class="mb-3">
                        <label>Başlık</label>
                        <input type="text" name="baslik" value="<?= $ayarlar['data']['baslik'] ?? 'insert' ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>URL / Domain</label>
                        <input type="text" name="slug" value="<?= $ayarlar['data']['slug'] ?? 'insert' ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Kısa Açıklama</label>
                        <input type="text" name="kisa_aciklama" value="<?= $ayarlar['data']['kisa_aciklama'] ?? 'insert' ?>" class="form-control">
                    </div>
                    <h4 class="my-3">SEO Ayarları</h4>
                    <div class="mb-3">
                        <label>Açıklama</label>
                        <textarea name="aciklama" class="form-control" rows="3"><?= $ayarlar['data']['aciklama'] ?? 'insert' ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Anahtar Kelimeler</label>
                        <textarea name="anahtar_kelimeler" class="form-control" rows="3"><?= $ayarlar['data']['anahtar_kelimeler'] ?? 'insert' ?></textarea>
                    </div>
                    <h4 class="my-3">İletişim Bilgileri</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Email 1</label>
                            <input type="email" name="email1" value="<?= $ayarlar['data']['email1'] ?? 'insert' ?>" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email 2</label>
                            <input type="email" name="email2" value="<?= $ayarlar['data']['email2'] ?? 'insert' ?>" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Telefon 1</label>
                            <input type="text" name="telefon1" value="<?= $ayarlar['data']['telefon1'] ?? 'insert' ?>" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Telefon 2</label>
                            <input type="text" name="telefon2" value="<?= $ayarlar['data']['telefon2'] ?? 'insert' ?>" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Adres</label>
                            <textarea name="adres" class="form-control" rows="3"><?= $ayarlar['data']['adres'] ?? 'insert' ?></textarea>
                        </div>
                    </div>
                    <div class="mb-3 text-end">
                        <button type="submit" name="ayarlariKaydet" class="btn btn-primary">Ayarları Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>