<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// دالة لإرسال الرسائل
function send_email() {
    // قم بإدخال بيانات البريد والباسورد من الطلب HTTP
    $email_address = $_POST["email"];
    $email_password = $_POST["password"];

    // إنشاء مثيل لبibliothèque PHPMailer
    $mail = new PHPMailer(true);

    try {
        // تهيئة SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $email_address;
        $mail->Password = $email_password;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // إرسال الرسالة
        $mail->setFrom($email_address, 'Your Name');
        $mail->addAddress('wisecat2024@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// تشغيل دالة إرسال الرسائل
send_email();
?>
