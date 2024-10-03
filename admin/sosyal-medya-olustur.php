<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Sosyal Medya Ekle
                    <a href="sosyal-medya.php" class="btn btn-danger float-end">Geri</a>
                </h4>
            </div>
            <div class="card-body">

                <?= alertMessage(); ?>

                <form action="code.php" method="POST">
                    <div class="mb-3">
                        <label>Sosyal Medya İsmi</label>
                        <input type="text" name="isim" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Sosyal Medya URL/Link</label>
                        <input type="text" name="url" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Durum</label>
                        <br>
                        <input type="checkbox" name="status" style="width: 30px;height: 30px;">
                    </div>
                    <div class="mb-3 text-end">
                        <button type="submit" name="sosyalMedyaKaydet" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>