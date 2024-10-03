<?php

if (isset($_SESSION['auth'])) {
    if (isset($_SESSION['loggedInUserRole'])) {
        $rol = validate($_SESSION['loggedInUserRole']);
        $email = validate($_SESSION['loggedInUser']['email']);

        $query = "SELECT * FROM kullanicilar WHERE email='$email' AND rol='$rol' LIMIT 1";
        $result = mysqli_query($conn, $query);
        if ($result) {
            if (mysqli_num_rows($result) == 0) {
                logoutSession();
                redirect('../login.php', 'Giriş Reddedildi');
            } else {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if ($row['rol'] != 'admin') {
                    logoutSession();
                    redirect('../login.php', 'Giriş Reddedildi');
                }
                if ($row['is_ban'] == 1) {
                    logoutSession();
                    redirect('../login.php', 'Hesabınız askıya alınmıştır.');
                }
            }
        } else {
            logoutSession();
            redirect('../login.php', 'Bir şeyler yanlış gitti');
        }
    }
} else {
    redirect('../login.php', 'Giriş yapılıyor...');
}
