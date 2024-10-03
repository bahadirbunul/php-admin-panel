<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-5">
                        <h4>
                            Sorgular Listesi
                        </h4>
                    </div>
                    <div class="col-md-7">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="date" name="date" required value="<?= isset($_GET['date']) == true ? $_GET['date'] : '' ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <select name="status" required class="form-control">
                                        <option value="">Durum Seçin</option>
                                        <option value="pendind" <?= isset($_GET['status']) == true ? ($_GET['status'] == 'pendind' ? 'selected' : '') : '' ?>>Askıda</option>
                                        <option value="completed" <?= isset($_GET['status']) == true ? ($_GET['status'] == 'completed' ? 'selected' : '') : '' ?>>Tamamlandı</option>
                                        <option value="cancelled" <?= isset($_GET['status']) == true ? ($_GET['status'] == 'cancelled' ? 'selected' : '') : '' ?>>İptal edildi.</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Filtrele</button>
                                    <a href="sorgular.php" class="btn btn-danger">Sıfırla</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="card-body">

                <?= alertMessage(); ?>
                <?php
                if (isset($_GET['date']) && $_GET['date'] != '' && isset($_GET['status']) && $_GET['status'] != '') {
                    $date = validate($_GET['date']);
                    $status = validate($_GET['status']);

                    $enquires = mysqli_query($conn, "SELECT * FROM enquires WHERE tarih=$date AND status='$status' ORDER BY id DESC");
                } else {

                    $enquires = mysqli_query($conn, "SELECT * FROM enquires ORDER BY id DESC");
                }
                if ($enquires) {
                    if (mysqli_num_rows($enquires) > 0) {
                ?>
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>İsim</th>
                                    <th>Telefon</th>
                                    <th>Servis</th>
                                    <th>Tarih</th>
                                    <th>Status</th>
                                    <th>Düzenleme</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($enquires as $item) {
                                ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['isim']; ?></td>
                                        <td><?= $item['telefon']; ?></td>
                                        <td><?= $item['servis']; ?></td>
                                        <td><?= $item['tarih']; ?></td>
                                        <td><?= $item['status']; ?></td>
                                        <td>
                                            <a href="sorgular-görüntü.php?id=<?= $item['id']; ?>" class="btn btn-info btn-sm">Görüntüle</a>
                                            <a href="sorgular-sil.php?id=<?= $item['id']; ?>"
                                                class="btn btn-danger btn-sm mx-2"
                                                onclick="return confirm('Silmek istediğinden emin misin?')">
                                                Sil</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>



                            </tbody>
                        </table>
                <?php
                    } else {
                        echo '<h5>Data bulunamadı.</h5>';
                    }
                } else {
                    echo '<h5>Bir şeyler yanlış gitti.</h5>';
                }

                ?>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>