<?php
require '../config/function.php';


if (isset($_POST['kullaniciKaydet'])) {
    $isim = validate($_POST['isim']);
    $telefon = validate($_POST['telefon']);
    $email = validate($_POST['email']);
    $sifre = validate($_POST['sifre']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;
    $rol = validate($_POST['rol']);

    if ($isim != '' || $email != '' || $telefon != '' || $sifre != '') {

        $hashedSifre = password_hash($sifre, PASSWORD_BCRYPT);

        $query = "INSERT INTO kullanicilar (isim,telefon,email,sifre,is_ban,rol) VALUES ('$isim','$telefon','$email','$hashedSifre','$is_ban','$rol')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('kullanicilar.php', 'Kullanıcılar/Admin Başarıyla Eklendi');
        } else {
            redirect('kullanici-olustur.php', 'Bir şeyler yanlış gitti...');
        }
    } else {
        redirect('kullanici-olustur.php', 'Lütfen tüm boşlukları doldurunuz');
    }
}


if (isset($_POST['kullaniciGuncelle'])) {
    $isim = validate($_POST['isim']);
    $telefon = validate($_POST['telefon']);
    $email = validate($_POST['email']);
    $sifre = validate($_POST['sifre']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;
    $rol = validate($_POST['rol']);

    $kullaniciId = validate($_POST['kullaniciId']);
    $kullanici = getById('kullanicilar', $kullaniciId);
    if ($kullanici['status'] != 200) {
        redirect('kullanici-duzenle.php?id=' . $kullaniciId, 'Böyle bir kişi yok');
    }

    if ($isim != '' || $email != '' || $telefon != '' || $sifre != '') {

        $hashedSifre = password_hash($sifre, PASSWORD_BCRYPT);


        $query = "UPDATE kullanicilar SET 
            isim='$isim',
            telefon='$telefon',
            email='$email',
            sifre='$hashedSifre',
            is_ban='$is_ban',
            rol='$rol'
            WHERE id='$kullaniciId'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('kullanici-duzenle.php?id=' . $kullaniciId, 'Kullanıcılar/Admin Başarıyla Eklendi');
        } else {
            redirect('kullanici-olustur.php', 'Bir şeyler yanlış gitti...');
        }
    } else {
        redirect('kullanici-olustur.php', 'Lütfen tüm boşlukları doldurunuz');
    }
}


if (isset($_POST['ayarlariKaydet'])) {
    $baslik = validate($_POST['baslik']);
    $slug = validate($_POST['slug']);
    $kisa_aciklama = validate($_POST['kisa_aciklama']);

    $aciklama = validate($_POST['aciklama']);
    $anahtar_kelimeler = validate($_POST['anahtar_kelimeler']);

    $email1 = validate($_POST['email1']);
    $email2 = validate($_POST['email2']);
    $telefon1 = validate($_POST['telefon1']);
    $telefon2 = validate($_POST['telefon2']);
    $adres = validate($_POST['adres']);

    $ayarlarId = validate($_POST['ayarlarId']);

    if ($ayarlarId == 'insert') {
        $query = "INSERT INTO ayarlar (baslik,slug,kisa_aciklama,aciklama,anahtar_kelimeler,email1,email2,telefon1,telefon2,adres)
            VALUES ('$baslik','$slug','$kisa_aciklama','$aciklama','$anahtar_kelimeler','$email1','$email2','$telefon1','$telefon2','$adres')";
        $result = mysqli_query($conn, $query);
    }

    if (is_numeric($ayarlarId)) {
        $query = "UPDATE ayarlar SET 
        baslik='$baslik',
        slug ='$slug',
        kisa_aciklama = '$kisa_aciklama',
        aciklama ='$aciklama',
        anahtar_kelimeler ='$anahtar_kelimeler',
        email1 ='$email1',
        email2 ='$email2',
        telefon1 ='$telefon1',
        telefon2 ='$telefon2',
        adres ='$adres'
        WHERE id='$ayarlarId'
        ";
        $result = mysqli_query($conn, $query);
    }


    if ($result) {
        redirect('ayarlar.php', 'Ayarlar Kaydedildi');
    } else {
        redirect('ayarlar.php', 'Bir şeyler yanlış gitti!');
    }
}



if (isset($_POST['sosyalMedyaKaydet'])) {
    $isim = validate($_POST['isim']);
    $url = validate($_POST['url']);
    $status = validate($_POST['status']) == true ? 1 : 0;

    if ($isim != '' || $url != '') {

        $query = "INSERT INTO sosyal_medyalar (isim,url,status) VALUES ('$isim','$url','$status')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('sosyal-medya.php', 'Sosyal Medya Başarıyla Eklendi');
        } else {
            redirect('sosyal-medya.php', 'Bir şeyler yanlış gitti...');
        }
    } else {
        redirect('sosyal-medya-olustur.php', 'Lütfen tüm boşlukları doldurunuz');
    }
}


if (isset($_POST['sosyalMedyaGuncelle'])) {
    $isim = validate($_POST['isim']);
    $url = validate($_POST['url']);
    $status = validate($_POST['status']) == true ? 1 : 0;

    $sosyalMedyaId = validate($_POST['sosyalMedyaId']);
    if ($isim != '' || $url != '') {

        $query = "UPDATE sosyal_medyalar SET isim='$isim', url='$url', status='$status' WHERE id ='$sosyalMedyaId' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('sosyal-medya.php', 'Sosyal Medya Başarıyla Güncellendi');
        } else {
            redirect('sosyal-medya-duzenle.php?=' . $sosyalMedyaId, 'Bir şeyler yanlış gitti...');
        }
    } else {
        redirect('sosyal-medya-duzenle.php?=' . $sosyalMedyaId, 'Lütfen tüm boşlukları doldurunuz');
    }
}

if (isset($_POST['servisKaydet'])) {
    $isim = validate($_POST['isim']);
    $slug = str_replace('', '-', strtolower($isim));
    $kisa_aciklama = validate($_POST['kisa_aciklama']);
    $uzun_aciklama = validate($_POST['uzun_aciklama']);

    if ($_FILES['resim']['size'] > 0) {
        $resim = $_FILES['resim']['name'];

        $resimDosyaTipi = strtolower(pathinfo($resim, PATHINFO_EXTENSION));
        if ($resimDosyaTipi != 'jpg' && $resimDosyaTipi != 'jpeg' && $resimDosyaTipi != 'png') {
            redirect('servisler.php', 'Sadece JPG, JPEG, PNG geçerli.');
        }


        $path = "../assets/uploads/servisler/";
        $imgExt = pathinfo($resim, PATHINFO_EXTENSION);
        $filename = time() . '.' . $imgExt;

        $finalResim = 'assets/uploads/servisler/' . $filename;
    } else {
        $finalResim = NULL;
    }

    $meta_baslik = validate($_POST['meta_baslik']);
    $aciklama = validate($_POST['aciklama']);
    $anahtar_kelimeler = validate($_POST['anahtar_kelimeler']);
    $status = validate($_POST['status'] == true ? '1' : '0');

    $query = "INSERT INTO servisler (isim,slug,kisa_aciklama,uzun_aciklama,resim,meta_baslik,aciklama,anahtar_kelimeler,status) 
    VALUES ('$isim','$slug','$kisa_aciklama','$uzun_aciklama','$finalResim','$meta_baslik','$aciklama','$anahtar_kelimeler','$status')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if ($_FILES['resim']['size'] > 0) {

            move_uploaded_file($_FILES['resim']['tmp_name'], $path . $filename);
        }
        redirect('servisler.php', 'Servis Eklendi.');
    } else {
        redirect('servisler.php', 'Bir şeyler yanlış gitti.');
    }
}


if (isset($_POST['servisGuncelle'])) {
    $isim = validate($_POST['isim']);
    $servisId = validate($_POST['servisId']);
    $slug = str_replace('', '-', strtolower($isim));
    $kisa_aciklama = validate($_POST['kisa_aciklama']);
    $uzun_aciklama = validate($_POST['uzun_aciklama']);

    $servis = getById('servisler', $servisId);

    if ($_FILES['resim']['size'] > 0) {
        $resim = $_FILES['resim']['name'];

        $resimDosyaTipi = strtolower(pathinfo($resim, PATHINFO_EXTENSION));
        if ($resimDosyaTipi != 'jpg' && $resimDosyaTipi != 'jpeg' && $resimDosyaTipi != 'png') {
            redirect('servisler.php', 'Sadece JPG, JPEG, PNG geçerli.');
        }

        $path = "../assets/uploads/servisler/";

        $resimSil =  "../" . $servis['data']['resim'];

        if (file_exists($resimSil)) {
            unlink($resimSil);
        }


        $imgExt = pathinfo($resim, PATHINFO_EXTENSION);
        $filename = time() . '.' . $imgExt;

        $finalResim = 'assets/uploads/servisler/' . $filename;
    } else {
        $finalResim = $servis['data']['resim'];
    }

    $meta_baslik = validate($_POST['meta_baslik']);
    $aciklama = validate($_POST['aciklama']);
    $anahtar_kelimeler = validate($_POST['anahtar_kelimeler']);
    $status = validate($_POST['status']) == true ? '1' : '0';




    $query = "UPDATE servisler SET 
    isim = '$isim',
    slug = '$slug',
    kisa_aciklama = '$kisa_aciklama',
    uzun_aciklama ='$uzun_aciklama',
    resim ='$finalResim',
    meta_baslik ='$meta_baslik',
    aciklama ='$aciklama',
    anahtar_kelimeler ='$anahtar_kelimeler',
    status ='$status'
    WHERE id='$servisId' ";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if ($_FILES['resim']['size'] > 0) {

            move_uploaded_file($_FILES['resim']['tmp_name'], $path . $filename);
        }
        redirect('servisler-duzenle.php?id=' . $servisId, 'Servis Güncellendi.');
    } else {
        redirect('servisler-duzenle.php?id=' . $servisId, 'Bir şeyler yanlış gitti.');
    }
}

if (isset($_POST['sorguDurumGuncelle'])) {
    $sorguId = validate($_POST['sorguId']);
    $status = validate($_POST['status']);

    $query = "UPDATE enquires SET status='$status' WHERE id='$sorguId' ";
    $result = mysqli_query($conn, $query);

    if ($result) {
        redirect('sorgular-görüntü.php?id=' . $sorguId, 'Sorgu durumu güncellendi.');
    } else {
        redirect('sorgular-görüntü.php?id=' . $sorguId, 'Bir şeyler yanlış gitti.');
    }
}
