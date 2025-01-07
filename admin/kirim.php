<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    // Validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='alert alert-danger'>Email tidak valid.</div>";
        exit;
    }

    // Konfigurasi PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ekasaputri05052004@gmail.com'; // Ganti dengan email Gmail Anda
        $mail->Password = 'qbrc geta vgil bajo'; // Ganti dengan password email Anda atau App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('ekasaputri05052004@gmail.com'); // Ganti dengan email tujuan

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Pesan dari Pengunjung';
        $mail->Body = "
            <strong>Nama:</strong> $name<br>
            <strong>Email:</strong> $email<br>
            <strong>Pesan:</strong><br>$pesan";

        $mail->send();
        echo "<div class='alert alert-success'>Pesan berhasil dikirim.</div>";
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Pesan tidak dapat dikirim. Error: {$mail->ErrorInfo}</div>";
    }
}
?>
