<?php

require '../config/function.php';

$paraResult = checkParamId('id');
if (is_numeric($paraResult)) {
    $servirId = validate($paraResult);

    $servis = getById('servisler', $servirId);
    if ($servis['status'] == 200) {
        $servisSil = deleteQuery('servisler', $servirId);
        if ($servisSil) {
            $resimSil =  "../" . $servis['data']['resim'];

            if (file_exists($resimSil)) {
                unlink($resimSil);
            }
            redirect('servisler.php', 'Servis silindi.');
        } else {
            redirect('servisler.php', 'Birşeyler yanlış gitti.');
        }
    } else {
        redirect('servisler.php', $servis['message']);
    }
} else {
    redirect('servisler.php', $paraResult);
}
