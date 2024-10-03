<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Kullanıcı Listesi
                    <a href="kullanici-olustur.php" class="btn btn-primary float-end">Kullanıcı Ekle</a>
                </h4>
            </div>
            <div class="card-body">

                <?= alertMessage(); ?>

                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>İsim</th>
                            <th>Email</th>
                            <th>Telefon No</th>
                            <th>Rol</th>
                            <th>Ban</th>
                            <th>Düzenleme</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $kullanicilar = getAll('kullanicilar');
                        if (mysqli_num_rows($kullanicilar) > 0) {
                            foreach ($kullanicilar as $userItem) {
                        ?>
                                <tr>
                                    <td><?= $userItem['id']; ?></td>
                                    <td><?= $userItem['isim']; ?></td>
                                    <td><?= $userItem['email']; ?></td>
                                    <td><?= $userItem['telefon']; ?></td>
                                    <td><?= $userItem['rol']; ?></td>
                                    <td><?= $userItem['is_ban'] == 1 ? 'Banlı' : 'Aktif'; ?></td>
                                    <td>
                                        <a href="kullanici-duzenle.php?id=<?= $userItem['id']; ?>" class="btn btn-success btn-sm">Düzenle</a>
                                        <a href="kullanici-sil.php?id=<?= $userItem['id']; ?>"
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
                                <td colspan="7">Kayıt Bulunamadı</td>
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