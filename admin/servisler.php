<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Servisler Listesi
                    <a href="servis-olustur.php" class="btn btn-primary float-end">Servis Ekle</a>
                </h4>
            </div>
            <div class="card-body">

                <?= alertMessage(); ?>

                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>İsim</th>
                            <th>Durum</th>
                            <th>Düzenleme</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $servisler = getAll('servisler');
                        if ($servisler) {
                            if (mysqli_num_rows($servisler) > 0) {
                                foreach ($servisler as $item) {
                        ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['isim']; ?></td>
                                        <td><?= $item['status'] == 1 ? 'Pasif' : 'Aktif'; ?></td>
                                        <td>
                                            <a href="servisler-duzenle.php?id=<?= $item['id']; ?>" class="btn btn-success btn-sm">Düzenle</a>
                                            <a href="servisler-sil.php?id=<?= $item['id']; ?>"
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
                                    <td colspan="4">Kayıt Bulunamadı</td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4">Bir şeyler yanlış gitti.</td>
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