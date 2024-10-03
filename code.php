<?php

require 'config/function.php';

if (isset($_POST['enquireBtn'])) {
    $isim = validate($_POST['isim']);
    $email = validate($_POST['email']);
    $telefon = validate($_POST['telefon']);
    $servis = validate($_POST['servis']);
    $mesaj = validate($_POST['mesaj']);

    $query = "INSERT INTO enquires (isim,email,telefon,servis,mesaj) 
    VALUES ('$isim','$email','$telefon','$servis','$mesaj')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        redirect('tesekkurler.php', 'Bize ulaştığınız için teşekkürler. Size yakın zamanda dönüş yapacağız.');
    } else {
        redirect('tesekkurler.php', 'Bir şeyler yanlış gitti.');
    }
}
