<?php

require '../config/function.php';

$paraResult = checkParamId('id');
if (is_numeric($paraResult)) {
    $kullaniciId = validate($paraResult);

    $kullanici = getById('kullanicilar', $kullaniciId);
    if ($kullanici['status'] == 200) {
        $kullaniciSil = deleteQuery('kullanicilar', $kullaniciId);
        if ($kullaniciSil) {
            redirect('kullanicilar.php', 'Kullanıcı silindi.');
        } else {
            redirect('kullanicilar.php', 'Birşeyler yanlış gitti.');
        }
    } else {
        redirect('kullanicilar.php', $kullanici['message']);
    }
} else {
    redirect('kullanicilar.php', $paraResult);
}
