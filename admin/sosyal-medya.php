<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Sosyal Medya Listesi
                    <a href="sosyal-medya-olustur.php" class="btn btn-primary float-end">Sosyal Medya Ekle</a>
                </h4>
            </div>
            <div class="card-body">

                <?= alertMessage(); ?>

                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>İsim</th>
                            <th>URL</th>
                            <th>Durum</th>
                            <th>Düzenleme</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sosyal_medyalar = getAll('sosyal_medyalar');
                        if ($sosyal_medyalar) {
                            if (mysqli_num_rows($sosyal_medyalar) > 0) {
                                foreach ($sosyal_medyalar as $item) {
                        ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['isim']; ?></td>
                                        <td><?= $item['url']; ?></td>
                                        <td><?= $item['status'] == 1 ? 'Pasif' : 'Aktif'; ?></td>
                                        <td>
                                            <a href="sosyal-medya-duzenle.php?id=<?= $item['id']; ?>" class="btn btn-success btn-sm">Düzenle</a>
                                            <a href="sosyal-medya-sil.php?id=<?= $item['id']; ?>"
                                                class="btn btn-danger btn-sm mx-2"
                                                onclick="return confirm('Silmek istediğinden emin misin?')">
                                                Sil</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5">Kayıt Bulunamadı</td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5">Bir şeyler yanlış gitti.</td>
                            </tr>
                        <?php
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>