<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Sorgu Görüntüsü
                    <a href="sorgular.php" class="btn btn-danger btn-sm mb-0 float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <?= alertMessage(); ?>

                <?php
                $paramResult = checkParamId('id');
                if (!is_numeric($paramResult)) {
                    echo "<h5>" . $paramResult . "</h5>";
                    return false;
                }

                $sorgu = getById('enquires', $paramResult);
                if ($sorgu) {

                    if ($sorgu['status'] == 200) {


                ?>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td width="20%">Sorgu Id</td>
                                    <td><?= $sorgu['data']['id']; ?></td>
                                </tr>
                                <tr>
                                    <td>İsim</td>
                                    <td><?= $sorgu['data']['isim']; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?= $sorgu['data']['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>Servis</td>
                                    <td><?= $sorgu['data']['servis']; ?></td>
                                </tr>
                                <tr>
                                    <td>Mesaj</td>
                                    <td><?= $sorgu['data']['mesaj']; ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><?= $sorgu['data']['status']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tarih</td>
                                    <td><?= $sorgu['data']['tarih']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="mt-3">
                            <div class="card border card-body">
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="sorguId" value="<?= $sorgu['data']['id']; ?>">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Durum Güncellemesi</label>
                                            <select name="status" class="form-select">
                                                <option value="pending" <?= $sorgu['data']['status'] == 'pending' ? 'selected' : ''; ?>>Askıda</option>
                                                <option value="completed" <?= $sorgu['data']['status'] == 'completed' ? 'selected' : ''; ?>>Tamamlandı</option>
                                                <option value="cancelled" <?= $sorgu['data']['status'] == 'cancelled' ? 'selected' : ''; ?>>İptal edildi</option>
                                            </select>
                                            <div class="col-md-8">
                                                <br>
                                                <button type="submit" name="sorguDurumGuncelle" class="btn btn-primary">Güncelle</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                <?php
                    } else {
                        echo "<h5>Data bulunamadı.</h5>";
                    }
                }
                ?>
            </div>
        </div>
    </div>


    <?php include('includes/footer.php'); ?>