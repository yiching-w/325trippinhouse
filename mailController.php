<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    if ($_POST) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $mail->Username = 'dodowangyc@gmail.com'; // YOUR gmail email
        $mail->Password = 'dododo0320'; // YOUR gmail password
    
        // Sender and recipient settings
        $mail->setFrom('dodowangyc@gmail.com', '測試!');
        $mail->addAddress($email, 'he');
        // $mail->addReplyTo('example@gmail.com', 'Sender Name'); // to set the reply to
    
        // Setting the email content
        $mail->IsHTML(true);
        $mail->Subject = "測試預約";
        $mail->Body = '顧客姓名：' . $name . '<br>' . '訊息：' . $message . '<br>' . '連絡電話' . $contact . '<br>' .
        'EMAIL:' . $email;
        // $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';
    
        $mail->send();
        echo "Email message sent.";
    }

    
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
?>
