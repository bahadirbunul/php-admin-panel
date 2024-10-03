<?php

require '../config/function.php';

$paraResult = checkParamId('id');
if (is_numeric($paraResult)) {
    $sosyalMedyaId = validate($paraResult);

    $sosyalMedya = getById('sosyal_medyalar', $sosyalMedyaId);
    if ($sosyalMedya['status'] == 200) {
        $sosyalMedyaSil = deleteQuery('sosyal_medyalar', $sosyalMedyaId);
        if ($sosyalMedyaSil) {
            redirect('sosyal-medya.php', 'Sosyal Medya silindi.');
        } else {
            redirect('sosyal-medya.php', 'Birşeyler yanlış gitti.');
        }
    } else {
        redirect('sosyal-medya.php', $sosyalMedya['message']);
    }
} else {
    redirect('sosyal-medya.php', $paraResult);
}
