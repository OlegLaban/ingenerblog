<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = trim($searchUserFetch['name']);
$email = trim($searchUserFetch['email']);
$token = trim($tokenResPas);

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';   						// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'laban.oleg@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'CkjvfkAktire64GB'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('laban.oleg@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress("$email");     // Кому будет уходить письмо  OlegLaban@yandex.by
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Восстановление пароля.';
$mail->Body    = 'Здравтсвуйте ' . $name . ' вы пытаетесь восстановить пароль от аккаунта на сайте "ingenerBlog" для задания нового пароля перейтите по ссылке: http://test3.local/mail/resPassword.php/?token=' . $token;
$mail->AltBody = '';

if($mail->send()) {
   echo "Сообщение отправлено";
}
?>
