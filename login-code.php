<?php

require 'config/function.php';

if (isset($_POST['girisBtn'])) {
    $emailInput = validate($_POST['email']);
    $sifreInput = validate($_POST['sifre']);

    $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
    $sifre = filter_var($sifreInput, FILTER_SANITIZE_EMAIL);

    if ($email != '' && $sifre != '') {
        // $query = "SELECT * FROM kullanicilar WHERE email='$email' AND sifre='$sifre' LIMIT 1";
        $query = "SELECT * FROM kullanicilar WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $hashedSifre = $row['sifre'];
                if (!password_verify($sifre, $hashedSifre)) {
                    redirect('login.php', 'Geçersiz Şifre');
                }

                if ($row['rol'] == 'admin') {

                    if ($row['is_ban'] == 1) {
                        redirect('login.php', 'Hesabınız askıya alınmıştır.');
                    }

                    $_SESSION['auth'] = true;
                    $_SESSION['loggedInUserRole'] = $row['rol'];
                    $_SESSION['loggedInUser'] = [
                        'isim' => $row['isim'],
                        'email' => $row['email']
                    ];


                    redirect('admin/index.php', 'Admin olarak giriş yapıldı.');
                } else {

                    if ($row['is_ban'] == 1) {
                        redirect('login.php', 'Hesabınız askıya alınmıştır.');
                    }
                    $_SESSION['auth'] = true;
                    $_SESSION['loggedInUserRole'] = $row['rol'];
                    $_SESSION['loggedInUser'] = [
                        'isim' => $row['isim'],
                        'email' => $row['email']
                    ];
                    redirect('index.php', 'Giriş Yapıldı');
                }
            } else {
                redirect('login.php', 'Geçersiz Email');
            }
        } else {
            redirect('login.php', 'Birşeyler yanlış gitti');
        }
    } else {
        redirect('login.php', 'Tüm alanlar zorunludur.');
    }
}
