<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Kullanıcıları Düzenle
                    <a href="kullanicilar.php" class="btn btn-danger float-end">Geri Dön</a>
                </h4>
            </div>
            <div class="card-body">
                <?= alertMessage(); ?>

                <form action="code.php" method="POST">
                    <?php
                    $paramResult = checkParamId('id');
                    if (!is_numeric($paramResult)) {
                        echo '<h5>' . $paramResult . '</h5>';
                        return false;
                    }

                    $kullanici = getById('kullanicilar', checkParamId('id'));
                    if ($kullanici['status'] == 200) {
                    ?>

                        <input type="hidden" name="kullaniciId" value="<?= $kullanici['data']['id']; ?>" required>



                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>İsim</label>
                                    <input type="text" name="isim" value="<?= $kullanici['data']['isim']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Telefon Numarası</label>
                                    <input type="text" name="telefon" value="<?= $kullanici['data']['telefon']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>E-mail Adresi</label>
                                    <input type="text" name="email" value="<?= $kullanici['data']['email']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Şifre</label>
                                    <input type="text" name="sifre" value="<?= $kullanici['data']['sifre']; ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Rol</label>
                                    <select name="rol" required class="form-select">
                                        <option value="">Rol Seç</option>
                                        <option value="admin" <?= $kullanici['data']['rol'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                        <option value="kullanici" <?= $kullanici['data']['rol'] == 'kullanici' ? 'selected' : ''; ?>>Kullanıcı</option>
                                        <option value="kullanici">Kullanıcı</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Banlı mı?</label>
                                    <br>
                                    <input type="checkbox" name="is_ban" <?= $kullanici['data']['is_ban'] == true ? 'checked' : ''; ?> style="width: 30px;height: 30px;" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 text-end">
                                    <br>
                                    <button type="submit" name="kullaniciGuncelle" class="btn btn-primary">Güncelle</button>
                                </div>
                            </div>
                        </div>
                    <?php
                    } else {
                        echo '<h5>' . $kullanici['message'] . '</h5>';
                    }
                    ?>

                </form>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>