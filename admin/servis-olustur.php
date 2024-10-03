<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Servis Ekle
                    <a href="servisler.php" class="btn btn-danger float-end">Geri</a>
                </h4>
            </div>
            <div class="card-body">

                <?= alertMessage(); ?>

                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>Servis Adı</label>
                        <input type="text" name="isim" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Kısa Açıklama</label>
                        <textarea name="kisa_aciklama" required class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Açıklama</label>
                        <textarea name="uzun_aciklama" class="form-control mySummernote" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Resim Yükle</label>
                        <input type="file" name="resim" class="form-control">
                    </div>

                    <h5>SEO Etiketleri</h5>
                    <div class="mb-3">
                        <label>Meta Başlığı</label>
                        <input type="text" name="meta_baslik" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Meta Açıklamaları</label>
                        <textarea name="aciklama" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Anahtar Kelimeler</label>
                        <textarea name="anahtar_kelimeler" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Durum (Checked = Pasif, Un-Checked = Aktif)</label>
                        <br>
                        <input type="checkbox" name="status" style="width: 30px; height: 30px;">
                    </div>

                    <div class="mb-3 text-end">
                        <button type="submit" name="servisKaydet" class="btn btn-primary">Servisi Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>