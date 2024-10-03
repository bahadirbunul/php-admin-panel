<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Kullanıcı Ekle
                    <a href="kullanicilar.php" class="btn btn-danger float-end">Geri Dön</a>
                </h4>
            </div>
            <div class="card-body">
                <?= alertMessage(); ?>
                <form action="code.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>İsim</label>
                                <input type="text" name="isim" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Telefon Numarası</label>
                                <input type="phone" name="telefon" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>E-mail Adresi</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Şifre</label>
                                <input type="password" name="sifre" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label>Rol</label>
                                <select name="rol" class="form-select">
                                    <option value="">Rol Seç</option>
                                    <option value="admin">Admin</option>
                                    <option value="kullanici">Kullanıcı</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label>Banlı mı?</label>
                                <br>
                                <input type="checkbox" name="is_ban" style="width: 30px;height: 30px;" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 text-end">
                                <br>
                                <button type="submit" name="kullaniciKaydet" class="btn btn-primary">Kaydet</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>