<?php
require 'config/function.php';
require_once 'vendor/autoload.php';
$host = "smtp.gmail.com";
$port = "587";
$sslOrTls = "tls";
//ssl-465
$setUsername = "bahadirbunul7@gmail.com";
$setPassword = "wvrh cydm epjk tdhr";
$emailAdress = "bahadirbunul7@gmail.com";
$sendEmailAdress = "bahadirbunul7@gmail.com";
$subject = "Yeni bir sorgun var.";
if (isset($_POST['iletisimGonder'])) {
    $isim = $_POST['isim'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $servis = $_POST['servis'];
    $mesaj = $_POST['mesaj'];
    $bodyContent = '<div>
        <h4>İsim : ' . $isim . '</h4>
        <h4>Email : ' . $email . '</h4>
        <h4>Telefon : ' . $telefon . '</h4>
        <h4>Servis : ' . $servis . '</h4>
        <h4>Mesaj : ' . $mesaj . '</h4>
    </div>';
    try {
        //code...
        // Create the Transport
        $transport = (new Swift_SmtpTransport($host, $port, $sslOrTls))
            ->setUsername($setUsername)
            ->setPassword($setPassword);

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message($subject))
            ->setFrom([$emailAdress => 'Tekno Tamir'])
            ->setTo([$sendEmailAdress])
            ->setBody($bodyContent, 'text/html');

        // Send the message
        $result = $mailer->send($message);
        if ($result) {
            redirect('iletisim.php', 'Bize ulaştığınız için teşekkür ederiz.');
        } else {
            redirect('iletisim.php', 'Bir şeyler yanlış gitti.');
        }
    } catch (\Exception $e) {
        redirect('iletisim.php', 'Bir şeyler yanlış gitti: ' . $e->getMessage());
    }
}
